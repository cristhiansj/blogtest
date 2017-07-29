<?php
define('URL', 'https://mongoblogtest.herokuapp.com/');
define('UserAuth', 'admin');
define('PasswordAuth', 'admin');

$config = array(
	'username' => '',
	'password' => '',
	'dbname'   => 'blog',
	//'cn' 	   => sprintf('mongodb://%s:%d/%s', $hosts, $port,$database),
	'connection_string'=> sprintf('mongodb://%s:%d/%s','localhost','27017','blog')
);

