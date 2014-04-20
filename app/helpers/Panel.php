<?php

namespace app\helpers;
use yii\base\Object;
use yii\base\Widget;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\helpers\VarDumper;

/**
 * User: Pascal Brewing
 * Date: 20.11.13
 * Time: 00:46
 * <?php \app\helpers\Panel::begin( [
 *      'panel' => [
 *          'htmlOptions' => [],
 *          'panelType'   => \app\helpers\Panel::PANEL_INFO,//primary success info warning danger
 *      ],
 *      'panelHeading' => [
 *          'title'         => $image->title,
 *          'htmlOptions'   => [],
 *          'hTag'          => true,
 *          'titleOptions'  => [],
 *          'titleTag'      => 'h3',
 *      ],
 *      'panelBody'     => true,
 *      'panelFooter'   => [
 *          'htmlOptions' => [],
 *          'content' => \yii\bootstrap\ButtonGroup::widget([
 *              'buttons' => [
 *                  'label' => \app\helpers\Glyph::icon(\app\helpers\Glyph::ICON_ADJUST)
 *              ]
 *          ])
 *      ]
 * ]) ?>
 * Class ActiveFormHelper
 * @package app\helpers
 */

class Panel extends Widget {


    /**
     * @const "panel"
     */
    const PANEL             = ' panel';
    /**
     * @const
     * <div class="panel panel-default">...</div>
     * <div class="panel panel-primary">...</div>
     * <div class="panel panel-success">...</div>
     * <div class="panel panel-info">...</div>
     * <div class="panel panel-warning">...</div>
     * <div class="panel panel-danger">...</div>
     */
    const PANEL_DEFAULT     = 'default';
    const PANEL_PRIMARY     = 'primary';
    const PANEL_SUCCESS     = 'success';
    const PANEL_INFO        = 'info';
    const PANEL_WARNING     = 'danger';


    const PANEL_HEADING     = 'panel-heading';
    const PANEL_TITLE_TAG   = 'h3';
    const PANEL_TITLE       = 'panel-title';
    const PANEL_BODY        = 'panel-body';
    const PANEL_FOOTER      = 'panel-footer';

    /**
     * @var array
     */

    public $panel           = [];
    public $panelHeading    = false;
    public $panelBody       = false;
    public $panelFooter     = false;

    private $_bodyOn        = false;
    /**
     * <div class="panel panel-default">
     *      <div class="panel-body">Basic panel example</div>
     * </div>
     */
    public function init(){
        $this->renderPanelContainerStart();
        $this->renderPanelHeader();
        $this->renderBodyBegin();
    }

    /**
     * @return string|void
     */
    public function run(){

        if($this->_bodyOn)
            echo Html::endTag('div');//panel-body

        if($this->panelFooter) //render a footer
            $this->renderPanelFooter();

        echo Html::endTag('div');//Panel
    }

    public function renderPanelContainerStart(){
        $panelType              = isset($this->panel['panelType'])?$this->panel['panelType']:self::PANEL_DEFAULT;
        $cssClass               = $this->bindClass($panelType);
        $htmlOptions            = $this->getHtmlOptions($this->panel);

        Html::addCssClass($htmlOptions,$cssClass);
        echo Html::beginTag('div',$htmlOptions);
    }

    /**
     *
     */
    public function renderBodyBegin(){
        if(!$this->panelBody)
            return;
        $this->_bodyOn  = true;
        $htmlOptions    = [];

        if(is_array($this->panelBody) && !empty($this->panelBody) )
            $htmlOptions = ArrayHelper::getValue($this->panelBody,'htmlOptions');

        Html::addCssClass($htmlOptions,' '.self::PANEL_BODY);
        echo Html::beginTag('div',$htmlOptions).PHP_EOL;
    }
    /**
     * 
     */
    public function renderPanelHeader(){
        if(!$this->panelHeading)
            return;
        $htmlOptions    = $this->getHtmlOptions($this->panelHeading);
        $title          = ArrayHelper::getValue($this->panelHeading,'title','');
        if ($content = ArrayHelper::getValue($this->panelHeading,'content',false)){
            $title = $content;
        }elseif(ArrayHelper::getValue($this->panelHeading,'hTag',false)){
            $titleOptions   = ArrayHelper::getValue($this->panelHeading,'titleOptions',false);
            $titleTag       = ArrayHelper::getValue($this->panelHeading,'titleTag',self::PANEL_TITLE_TAG);
            Html::addCssClass($titleOptions,' '.self::PANEL_TITLE);
            $title = Html::tag($titleTag,$title,$titleOptions).PHP_EOL;
        }
        Html::addCssClass($htmlOptions,' '.self::PANEL_HEADING);
        echo Html::tag('div',$title,$htmlOptions).PHP_EOL;
    }

    /**
     * echo the footer construct
     */
    public function renderPanelFooter(){
        $content        = ArrayHelper::getValue($this->panelFooter,'content','');
        $htmlOptions    = ArrayHelper::getValue($this->panelFooter,'htmlOptions',[]);
        Html::addCssClass($htmlOptions,' '.self::PANEL_FOOTER);
        echo Html::tag('div',$content,$htmlOptions);
    }

    /**
     * @param $type
     * @return string
     */
    private function bindClass($type){
        return ' '.self::PANEL.' '.self::PANEL.'-'.$type;
    }

    /**
     * @param array $array
     * @return mixed
     */
    private function getHtmlOptions($array = []){
        return ArrayHelper::getValue($array,'htmlOptions',[]);
    }
}