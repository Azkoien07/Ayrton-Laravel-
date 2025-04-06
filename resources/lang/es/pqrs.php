<?php
return [
    'title' => 'Envíe su PQRS',
    'subtitle' => 'Formulario para Peticiones, Quejas, Reclamos y Sugerencias',
    
    'form' => [
        'type_label' => 'Tipo de PQRS *',
        'types' => [
            'complaint' => 'Queja',
            'suggestion' => 'Sugerencia',
            'question' => 'Duda'
        ],
        'title_label' => 'Título *',
        'title_placeholder' => 'Ej: Problema con facturación del servicio',
        'description_label' => 'Descripción detallada *',
        'description_placeholder' => 'Describa su petición, queja, reclamo o sugerencia con el mayor detalle posible',
        'argument_label' => 'Argumento *',
        'argument_placeholder' => 'Argumentos o razones que respaldan su solicitud',
        'submit_button' => 'Enviar PQRS'
    ],
    
    'validation' => [
        'errors_title' => 'Por favor corrige los siguientes errores:',
        'min_length' => 'El campo :attribute debe tener al menos :min caracteres.',
        'max_length' => 'El campo :attribute no puede tener más de :max caracteres.',
        'required' => 'El campo :attribute es obligatorio.'
    ],
    
    'messages' => [
        'success' => '¡Su PQRS ha sido enviado con éxito!',
        'response_time' => 'Nos comprometemos a responder su solicitud en un plazo máximo de 5 días hábiles.',
        'urgent_contact' => 'Para consultas urgentes, por favor contacte a nuestro servicio al cliente.'
    ]
];