<?php
/**
 * Broker Awards — Finance Awards 2026 grid
 *
 * Each award card uses one of 5 inline SVG icons.
 */
$awards = require __DIR__ . '/../includes/data/awards.php';

/** Returns the SVG markup for an award-icon variant. */
function fx_award_icon(string $type): string {
    switch ($type) {
        case 'star':
            return '<path d="M32 4L40 16L52 18L44 28L46 42L32 36L18 42L20 28L12 18L24 16L32 4Z" fill="#C9A961" stroke="#A88B4A" stroke-width="1"/><circle cx="32" cy="22" r="6" fill="#0A1628"/><rect x="20" y="46" width="24" height="4" fill="#C9A961"/><rect x="22" y="52" width="20" height="3" fill="#C9A961"/>';
        case 'check':
            return '<circle cx="32" cy="28" r="20" fill="none" stroke="#C9A961" stroke-width="2"/><path d="M22 28L30 36L44 22" stroke="#C9A961" stroke-width="3" fill="none" stroke-linecap="round" stroke-linejoin="round"/><rect x="20" y="46" width="24" height="4" fill="#C9A961"/><rect x="22" y="52" width="20" height="3" fill="#C9A961"/>';
        case 'sparkle':
            return '<path d="M32 6L40 20L54 22L44 32L46 46L32 40L18 46L20 32L10 22L24 20L32 6Z" fill="none" stroke="#C9A961" stroke-width="2"/><circle cx="32" cy="28" r="8" fill="#C9A961" opacity="0.3"/><rect x="20" y="50" width="24" height="3" fill="#C9A961"/>';
        case 'house':
            return '<rect x="16" y="20" width="32" height="24" fill="none" stroke="#C9A961" stroke-width="2"/><path d="M16 20L32 8L48 20" stroke="#C9A961" stroke-width="2" fill="none"/><circle cx="32" cy="32" r="4" fill="#C9A961"/><path d="M24 50L22 56M32 50L32 56M40 50L42 56" stroke="#C9A961" stroke-width="2" stroke-linecap="round"/>';
        case 'chart':
            return '<path d="M20 44L28 36L36 40L48 24" stroke="#C9A961" stroke-width="3" fill="none" stroke-linecap="round" stroke-linejoin="round"/><circle cx="48" cy="24" r="4" fill="#C9A961"/><rect x="14" y="50" width="36" height="3" fill="#C9A961"/>';
        default:
            return '';
    }
}
?>
<section class="section section--dark" id="awards">
  <div class="container">
    <div class="section-header section-header--dark">
      <h2 class="section-header__title">Finance Awards 2026</h2>
      <a href="#" class="section-header__cta" style="color: var(--color-accent);">View All Categories</a>
    </div>
    <div class="awards-grid">
      <?php foreach ($awards as $award): ?>
        <article class="award-card">
          <div class="award-card__icon">
            <svg viewBox="0 0 64 64" fill="none"><?= fx_award_icon($award['icon']) ?></svg>
          </div>
          <h3 class="award-card__title"><?= htmlspecialchars($award['title']) ?></h3>
          <div class="award-card__broker"><?= htmlspecialchars($award['broker']) ?></div>
          <div class="award-card__year">2026 Winner</div>
        </article>
      <?php endforeach; ?>
    </div>
  </div>
</section>
