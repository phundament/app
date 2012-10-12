<?php

/**
 * Phundament 3 Application Config File
 *
 * All modules and components have to be declared before installing a new package via composer.
 * See also config.php, for composer installation and update "hooks"
 */

$applicationDirectory = realpath(dirname(__FILE__) . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR);
$baseUrl = (dirname($_SERVER['SCRIPT_NAME']) != '/') ? dirname($_SERVER['SCRIPT_NAME']) : '';

$mainConfig = array(
    'basePath' => $applicationDirectory,
    'name' => 'My Phundament 3',
    'theme' => 'frontend', // theme is copied from extensions/phundament/p3bootstrap
    'language' => 'en', // default language, see also components.langHandler
    // preloading 'log' component
    'preload' => array(
        'log',
        'langHandler',
        'bootstrap',
    ),
    // autoloading model and component classes
    'import' => array(
        'application.models.*',
        'application.components.*',
        'zii.widgets.*',
        'application.vendor.phundament.gii-template-collection.components.*', // Relation Widget
        'application.vendor.phundament.p3widgets.components.*', // P3WidgetContainer
        'application.vendor.phundament.p3extensions.components.*', // shared classes
        'application.vendor.phundament.p3extensions.behaviors.*', // shared classes
        'application.vendor.phundament.p3extensions.widgets.*', // shared classes
        'application.vendor.mishamx.yii-user.models.*', // User Model
        'application.vendor.crisu83.yii-rights.components.*', // RWebUser
        'application.vendor.crisu83.yii-bootstrap.widgets.*', // Bootstrap UI
        'application.vendor.yiiext.fancybox-widget.*', // Fancybox Widget
        'application.vendor.vitalets.yii-bootstrap-editable.*', // p3media
    ),
    'aliases' => array(
        // composer
        'vendor' => 'application.vendor',
        // p3widgets
        'jsonEditorView' => 'application.vendor.phundament.p3extensions.widgets.jsonEditorView',
        'ckeditor' => 'application.vendor.phundament.p3extensions.widgets.ckeditor',
        // p3media
        'jquery-file-upload' => 'application.vendor.phundament.jquery-file-upload',
        'jquery-file-upload-widget' => 'application.vendor.phundament.p3extensions.widgets.jquery-file-upload',
    ),
    'modules' => array(
        // uncomment the following to enable the Gii tool
        'gii' => array(
            'class' => 'system.gii.GiiModule',
            'password' => 'p3',
            // If removed, Gii defaults to localhost only. Edit carefully to taste.
            'ipFilters' => array('127.0.0.1', '::1'),
            'generatorPaths' => array(
                #'vendor.giix-core', // giix generators
                'vendor.gtc', // giix generators
            ),
        ),
        'p3admin' => array(
            'class' => 'vendor.phundament.p3admin.P3AdminModule',
            'params' => array('install' => false),
        ),
        'p3widgets' => array(
            'class' => 'vendor.phundament.p3widgets.P3WidgetsModule',
            'params' => array(
                'widgets' => array(
                    'CWidget' => 'Basic HTML Widget',
                    'TbHeroUnit' => 'Bootstrap Hero',
                    'TbMenu' => 'Bootstrap Menu',
                    'TbCarousel' => 'Bootstrap Carousel',
                    'EFancyboxWidget' => 'Fancy Box',
                    'P3MarkdownWidget' => 'Markdown Widget'
                // use eg. $> php composer.phar require yiiext/swf-object-widget to get the
                // widget source; import widget class or set an alias.
                #'ESwfObjectWidget' => 'SWF Object',
                ),
            ),
        ),
        'p3media' => array(
            'class' => 'vendor.phundament.p3media.P3MediaModule',
            'params' => array(
                'publicRuntimePath' => 'www/runtime/p3media',
                'publicRuntimeUrl' => '/runtime/p3media',
                'protectedRuntimePath' => 'runtime/p3media',
                'presets' => array(
                    // bootstrap
                    'small' => array(
                        'name' => 'Small 300px',
                        'commands' => array(
                            'resize' => array(300, 300, 2), // Image::AUTO
                            'quality' => '85',
                        ),
                        'type' => 'jpg',
                    ),
                    'medium' => array(
                        'name' => 'Medium 500px',
                        'commands' => array(
                            'resize' => array(600, 600, 2), // Image::AUTO
                            'quality' => '85',
                        ),
                        'type' => 'jpg',
                    ),
                    'large' => array(
                        'name' => 'Large 1400px',
                        'commands' => array(
                            'resize' => array(1400, 1400, 2), // Image::AUTO
                            'quality' => '85',
                        ),
                        'type' => 'jpg',
                    ),
                    'icon-32' => array(
                        'name' => 'Icon 32x32',
                        'commands' => array(
                            'resize' => array(32, 32),
                        ),
                        'type' => 'png'
                    ),
                    'original' => array(
                        'name' => 'Original File',
                        'originalFile' => true,
                    ),
                    'original-public' => array(
                        'name' => 'Original File Public',
                        'originalFile' => true,
                        'savePublic' => true,
                    ),
                    'download' => array(
                        'name' => 'Download File',
                        'originalFile' => true,
                        'attachment' => true,
                    ),
                    'p3media-ckbrowse' => array(
                        'commands' => array(
                            'resize' => array(150, 120), // use third parameter for master setting, see Image constants
                        #'quality' => 80, // for jpegs
                        ),
                        'type' => 'png'
                    ),
                    'p3media-manager' => array(
                        'commands' => array(
                            'resize' => array(300, 200), // use third parameter for master setting, see Image constants
                            #'quality' => 80, // for jpegs
                        ),
                        'type' => 'png'
                    ),
                    'p3media-upload' => array(
                        'commands' => array(
                            'resize' => array(60, 30), // use third parameter for master setting, see Image constants
                        #'quality' => 80, // for jpegs
                        ),
                        'type' => 'png'
                    ),
                )
            ),
        ),
        'p3pages' => array(
            'class' => 'vendor.phundament.p3pages.P3PagesModule',
        ),
        'rights' => array(
            'class' => 'application.vendor.crisu83.yii-rights.RightsModule',
            'appLayout' => '//layouts/main',
            'userIdColumn' => 'id',
            'userClass' => 'User',
        #'install' => true, // Enables the installer.
        #'superuserName' => 'admin'
        #'cssFile' => '/css/rights/default.css'
        ),
        'user' => array(
            'class' => 'application.vendor.mishamx.yii-user.UserModule',
            'activeAfterRegister' => false,
        ),
    ),
    // application components
    'components' => array(
        'authManager' => array(
            'class' => 'RDbAuthManager', // Provides support authorization item sorting.
            'defaultRoles' => array('Authenticated', 'Guest'), // see correspoing business rules, note: superusers always get checkAcess == true
        ),
        'bootstrap' => array(
            'class' => 'vendor.crisu83.yii-bootstrap.components.Bootstrap', // assuming you extracted bootstrap under extensions
            'coreCss' => false, // whether to register the Bootstrap core CSS (bootstrap.min.css), defaults to true
            'responsiveCss' => false, // whether to register the Bootstrap responsive CSS (bootstrap-responsive.min.css), default to false
            'plugins' => array(
                // Optionally you can configure the "global" plugins (button, popover, tooltip and transition)
                // To prevent a plugin from being loaded set it to false as demonstrated below
                'transition' => false, // disable CSS transitions
                'tooltip' => array(
                    'selector' => 'a.tooltip', // bind the plugin tooltip to anchor tags with the 'tooltip' class
                    'options' => array(
                        'placement' => 'bottom', // place the tooltips below instead
                    ),
                ),
            // If you need help with configuring the plugins, please refer to Bootstrap's own documentation:
            // http://twitter.github.com/bootstrap/javascript.html
            ),
        ),
        'cache' => array(
            'class' => 'CDummyCache',
        ),
        'db' => array(
            'tablePrefix' => 'usr_',
            // SQLite
            'connectionString' => 'sqlite:' . $applicationDirectory . '/data/default.db',
        // MySQL
        #'connectionString' => 'mysql:host=localhost;dbname=p3',
        #'emulatePrepare' => true,
        #'username' => 'test',
        #'password' => 'test',
        #'charset' => 'utf8',
        ),
        'errorHandler' => array(
            // use 'site/error' action to display errors
            'errorAction' => 'site/error',
        ),
        'image' => array(
            'class' => 'vendor.phundament.p3extensions.components.image.CImageComponent',
            // GD or ImageMagick
            'driver' => 'GD',
        ),
        'returnUrl' => array(
            'class' => 'vendor.phundament.p3extensions.components.P3ReturnUrl',
        ),
        'langHandler' => array(
            'class' => 'vendor.phundament.p3extensions.components.P3LangHandler',
            'languages' => array('en', 'de', 'ru', 'fr', 'ph_debug')
        ),
        'log' => array(
            'class' => 'CLogRouter',
            'routes' => array(
                array(
                    'class' => 'CFileLogRoute',
                    'levels' => 'error, warning',
                ),
            // uncomment the following to show log messages on web pages
            /*
              array(
              'class'=>'CWebLogRoute',
              ),
             */
            ),
        ),
        'themeManager' => array(
            'class' => 'CThemeManager',
            'basePath' => $applicationDirectory . '/themes',
            'baseUrl' => $baseUrl.'/themes',
        ),
        'urlManager' => array(
            'class' => 'vendor.phundament.p3extensions.components.P3LangUrlManager',
            'showScriptName' => true,
            'appendParams' => false, // in general more error resistant
            'urlFormat' => 'get', // use 'path', otherwise rules below won't work
            'rules' => array(
                // disabling standard login page
                '<lang:[a-z]{2}>/site/login' => 'user/login',
                'site/login' => 'user/login',
                // convenience rules
                'admin' => 'p3admin',
                '<lang:[a-z]{2}>/pages/<view:\w+>' => 'site/page',
                '<lang:[a-z]{2}>/wiki/<page:\w+>' => 'wiki',
                // p3pages - SEO
                '<lang:[a-z]{2}>/<pageName:[a-zA-Z0-9-._]*>-<pageId:\d+>.html' => 'p3pages/default/page',
                // p3media
                '<lang:[a-z]{2}>/img/<preset:[a-zA-Z0-9-._]+>/<title:.+>_<id:\d+><extension:.[a-zA-Z0-9]{1,}+>' => 'p3media/file/image', // p3media images, TESTING: disable in case of problems
                // Yii
                '<controller:\w+>/<id:\d+>' => '<controller>/view',
                '<controller:\w+>/<action:\w+>/<id:\d+>' => '<controller>/<action>',
                // general language and route handling
                '<lang:[a-z]{2}>' => '',
                '<lang:[a-z]{2}>/<_c>' => '<_c>',
                '<lang:[a-z]{2}>/<_c>/<_a>' => '<_c>/<_a>',
                '<lang:[a-z]{2}>/<_m>/<_c>/<_a>' => '<_m>/<_c>/<_a>',
            ),
        ),
        'user' => array(
            // enable cookie-based authentication
            'class' => 'RWebUser', // mishamx/yii-rights: Allows super users access implicitly.
            'allowAutoLogin' => true,
            'loginUrl' => array('/user/login'),
        ),
        'widgetFactory' => array(
            'class' => 'CWidgetFactory',
            'enableSkin' => true,
        ),
    ),
    // application-level parameters that can be accessed
    // using Yii::app()->params['paramName']
    'params' => array(
        // this is used in contact page
        'adminEmail' => 'webmaster@example.com',
        // global Phundament 3 parameters
        'p3.backendTheme' => 'backend', // defaults to 'backend'
        'p3.fallbackLanguage' => 'en', // defaults to 'en'
        'ext.ckeditor.options' => array(
            'type' => 'fckeditor',
            'height' => 400,
            'filebrowserWindowWidth' => '990',
            'filebrowserWindowHeight' => '800',
            'resize_minWidth' => '150',
            /* Toolbar */
            'toolbar_Custom' => array(
                array('Templates', '-', 'Maximize', 'Source', 'ShowBlocks', '-', 'Undo', 'Redo', '-', 'PasteText', 'PasteFromWord'),
                array('JustifyLeft', 'JustifyCenter', 'JustifyRight', 'JustifyBlock', 'NumberedList', 'BulletedList', '-', 'BidiLtr', 'BidiRtl'),
                array('Table', 'Blockquote'),
                '/',
                array('Image', 'Flash', '-', 'Link', 'Unlink'),
                array('Bold', 'Italic', 'Underline', '-', 'UnorderedList', 'OrderedList', '-', 'RemoveFormat'),
                array('CreateDiv', 'Format', 'Styles')),
            'toolbar' => "Custom",
            /* Settings */
            'startupOutlineBlocks' => true,
            'pasteFromWordRemoveStyle' => true,
            'pasteFromWordKeepsStructure' => true,
            'templates_replaceContent' => true,
            #'ignoreEmptyParagraph' => false,
            #'forcePasteAsPlainText' => true,
            'contentsCss' => $baseUrl . '/themes/frontend/ckeditor/ckeditor.css',
            'bodyId' => 'ckeditor',
            'bodyClass' => 'ckeditor',
            /* Assets will be published with publishAsset() */

            'templates_files' => array($baseUrl . '/themes/frontend/ckeditor/cktemplates.js'),
            'stylesCombo_stylesSet' => 'my_styles:' . $baseUrl . '/themes/frontend/ckeditor/ckstyles.js',
            /* Standard-way to specify URLs - deprecated */
            /* 'filebrowserBrowseUrl' => '/p3media/ckeditor',
              'filebrowserImageBrowseUrl' => '/p3media/ckeditor/image',
              'filebrowserFlashBrowseUrl' => '/p3media/ckeditor/flash', */
            // 'filebrowserUploadUrl' => 'null', // can not use, pre-resizing of images

            /* URLs will be parsed with createUrl() */
            'filebrowserBrowseCreateUrl' => array('/p3media/ckeditor'),
            'filebrowserImageBrowseCreateUrl' => array('/p3media/ckeditor/image'),
            'filebrowserFlashBrowseCreateUrl' => array('/p3media/ckeditor/flash'),
            'filebrowserUploadCreateUrl' => array('/p3media/import/upload'), // TODO (tbd)
        ),
    ),
);



$localConfigFile = dirname(__FILE__) . DIRECTORY_SEPARATOR . 'local.php';
if (is_file($localConfigFile)) {
    return CMap::mergeArray($mainConfig, require($localConfigFile));
} else {
    return $mainConfig;
}