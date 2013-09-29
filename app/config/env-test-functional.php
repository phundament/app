<?php

defined('YII_DEBUG') or define('YII_DEBUG', true);

return CMap::mergeArray(
    require(dirname(__FILE__) . '/test.php'),
    array(
         'components' => array(
             'request' => array(
                 'class' => 'CodeceptionHttpRequest'
             ),
         ),
    )
);
