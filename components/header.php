<?php
/**
 * Main Site Header — logo, search trigger, mobile menu button
 */
?>
<header class="site-header">
  <div class="site-header__top">
    <div class="site-header__inner">
      <a href="index.php" class="site-logo" aria-label="<?= htmlspecialchars(FXTOPICS_BRAND) ?> — Home">
        <span class="site-logo__mark" aria-hidden="true"></span>
        <span class="site-logo__text">
          Fx<span style="color:var(--color-accent-dark)">Topics</span>
          <span class="site-logo__sub"><?= htmlspecialchars(FXTOPICS_TAGLINE) ?></span>
        </span>
      </a>
      <div class="site-header__actions">
        <button class="search-trigger" aria-label="Search articles">
          <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="11" cy="11" r="8"/><path d="m21 21-4.3-4.3"/></svg>
          <span>Search markets…</span>
        </button>
        <button class="mobile-menu-btn" aria-label="Open navigation menu">
          <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M3 12h18M3 6h18M3 18h18"/></svg>
        </button>
      </div>
    </div>
  </div>
</header>
