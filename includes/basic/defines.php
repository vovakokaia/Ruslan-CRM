<?php
@define('SERVERNAME', 'localhost');
@define('USERNAME', 'u561313407_chavi');
@define('PASSWORD', 'Za39zemel');
@define('DB_TABLE', 'u561313407_ruslancrm');
@define('D_R', $_SERVER['DOCUMENT_ROOT'].'/');
@define('SITE_TITLE', 'Ruslan CRM');

@define('TIME_ZONE', json_decode(file_get_contents('http://ip-api.com/json/' . $_SERVER['REMOTE_ADDR'])) -> timezone); 
date_default_timezone_set(TIME_ZONE);