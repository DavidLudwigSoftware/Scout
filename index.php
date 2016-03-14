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


// Create a database connection
$db = require __DIR__ . '/db.php';


// Create the scout environment
$env = new Scout\ScoutEnvironment(__DIR__ .'/locale/en/scout.php', $db);


// Create an instance of scout
$scout = new Scout\Scout($env);



if (!empty($_POST))
{
    // Validate some fields
    $result = $scout->validate(
        [
        //  Filed name      Field value            Field rules
            'firstname'  => ['David',              "required|alpha|lenmax(50)", []],
            'lastname'   => ['Ludwig',             "required|alpha|lenmax(50)"],
            'email'      => ['example@domain.com', "required|email|unique('users','email')", ['unique' => 'That email already exists']],
            'username'   => ['SirDavid',           "required|lenmin(3)|lenmax(25)"],
            'password'   => ['myPassword',         "required|lenmin(6)"],
            'repassword' => ['myPassword',         "required|matches('password')"],
            'creditcard' => [$_POST['creditcard'],  "required|creditcard"],
        ],
        [
            'somefile' => [@$_FILES['somefile'], 'required|image']
        ]
    );


    // Print the errors for each of the fields
    foreach ($result->all() as $error)

        echo $error[0], '<br />';


    if ($result->empty())

        echo "No errors!";

}


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
        <label for="creditcard">Credit Card</label>
        <input type="text" id="creditcard" name="creditcard">
        <input type="submit">
    </form>
</body>
</html>
