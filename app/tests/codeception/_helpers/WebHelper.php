<?php
namespace Codeception\Module;

// here you can define custom functions for WebGuy 

class WebHelper extends \Codeception\Module
{
    public static function login($I, $username, $password){
        $I->amOnPage('?r=user/login');
        $I->fillField('UserLogin[username]', $username);
        $I->fillField('UserLogin[password]', $password);
        $I->click('.form INPUT[type=submit]');
    }
}