<?php

// @group mandatory

$I = new CliTester($scenario);

$I->runShellCommand("yii help gii");
$I->seeInShellOutput('DESCRIPTION');
$I->seeInShellOutput('SUB-COMMANDS');
$I->seeInShellOutput('gii/');

$I->runShellCommand("yii help gii/giiant-crud");
$I->seeInShellOutput('DESCRIPTION');
$I->seeInShellOutput('yii gii/giiant-crud');
