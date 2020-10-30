<?php
    $response = [];
    $payload = array('nickname' => null);
    if (isset($_POST["submit"])) { $payload = $_POST; } // $_POST ≈ array() // $_POST["nickname"] ≈ array("nickname" => ??)
    
    /* case API */
    //     echo "case API";
    //     $curl = curl_init();
    //     curl_setopt($curl, CURLOPT_POST, true);
    //     curl_setopt($curl, CURLOPT_POSTFIELDS, $payload);
    //     curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
    //     curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    //     curl_setopt($curl, CURLOPT_URL, "http://192.168.64.2/php-api/advance.php");
    
    //     $result = curl_exec($curl);
    //     curl_close($curl);
    /* stop case */

    /* case FUNCTION */
        echo "case FUNCTION";
        require("service/connect.php");
        require("service/advance.php");
        $result = getBank($payload, $db);
    /* stop case */

    if (!empty($result)) {
        $response = json_decode($result, true)["value"];
    }
?>

<!DOCTYPE html>
<html lang="en">
    <head> <?php require("header.php"); ?> </head>
    <body>
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center mt-4">
                    <h1>นักศึกษาจ้า</h1>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12 text-center mt-4">
                    <form action="" method="POST">
                        <input
                            id="bank"
                            type="text"
                            class="form-control text-center"
                            placeholder="กรุณาระบุชื่อเล่น"
                            name="nickname"
                            value="<?=((isset($_POST["nickname"])) ? $_POST["nickname"] : "" );?>"
                        />
                        <input type="submit" class="form-control btn btn-outline-success" name="submit" value="ค้นหา"/>
                        <!-- <input id="submit" type="button" class="form-control btn btn-outline-success" name="submit" value="ค้นหา"/> -->
                    </form>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12 text-center mt-4">
                    <table class="table table-bodered">
                        <thead>
                            <tr>
                                <th>รหัสนักศึกษา</th>
                                <th>ชื่อเล่น</th>
                                <th>ชื่อ-นามสกุล</th>
                            </tr>
                        </thead>
                        <tbody>
                    <?php if (!empty($response) > 0) { ?>
                        <?php foreach ($response as $item) { ?>
                            <tr>
                                <th><?=$item["code"];?></th>
                                <th><?=$item["nickname"];?></th>
                                <th><?=$item["fullname"];?></th>
                            </tr>
                        <?php } ?>
                    <?php } else { ?> <tr class="text-center"><td colspan="3">ไม่พบข้อมูล</td></tr> <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
            
        </div> 
    </body>
</html>

<!-- <script src="bank.js"></script> -->