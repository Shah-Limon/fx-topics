<?php
/**
 * Navigation Menu Data
 */

declare(strict_types=1);

return [
    ['label' => 'Home',         'href' => 'index.php',         'active' => true],
    [
        'label'    => 'Markets',
        'href'     => '#',
        'dropdown' => [
            ['label' => 'Forex',         'href' => '#forex'],
            ['label' => 'Stocks',        'href' => '#stocks'],
            ['label' => 'Commodities',   'href' => '#commodities'],
            ['label' => 'Bonds & Rates', 'href' => '#bonds'],
            ['label' => 'Indices',       'href' => '#indices'],
        ],
    ],
    ['label' => 'Crypto', 'href' => '#crypto'],
    [
        'label'    => 'Trading',
        'href'     => '#',
        'dropdown' => [
            ['label' => 'Education',        'href' => '#education'],
            ['label' => 'Strategies',       'href' => '#education'],
            ['label' => 'Technical Analysis','href' => '#education'],
            ['label' => 'Risk Management',  'href' => '#education'],
        ],
    ],
    [
        'label'    => 'Brokers',
        'href'     => '#brokers',
        'dropdown' => [
            ['label' => 'Broker Reviews', 'href' => 'broker-review.php'],
            ['label' => 'Comparison',     'href' => '#comparison'],
            ['label' => 'Awards 2026',    'href' => '#awards'],
            ['label' => 'Promotions',     'href' => '#bonuses'],
        ],
    ],
    ['label' => 'FinTech',     'href' => '#fintech'],
    ['label' => 'Education',   'href' => '#education'],
    ['label' => 'Latest News', 'href' => '#latest'],
];
