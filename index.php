<?php
/**
 * FxTopics — Homepage Entry Point
 *
 * Single page that assembles all homepage sections from /components.
 * To reorder sections, edit the include statements below.
 * To add/remove sections, drop new components in /components and add
 * the require_once line here. To change data, edit /includes/data/*.php.
 *
 * @var string $page_title       Page <title>
 * @var string $page_description Meta description
 * @var string $page_canonical   Canonical URL
 */

declare(strict_types=1);

// 1. Configuration (brand constants, page metadata, env overrides)
require_once __DIR__ . '/includes/config.php';

// 2. <head> output (fonts, Tailwind, both CSS files, schema JSON-LD)
require_once __DIR__ . '/includes/head.php';
?>

<body>

<?php
// 3. Top utility bar (email + social)
require_once __DIR__ . '/components/utility-bar.php';

// 4. Site-header (logo + search + mobile menu)
require_once __DIR__ . '/components/header.php';

// 5. Primary sticky nav (data-driven from includes/data/navigation.php)
require_once __DIR__ . '/components/nav.php';

// 6. Lead advertisement (top banner)
?>
<div class="container">
  <div class="ad-slot ad-leaderboard" role="complementary" aria-label="Advertisement">
    <span class="ad-slot__label">Advertisement</span>
    <span class="ad-slot__content">970 × 90 · Leaderboard</span>
  </div>
</div>

<?php
// 7. Hero news section (lead article + 3 side stories)
require_once __DIR__ . '/components/hero.php';

// 8. Promo + Featured Brokers widget (2-card side-by-side)
require_once __DIR__ . '/components/promo-widget.php';

// 9. Active Promotions — 4 sponsored bonus cards
require_once __DIR__ . '/components/active-promotions.php';

// 10. Top 3 Forex Brokers — detailed cards
require_once __DIR__ . '/components/top-brokers.php';

// 11. Top Stories — featured news grid
require_once __DIR__ . '/components/top-stories.php';

// 12. Advertise With Us banner
require_once __DIR__ . '/components/campaign-banner.php';

// 13. Latest News + Sidebar
require_once __DIR__ . '/components/latest-news.php';

// 14. Mid-content ad (between Latest News and category sections)
?>
<div class="container">
  <div class="ad-slot ad-leaderboard-large" role="complementary" aria-label="Advertisement">
    <span class="ad-slot__label">Advertisement</span>
    <span class="ad-slot__content">970 × 250 · Large Leaderboard</span>
  </div>
</div>

<?php
// 15. Category sections — pulled from data/categories.php
//     One file drives Stocks / Crypto / Commodities / FinTech.
//     Reorder or add new ones via /includes/data/categories.php.
$categories = require __DIR__ . '/includes/data/categories.php';
foreach ($categories as $section):
  require __DIR__ . '/components/category-section.php';
endforeach;

// 16. Broker Awards — Finance Awards 2026 grid
require_once __DIR__ . '/components/awards.php';

// 17. Full-width newsletter signup
require_once __DIR__ . '/components/nl.php';

// 18. Footer (5-column links + bottom row + compliance disclaimer)
require_once __DIR__ . '/components/footer.php';

// 19. Closing scripts (Lucide + main.js)
require_once __DIR__ . '/includes/foot.php';
?>
