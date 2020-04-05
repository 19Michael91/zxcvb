<?php

namespace LoginView;

include_once 'Model' . DIRECTORY_SEPARATOR . 'User.php';
include_once 'Controller' . DIRECTORY_SEPARATOR . 'ValidationController.php';
include_once 'Model' . DIRECTORY_SEPARATOR . 'User.php';

use ValidationController\ValidationController as ValidationController;
use User\User as User;

class LoginView
{

    public static function getLoginView(){

        $value_name = isset($_POST["log_user_name"]) ? $_POST["log_user_name"] : "";
        $value_pass = isset($_POST["log_user_pass"]) ? $_POST["log_user_pass"] : "";

        $error_name = ValidationController::$error['log_user_name'] ? '<small class="form-text text-muted validation-error">* ' . ValidationController::$error['log_user_name'] . '</small>' : '';
        $error_pass = ValidationController::$error['log_user_pass'] ? '<small class="form-text text-muted validation-error">* ' . ValidationController::$error['log_user_pass'] . '</small>' : '';

        $loginError = true == User::$loginError ? '<h3 class="validation-error">Invalid username or password</h3>' : '';

        $content = '
            <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
            <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
            <link rel="stylesheet" href="resources/css/styles.css">
            <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
             
            <div class="container">
                <div class="row login-div">
                    <div class="col-sm-12s">
                        <a href="/?registration" class="btn btn-success registration-button">Registration</a>
                    </div>
                    <form class="col-sm-12" method="POST">
                      <div class="form-group">
                      ' . $loginError . '
                        <label for="user-name">Name</label>
                        <input type="text" id="user-name" name="log_user_name" class="form-control" placeholder="Enter name" value="' . $value_name . '">
                        ' . $error_name . '
                      </div>
                      <div class="form-group">
                        <label for="user-password">Password</label>
                        <input type="password" id="user-password" name="log_user_pass" class="form-control" placeholder="Enter password" value="' . $value_pass . '">
                        ' . $error_pass . '
                      </div>
                      <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        ';

        return $content;

    }

}