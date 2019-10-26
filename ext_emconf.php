<?php

$EM_CONF[$_EXTKEY] = array(
	'title' => 'OpenWeatherMap PHP API for TYPO3',
	'description' => 'A TYPO3 service extension to facilitate usage of cmfcmf/OpenWeatherMap-PHP-Api in your projects',
	'category' => 'services',
	'author' => 'Felix Rauch',
	'author_email' => 'rauch@skaiamail.de',
	'state' => 'stable',
	'internal' => '',
	'uploadfolder' => '0',
	'createDirs' => '',
	'clearCacheOnLoad' => 0,
	'version' => '2.0.0',
	'constraints' => array(
		'depends' => array(
			'typo3' => '8.7.0-9.9.99',
		),
		'conflicts' => array(
		),
		'suggests' => array(
		),
	),
);
