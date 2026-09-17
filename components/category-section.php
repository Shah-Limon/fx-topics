<?php
/**
 * Reusable Category Section — supports 4 different layouts
 *
 * Layouts (controlled by $section['layout']):
 *   - 'split'         : 1.4fr featured card + 1fr side list (Stocks, FinTech)
 *   - 'grid'          : 3 equal feature-grid cards (Crypto)
 *   - 'compact-grid'  : 3 compact cards with smaller title (Commodities)
 *
 * Usage from index.php:
 *   $categories = require 'includes/data/categories.php';
 *   foreach ($categories as $section) { ... render ... }
 *
 * To add a new section, append to data/categories.php — no template change needed.
 */
if (empty($section) || !is_array($section)) {
    return;
}

$layout = $section['layout'] ?? 'split';
$theme  = $section['theme']  ?? '';
?>
<section class="section <?= htmlspecialchars($theme) ?>" id="<?= htmlspecialchars($section['id']) ?>">
  <div class="container">
    <div class="section-header">
      <h2 class="section-header__title"><?= $section['title'] /* includes &amp; entity, safe in HTML context */ ?></h2>
      <a href="#" class="section-header__cta"><?= htmlspecialchars($section['cta']) ?></a>
    </div>

    <?php if ($layout === 'split'): ?>
      <div style="display: grid; grid-template-columns: 1.4fr 1fr; gap: 2.5rem;">
        <article class="article-card">
          <a href="article.php" class="article-card__media" style="aspect-ratio: 16/9;">
            <img src="<?= htmlspecialchars($section['featured']['img']) ?>" alt="<?= htmlspecialchars($section['featured']['alt']) ?>" loading="lazy">
          </a>
          <div class="eyebrow"><?= htmlspecialchars($section['featured']['eyebrow']) ?></div>
          <h3 class="article-card__title" style="font-size: 1.5rem;"><a href="article.php"><?= $section['featured']['title'] /* HTML-safe, contains entities */ ?></a></h3>
          <p class="article-card__excerpt"><?= htmlspecialchars($section['featured']['excerpt']) ?></p>
          <div class="article-card__meta">
            <span><?= htmlspecialchars($section['featured']['author']) ?></span>
            <span class="article-card__meta-divider">/</span>
            <span><?= htmlspecialchars($section['featured']['date']) ?></span>
          </div>
        </article>
        <div style="display: flex; flex-direction: column; gap: 1.5rem;">
          <?php foreach ($section['side'] as $item): ?>
            <article class="article-row" <?= !empty($item['last']) ? 'style="border-bottom: none;"' : '' ?>>
              <a href="article.php" class="article-row__media">
                <img src="<?= htmlspecialchars($item['img']) ?>" alt="" loading="lazy">
              </a>
              <div>
                <div class="eyebrow"><?= htmlspecialchars($item['eyebrow']) ?></div>
                <h3 class="article-row__title"><a href="article.php"><?= $item['title'] /* HTML-safe */ ?></a></h3>
                <div class="article-card__meta"><span><?= htmlspecialchars($item['time']) ?></span></div>
              </div>
            </article>
          <?php endforeach; ?>
        </div>
      </div>

    <?php elseif ($layout === 'grid'): ?>
      <div class="feature-grid">
        <?php foreach ($section['cards'] as $card): ?>
          <article class="article-card">
            <a href="article.php" class="article-card__media">
              <img src="<?= htmlspecialchars($card['img']) ?>" alt="<?= htmlspecialchars($card['alt']) ?>" loading="lazy">
            </a>
            <div class="eyebrow"><?= htmlspecialchars($card['eyebrow']) ?></div>
            <h3 class="article-card__title"><a href="article.php"><?= $card['title'] /* HTML-safe */ ?></a></h3>
            <p class="article-card__excerpt"><?= htmlspecialchars($card['excerpt']) ?></p>
            <div class="article-card__meta">
              <span><?= htmlspecialchars($card['author']) ?></span>
              <span class="article-card__meta-divider">/</span>
              <span><?= htmlspecialchars($card['date']) ?></span>
            </div>
          </article>
        <?php endforeach; ?>
      </div>

    <?php elseif ($layout === 'compact-grid'): ?>
      <div style="display: grid; grid-template-columns: 1fr 1fr 1fr; gap: 1.5rem;">
        <?php foreach ($section['cards'] as $card): ?>
          <article class="article-card">
            <a href="article.php" class="article-card__media">
              <img src="<?= htmlspecialchars($card['img']) ?>" alt="<?= htmlspecialchars($card['alt']) ?>" loading="lazy">
            </a>
            <div class="eyebrow"><?= htmlspecialchars($card['eyebrow']) ?></div>
            <h3 class="article-card__title" style="font-size: 1.1rem;"><a href="article.php"><?= $card['title'] /* HTML-safe */ ?></a></h3>
            <div class="article-card__meta"><span><?= htmlspecialchars($card['date']) ?></span></div>
          </article>
        <?php endforeach; ?>
      </div>
    <?php endif; ?>

  </div>
</section>
