<?php

return [
    'adminEmail'   => 'admin@example.com',
    'themes'       => [
        'businesscasual' => [
            'pathMap' => [
                '@app/views' => '@app/themes/businesscasual'
            ],
            'baseUrl' => '@web/themes/businesscasual',
        ],
        'origami'        => [
            'pathMap' => [
                '@app/views/site' => '@vendor/onebase/yii2-origami-theme/templay',
                '@app/views'      => '@vendor/onebase/yii2-origami-theme',
            ],
            'baseUrl' => '@web/themes/origami',
        ],
    ],
    'objectConfig' => [
        // giiant provider configuration
        'schmunk42\giiant\crud\providers\EditorProvider'   => [
            'columnNames' => ['description']
        ],
        'schmunk42\giiant\crud\providers\SelectProvider'   => [
            'columnNames' => ['amount','rating']
        ],
        'schmunk42\giiant\crud\providers\DateTimeProvider' => [
            'columnNames' => ['last_update']
        ],
        'schmunk42\giiant\crud\providers\RangeProvider' => [
            'columnNames' => ['rental_duration']
        ]
    ]
];
