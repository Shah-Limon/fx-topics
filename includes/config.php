<?php
/**
 * FxTopics — Site Configuration
 *
 * Single source of truth for site-wide constants. Override per environment
 * via environment variables or a local includes/config.local.php file.
 */

declare(strict_types=1);

if (!defined('FXTOPICS_LOADED')) {
    define('FXTOPICS_LOADED', true);
}

// Allow environment overrides for production deployments
if (getenv('FXTOPICS_BASE_URL') !== false) {
    define('FXTOPICS_BASE_URL', rtrim(getenv('FXTOPICS_BASE_URL'), '/'));
} else {
    define('FXTOPICS_BASE_URL', 'https://fxtopics.example.com');
}

// Brand
define('FXTOPICS_BRAND', 'FxTopics');
define('FXTOPICS_BRAND_LOWER', 'fxtopics');
define('FXTOPICS_TAGLINE', 'Financial Intelligence');
define('FXTOPICS_EMAIL', 'contact@fxtopics.com');

// Page metadata (used by head.php)
$page_title       = 'FxTopics — Global Financial News, Forex & Broker Intelligence';
$page_description = 'FxTopics delivers breaking financial news, in-depth market analysis, broker reviews and trading education across forex, stocks, crypto and commodities.';
$page_canonical   = FXTOPICS_BASE_URL . '/';
$page_og_image    = 'https://images.unsplash.com/photo-1611974789855-9c2a0a7236a3?w=1200&q=80';

// Cache-bust the stylesheet so updates are picked up immediately
$css_version = 10;
