<?php

namespace app\config;

use schmunk42\giiant\generators\crud\callbacks\base\Callback;
use schmunk42\giiant\generators\crud\callbacks\yii\Db;
use schmunk42\giiant\generators\crud\callbacks\yii\Html;

$aceEditorField = function ($attribute, $model, $generator) {
    return "\$form->field(\$model, '{$attribute}')->widget(\\trntv\\aceeditor\\AceEditor::className())";
};

\Yii::$container->set(
    'schmunk42\giiant\generators\crud\providers\CallbackProvider',
    [
        'columnFormats' => [
            // hide system fields, but not ID in table
            'created_at$|updated_at$' => Callback::false(),
            // hide all TEXT or TINYTEXT columns
            '.*' => Db::falseIfText(),
        ],
        'activeFields' => [
            // hide system fields in form
            'id$' => Db::falseIfAutoIncrement(),
            'id$|created_at$|updated_at$' => Callback::false(),
            'value' => $aceEditorField,
        ],
        'attributeFormats' => [
            // render HTML output
            '_html$' => Html::attribute(),
        ],
    ]
);

return [
    'controllerMap' => [
        'batch' => [
            'class' => 'schmunk42\giiant\commands\BatchController',
            'overwrite' => true,
            'modelNamespace' => 'app\\modules\\crud\\models',
            'modelQueryNamespace' => 'app\\modules\\crud\\models\\query',
            'crudTidyOutput' => true,
            'crudAccessFilter' => true,
            'crudControllerNamespace' => 'app\\modules\\crud\\controllers',
            'crudSearchModelNamespace' => 'app\\modules\\crud\\models\\search',
            'crudViewPath' => '@app/modules/crud/views',
            'crudPathPrefix' => '/crud/',
            'crudProviders' => [
                'schmunk42\\giiant\\generators\\crud\\providers\\OptsProvider',
            ],
            'tablePrefix' => 'app_',
            /*'tables' => [
                'app_profile',
            ]*/
        ],
    ],
];
