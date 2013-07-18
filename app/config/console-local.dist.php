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
            // enable eg. data migrations for your local machine
            'modulePaths' => array(
                #'app-demo-data'        => 'vendor.waalzer.app-demo-data.migrations',
                #'data'                 => 'application.migrations.data',
            ),
        ),
    ),
);