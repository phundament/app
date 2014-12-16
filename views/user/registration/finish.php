<?php

$this->context->layout = '@app/views/layouts/container';

preg_match('|(/[^/]*/[^/]*\.php)$|', __FILE__, $matches);
require(Yii::getAlias('@dektrium/user/views/' . $matches[1]));