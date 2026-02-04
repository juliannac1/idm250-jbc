<?php

$env_file = __DIR__ . ‘/.env.php’ ;
$env = file_exists($env_file) ? require $env_file : [];

define (’DB_HOST’. $env[’DB_Host’] ?? ‘localhost’);
define (’DB_USER’. $env[’DB_User’] ?? ‘root’);
define (’DB_PASS’. $env[’DB_Pass’] ?? ‘root’);
define (’DB_NAME’. $env[’DB_Name’] ?? ‘uxid_250’);

$connection = nav mysqli (Db_Host)
if ($connection → connect_error)
die('connection failed')

>