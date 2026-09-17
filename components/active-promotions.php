<?php
/**
 * Active Promotions — 4 sponsored bonus cards
 *
 * Data: includes/data/bonus_cards.php
 */
$bonus_cards = require __DIR__ . '/../includes/data/bonus_cards.php';
?>
<section class="section" id="bonuses">
  <div class="container">
    <div class="section-header">
      <h2 class="section-header__title">Active Promotions</h2>
      <a href="#" class="section-header__cta">All Bonuses</a>
    </div>
    <div class="bonus-grid">
      <?php foreach ($bonus_cards as $card): ?>
        <article class="bonus-card">
          <?php if (!empty($card['sponsored'])): ?>
            <span class="bonus-card__sponsored">Sponsored</span>
          <?php endif; ?>
          <div class="bonus-card__amount">
            <span class="bonus-card__amount-value"><?= htmlspecialchars($card['amount_value']) ?></span>
            <span class="bonus-card__amount-label"><?= htmlspecialchars($card['amount_label']) ?></span>
          </div>
          <div class="bonus-card__content">
            <div class="bonus-card__broker"><?= htmlspecialchars($card['broker']) ?></div>
            <h3 class="bonus-card__title"><?= htmlspecialchars($card['title']) ?></h3>
            <p class="bonus-card__terms"><?= htmlspecialchars($card['terms']) ?></p>
            <div class="bonus-card__expiry">
              <?php if (($card['limit_type'] ?? 'date') === 'date'): ?>
                ⏱ Expires: <?= htmlspecialchars($card['expiry']) ?>
              <?php else: ?>
                ⏱ <?= htmlspecialchars($card['expiry']) ?>
              <?php endif; ?>
            </div>
            <a href="#" class="bonus-card__cta">Claim Bonus</a>
          </div>
        </article>
      <?php endforeach; ?>
    </div>
  </div>
</section>
