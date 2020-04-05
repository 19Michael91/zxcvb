<?php

namespace Database;

class Database
{

    protected static function getConfig(){

        include_once realpath('config.php');

        $config = ['db_name'        => DB_NAME,
                   'db_user'        => DB_USER,
                   'db_password'    => DB_PASSWORD,
                   'host'           => HOST];

        return $config;

    }

    protected static function createTableUsersQuery(){

        $createTableUsers = 'CREATE table IF NOT EXISTS users
								(id int not null auto_increment primary key,
								login varchar(50) not null,
								pass varchar(255) not null,
								status int not null)
								default charset="utf8"';

        return $createTableUsers;

    }

    protected static function createTableTasksQuery(){

        $createTableTasks = 'CREATE table IF NOT EXISTS tasks
								(id int not null auto_increment primary key,
								owner varchar(50) not null,
								task varchar(255) not null,
								status varchar(50) not null)
								default charset="utf8"';

        return $createTableTasks;

    }

    protected static function createTables(){

            $databaseQueries = [self::createTableUsersQuery(),
                                self::createTableTasksQuery()];

            return $databaseQueries;

    }

    public function connectDatabase(){

        $config     = self::getConfig();
        $connect    = mysqli_connect($config['host'], $config['db_user'], $config['db_password'], $config['db_name']);

        if ($connect) {
            foreach (self::createTables() as $query ) {
                mysqli_query($connect, $query);
            }
        }

        return $connect;

    }

}
