<?php

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
