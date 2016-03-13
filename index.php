<?php


// Import the autoloader
require __DIR__ . '/vendor/autoload.php';


// Create the scout environment
$env = new Scout\ScoutEnvironment(__DIR__ .'/locale/en/scout.php');


// Create an instance of scout
$scout = new Scout\Scout($env);


// Validate some fields
$result = $scout->validate([
    'username' => ['yes', 'required|boolean|accepted'],
]);


// Print the errors for each of the fields
foreach ($result->all() as $error)

    echo $error[0], '<br />';
