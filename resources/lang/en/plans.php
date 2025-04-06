<?php
return [
    'title' => 'Subscription Plans',
    'subtitle' => 'Choose the plan that best fits your needs and take your productivity to the next level',
        'basic' => [
            'name' => 'Basic',
            'description' => 'Ideal for casual users',
            'price' => '$0',
            'features' => [
                'active_tasks' => '5 active tasks',
                'basic_support' => 'Basic support',
                'basic_templates' => 'Basic templates',
                'team_collaboration' => 'Team collaboration',
                'advanced_integrations' => 'Advanced integrations'
            ],
            'feature_status' => [
                'team_collaboration' => false,
                'advanced_integrations' => false
            ],
            'current_plan' => 'Current Plan'
        ],
        'premium' => [
            'name' => 'Premium',
            'description' => 'For users who need more',
            'price' => '$34.000',
            'features' => [
                'unlimited_tasks' => 'Unlimited tasks',
                'priority_support' => 'Priority support',
                'premium_templates' => 'Premium templates',
                'team_collaboration' => 'Team collaboration (up to 5 members)',
                'advanced_integrations' => 'Advanced integrations'
            ],
            'feature_status' => [
                'advanced_integrations' => false
            ],
            'popular' => 'Popular'
        ],
        'platinum' => [
            'name' => 'Platinum',
            'description' => 'For teams and professionals',
            'price' => '$50.000',
            'features' => [
                'unlimited_tasks' => 'Unlimited tasks',
                '24_7_support' => '24/7 support',
                'all_templates' => 'All templates',
                'unlimited_collaboration' => 'Unlimited team collaboration',
                'all_integrations' => 'All integrations'
            ],
            'feature_status' => []
        ],
    'comparison' => [
        'title' => 'Detailed Plan Comparison',
        'features' => [
            'active_tasks' => 'Active tasks',
            'support' => 'Support',
            'collaboration' => 'Collaboration',
            'templates' => 'Templates',
            'integrations' => 'Integrations'
        ],
        'values' => [
            'basic' => 'Basic',
            'unlimited' => 'Unlimited',
            'priority' => 'Priority',
            'team_5' => 'Up to 5 members',
            'all' => 'All',
            'limited' => 'Limited'
        ]
    ],

    'modal' => [
        'title' => 'Confirm Subscription',
        'confirming' => 'You are about to subscribe to the :plan plan.',
        'billing_summary' => 'Billing Summary',
        'selected_plan' => 'Selected plan:',
        'monthly_price' => 'Monthly price:',
        'total_to_pay' => 'Total to pay:',
        'cancel' => 'Cancel',
        'confirm_pay' => 'Confirm and Pay'
    ],

    'select_plan' => 'Select Plan',
    'feature' => 'Feature'
];