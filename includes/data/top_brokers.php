<?php
/**
 * Top 3 Forex Brokers Data — Detailed cards on homepage
 */

declare(strict_types=1);

return [
    [
        'rank'        => '01',
        'logo'        => 'XM',
        'name'        => 'XM Group',
        'rating'      => '4.8',
        'rating_max'  => '5.0',
        'stars'       => 5,
        'half_star'   => false,
        'regulation'  => 'CySEC, ASIC, FCA',
        'min_deposit' => '$5',
        'spreads'     => '0.6 pips',
        'platforms'   => 'MT4, MT5',
        'bonus_label' => 'Welcome Bonus',
        'bonus_text'  => '$30 trading bonus + 100% deposit match up to $500',
    ],
    [
        'rank'        => '02',
        'logo'        => 'IC',
        'name'        => 'IC Markets',
        'rating'      => '4.7',
        'rating_max'  => '5.0',
        'stars'       => 4,
        'half_star'   => true,
        'regulation'  => 'ASIC, CySEC, FSA',
        'min_deposit' => '$200',
        'spreads'     => '0.0 pips',
        'platforms'   => 'MT4, MT5, cTrader',
        'bonus_label' => 'Active Promotion',
        'bonus_text'  => '20% welcome bonus up to $3,000 on first deposit',
    ],
    [
        'rank'        => '03',
        'logo'        => 'PP',
        'name'        => 'Pepperstone',
        'rating'      => '4.7',
        'rating_max'  => '5.0',
        'stars'       => 4,
        'half_star'   => true,
        'regulation'  => 'FCA, ASIC, DFSA',
        'min_deposit' => '$200',
        'spreads'     => '0.0 pips',
        'platforms'   => 'MT4, MT5, cTrader',
        'bonus_label' => 'Cashback',
        'bonus_text'  => '$10 per lot rebate on Razor account for first 3 months',
    ],
];
