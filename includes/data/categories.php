<?php
/**
 * Category Sections Data — Stocks, Crypto, Commodities, FinTech
 *
 * Each entry corresponds to one <section> on the homepage. Add or
 * remove entries to change the rendered category sections in order.
 */

declare(strict_types=1);

return [
    'stocks' => [
        'id'           => 'stocks',
        'title'        => 'Stocks &amp; Equities',
        'cta'          => 'All Equities',
        'theme'        => 'section--paper',
        'layout'       => 'split',     // 1.4fr + 1fr grid: featured card + side list
        'featured' => [
            'img'     => 'https://images.unsplash.com/photo-1444653614773-995cb1ef9efa?w=900&q=80',
            'alt'     => 'Stock trading screens',
            'eyebrow' => 'Equities · Analysis',
            'title'   => "Wall Street's $11 trillion rally faces its first real test as earnings season opens",
            'excerpt' => 'After three consecutive years of double-digit S&P 500 gains, valuation discipline is returning to focus as analysts trim estimates amid softening consumer demand and persistent wage pressures.',
            'author'  => 'Marcus Webb',
            'date'    => 'Sep 12',
        ],
        'side' => [
            ['img' => 'https://images.unsplash.com/photo-1551836022-d5d88e9218df?w=300&q=80', 'eyebrow' => 'Banking',   'title' => 'JPMorgan tops Q3 earnings estimates on trading revenue strength',         'time' => '2h ago'],
            ['img' => 'https://images.unsplash.com/photo-1556761175-5973dc0f32e7?w=300&q=80', 'eyebrow' => 'IPO · Markets', 'title' => 'Shein files confidentially for London listing amid US regulatory headwinds', 'time' => '5h ago'],
            ['img' => 'https://images.unsplash.com/photo-1559523275-98fbfa3a64d2?w=300&q=80', 'eyebrow' => 'Analysis',  'title' => 'The seven market sectors most exposed to a recession scenario',         'time' => '8h ago', 'last' => true],
        ],
    ],
    'crypto' => [
        'id'     => 'crypto',
        'title'  => 'Crypto &amp; Digital Assets',
        'cta'    => 'All Crypto News',
        'theme'  => '',
        'layout' => 'grid',           // 3 equal feature cards
        'cards' => [
            ['img' => 'https://images.unsplash.com/photo-1518546305927-5a555bb7020d?w=800&q=80', 'alt' => 'Bitcoin',     'eyebrow' => 'Bitcoin · Markets', 'title' => "Bitcoin's halving cycle points to $120K by Q4, says Standard Chartered",   'excerpt' => 'Research note argues ETF flows, the upcoming halving and weakening dollar liquidity create a setup reminiscent of the 2020 cycle, though with a more institutional flavor.', 'author' => 'Priya Anand',   'date' => 'Sep 13'],
            ['img' => 'https://images.unsplash.com/photo-1621761191319-c6fb62004040?w=800&q=80', 'alt' => 'Blockchain',  'eyebrow' => 'DeFi · Protocol',  'title' => 'Uniswap v4 launches with hook-based architecture, promising 99% gas reduction', 'excerpt' => 'The new version introduces customizable liquidity pools and a singleton contract design that dramatically reduces deployment costs for custom AMMs and market makers.',         'author' => 'Hiroshi Tanaka','date' => 'Sep 12'],
            ['img' => 'https://images.unsplash.com/photo-1629339942248-45d4b10c8c3f?w=800&q=80', 'alt' => 'Tokenization','eyebrow' => 'Tokenization · RWAs', 'title' => "BlackRock's BUIDL fund crosses $500M as institutional tokenization accelerates", 'excerpt' => 'The tokenized US Treasury fund continues to attract allocators seeking yield on-chain, with major asset managers reportedly preparing similar products.', 'author' => 'James Whitfield', 'date' => 'Sep 11'],
        ],
    ],
    'commodities' => [
        'id'     => 'commodities',
        'title'  => 'Commodities',
        'cta'    => 'All Commodities',
        'theme'  => 'section--paper',
        'layout' => 'compact-grid',  // 3 small cards
        'cards' => [
            ['img' => 'https://images.unsplash.com/photo-1610375461246-83df859d849d?w=600&q=80', 'alt' => 'Gold',          'eyebrow' => 'Precious Metals',   'title' => 'Silver squeeze: industrial demand pushes price to 12-year high',                 'date' => 'Sep 13'],
            ['img' => 'https://images.unsplash.com/photo-1473773508845-188df298d2d1?w=600&q=80', 'alt' => 'Copper',        'eyebrow' => 'Industrial Metals', 'title' => 'Copper deficit deepens as EV transition outpaces mine supply growth',            'date' => 'Sep 12'],
            ['img' => 'https://images.unsplash.com/photo-1518709268805-4e9042af2176?w=600&q=80', 'alt' => 'Natural gas',   'eyebrow' => 'Energy',            'title' => 'LNG markets tighten as European storage levels hit five-year low',               'date' => 'Sep 11'],
        ],
    ],
    'fintech' => [
        'id'           => 'fintech',
        'title'        => 'FinTech &amp; Innovation',
        'cta'          => 'All FinTech',
        'theme'        => '',
        'layout'       => 'split',
        'featured' => [
            'img'     => 'https://images.unsplash.com/photo-1551288049-bebda4e38f71?w=900&q=80',
            'alt'     => 'FinTech app',
            'eyebrow' => 'Banking · Digital',
            'title'   => 'Revolut secures UK banking license after three-year application process',
            'excerpt' => 'The $33 billion fintech’s approval removes regulatory overhang and opens the door to FSCS-protected deposits, lending products and a potential London IPO by 2027.',
            'author'  => 'Priya Anand',
            'date'    => 'Sep 13',
        ],
        'side' => [
            ['img' => 'https://images.unsplash.com/photo-1563013544-824ae1b704d3?w=300&q=80', 'eyebrow' => 'Payments',      'title' => "Visa's new stablecoin settlement network goes live with ten anchor banks",        'time' => '3h ago'],
            ['img' => 'https://images.unsplash.com/photo-1556761175-b413da4baf72?w=300&q=80', 'eyebrow' => 'AI · Trading',  'title' => 'Two Sigma and Citadel test large language models for earnings call analysis',     'time' => '6h ago'],
            ['img' => 'https://images.unsplash.com/photo-1551288049-bebda4e38f71?w=300&q=80', 'eyebrow' => 'Wealth Tech',   'title' => 'Robo-advisors now manage 14% of US retail investment assets, Schwab reports',     'time' => '10h ago', 'last' => true],
        ],
    ],
];
