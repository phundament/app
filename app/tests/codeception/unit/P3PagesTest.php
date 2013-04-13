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
        $model = new P3Page();
        $model->route = '{route:""site/index}';

        # TODO: fix include path for Yii
        //$model->save();
        //$this->codeGuy->seeInDatabase($model->tableSchema->name,array('id' => '1'));
    }

}