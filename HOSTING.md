# Hosting FX Topics on Cloudflare (Permanent)

Two options — pick what you need.

---

## Option A — Quick Share Link (no account, ~30 sec)

Best for showing work-in-progress to a client. Works while your PC stays on.

1. Start XAMPP (Apache + MySQL **Running**)
2. Make sure site loads at `http://localhost/marketpulse/`
3. Double-click `share.bat`
4. First run downloads `cloudflared.exe` (~25 MB) into `.\tools\`
5. Within ~5 sec, terminal shows a public URL like:
   ```
   https://random-words-1234.trycloudflare.com
   ```
6. **Share that URL** — it routes to your local XAMPP
7. **Keep terminal open** while sharing. Close = tunnel dies.

---

## Option B — Permanent Public Site (Cloudflare Pages)

Recommended. Survives your PC being off. Free. HTTPS automatic. Custom domain supported.

### Prerequisites (one-time)

- [x] GitHub account → [github.com/signup](https://github.com/signup)
- [x] Cloudflare account → [dash.cloudflare.com/sign-up](https://dash.cloudflare.com/sign-up)
- [x] Git installed on Windows → [git-scm.com/download/win](https://git-scm.com/download/win) (use default options)

### Step 1 — Create empty GitHub repo

1. Go to [github.com/new](https://github.com/new)
2. Repository name: `marketpulse` (or anything you like)
3. **Leave all checkboxes UNCHECKED** (no README, no .gitignore, no license)
4. Click **Create repository**
5. Copy the repo URL — looks like `https://github.com/YOUR_USERNAME/marketpulse.git`

### Step 2 — Create a Personal Access Token (PAT)

GitHub no longer accepts passwords for git push. You need a PAT.

1. Go to [github.com/settings/tokens](https://github.com/settings/tokens)
2. Click **Generate new token** → **Generate new token (classic)**
3. Note: `Cloudflare Pages deploy`
4. Expiration: 90 days (or your preference)
5. Scope: check **repo** (full control of private repositories)
6. Click **Generate token**
7. **Copy the token immediately** — it starts with `ghp_...` and you won't see it again. Save it in a password manager.

### Step 3 — Push your code to GitHub

Double-click **`deploy.bat`** in this folder.

It will ask for:
- GitHub username (e.g. `yourusername`)
- Repo name (default: `marketpulse`, press Enter to accept)
- Git committer name and email (first time only)
- Commit message (Enter for default)
- When prompted for password, **paste your PAT** (the `ghp_...` token)

It then:
1. Initializes git
2. Stages all files (excluding `tools/` and other local junk via `.gitignore`)
3. Commits
4. Pushes to GitHub
5. Prints the next step (Cloudflare Pages connect)

### Step 4 — Connect to Cloudflare Pages

1. Open [dash.cloudflare.com](https://dash.cloudflare.com) → left sidebar → **Workers & Pages**
2. Click **Create application** → **Pages** tab → **Connect to Git**
3. Authorize Cloudflare to access your GitHub (one-time)
4. Select your `marketpulse` repo → **Begin setup**
5. **Build settings:**
   - Framework preset: **None**
   - Build command: *(leave empty)*
   - Build output directory: `/`
6. Click **Save and Deploy**

Within ~60 seconds, your site is live at:

```
https://marketpulse.pages.dev
```

(or whatever Cloudflare assigned — you can rename it later in project settings)

### Step 5 — Add custom domain (optional)

1. In your Pages project → **Custom domains** tab
2. Click **Set up a custom domain** → enter `marketpulse.com` (or any domain you own)
3. Cloudflare will guide you through DNS setup (you must add Cloudflare as nameserver for that domain)

---

## Future Updates

After the first deploy, every time you change your site:

1. Double-click `deploy.bat`
2. Press Enter to accept defaults
3. Done. Cloudflare auto-deploys within ~60 sec.

---

## What gets pushed (and what doesn't)

Pushed to GitHub:
- All your HTML, CSS, JS files
- `sql/`, `articles.php`, `db-test.php` (the PHP/MySQL connection demo)
- `.gitignore`, `share.bat`, `deploy.bat`, `HOSTING.md`, `README.md`

**NOT** pushed (excluded by `.gitignore`):
- `tools/cloudflared.exe` (~25 MB, local-only)
- `.deploy-repo` (your saved GitHub username/repo, has your PAT in memory)
- OS/editor junk

---

## Troubleshooting

**`git` not recognized**
- Install from [git-scm.com/download/win](https://git-scm.com/download/win), then **close and reopen** any terminal window

**Push fails with "Authentication failed"**
- Make sure you're pasting the PAT (starts with `ghp_`), not your GitHub password
- Make sure the PAT has `repo` scope checked

**Push fails with "Repository not found"**
- The repo must exist on GitHub first. Create it at [github.com/new](https://github.com/new) before pushing.

**Cloudflare Pages build fails**
- Most common cause: wrong "Build output directory". Set it to `/` (just a forward slash, root of repo)

**Want to change the project name on Cloudflare?**
- Pages project → **Settings** → **Project name** → rename. URL becomes `new-name.pages.dev`

---

## Quick Comparison

| | share.bat (tunnel) | deploy.bat (Pages) |
|---|---|---|
| Setup time | 30 sec | 10–15 min |
| Account needed | None | GitHub + Cloudflare (both free) |
| Survives PC shutdown | ❌ | ✅ |
| Custom domain | ❌ | ✅ |
| HTTPS | ✅ | ✅ |
| URL | Random each run | Fixed (`marketpulse.pages.dev`) |
| Best for | Live client preview | Public launch |
