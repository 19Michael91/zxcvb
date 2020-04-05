<?php

namespace RegistrationView;

include_once 'Model' . DIRECTORY_SEPARATOR . 'User.php';
include_once 'Controller' . DIRECTORY_SEPARATOR . 'ValidationController.php';

use ValidationController\ValidationController as ValidationController;

use User\User as User;

class RegistrationView
{

    public static $father = '<option value="0">Father</option>';
    public static $mother = '<option value="1">Mother</option>';

    public static function getRegistrationView($allUsers){

        $value_name = isset($_POST["reg_user_name"]) ? $_POST["reg_user_name"] : "";
        $value_pass = isset($_POST["reg_user_pass"]) ? $_POST["reg_user_pass"] : "";

        $error_name = ValidationController::$error['reg_user_name'] ? '<small class="form-text text-muted validation-error">* ' . ValidationController::$error['reg_user_name'] . '</small>' : '';
        $error_pass = ValidationController::$error['reg_user_pass'] ? '<small class="form-text text-muted validation-error">* ' . ValidationController::$error['reg_user_pass'] . '</small>' : '';

        if(count($allUsers) > 0){
            foreach ($allUsers as $user){
                if ($user['status'] == User::$statusFather) {
                    self::$father = '';
                }
                if ($user['status'] == User::$statusMother) {
                    self::$mother = '';
                }
            }
        }

        $content = '
            <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
            <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
            <link rel="stylesheet" href="resources/css/styles.css">
            <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
             
            <div class="container">
                <div class="row login-div">
                    <div class="col-sm-12s">
                        <a href="/?login" class="btn btn-success registration-button">Login</a>
                    </div>
                    <form class="col-sm-12" method="POST">
                      <div class="form-group">
                        <label for="user-name">Name</label>
                        <input type="text" id="user-name" name="reg_user_name" class="form-control" placeholder="Enter name" value="' . $value_name . '">
                        ' . $error_name . '
                      </div>
                      <div class="form-group">
                        <label for="user-password">Password</label>
                        <input type="password" id="user-password" name="reg_user_pass" class="form-control" placeholder="Enter password" value="' . $value_pass . '">
                        ' . $error_pass . '
                      </div>
                      <div class="form-group">
                        <label for="user-status">Status</label>
                        <select class="form-control" name="reg_user_status" id="user-status">
                            ' . self::$father . '
                            ' . self::$mother . '
                            <option value="2">Child</option>
                        </select>
                      </div>
                      <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        ';

        return $content;

    }

}