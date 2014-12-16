<?php

namespace tests\codeception\app\_pages;

use \yii\codeception\BasePage;

/**
 * Represents signup page
 * @property \codeception_app\AcceptanceTester|\codeception_app\FunctionalTester $actor
 */
class SignupPage extends BasePage
{

    public $route = 'user/registration/register';

    /**
     * @param array $signupData
     */
    public function submit(array $signupData)
    {
        foreach ($signupData as $field => $value) {
            $inputType = $field === 'body' ? 'textarea' : 'input';
            $this->actor->fillField($inputType . '[name="register-form[' . $field . ']"]', $value);
        }
        $this->actor->click('Sign up');
    }
}
