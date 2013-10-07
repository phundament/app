<?php

/*
 * Provider for custom fields
 */

class PhFieldProvider extends GtcCodeProvider
{
    public function generateColumn($model, $column)
    {
        switch ($column->name) {
            case 'created_at':
            case 'updated_at':
                return "#'{$column->name}'";
                break;
        }
    }

    public function generateActiveLabel($model, $column)
    {
        if ($column->autoIncrement) {
            return false;
        }
    }

    public function generateActiveField($model, $column)
    {
        if ($column->autoIncrement) {
            return false;
        }
        switch ($column->name) {
            // disabled fields
            case 'copied_from_id':
            case 'created_at':
            case 'updated_at':
            case 'access_owner':
            case 'original_name':
            case 'path':
            case 'hash':
            case 'mime_type':
            case 'size':
                return "echo \$form->textField(\$model,'{$column->name}',array('disabled'=>'disabled'))";
                break;
            // media select widget
            case 'default_p3media_id':
            case 'p3media_id':
                return "\$this->widget('P3MediaSelect', array('model'=>\$model,'attribute'=>'{$column->name}'))";
                break;
            case 'info_php_json':
            case 'info_image_magick_json':
                return "echo \$model->{$column->name}";
                break;

        }
        if (strstr($column->name, '_json')) {
            return "\$this->widget(
                'jsonEditorView.JuiJSONEditorInput',
                array(
                     'model'     => \$model,
                     'attribute' => '{$column->name}'
                )
            );";
        }
    }
}