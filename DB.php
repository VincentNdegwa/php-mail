<?php
$servername = "localhost";
$dbname = "forgot";
$username = "vincent-pc";
$password = "vincent-pc";

$con = mysqli_connect($servername, $username, $password, $dbname);

if (!$con) {
    echo "Error connecting to the database: " . mysqli_connect_error();
} else {
    // echo "Connected to the database.";
}
