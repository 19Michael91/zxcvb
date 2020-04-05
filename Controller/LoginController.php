<?php

namespace LoginController;

include_once 'Controller' . DIRECTORY_SEPARATOR . 'ValidationController.php';
include_once 'Model' . DIRECTORY_SEPARATOR . 'User.php';

use ValidationController\ValidationController as ValidationController;
use User\User as User;

class LoginController
{

    public static function userLogin($connect){

        if(isset($_POST['log_user_name'])
            && isset($_POST['log_user_pass'])){

            ValidationController::validateLogin();

            if (count(ValidationController::$error) == 0){

                User::checkUser($connect);

                if(User::$registeredUser){

                    $_REQUEST['test'] = 'test';

                    echo '<script>window.location.href = "/?home"</script>';

                }

            }

        }

    }

}