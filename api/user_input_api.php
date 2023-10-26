//http://127.0.0.1/php_Exam/api/user_input_api.php/
<?php
header("Access-Control-Allow-Methods: POST");
include("../Config/user_config.php");

$config = new User_Config();

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $name = $_POST['name'];
    $Num = $_POST['Num'];
    $password = $_POST['password'];

    $res = $config->user_insert($name, $Num, $password);

    if ($res) {
        $arr['data'] = "User Record inserted....";
    } else {
        $arr['data'] = "User Record not inserted....";
    }
} else {
    $arr['error'] = "Only POST Method are allowed...";
}

echo json_encode($arr);
?>