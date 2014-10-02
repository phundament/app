<?php
return [
    'vendorPath' => dirname(dirname(__DIR__)) . '/vendor',
    'components' => [
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
    ],
    'modules'    => [
        'user' => [
            'class'        => 'dektrium\user\Module',
            'defaultRoute' => 'profile',
            'admins'       => ['admin']
        ]
        #array:modules>begin#
        #array:modules>end#
    ]
];
