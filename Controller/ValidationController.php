<?php

namespace ValidationController;

class ValidationController
{

    public static $error = [];

    public static function validateRegistration($allUsers){

        if(mb_strlen(trim($_POST['reg_user_name'])) < 5 || mb_strlen(trim($_POST['reg_user_name'])) > 10){
            self::$error['reg_user_name'] = 'Login must contain at least 5 and no more than 10 characters';
        }

        if(mb_strlen(trim($_POST['reg_user_pass'])) < 5 || mb_strlen(trim($_POST['reg_user_pass'])) > 10){
            self::$error['reg_user_pass'] = 'Password must contain at least 5 and no more than 10 characters';
        }

        foreach ($allUsers as $user){
            if($user['login'] == $_POST['reg_user_name']){
                self::$error['reg_user_name'] = 'This name is already exists';
            }
        }

    }

    public static function validateLogin(){

        if(mb_strlen(trim($_POST['log_user_name'])) < 5 || mb_strlen(trim($_POST['log_user_name'])) > 10){
            self::$error['log_user_name'] = 'Name must contain at least 5 and no more than 10 characters';
        }

        if(mb_strlen(trim($_POST['log_user_pass'])) < 5 || mb_strlen(trim($_POST['log_user_pass'])) > 10){
            self::$error['log_user_pass'] = 'Password must contain at least 5 and no more than 10 characters';
        }

    }

}