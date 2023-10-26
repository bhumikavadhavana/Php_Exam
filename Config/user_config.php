<?php

class User_Config
{
    public $HOSTNAME = "localhost";
    public $USERNAME = "root";
    public $PASSWORD = "";
    public $DB_NAME = "users";
    public $connect_res;

    public function connect()
    {
        $this->connect_res = mysqli_connect($this->HOSTNAME, $this->USERNAME, $this->PASSWORD, $this->DB_NAME);

        return $this->connect_res;
    }

    public function user_insert($name, $Num, $password)
    {
        $this->connect();

        $hash_password = password_hash($password, PASSWORD_DEFAULT);

        $query = "INSERT INTO user_data(name,Num,password) VALUES('$name','$Num','$hash_password');";
        $res = mysqli_query($this->connect_res, $query);
        return $res;
    }

    public function sign_in($Num, $password)
    {
        $this->connect();

        $query = "SELECT * FROM user_data WHERE Num='$Num';";

        $obj = mysqli_query($this->connect_res, $query);

        $record = mysqli_fetch_assoc($obj);

        $_hash_password = $record['password'];

        $is_password_verified = password_verify($password, $_hash_password);

        if ($is_password_verified) {
            return true;
        } else {
            return false;
        }
    }

}
?>