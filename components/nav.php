<?php
/**
 * Primary Navigation — sticky nav with conditional logo and menu items
 *
 * Reads menu structure from includes/data/navigation.php.
 */
$nav_items = require __DIR__ . '/../includes/data/navigation.php';
?>
<nav class="nav" aria-label="Primary">
  <div class="nav__inner">
    <a href="index.php" class="nav__logo" aria-label="<?= htmlspecialchars(FXTOPICS_BRAND) ?> — Home">
      <span class="nav__logo-mark" aria-hidden="true"></span>
      <span class="nav__logo-text">Fx<span style="color:var(--color-accent-dark)">Topics</span></span>
    </a>
    <ul class="nav__list">
      <?php foreach ($nav_items as $item): ?>
        <li class="nav__item">
          <a href="<?= htmlspecialchars($item['href']) ?>"
             class="nav__link<?= !empty($item['active']) ? ' is-active' : '' ?>">
            <?= htmlspecialchars($item['label']) ?>
            <?php if (!empty($item['dropdown'])): ?>
              <span class="nav__caret" aria-hidden="true"></span>
            <?php endif; ?>
          </a>
          <?php if (!empty($item['dropdown'])): ?>
            <div class="nav__dropdown">
              <?php foreach ($item['dropdown'] as $sub): ?>
                <a href="<?= htmlspecialchars($sub['href']) ?>"><?= htmlspecialchars($sub['label']) ?></a>
              <?php endforeach; ?>
            </div>
          <?php endif; ?>
        </li>
      <?php endforeach; ?>
    </ul>
  </div>
</nav>
