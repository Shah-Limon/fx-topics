<?php
/**
 * Promo + Featured Brokers Widget
 *
 * Left card: scrolling list of promo headlines (data/promos.php)
 * Right card: featured broker rows (data/featured_brokers.php)
 */
$promos          = require __DIR__ . '/../includes/data/promos.php';
$featured_brokers = require __DIR__ . '/../includes/data/featured_brokers.php';
?>
<section class="promo-broker-bar">
  <div class="container">
    <div class="promo-broker-bar__grid">

      <!-- LEFT: New Promo Updates -->
      <div class="widget-card">
        <h3 class="widget-card__title">New Promo Updates This Week</h3>
        <div class="widget-card__body">
          <ul class="promo-list">
            <?php foreach ($promos as $promo): ?>
              <li class="promo-list__item"><a href="#"><?= htmlspecialchars($promo) ?></a></li>
            <?php endforeach; ?>
          </ul>
          <a href="#" class="widget-card__footer">View All Promos <span aria-hidden="true">→</span></a>
        </div>
      </div>

      <!-- RIGHT: Forex Featured Brokers -->
      <div class="widget-card">
        <h3 class="widget-card__title">Forex Featured Brokers</h3>
        <div class="widget-card__body widget-card__body--scroll">
          <?php foreach ($featured_brokers as $broker): ?>
            <div class="featured-broker">
              <div class="featured-broker__brand">
                <div class="featured-broker__logo featured-broker__logo--<?= htmlspecialchars($broker['class']) ?>" aria-hidden="true"><?= htmlspecialchars($broker['logo']) ?></div>
                <span class="featured-broker__name"><?= htmlspecialchars($broker['name']) ?></span>
              </div>
              <p class="featured-broker__desc"><?= htmlspecialchars($broker['desc']) ?></p>
              <div class="featured-broker__actions">
                <a href="#" class="featured-broker__btn featured-broker__btn--start">START TRADING</a>
                <a href="#" class="featured-broker__btn featured-broker__btn--visit">Visit</a>
              </div>
            </div>
          <?php endforeach; ?>
        </div>
      </div>

    </div>
  </div>
</section>
