<?php
return array(
	'db' => array(
		'dsn' => 'mysql:host=localhost;dbname=tracker',
		'username' => 'root',
		'password' => 'glamsweet88',
		'options' => array(
			PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'
		),
	),
);