<?php
use Codeception\Util\Stub;

class P3PagesTest extends \Codeception\TestCase\Test
{
   /**
    * @var \CodeGuy
    */
    protected $codeGuy;

    protected function _before()
    {
    }

    protected function _after()
    {
    }

    // tests
    public function testSaveNewPage()
    {
        Yii::import('p3pages.*');

        $model = new P3Page();
        $model->route = '{"route":"site/index"}';
        $model->save();

        $this->codeGuy->seeInDatabase('p3_page',array('id' => '1'));
        $this->codeGuy->seeInDatabase('p3_page_meta',array('id' => '1'));
    }

    public function testDeletePage()
    {
        Yii::import('p3pages.*');

        $model = P3Page::model()->findByPk(1);
        $model->delete();

        $this->codeGuy->dontSeeInDatabase($model->tableSchema->name,array('id' => '1'));
        $this->codeGuy->dontSeeInDatabase('p3_page_meta',array('id' => '1'));
    }
}