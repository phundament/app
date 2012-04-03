<?php

// uncomment the following to define a path alias
// Yii::setPathOfAlias('local','path/to/local-folder');
// This is the main Web application configuration. Any writable
// CWebApplication properties can be configured here.

$applicationDirectory = realpath(dirname(__FILE__). DIRECTORY_SEPARATOR . '..' .  DIRECTORY_SEPARATOR );

$p3Config = array(
	'basePath' => $applicationDirectory,
	'name' => 'My Phundament 3',
	'theme' => 'p3bootstrap',
	// preloading 'log' component
	'preload' => array(
		'log',
		'langHandler',
		'bootstrap',
		'lessCompiler'),
	// autoloading model and component classes
	'import' => array(
		'application.models.*',
		'application.components.*',
		'zii.widgets.*',
		'ext.phundament.gii-template-collection.components.*', // gtc
		
		'ext.crisu83.yii-rights.components.*', // TODO - Hack: needed, so rights can reside in extensions
		'ext.phundament.p3extensions.widgets.userflash.EUserFlash', // flash messages		
		'ext.phundament.gtc.components.*', // TODO: Hack, because of modules in extensions???
		'ext.phundament.p3widgets.components.*', // TODO: Hack, because of modules in extensions???
		'ext.phundament.p3pages.models.*', // TODO: Hack, because of modules in extensions???
		'ext.mishamx.yii-user.models.*', // TODO: Hack, because of modules in extensions???
		'ext.mishamx.yii-user.components.*', // TODO - Hack: gtc fix for UActiveRecord
		
	),
	'aliases' => array(
		// TODO: Hack, because of modules in extensions
		'p3widgets' => 'ext.phundament.p3widgets',
		'p3media' => 'ext.phundament.p3media',
		'p3pages' => 'ext.phundament.p3pages',
		'user' => 'ext.mishamx.yii-user',
		'rights' => 'ext.crisu83.yii-rights',
	),
	'modules' => array(
		// uncomment the following to enable the Gii tool
		'gii' => array(
			'class' => 'system.gii.GiiModule',
			'password' => 'p3',
			// If removed, Gii defaults to localhost only. Edit carefully to taste.
			'ipFilters' => array('127.0.0.1', '::1'),
			'generatorPaths' => array(
				#'ext.giix-core', // giix generators
				'ext.gtc', // giix generators
			),
		),
		'p3admin' => array(
			'params' => array('install' => false),
		),
		'p3widgets' => array(
			'params' => array(
				'widgets' => array(
					'ext.yii-bootstrap.widgets.BootHero' => 'Bootstrap Hero',
					'ext.yiiext.widgets.fancybox.EFancyboxWidget' => 'Fancy Box',
					'ext.yiiext.widgets.cycle.ECycleWidget' => 'Cycle',
					'ext.yiiext.widgets.swfobject.ESwfObjectWidget' => 'SWF Object',
					'ext.yiiext.widgets.lipsum.ELipsum' => 'Lorem Ipsum Text',
				// The following widgets work basically, but are hard to handle or can break the app when using incorrect params.
				#'zii.widgets.CMenu' => 'Menu Widget',
				#'ext.yiiext.widgets.carousel.ECarouselWidget' => 'Carousel',
				#'ext.yiiext.widgets.simplemodal.ESimpleModalWidget'=> 'Modal Widget',
				#'ext.yiiext.widgets.menu.EMenuWidget'				=> 'Extended Menu',
				#'ext.yiiext.widgets.iconizedMenu.EIconizedMenu'	=> 'Iconized Menu',
				),
			),
		),
		'p3media' => array(
			'params' => array(
				'presets' => array(
					// bootstrap
					'360x268' => array(
						'name' => 'Bootstrap 360x268',
						'commands' => array(
							'resize' => array(360, 268, 2), // Image::AUTO
						),
						'type' => 'png'
					),
					'280x180' => array(
						'name' => 'Bootstrap 160x120',
						'commands' => array(
							'resize' => array(280, 180, 2), // Image::AUTO
						),
						'type' => 'png'
					),
					'160x120' => array(
						'name' => 'Bootstrap 160x120',
						'commands' => array(
							'resize' => array(160, 120, 2), // Image::AUTO
						),
						'type' => 'png'
					),
					// blueprint
					'span-24' => array(
						'name' => '1/1 width (span-24), jpg',
						'commands' => array(
							'resize' => array(950, 950, 4), // Image::WIDTH
							'quality' => 85
						),
						'type' => 'jpg'
					),
					'span-18' => array(
						'name' => '2/3 width (span-18), jpg',
						'commands' => array(
							'resize' => array(710, 710, 4), // Image::WIDTH
							'quality' => 85
						),
						'type' => 'jpg'
					),
					'span-12' => array(
						'name' => '1/2 width (span-12), jpg',
						'commands' => array(
							'resize' => array(470, 470, 4), // Image::WIDTH
							'quality' => 85
						),
						'type' => 'jpg'
					),
					'span-8' => array(
						'name' => '1/3 width (span-8), jpg',
						'commands' => array(
							'resize' => array(310, 310, 4), // Image::WIDTH
							'quality' => 85
						),
						'master' => 4,
						'type' => 'jpg'
					),
					'span-6' => array(
						'name' => '1/4 width (span-6), jpg',
						'commands' => array(
							'resize' => array(230, 230, 4), // Image::WIDTH
							'quality' => 85
						),
						'type' => 'jpg'
					),
					'icon-64' => array(
						'name' => 'Icon 64x64',
						'commands' => array(
							'resize' => array(64, 64),
						),
						'type' => 'png'
					),
					'icon-32' => array(
						'name' => 'Icon 64x64',
						'commands' => array(
							'resize' => array(32, 32),
						),
						'type' => 'png'
					),
					'icon-16' => array(
						'name' => 'Icon 16x16',
						'commands' => array(
							'resize' => array(16, 16),
						),
						'type' => 'png'
					),
				)
			)
		),
		'rights' => array(
			#'cssFile' => '/css/rights/default.css'
		),
	),
	/* 'behaviors' => array(
	  'ext._less.components.LessCompilationBehavior'
	  ), */
	// application components
	'components' => array(
		'themeManager' => array(
			'basePath' => $applicationDirectory.DIRECTORY_SEPARATOR.'extensions'.DIRECTORY_SEPARATOR.'phundament'.DIRECTORY_SEPARATOR.'themes',
			// 'baseUrl' => DO NOT USE, themes are in extension. Publish assets with the assetManager instead.
		),
		'user' => array(
			// enable cookie-based authentication
			'allowAutoLogin' => true,
		),
		'returnUrl' => array(
			'class' => 'ext.phundament.p3extensions.components.P3ReturnUrl',
		),
		'langHandler' => array(
			'class' => 'ext.phundament.p3extensions.components.P3LangHandler',
			'languages' => array('en', 'de', 'ru', 'fr', 'ph_debug')
		),
		'urlManager' => array(
			'class' => 'ext.phundament.p3extensions.components.P3LangUrlManager',
			'showScriptName' => false,
			'appendParams' => false, // in general more error resistant
			'urlFormat' => 'get',
			'rules' => array(
				// convenience rules
				'admin' => 'p3admin',
				'<lang:[a-z]{2}>/pages/<view:\w+>' => 'site/page',
				'<lang:[a-z]{2}>/wiki/<page:\w+>' => 'wiki',
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
		'db' => array(
			// SQLite
			'connectionString' => 'sqlite:' . $applicationDirectory . '/data/testdrive.db',
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
		'widgetFactory' => array(
			'class' => 'CWidgetFactory',
			'enableSkin' => true,
		),
		'lessCompiler' => array(
			'class' => 'ext.crisu83.yii-less.components.LessCompiler',
			//'autoCompile' => true, // You may need to set xdebug.max_nesting_level = 1024
			'paths' => array(
				'protected/extensions/phundament/themes/p3bootstrap/less/p3.less' => 'protected/extensions/phundament/themes/p3bootstrap/css/p3.css',
			),
		),
		'bootstrap' => array(
			'class' => 'ext.crisu83.yii-bootstrap.components.Bootstrap', // assuming you extracted bootstrap under extensions
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
	),
	// application-level parameters that can be accessed
	// using Yii::app()->params['paramName']
	'params' => array(
		// this is used in contact page
		'adminEmail' => 'webmaster@example.com',
	),
);


// include external configs
require_once($applicationDirectory.'/extensions/phundament/p3extensions/components/P3Configuration.php');
$config = new P3Configuration(array(
		$applicationDirectory . '/config/main.php',
		$applicationDirectory . '/extensions/phundament/p3admin/config/main.php',
		$applicationDirectory . '/extensions/phundament/p3widgets/config/main.php',
		$applicationDirectory . '/extensions/phundament/p3media/config/main.php',
		$applicationDirectory . '/extensions/phundament/p3pages/config/main.php',
		$applicationDirectory . '/extensions/phundament/p3admin/modules-install/user/config/main.php',
		$applicationDirectory . '/extensions/phundament/p3admin/modules-install/rights/config/main.php',
		#dirname(__FILE__) . '/../extensions/p3admin/modules-install/webshell/config/main.php',
		#dirname(__FILE__) . '/../extensions/p3extensions/widgets/ckeditor/config/main.php', // ==> bootstrap-theme
		$applicationDirectory . '/extensions/phundament/themes/p3bootstrap/config/main.php',
		$p3Config,
		$applicationDirectory . '/config/local.php',
	));

return $config->toArray();
