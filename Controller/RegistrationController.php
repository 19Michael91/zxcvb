<?php

namespace RegistrationController;

include_once 'Controller' . DIRECTORY_SEPARATOR . 'ValidationController.php';
include_once 'Model' . DIRECTORY_SEPARATOR . 'User.php';
include_once 'View' . DIRECTORY_SEPARATOR . 'HomeView.php';
include_once 'View' . DIRECTORY_SEPARATOR . 'RegistrationView.php';

use ValidationController\ValidationController as ValidationController;
use User\User as User;

class RegistrationController
{

    public static function userRegistration($allUsers, $connect){

        if(isset($_POST['reg_user_name'])
           && isset($_POST['reg_user_pass'])
           && isset($_POST['reg_user_status'])){

            ValidationController::validateRegistration($allUsers);

            if (count(ValidationController::$error) == 0){

                User::addUser($connect);

                echo '<script>window.location.href = "/?home"</script>';

            }

        }

    }

}
