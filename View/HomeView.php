<?php

namespace HomeView;

include_once 'Model' . DIRECTORY_SEPARATOR . 'User.php';

class HomeView
{

    public static function getHomeView(){

        return '<h1>Home Page</h1>';

    }

}