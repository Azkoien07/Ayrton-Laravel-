<?php
return [
    'title' => 'Planes de Suscripción',
    'subtitle' => 'Elige el plan que mejor se adapte a tus necesidades y lleva tu productividad al siguiente nivel',
    'basic' => [
        'name' => 'Básico',
        'description' => 'Ideal para usuarios ocasionales',
        'price' => '$0',
        'features' => [
            'active_tasks' => '5 tareas activas',
            'basic_support' => 'Soporte básico',
            'basic_templates' => 'Plantillas básicas',
            'team_collaboration' => 'Colaboración en equipo',
            'advanced_integrations' => 'Integraciones avanzadas'
        ],
        'feature_status' => [
            'team_collaboration' => false,
            'advanced_integrations' => false
        ],
        'current_plan' => 'Plan Actual'
    ],
    'premium' => [
        'name' => 'Premium',
        'description' => 'Para usuarios que necesitan más',
        'price' => '$34.000',
        'features' => [
            'unlimited_tasks' => 'Tareas ilimitadas',
            'priority_support' => 'Soporte prioritario',
            'premium_templates' => 'Plantillas premium',
            'team_collaboration' => 'Colaboración en equipo (hasta 5 miembros)',
            'advanced_integrations' => 'Integraciones avanzadas'
        ],
        'feature_status' => [
            'advanced_integrations' => false
        ],
        'popular' => 'Popular'
    ],
    'platinum' => [
        'name' => 'Platino',
        'description' => 'Para equipos y profesionales',
        'price' => '$50.000',
        'features' => [
            'unlimited_tasks' => 'Tareas ilimitadas',
            '24_7_support' => 'Soporte 24/7',
            'all_templates' => 'Todas las plantillas',
            'unlimited_collaboration' => 'Colaboración ilimitada en equipo',
            'all_integrations' => 'Todas las integraciones'
        ],
        'feature_status' => []
    ],

    'comparison' => [
        'title' => 'Comparación detallada de planes',
        'features' => [
            'active_tasks' => 'Tareas activas',
            'support' => 'Soporte',
            'collaboration' => 'Colaboración',
            'templates' => 'Plantillas',
            'integrations' => 'Integraciones'
        ],
        'values' => [
            'basic' => 'Básico',
            'unlimited' => 'Ilimitadas',
            'priority' => 'Prioritario',
            'team_5' => 'Hasta 5 miembros',
            'all' => 'Todas',
            'limited' => 'Limitadas'
        ]
    ],

    'modal' => [
        'title' => 'Confirmar Suscripción',
        'confirming' => 'Estás a punto de suscribirte al plan :plan.',
        'billing_summary' => 'Resumen de Facturación',
        'selected_plan' => 'Plan seleccionado:',
        'monthly_price' => 'Precio mensual:',
        'total_to_pay' => 'Total a pagar:',
        'cancel' => 'Cancelar',
        'confirm_pay' => 'Confirmar y Pagar'
    ],

    'select_plan' => 'Seleccionar Plan',
    'feature' => 'Característica'
];
