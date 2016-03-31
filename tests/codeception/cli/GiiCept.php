<?php

// @group mandatory

$I = new CliTester($scenario);

$I->runShellCommand("/app/yii help gii");
$I->seeInShellOutput('DESCRIPTION');
$I->seeInShellOutput('SUB-COMMANDS');
$I->seeInShellOutput('gii/');

$I->runShellCommand("/app/yii help gii/giiant-crud");
$I->seeInShellOutput('DESCRIPTION');
$I->seeInShellOutput('yii gii/giiant-crud');
