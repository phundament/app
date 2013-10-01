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

        $model                    = new P3Page();
        $model->default_menu_name = 'Test';
        $model->status            = 'published';
        $model->access_owner      = 1;
        $model->access_domain     = '*';
        $model->save();
        $this->codeGuy->seeInDatabase('p3_page', array('default_menu_name' => 'Test'));
    }

    public function testDeletePage()
    {
        Yii::import('p3pages.models.*');

        $model = P3Page::model()->findByAttributes(array('default_menu_name' => 'Test'));
        $model->delete();

        $this->codeGuy->dontSeeInDatabase($model->tableSchema->name, array('default_menu_name' => 'Test'));
    }

    // tests
    public function testSaveNewPageWithTranslation()
    {
        Yii::import('p3pages.*');

        $model                                 = new P3Page();
        $model->default_menu_name              = 'Test2';
        $model->status                         = 'published';
        $model->access_owner                   = 1;
        $model->access_domain                  = '*';
        $model->translationModel->menu_name    = 'Test2';
        $model->translationModel->status       = 'published';
        $model->translationModel->language     = 'en';
        $model->translationModel->access_owner = 1;
        $model->save();
        #$model->translationModel->save();
        $this->codeGuy->seeInDatabase('p3_page', array('default_menu_name' => 'Test2'));
        $this->codeGuy->seeInDatabase('p3_page_translation', array('menu_name' => 'Test2'));
    }

    public function testDeletePageWithTranslation()
    {
        $model = P3Page::model()->findByAttributes(array('default_menu_name' => 'Test2'));
        $model->delete(); // TODO check if delete return true

        $this->codeGuy->dontSeeInDatabase($model->tableSchema->name, array('default_menu_name' => 'Test2'));
        $this->codeGuy->dontSeeInDatabase('p3_page_translation', array('menu_name' => 'Test2'));
    }

}