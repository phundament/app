<?php

// @group mandatory

$I = new FunctionalTester($scenario);
$I->wantTo('ensure that access control works');

$routesWithAccessControl = [
    '/backend',
    '/backend/default/view-config',
    '/prototype',
    '/prototype/html',
    '/settings',
    '/translatemanager',
    '/rbac',
    '/user',
    '/pages'
];

foreach ($routesWithAccessControl AS $route) {
    $I->amOnPage($route);
    $I->canSeeCurrentUrlMatches('|user/login|');
}
