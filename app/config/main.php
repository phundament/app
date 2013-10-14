<?php

/**
 * Phundament 3 Application Config File
 * All modules and components have to be declared before installing a new package via composer.
 * See also config.php, for composer installation and update "hooks"
 */

// configuration files precedence: main-local, main-{env}, main

// also includes environment config file, eg. 'development' or 'production', we merge the files (if available!) at the botton
$localConfigFile = dirname(__FILE__) . DIRECTORY_SEPARATOR . 'main-local.php';

// convenience variables
$applicationDirectory = realpath(dirname(__FILE__) . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR);
$baseUrl              = (dirname($_SERVER['SCRIPT_NAME']) == '/' || dirname($_SERVER['SCRIPT_NAME']) == '\\') ? '' :
    dirname($_SERVER['SCRIPT_NAME']);

$languages = array(
    'en' => 'English',
    'de' => 'Deutsch',
    'lv' => 'Latviešu',
    'ru' => 'Русский',
);

// main application configuration
return array(
    'basePath'   => $applicationDirectory,
    'name'       => 'Company Inc.',
    'theme'      => 'frontend', // theme is copied eg. from vendor/p3bootstrap
    'language'   => 'en', // default language, see also components.langHandler
    'preload'    => array(
        'log',
        'langHandler',
        'bootstrap',
    ),
    'aliases'    => array(
        // composer
        'root'                                 => $applicationDirectory . '/..',
        'webroot'                              => $applicationDirectory . '/../www',
        'vendor'                               => $applicationDirectory . '/../vendor',
        // componentns
        'bootstrap'                            => 'vendor.clevertech.yiibooster.src',
        // p3widgets
        'jsonEditorView'                       => 'vendor.phundament.p3extensions.widgets.jsonEditorView',
        'ckeditor'                             => 'vendor.phundament.p3extensions.widgets.ckeditor',
        // p3media
        'jquery-file-upload'                   => 'vendor.phundament.jquery-file-upload',
        'jquery-file-upload-widget'            => 'vendor.phundament.p3extensions.widgets.jquery-file-upload',
        // fixing 'hardcoded aliases' from extension (note: you have to use the full path)
        'application.modules.user.views.asset' => 'vendor.mishamx.yii-user.views.asset',
        'application.modules.user.components'  => 'vendor.mishamx.yii-user.components',
        'gii-template-collection'              => 'vendor.phundament.gii-template-collection',
    ),
    // autoloading model and component classes
    'import'     => array(
        'application.models.*',
        'application.components.*',
        'zii.widgets.*',
        // TODO: should be handled by composer autoloader
        'vendor.phundament.p3widgets.components.*', // P3WidgetContainer, P3Reference Widget
        'vendor.phundament.p3extensions.components.*', // shared classes
        'vendor.phundament.p3extensions.behaviors.*', // shared classes
        'vendor.phundament.p3extensions.widgets.*', // shared classes
        'vendor.phundament.p3extensions.helpers.*', // shared classes - P3StringHelper
        'vendor.phundament.p3extensions.validators.*', // shared classes - P3StringHelper
        'vendor.phundament.p3pages.models.*', // Meta description and keywords (P3Media)
        'vendor.phundament.p3media.models.*', // Meta description and keywords (P3Media)
        'vendor.phundament.p3extensions.widgets.ckeditor.*', // shared classes
        // imports for components from packages, which do not support composer autoloading
        'vendor.mishamx.yii-user.models.*', // User Model
        'vendor.crisu83.yii-rights.components.*', // RWebUser
        'vendor.yiiext.fancybox-widget.*', // Fancybox Widget
        'vendor.clevertech.yiibooster.src.widgets.*', //
        'vendor.sammaye.auditrail2.models.AuditTrail', //
        'vendor.bwoester.yii-static-events-component.*',
        'vendor.bwoester.yii-event-interceptor.*',
    ),
    'behaviors' => array(
        // attach EventBridgeBehavior to application, so we can attach to
        // application events on a per class base.
        'eventBridge' => array(
            'class'  => 'EventBridgeBehavior',
        ),
    ),
    'modules'    => array(
        // backend for ckeditor styles and templates
        'ckeditorConfigurator' => array(
            'class' => 'vendor.schmunk42.ckeditor-configurator.CkeditorConfiguratorModule',
        ),
        'p3admin'              => array(
            'class'  => 'vendor.phundament.p3admin.P3AdminModule',
            'params' => array('install' => false),
        ),
        'p3widgets'            => array(
            'class'  => 'vendor.phundament.p3widgets.P3WidgetsModule',
            'params' => array(
                'widgets' => array(
                    'CWidget'           => 'Basic HTML Widget',
                    'TbCarousel'        => 'Bootstrap Carousel',
                    'EFancyboxWidget'   => 'Fancy Box',
                    'P3ReferenceWidget' => 'Widget Copy'
                    // use eg. $> php composer.phar require yiiext/swf-object-widget to get the
                    // widget source; import widget class or set an alias.
                    #'ESwfObjectWidget' => 'SWF Object',
                ),
            ),
        ),
        'p3media'              => array(
            'class'  => 'vendor.phundament.p3media.P3MediaModule',
            'params' => array(
                'publicRuntimePath'    => 'www/runtime/p3media',
                'publicRuntimeUrl'     => '/runtime/p3media',
                'protectedRuntimePath' => 'runtime/p3media',
                'presets'              => array(
                    'large'            => array(
                        'name'     => 'Large JPG 1600px',
                        'commands' => array(
                            'resize'  => array(1600, 1600, 2), // Image::AUTO
                            'quality' => '85',
                        ),
                        'type'     => 'jpg',
                    ),
                    'medium'           => array(
                        'name'     => 'Medium PNG 800px',
                        'commands' => array(
                            'resize'  => array(800, 800, 2), // Image::AUTO
                            'quality' => '85',
                        ),
                        'type'     => 'png',
                    ),
                    'medium-crop'      => array(
                        'name'     => 'Medium PNG cropped 800x600px',
                        'commands' => array(
                            'resize'  => array(800, 600, 7), // crop
                            'quality' => '85',
                        ),
                        'type'     => 'png',
                    ),
                    'small'            => array(
                        'name'     => 'Small PNG 400px',
                        'commands' => array(
                            'resize'  => array(400, 400, 2), // Image::AUTO
                            'quality' => '85',
                        ),
                        'type'     => 'png',
                    ),
                    'icon-32'          => array(
                        'name'     => 'Icon PNG 32x32',
                        'commands' => array(
                            'resize' => array(32, 32),
                        ),
                        'type'     => 'png'
                    ),
                    'download'         => array(
                        'name'         => 'Download File',
                        'originalFile' => true,
                        'attachment'   => true,
                    ),
                    'original'         => array(
                        //'name'         => 'Original File', // uncomment name to enable preset in dropdowns
                        'originalFile' => true,
                    ),
                    'original-public'  => array(
                        //'name'         => 'Original File Public',
                        'originalFile' => true,
                        'savePublic'   => true,
                    ),
                    'p3media-ckbrowse' => array(
                        'commands' => array(
                            'resize' => array(150, 120), // use third parameter for master setting, see Image constants
                            #'quality' => 80, // for jpegs
                        ),
                        'type'     => 'png'
                    ),
                    'p3media-manager'  => array(
                        'commands' => array(
                            'resize' => array(300, 200), // use third parameter for master setting, see Image constants
                            #'quality' => 80, // for jpegs
                        ),
                        'type'     => 'png'
                    ),
                    'p3media-upload'   => array(
                        'commands' => array(
                            'resize' => array(60, 30), // use third parameter for master setting, see Image constants
                            #'quality' => 80, // for jpegs
                        ),
                        'type'     => 'png'
                    ),
                )
            ),
        ),
        'p3pages'              => array(
            'class'  => 'vendor.phundament.p3pages.P3PagesModule',
            'params' => array(
                'availableLayouts' => array(
                    '//layouts/main' => 'Main Layout',
                ),
                'availableViews'   => array(
                    '//p3pages/column1' => 'One Column',
                    '//p3pages/column2' => 'Two Columns',
                )
            ),
        ),
        'rights'               => array(
            'class'        => 'vendor.crisu83.yii-rights.RightsModule',
            'appLayout'    => '//layouts/main',
            'userIdColumn' => 'id',
            'userClass'    => 'User',
            'cssFile'      => '/themes/backend/css/yii-rights.css'
            #'install' => true, // Enables the installer.
            #'superuserName' => 'admin'
        ),
        'user'                 => array(
            'class'                => 'vendor.mishamx.yii-user.UserModule',
            'activeAfterRegister'  => false,
            'customMessageCatalog' => 'UserModule.user' // disable fallback catalog
        ),
        'translate'            => array(
            'class' => 'vendor.gusnips.yii-translate.TranslateModule',
        ),
    ),
    // application components
    'components' => array(
        'authManager'   => array(
            'class'        => 'RDbAuthManager',
            // Provides support authorization item sorting.
            'defaultRoles' => array('Authenticated', 'Guest'),
            // see correspoing business rules, note: superusers always get checkAcess == true
        ),
        'bootstrap'     => array(
            'class'          => 'vendor.clevertech.yiibooster.src.components.Bootstrap',
            'coreCss'        => true, // whether to register any CSS at all, defaults to true
            'bootstrapCss'   => false, // use csutom css from theme
            'responsiveCss'  => false, // use csutom css from theme
            'jqueryCss'      => true, // use csutom css from theme
            'fontAwesomeCss' => true,
            // whether to register the Bootstrap responsive CSS (bootstrap-responsive.min.css), default to false
            'plugins'        => array(),
        ),
        'cache'         => array(
            'class' => 'CDummyCache',
        ),
        'clientScript'  => array(
            'class'              => 'vendor.mikehaertl.packagecompressor.PackageCompressor',
            'coreScriptPosition' => 0, // HEAD
            'enableCompression'  => false, // enable to activate component
            'combineOnly'        => true, // set to false on production systems
            'rewriteCssUris'     => true,
            'blockedScripts'     => array(
                'jquery.fancybox-1.3.4.js',
                'jquery.fancybox-1.3.4.css',
            ),
            'packages'           => array(
                'fancybox' => array(
                    'basePath' => 'vendor.yiiext.fancybox-widget.assets',
                    'depends'  => array(
                        'jquery',
                    ),
                    'js'       => array(
                        'jquery.fancybox-1.3.4.js',
                    ),
                    'css'      => array(
                        'jquery.fancybox-1.3.4.css',
                    )
                ),
                'frontend' => array(
                    'basePath' => 'application.themes.frontend.assets',
                    'depends'  => array(
                        'jquery',
                        'jquery.ui',
                        'bbq',
                        'bootstrap.js',
                        'bootbox',
                        'notify',
                        'jquery-css',
                        'bootstrap-yii',
                        'font-awesome',
                        'cookie',
                        'jquery',
                        'fancybox',
                    ),
                    /*'js'      => array(
                        'js/app.js',
                    ),*/
                    'css'      => array(
                        'p3.css',
                    )
                ),
            )
        ),
        'db'            => array(
            'tablePrefix'      => '',
            // SQLite
            'connectionString' => 'sqlite:' . $applicationDirectory . '/data/default.db',
            #'initSQLs'=>array('PRAGMA foreign_keys = ON'),
            // MySQL
            #'connectionString' => 'mysql:host=localhost;dbname=p3',
            #'emulatePrepare' => true,
            #'username' => 'test',
            #'password' => 'test',
            #'charset' => 'utf8',
        ),
        'dbTest'        => array(
            // MySQL
            'class'            => 'CDbConnection',
            'tablePrefix'      => '',
            'connectionString' => 'sqlite:' . $applicationDirectory . '/data/test.db',
        ),
        'errorHandler'  => array(
            // use 'site/error' action to display errors
            'errorAction' => 'site/error',
        ),
        'events' => array(
            'class'  => 'EventRegistry',
            'attach' => array(
                // eg. set default access fields in models with event-bridge behavior
                'P3Widget' => array(
                    'onAfterConstruct' => array(
                        function( $event ) {
                            //$event->sender->access_delete = 'Editor';
                        },
                    ),
                ),
                'P3Page' => array(
                    'onAfterConstruct' => array(
                        function( $event ) {
                            
                        },
                    ),
                ),
                'P3Media' => array(
                    'onAfterConstruct' => array(
                        function( $event ) {

                        },
                    ),
                ),
            ),
        ),
        'image'         => array(
            'class'  => 'vendor.phundament.p3extensions.components.image.CImageComponent',
            // GD or ImageMagick
            'driver' => 'GD',
        ),
        'returnUrl'     => array(
            'class' => 'vendor.phundament.p3extensions.components.P3ReturnUrl', // TODO: can this be removed?
        ),
        'langHandler'   => array(
            'class'     => 'vendor.phundament.p3extensions.components.P3LangHandler',
            'languages' => array_keys($languages), // available languages, eg. 'lv', 'ru', 'fr'
        ),
        'log'           => array(
            'class'  => 'CLogRouter',
            'routes' => array(
                array(
                    'class'  => 'CFileLogRoute',
                    'levels' => 'error, warning',
                ),
            ),
        ),
        'messages'      => array(
            'class'                => 'CDbMessageSource',
            //'onMissingTranslation'  => configured in env-development.php,
        ),
        'translate'     => array(
            'class'                  => 'vendor.gusnips.yii-translate.components.MPTranslate',
            //any avaliable options here
            'autoSetLanguage'        => false,
            'useApplicationLanguage' => true,
            'acceptedLanguages'      => $languages,
        ),
        'themeManager'  => array(
            'class'    => 'vendor.schmunk42.multi-theme.EMultiThemeManager',
            'basePath' => $applicationDirectory . '/themes',
            'baseUrl'  => $baseUrl . '/themes',
            'rules'    => array(
                // frontend
                '^p3pages/default/page'      => 'frontend',
                '^user/default/index'        => 'frontend',
                '^user/login/(.*)'           => 'frontend',
                '^user/profile/(.*)'         => 'frontend',
                '^user/registration/(.*)'    => 'frontend',
                '^user/recovery/(.*)'        => 'frontend',
                '^user/activation/(.*)'      => 'frontend',
                // backend
                '^user/(.*)'                 => 'backend2',
                '^rights/(.*)'               => 'backend2',
                '^sakila/(.*)'               => 'backend2',
                '^p3(.*)'                    => 'backend2',
                '^ckeditorConfigurator/(.*)' => 'backend2',
                '^translate/(.*)'            => 'backend2',
            )
        ),
        'urlManager'    => array(
            'class'          => 'vendor.phundament.p3extensions.components.P3LangUrlManager',
            'showScriptName' => true, // enable mod_rewrite in .htaccess if this is set to false
            'appendParams'   => false, // in general more error resistant
            'urlFormat'      => 'get', // use 'path', otherwise rules below won't work
            'rules'          => array(
                // backend
                'phundament' => 'p3admin/default/index',
                // p3pages - SEO
                '<lang:[a-z]{2}(_[a-z]{2})?>/<pageName:[a-zA-Z0-9-._]*>-<pageId:\d+>.html'
                             => 'p3pages/default/page',
                // p3media - SEO
                '<lang:[a-z]{2}(_[a-z]{2})?>/img/<preset:[a-zA-Z0-9-._]+>/<title:.+>_<id:\d+><extension:.[a-zA-Z0-9]{1,}+>'
                                                               => 'p3media/file/image',
                // Yii
                '<lang:[a-z]{2}(_[a-z]{2})?>/pages/<view:\w+>' => 'site/page',
                '<controller:\w+>/<id:\d+>'                    => '<controller>/view',
                '<controller:\w+>/<action:\w+>/<id:\d+>'       => '<controller>/<action>',
                // general language and route handling
                '<lang:[a-z]{2}(_[a-z]{2})?>'                  => '',
                '<lang:[a-z]{2}(_[a-z]{2})?>/<_c>'             => '<_c>',
                '<lang:[a-z]{2}(_[a-z]{2})?>/<_c>/<_a>'        => '<_c>/<_a>',
                '<lang:[a-z]{2}(_[a-z]{2})?>/<_m>/<_c>/<_a>'   => '<_m>/<_c>/<_a>',
            ),
        ),
        'user'          => array(
            // enable cookie-based authentication
            'class'          => 'RWebUser',
            // crisu83/yii-rights: Allows super users access implicitly.
            'behaviors'      => array('vendor.schmunk42.web-user-behavior.WebUserBehavior'),
            // compatibility behavior for yii-user and yii-rights
            'allowAutoLogin' => true,
            'loginUrl'       => array('/user/login'),
        ),
        'widgetFactory' => array(
            'class'      => 'CWidgetFactory',
            'enableSkin' => true,
        ),
    ),
    // application-level parameters that can be accessed
    // using Yii::app()->params['paramName']
    'params'     => array(
        // this is used in contact page
        'adminEmail'           => 'webmaster@example.com',
        'languages'            => $languages,
        'ext.ckeditor.options' => array(
            'type'                            => 'fckeditor',
            'height'                          => 400,
            'filebrowserWindowWidth'          => '990',
            'filebrowserWindowHeight'         => '800',
            'resize_minWidth'                 => '150',
            /* Toolbar */
            'toolbar_Custom'                  => array(
                array(
                    'Templates',
                    '-',
                    'Maximize',
                    'Source',
                    'ShowBlocks',
                    '-',
                    'Undo',
                    'Redo',
                    '-',
                    'PasteText',
                    'PasteFromWord'
                ),
                array(
                    'JustifyLeft',
                    'JustifyCenter',
                    'JustifyRight',
                    'JustifyBlock',
                    'NumberedList',
                    'BulletedList',
                    '-',
                    'BidiLtr',
                    'BidiRtl'
                ),
                array('Table', 'Blockquote'),
                '/',
                array('Image', 'Flash', '-', 'Link', 'Unlink'),
                array('Bold', 'Italic', 'Underline', '-', 'UnorderedList', 'OrderedList', '-', 'RemoveFormat'),
                array('CreateDiv', 'Format', 'Styles')
            ),
            'toolbar'                         => "Custom",
            /* Settings */
            'startupOutlineBlocks'            => true,
            'pasteFromWordRemoveStyle'        => true,
            'pasteFromWordKeepsStructure'     => true,
            'templates_replaceContent'        => true,
            'ignoreEmptyParagraph'            => true,
            'autoParagraph'                   => true,
            'forcePasteAsPlainText'           => true,
            'enterMode'                       => 3,
            // use <div>s per default, since they usually have no height or margin
            'shiftEnterMode'                  => 2,
            'fillEmptyBlocks'                 => false,
            // do not insert &nbsp; into empty blocks
            'contentsCss'                     => $baseUrl . '/assets/e3ecaab1/ckeditor/ckeditor.css',
            // path is hashed by name
            'bodyId'                          => 'ckeditor',
            'bodyClass'                       => 'ckeditor',
            /* Assets will be published with publishAsset() */
            'templates_files'                 => array($baseUrl . '/index.php?r=ckeditorConfigurator/default/cktemplates'),
            'stylesCombo_stylesSet'           => 'my_styles:' . $baseUrl . '/index.php?r=ckeditorConfigurator/default/ckstyles',
            /* URLs will be parsed with createUrl() */
            'filebrowserBrowseCreateUrl'      => array('/p3media/ckeditor'),
            'filebrowserImageBrowseCreateUrl' => array('/p3media/ckeditor/image'),
            'filebrowserFlashBrowseCreateUrl' => array('/p3media/ckeditor/flash'),
            'filebrowserUploadCreateUrl'      => array('/p3media/import/ckeditorUpload'),
        ),
        'ext.ckeditor.dtd'     => array(
            '$removeEmpty' => array(
                'span' => 0,
                'i'    => 0
            ),
        ),
    ),
);
