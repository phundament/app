<?php

/**
 * Phundament 3 Console Config File
 * Containes predefined yiic console commands for Phundament.
 * Define composer hooks by the following name schema: <vendor>/<packageName>-<action>
 */

// for testing purposes
return array(
    'commandMap' => array(
        'migrate' => array(
            // define all available modules (if you do not set this, modules will be set from yii app config)
            'modulePaths' => array(
                'data' => 'application.migrations.data',
                #'app-demo-data'  => 'vendor.waalzer.app-demo-data.migrations' // data for eg. demo.phundament.com
            ),
        ),
    ),
);