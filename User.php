<?php
/**
 * Created by PhpStorm.
 * User: Rachel
 * Date: 04/12/2018
 * Time: 13:57
 */

class User{

    public function Login($user_name, $user_password, $conn){

        $stmt = $conn->prepare('SELECT * FROM users WHERE user_name=:user_name AND user_password=:user_password');
        $stmt->execute(['user_name'=> $user_name, 'user_password'=> $user_password]);
        $row = $stmt->fetch();

        if($user_name == $row['user_name'] && $user_password == $row['user_password']){
            echo "Logged in";
        }
        else{
            echo "Please enter Credentials!";
        }
    }
}