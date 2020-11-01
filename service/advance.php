<?php
    
    function getStudent($data, $db) {
        $response = array("code" => 200,"value" => []);

        $condition = null;
        if ( isset($data["nickname"]) && !empty($data["nickname"]) ) {
            $condition = "WHERE nickname = '{$data["nickname"]}'";
        }
        $sql = "SELECT * FROM students {$condition}";

        // echo $sql;
        $result = $db->query($sql);
        if ($result->num_rows > 0) {
            while($row = $result->fetch_object()) {
                array_push($response["value"], $row);
            }
        } else { echo "no data"; }

        return json_encode($response);
    }
  
?>