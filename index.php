<?php


// Import the autoloader
require __DIR__ . '/vendor/autoload.php';


// Create a database connection
$db = require __DIR__ . '/db.php';


// Create the scout environment
$env = new Scout\ScoutEnvironment(__DIR__ .'/locale/en/scout.php', $db);


// Create an instance of scout
$scout = new Scout\Scout($env);


// Validate some fields
$result = $scout->validate(
    [
        'firstname' => ['David',              "required|alpha|lenmax(50)"],
        'lastname'  => ['Ludwig',             "required|alpha|lenmax(50)"],
        'email'     => ['example@domain.com', "required|email|unique('users','email')"],
        'username'  => ['SirDavid',           "required|lenmin(3)|lenmax(25)"],
    ],
);


// Print the errors for each of the fields
foreach ($result->all() as $error)

    echo $error[0], '<br />';


if ($result->empty())

    echo "No errors!";


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Scout Validation Engine</title>
</head>
<body>
    <form action="" method="post" enctype="multipart/form-data">
        <input type="file" name="somefile">
        <input type="submit">
    </form>
</body>
</html>
