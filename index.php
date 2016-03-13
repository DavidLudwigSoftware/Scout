<?php


function dd(...$args)
{
    echo "<pre>";
    foreach ($args as $arg)

        var_dump($arg);

    echo "</pre>";

    exit();
}

// Import the autoloader
require __DIR__ . '/vendor/autoload.php';


// Create the scout environment
$env = new Scout\ScoutEnvironment(__DIR__ .'/locale/en/scout.php');


// Create an instance of scout
$scout = new Scout\Scout($env);


// Validate some fields
$result = $scout->validate([
    'firstname' => ['David',  'required|alpha'],
    'lastname'  => ['Ludwig', 'required|alpha'],
    'email'     => ['example@domain.com', 'required|email'],
    'username'  => ['SirDavid',            "required|lenmin(3)|lenmax(25)"],
]);


// Print the errors for each of the fields
foreach ($result->all() as $error)

    echo $error[0], '<br />';


if ($result->empty())

    echo "No errors!";
