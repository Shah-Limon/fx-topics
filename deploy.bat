@echo off
REM ============================================================================
REM FxTopics - Git + Cloudflare Pages deploy helper
REM
REM This script pushes your local site to GitHub. Cloudflare Pages will
REM auto-deploy from there within ~60 seconds.
REM
REM First-time setup (one-time):
REM   1. Create an EMPTY repo at github.com (e.g. YOUR_USERNAME/fxtopics)
REM      - Do NOT initialize with README/license/.gitignore
REM   2. Create a Personal Access Token (PAT):
REM      github.com → Settings → Developer settings → Personal access tokens
REM        → Tokens (classic) → Generate new token
REM        - Note: "Cloudflare Pages deploy"
REM        - Scope: check "repo" (full repo access)
REM        - Copy the token (starts with ghp_...)
REM   3. Run this script. It will ask for:
REM        - GitHub username
REM        - Repo name (default: fxtopics)
REM        - PAT (the ghp_... token, treated as password)
REM
REM After first run, future deploys only need:
REM   - commit message
REM ============================================================================

setlocal ENABLEDELAYEDEXPANSION

cd /d "%~dp0"

REM --- Check git is installed ---
where git >nul 2>nul
if errorlevel 1 (
    echo.
    echo [!] Git is not installed.
    echo     Download: https://git-scm.com/download/win
    echo     Install with default options, then re-run this script.
    pause
    exit /b 1
)

REM --- Get repo info ---
echo.
echo ============================================================================
echo   FxTopics - Cloudflare Pages Deploy Helper
echo ============================================================================
echo.

REM Try to read saved repo info (for repeat runs)
set "REPO_FILE=%~dp0.deploy-repo"
if exist "%REPO_FILE%" (
    set /p SAVED_REPO=<"%REPO_FILE%"
    echo Last used repo: !SAVED_REPO!
    set /p REUSE="Reuse same repo? (Y/n): "
    if /i not "!REUSE!"=="n" (
        set "REPO=!SAVED_REPO!"
    ) else (
        set "REPO="
    )
) else (
    set "REPO="
)

if "!REPO!"=="" (
    set /p GH_USER="GitHub username: "
    if "!GH_USER!"=="" (
        echo [!] Username required.
        pause
        exit /b 1
    )
    set /p REPO_NAME="Repo name [fxtopics]: "
    if "!REPO_NAME!"=="" set "REPO_NAME=fxtopics"
    set "REPO=!GH_USER!/!REPO_NAME!"
    echo !REPO!> "%REPO_FILE%"
)

set "REMOTE_URL=https://github.com/!REPO!.git"

echo.
echo Target repo: !REMOTE_URL!
echo.

REM --- Init repo if first time ---
if not exist ".git" (
    echo [1/5] Initializing git repo...
    git init
    git branch -M main
)

REM --- Configure user identity (local, not global) if missing ---
git config user.name >nul 2>nul
if errorlevel 1 (
    set /p GIT_NAME="Git committer name (e.g. Your Name): "
    set /p GIT_EMAIL="Git committer email: "
    git config user.name "!GIT_NAME!"
    git config user.email "!GIT_EMAIL!"
)

REM --- Stage and commit ---
echo.
set /p MSG="Commit message [Update FxTopics site]: "
if "!MSG!"=="" set "MSG=Update FxTopics site"

echo.
echo [2/5] Staging files...
git add .
if errorlevel 1 (
    echo [!] git add failed.
    pause
    exit /b 1
)

echo [3/5] Committing...
git commit -m "!MSG!" --quiet
if errorlevel 1 (
    echo [!] Commit failed - maybe nothing to commit? Continuing anyway.
)

REM --- Push ---
echo.
echo [4/5] Pushing to GitHub...
echo        (when prompted, paste your Personal Access Token as the password)
echo.

git push "!REMOTE_URL!" main
if errorlevel 1 (
    echo.
    echo [!] Push failed. Common causes:
    echo     - Wrong username or repo name
    echo     - PAT (token) typo or expired
    echo     - Repo doesn't exist yet on GitHub
    echo     Create the empty repo at: https://github.com/new
    pause
    exit /b 1
)

echo.
echo [5/5] Pushed successfully.
echo.
echo ============================================================================
echo   Next: connect this repo to Cloudflare Pages
echo ============================================================================
echo.
echo   1. Open: https://dash.cloudflare.com/?to=/:account/pages
echo   2. Click "Create application" then "Pages" then "Connect to Git"
echo   3. Pick your "!REPO!" repo
echo   4. Build settings:
echo        Framework preset:  None
echo        Build command:     (leave empty)
echo        Build output:      /
echo   5. Click "Save and Deploy"
echo.
echo   Within ~60 seconds your site will be live at:
echo        https://!REPO_NAME!.pages.dev
echo.
pause
