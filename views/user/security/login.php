<?php

$this->context->layout = '@app/views/layouts/main';

preg_match('|(/[^/]*/[^/]*\.php)$|', __FILE__, $matches);
require(Yii::getAlias('@dektrium/user/views/' . $matches[1]));