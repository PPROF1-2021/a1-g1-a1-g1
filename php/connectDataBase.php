<?php
// require './console_log.php';

function console_log($output, $with_script_tags = true)
{
    $js_code = 'console.log(' . json_encode($output, JSON_HEX_TAG) .
        ');';
    if ($with_script_tags) {
        $js_code = '<script>' . $js_code . '</script>';
    }
    echo $js_code;
}


$server = "localhost";
$username = "root";
$password = "41625501";
$database = "gestor_stock";


$connection = mysqli_connect($server, $username, $password, $database);


if (!$connection) {
    die("Connection failed: " . mysqli_connect_error());
}
console_log("Connected successfully");
