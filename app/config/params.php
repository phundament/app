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
];
