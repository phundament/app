<?php

$this->context->layout = '@app/views/layouts/main';

$regex = '|(\\'.DIRECTORY_SEPARATOR.'[^\\'.DIRECTORY_SEPARATOR.']*\\'.DIRECTORY_SEPARATOR.'[^\\'.DIRECTORY_SEPARATOR.']*\.php)$|';
preg_match($regex, __FILE__, $matches);
require(Yii::getAlias('@dektrium/user/views/' . $matches[1]));