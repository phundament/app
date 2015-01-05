<?php

$I = new AcceptanceTester($scenario);
$I->wantTo('ensure that docs pages work');
$I->amOnPage(Yii::$app->urlManager->createUrl(['/docs']));
$I->see('Phundament Guide');

$I->amOnPage(Yii::$app->urlManager->createUrl(['/docs', 'file' => '20-installation.md']));
$I->see('Installation','h1');
