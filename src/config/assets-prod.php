<?php
/**
 * Configuration file for the "yii asset" console command.
 * Note that in the console environment, some path aliases like '@webroot' and '@web' may not exist.
 * Please define these missing path aliases.
 */
return [
    // Adjust command/callback for JavaScript files compressing:
    'jsCompressor' => 'java -jar /usr/lib/node_modules/google-closure-compiler/compiler.jar --js {from} --js_output_file {to}',
    // Adjust command/callback for CSS files compressing:
    'cssCompressor' => 'yui-compressor --type css {from} -o {to}',
    // The list of asset bundles to compress:
    'bundles' => [
        'app\assets\AppAsset',
        'app\modules\backend\assets\AdminAsset',
        \dmstr\web\AdminLteAsset::className(),
    ],
    // Asset bundle for compression output:
    'targets' => [
        'frontend' => [
            'class' => 'yii\web\AssetBundle',
            'basePath' => '@app/../web/assets-prod',
            'baseUrl' => '@web/assets-prod',
            'js' => 'js/frontend-{hash}.js',
            'css' => 'css/frontend-{hash}.css',
            'depends' => [
                // Include only 'frontend' assets:
                'app\assets\AppAsset',
            ],
        ],
        'backend' => [
            'class' => 'yii\web\AssetBundle',
            'basePath' => '@app/../web/assets-prod',
            'baseUrl' => '@web/assets-prod',
            'js' => 'js/backend-{hash}.js',
            'css' => 'css/backend-{hash}.css',
            'depends' => [
                // Include only 'backend' assets:
                'app\modules\backend\assets\AdminAsset',
                \dmstr\web\AdminLteAsset::className(),
            ],
        ],
        'all' => [
            'class' => 'yii\web\AssetBundle',
            'basePath' => '@app/../web/assets-prod',
            'baseUrl' => '@web/assets-prod',
            'js' => 'js/all-{hash}.js',
            'css' => 'css/all-{hash}.css',
        ],
    ],
    // Asset manager configuration:
    'assetManager' => [
        'basePath' => '/app/web/assets-prod',
        'baseUrl' => '/assets-prod',
    ],
];
