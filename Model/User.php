<?php

namespace User;

class User
{

    public static $statusFather    = 0;
    public static $statusMother    = 1;
    public static $statusChild     = 2;
    public static $registeredUser  = false;
    public static $loginError      = false;

    public static function getAllUsers($connect){

        $users  = [];
        $select = 'SELECT * from users';
        $result = mysqli_query($connect, $select);

        while( $row = mysqli_fetch_array( $result, MYSQLI_ASSOC )){
            $users[] = $row;
        }

        return $users;

    }

    public static function addUser($connect){

        $insert     = "INSERT INTO `users` (`login`, `pass`, `status`) VALUES ('" . trim($_POST['reg_user_name']) . "', 
                                                                                '" . md5(trim($_POST['reg_user_pass'])) . "',
                                                                                '" . trim($_POST['reg_user_status']) . "');";
        $addUser    = mysqli_query($connect, $insert);

        if($addUser){
            $result = mysqli_query($connect, "SELECT * FROM users WHERE
                                                    login = '" . trim($_POST['reg_user_name']) . "'
                                                     AND pass = '" . md5(trim($_POST['reg_user_pass'])) . "'
                                                     AND status = '" . trim($_POST['reg_user_status']) . "';");

            while( $row = mysqli_fetch_array( $result, MYSQLI_ASSOC )){
                self::$registeredUser = $row;
            }
        }

        return self::$registeredUser;

    }

    public static function checkUser($connect){

        $result = mysqli_query($connect, "SELECT * FROM users WHERE
                                                login = '" . trim($_POST['log_user_name']) . "'
                                                AND pass = '" . md5(trim($_POST['log_user_pass'])) . "';");

        if ($result){
            while( $row = mysqli_fetch_array( $result, MYSQLI_ASSOC )){
                self::$registeredUser = $row;
            }
        }

        if(!self::$registeredUser){
                self::$loginError = true;
        }

    }

}