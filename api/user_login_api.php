//http://127.0.0.1/php_Exam/api/user_login_api.php/
<?php
header("Access-Control-Allow-Methods: POST");
include("../Config/user_config.php");

$config = new User_Config();

if ($_SERVER['REQUEST_METHOD'] == "POST") {

    $Num = $_POST['Num'];
    $password = $_POST['password'];

    $res = $config->sign_in($Num, $password);

    if ($res) {
        $arr['data'] = "User Sign In succefully....";
        http_response_code(201);
    } else {
        $arr['data'] = "User Sign in failed....";
    }
} else {
    $arr['error'] = "Only POST Method are allowed...";
}

echo json_encode($arr);
?>