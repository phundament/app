<?php

return CMap::mergeArray(
	require(dirname(__FILE__).'/main.php'),
	array(
		'components'=>array(
			'fixture'=>array(
				'class'=>'system.test.CDbFixtureManager',
			),
			// provide test database connection
			'db'=>array(
                'tablePrefix' => 'usr_',
                'connectionString' => 'sqlite:' . $applicationDirectory . '/data/test.db',
			),

		),
	)
);
