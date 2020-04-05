<?php

namespace IndexController;

include_once 'Kernel' . DIRECTORY_SEPARATOR . 'Database' . DIRECTORY_SEPARATOR . 'Database.php';
include_once 'Controller' . DIRECTORY_SEPARATOR . 'RegistrationController.php';
include_once 'Controller' . DIRECTORY_SEPARATOR . 'LoginController.php';
include_once 'Model' . DIRECTORY_SEPARATOR . 'User.php';
include_once 'View' . DIRECTORY_SEPARATOR . 'LoginView.php';
include_once 'View' . DIRECTORY_SEPARATOR . 'RegistrationView.php';
include_once 'View' . DIRECTORY_SEPARATOR . 'HomeView.php';

use Database\Database as Database;
use User\User as User;
use LoginView\LoginView as LoginView;
use RegistrationView\RegistrationView as RegistrationView;
use RegistrationController\RegistrationController as RegistrationController;
use LoginController\LoginController as LoginController;
use HomeView\HomeView as HomeView;


class IndexController
{

    public static function connectDatabase(){

        $connect = Database::connectDatabase();

        return $connect;

    }

    public static function firstPage(){

        $connect    = self::connectDatabase();
        $allUsers   = User::getAllUsers($connect);

        if (isset($_GET['registration'])){
            RegistrationController::userRegistration($allUsers, $connect);
            return RegistrationView::getRegistrationView($allUsers);
        }

        if (isset($_GET['home'])){
            return HomeView::getHomeView();
        }

        LoginController::userLogin($connect);

        return LoginView::getLoginView();

    }

}