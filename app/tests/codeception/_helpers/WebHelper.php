<?php
namespace Codeception\Module;

// here you can define custom functions for WebGuy 

class WebHelper extends \Codeception\Module
{
    function login($I, $username, $password){
        $I->amOnPage('?r=user/login');
        $I->fillField('UserLogin[username]', $username);
        $I->fillField('UserLogin[password]', $password);
        $I->click('.form INPUT[type=submit]');
        $I->see('Logout','.dropdown-menu li a');
        $I->dontSee('Login','.nav li a');
    }
}