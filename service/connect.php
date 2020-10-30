<?php
    $servername = "208.109.8.4";
    $database = "education";
    $username = "developer";
    $password = "chaluideveloper";

    $db = mysqli_connect($servername, $username, $password, $database);

    if (!$db) {
        die("Connection failed: " . mysqli_connect_error());
    } else {
        if (!mysqli_set_charset($db, "utf8")) {
            die("character set utf8 failed");
        }
    }
    
?>