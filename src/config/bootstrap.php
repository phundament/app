<?php
Yii::setAlias('@app', dirname(__DIR__).'/..');
Yii::setAlias('@runtime', dirname(__DIR__).'/../../runtime');

## TODO fix paths
Yii::setAlias('@web', dirname(__DIR__) . '/../web');
Yii::setAlias('@webroot', dirname(__DIR__) . '/web');

Yii::setAlias('@root', '@app');