<?php

$user = 'root';
$pass = 'password';

$db = new PDO('mysql:host=localhost;dbname=database', $user, $pass);

return $db;
