<?php

$I = new CliTester($scenario);

$I->wantTo('check asset bundling');

$I->runShellCommand('mkdir -p web/assets-prod/js');
$I->runShellCommand('yii asset src/config/assets-prod.php src/config/bundle-prod.php');

$I->seeInShellOutput('Output bundle configuration created at');
