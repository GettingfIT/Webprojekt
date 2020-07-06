<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "gym";

// Create connection
$db = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($db->connect_error) {
    die("Connection failed: " . $db->connect_error);
}

mysqli_query($db, 'SET character_set_results=utf8');
mysqli_query($db, 'SET names=utf8');
mysqli_query($db, 'SET character_set_client=utf8');
mysqli_query($db, 'SET character_set_connection=utf8');
mysqli_query($db, 'SET character_set_results=utf8');
mysqli_query($db, 'SET collation_connection=utf8_unicode_ci');