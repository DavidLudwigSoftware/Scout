<?php

$user = 'root';
$pass = 'password';

$db = new PDO('mysql:host=localhost;dbname=test', $user, $pass);


return $db;
