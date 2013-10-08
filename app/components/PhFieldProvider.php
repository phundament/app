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
                return "echo CVarDumper::dumpAsString(CJSON::decode(\$model->{$column->name}), 5, true)";
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

    public function generateAttribute($modelClass, $column, $view = false)
    {
        #var_dump($modelClass, $column);exit;
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
                return "array(
                        'name' => '{$column->name}',
                        'type' => 'raw',
                        'value' => \$model->{$column->name}
                    ),\n";
                break;
            // media select widget
            case 'default_p3media_id':
            case 'p3media_id':
                #return "\$this->widget('P3MediaSelect', array('model'=>\$model,'attribute'=>'{$column->name}'))";
                break;
            case 'info_php_json':
            case 'info_image_magick_json':
                return "array(
                        'name' => 'Image',
                        'type' => 'raw',
                        'value' => CVarDumper::dumpAsString(CJSON::decode(\$model->{$column->name}), 5, true)
                    ),\n";

                break;

        }

        if ($column->isForeignKey) {
            return null;
        } elseif ($modelClass == 'vendor.phundament.p3Media.models.P3Media' && $column->name == 'id') {
            $code = "array(
                        'name' => 'Image',
                        'type' => 'raw',
                        'value' => \$model->image('p3media-manager')
                    ),\n";
        } elseif (strtoupper($column->dbType) == 'TEXT') {
            $code = "array(
                        'name' => '{$column->name}',
                        'type' => 'raw',
                        'value' => \$model->{$column->name}
                    ),\n";
        } else {
            $code = null;
        }
        return $code;
    }

    public function generateHtml($modelClass, $column, $view = false)
    {

        switch ($view) {
            case 'prepend':
                switch ($column->name) {
                    case 'tree_parent_id':
                        return "echo '<h3>Tree</h3>'";
                        break;
                    case 'default_page_title':
                        return "echo '<h3>A) Title, Layout & View</h3>'";
                        break;
                    case 'url_json':
                        return "echo '<h3>B) Weiterleitung</h3>'";
                        break;
                    case 'access_owner':
                        return "echo '<h3>Access</h3>'";
                        break;
                    case 'default_url_param':
                        return "echo '<h3>SEO</h3>'";
                        #return "echo '{$modelClass}{$column->name}{$view}'";
                        break;
                    case 'original_name':
                        return "echo '<h3>File</h3>'";
                        #return "echo '{$modelClass}{$column->name}{$view}'";
                        break;
                    case 'container_id':
                        return "echo '<h3>Position</h3>'";
                        #return "echo '{$modelClass}{$column->name}{$view}'";
                        break;
                }
                break;
        }
    }

}