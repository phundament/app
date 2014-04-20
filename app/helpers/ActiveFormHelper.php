<?php

namespace app\helpers;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;

/**
 * User: Pascal Brewing
 * Date: 20.11.13
 * Time: 00:46
 *
 * Class ActiveFormHelper
 * @package app\helpers
 */

class ActiveFormHelper {

    /**
     * @url http://getbootstrap.com/css/#forms-horizontal
     */
    const FORM_HORIZONTAL_CONTROL_GROUP = "{label}\n<div class=\"col-lg-10\">{input}{error}</div>\n";

    /**
     * @param $label
     * @param array $htmlOptions
     * @return string
     */
    public static function horizontalFormButton($label,$htmlOptions = []){
        $groupOptions = ArrayHelper::getValue($htmlOptions,'groupOptions',false);
        if($groupOptions)
            ArrayHelper::remove($htmlOptions,'groupOptions');

        $button = Html::button($label,array('class' =>  'btn btn-primary','type' => 'submit'));
        $content = Html::tag('div',$button,$groupOptions?$groupOptions:['class' => 'col-sm-offset-2 cols-sm-10']);
        return Html::tag('div',$content,$groupOptions?$groupOptions:['class' => 'form-group']);
    }

    /**
     *
     * <?php $form = ActiveForm::begin([
     *     'options' => ['class' => 'form-horizontal'],
     *     'fieldConfig' => [
     *         'template' => \app\helpers\ActiveFormHelper::formHorizontalGroupTemplate('col-lg-10'),
     *         'labelOptions' => ['class' => 'col-lg-2 control-label'],
     *     ]
     * ]); ?>
     *
     * @param string $groupClass
     * @return string
     */
    public static function formHorizontalGroupTemplate($groupClass = 'col-lg-10'){
        return "{label}\n<div class=\"{$groupClass}\">{input}{error}</div>\n";
    }
}