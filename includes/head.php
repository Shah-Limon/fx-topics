<?php
/**
 * Shared <head> output for the homepage.
 *
 * Variables expected from caller:
 *   $page_title       (string)
 *   $page_description (string)
 *   $page_canonical   (string)
 *   $page_og_image    (string, optional)
 */

declare(strict_types=1);

if (!defined('FXTOPICS_LOADED')) {
    require_once __DIR__ . '/config.php';
}

$og_image = $page_og_image ?? 'https://images.unsplash.com/photo-1611974789855-9c2a0a7236a3?w=1200&q=80';
$css_v    = $css_version  ?? 10;
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title><?= htmlspecialchars($page_title) ?></title>
<meta name="description" content="<?= htmlspecialchars($page_description) ?>">
<link rel="canonical" href="<?= htmlspecialchars($page_canonical) ?>">

<!-- Open Graph -->
<meta property="og:type"        content="website">
<meta property="og:site_name"   content="<?= htmlspecialchars(FXTOPICS_BRAND) ?>">
<meta property="og:title"       content="<?= htmlspecialchars($page_title) ?>">
<meta property="og:description" content="Breaking financial news, market analysis and broker reviews for the modern trader.">
<meta property="og:url"         content="<?= htmlspecialchars($page_canonical) ?>">
<meta property="og:image"       content="<?= htmlspecialchars($og_image) ?>">

<!-- Twitter Card -->
<meta name="twitter:card"        content="summary_large_image">
<meta name="twitter:title"       content="<?= htmlspecialchars(str_replace(' — ', ' &amp; ', $page_title)) ?>">
<meta name="twitter:description" content="Breaking financial news, market analysis and broker reviews for the modern trader.">

<!-- Fonts -->
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Spectral:ital,wght@0,400;0,500;0,600;0,700;1,400;1,500&family=Inter:wght@400;500;600;700&family=JetBrains+Mono:wght@400;500;600&display=swap" rel="stylesheet">

<!-- Tailwind CDN -->
<script src="https://cdn.tailwindcss.com"></script>
<script>
  tailwind.config = {
    theme: {
      extend: {
        colors: {
          ink: '#0A1628', navy: '#0F1E3A', accent: '#C9A961',
          blue: { DEFAULT: '#1E3A8A', mid: '#2563EB', light: '#3B82F6' }
        },
        fontFamily: {
          serif: ['Spectral', 'Georgia', 'serif'],
          sans:  ['Inter', 'system-ui', 'sans-serif'],
          mono:  ['JetBrains Mono', 'monospace']
        }
      }
    }
  }
</script>

<!-- Custom CSS -->
<link rel="stylesheet" href="css/styles.css?v=<?= (int)$css_v ?>">
<link rel="stylesheet" href="css/widget.css?v=<?= (int)$css_v ?>">

<!-- Favicon -->
<link rel="icon" href="data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 100 100'%3E%3Crect width='100' height='100' fill='%230A1628'/%3E%3Crect x='25' y='25' width='50' height='50' fill='none' stroke='%23C9A961' stroke-width='6'/%3E%3C/svg%3E">

<!-- Schema.org WebSite -->
<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "WebSite",
  "name": "<?= htmlspecialchars(FXTOPICS_BRAND) ?>",
  "url": "<?= htmlspecialchars(FXTOPICS_BASE_URL) ?>/",
  "potentialAction": {
    "@type": "SearchAction",
    "target": "<?= htmlspecialchars(FXTOPICS_BASE_URL) ?>/search.html?q={search_term_string}",
    "query-input": "required name=search_term_string"
  }
}
</script>
</head>
