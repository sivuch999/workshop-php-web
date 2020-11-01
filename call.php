<?php
    $payload = array('animal' => 'cat');

    $curl = curl_init();
    curl_setopt($curl, CURLOPT_POST, true);
    curl_setopt($curl, CURLOPT_POSTFIELDS, $payload);
    // curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
    // curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type:application/json'));
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($curl, CURLOPT_URL, "http://192.168.64.2/workshop-php-api/basic.php");
    
    $result = curl_exec($curl);
    curl_close($curl);

    $obj = json_decode($result, true);
    print_r($obj);
    echo "<br><br><br><br>";
    echo $obj["value"][1]["animals"];

?>