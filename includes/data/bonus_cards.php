<?php
/**
 * Active Bonus Cards Data — Active Promotions section
 */

declare(strict_types=1);

return [
    [
        'sponsored'    => true,
        'amount_value' => '$500',
        'amount_label' => 'Welcome',
        'broker'       => 'JustMarkets · Limited Offer',
        'title'        => '100% deposit match up to $500 for new accounts',
        'terms'        => 'Min deposit $100. 30-day trading volume requirement before withdrawal. Available on MT4 Pro account only.',
        'expiry'       => '30 November 2026',
        'limit_type'   => 'date',
    ],
    [
        'sponsored'    => true,
        'amount_value' => '$30',
        'amount_label' => 'No-Deposit',
        'broker'       => 'RoboForex · Verified',
        'title'        => '$30 no-deposit bonus — trade forex risk-free',
        'terms'        => 'No deposit required. Profits withdrawable after 10 standard lots traded. Account verification mandatory.',
        'expiry'       => 'Limited to first 1,000 claims',
        'limit_type'   => 'count',
    ],
    [
        'sponsored'    => true,
        'amount_value' => '50%',
        'amount_label' => 'Cashback',
        'broker'       => 'Hantec Markets · Active',
        'title'        => '50% cashback on spread costs for first quarter',
        'terms'        => 'Available on Cent and Pro accounts. Cashback credited weekly. No minimum trading volume required.',
        'expiry'       => '31 December 2026',
        'limit_type'   => 'date',
    ],
    [
        'sponsored'    => true,
        'amount_value' => '$2K',
        'amount_label' => 'Trading',
        'broker'       => 'Valutrades · Premium',
        'title'        => 'Earn up to $2,000 in trading credit on initial deposit',
        'terms'        => 'Tiered structure: $250 credit per $1,000 deposited up to $2,000 total. 90-day holding period.',
        'expiry'       => '28 February 2027',
        'limit_type'   => 'date',
    ],
];
