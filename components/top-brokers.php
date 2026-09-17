<?php
/**
 * Top Forex Brokers — 3 detailed broker cards
 *
 * Data: includes/data/top_brokers.php
 */
$top_brokers = require __DIR__ . '/../includes/data/top_brokers.php';

/** Reusable star-row renderer */
function fx_render_stars(int $filled, bool $half): string {
    $html = '';
    for ($i = 1; $i <= 5; $i++) {
        if ($i <= $filled) {
            $html .= '<svg viewBox="0 0 24 24" fill="currentColor"><path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"/></svg>';
        } elseif ($i === $filled + 1 && $half) {
            $html .= '<svg viewBox="0 0 24 24" fill="currentColor" opacity="0.4"><path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"/></svg>';
        } else {
            $html .= '';
        }
    }
    return $html;
}
?>
<section class="section section--paper" id="brokers">
  <div class="container">
    <div class="section-header">
      <h2 class="section-header__title">Top Forex Brokers</h2>
      <a href="broker-review.php" class="section-header__cta">All Broker Reviews</a>
    </div>
    <div class="broker-grid">

      <?php foreach ($top_brokers as $broker): ?>
        <article class="broker-card">
          <div class="broker-card__rank"><?= htmlspecialchars($broker['rank']) ?></div>
          <div class="broker-card__header">
            <div class="broker-card__logo"><?= htmlspecialchars($broker['logo']) ?></div>
            <div>
              <h3 class="broker-card__name"><?= htmlspecialchars($broker['name']) ?></h3>
              <div class="broker-card__rating">
                <span class="stars" aria-label="Rated <?= htmlspecialchars($broker['rating']) ?> out of 5">
                  <?= fx_render_stars($broker['stars'], $broker['half_star']) ?>
                </span>
                <span><?= htmlspecialchars($broker['rating']) ?> / <?= htmlspecialchars($broker['rating_max']) ?></span>
              </div>
            </div>
          </div>
          <div class="broker-card__features">
            <div class="broker-card__feature">
              <span class="broker-card__feature-label">Regulation</span>
              <span class="broker-card__feature-value"><?= htmlspecialchars($broker['regulation']) ?></span>
            </div>
            <div class="broker-card__feature">
              <span class="broker-card__feature-label">Min. Deposit</span>
              <span class="broker-card__feature-value"><?= htmlspecialchars($broker['min_deposit']) ?></span>
            </div>
            <div class="broker-card__feature">
              <span class="broker-card__feature-label">Spreads From</span>
              <span class="broker-card__feature-value"><?= htmlspecialchars($broker['spreads']) ?></span>
            </div>
            <div class="broker-card__feature">
              <span class="broker-card__feature-label">Platforms</span>
              <span class="broker-card__feature-value"><?= htmlspecialchars($broker['platforms']) ?></span>
            </div>
          </div>
          <div class="broker-card__bonus">
            <span class="broker-card__bonus-label"><?= htmlspecialchars($broker['bonus_label']) ?></span>
            <?= htmlspecialchars($broker['bonus_text']) ?>
          </div>
          <div class="broker-card__actions">
            <a href="broker-review.php" class="btn btn--ghost btn--sm">Read Review</a>
            <a href="#" class="btn btn--primary btn--sm">Visit Broker</a>
          </div>
        </article>
      <?php endforeach; ?>

    </div>
  </div>
</section>
