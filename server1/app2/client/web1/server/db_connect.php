<?php

//Variable set up
define('DB_SERVER', 'mariadb');
define('DB_USERNAME', 'root');
define('DB_PASSWORD',getenv('MYSQL_ROOT_PASSWORD'));
define('DB_NAME', getenv('MYSQL_DATABASE'));
//define('DB_PASSWORD','password');
echo getenv('MYSQL_DATABASE');
/* Attempt to connect to MySQL database */
$link = new mysqli(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
//link = new (DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
if(!$link){
    die("ERROR: Could not connect. " . $link->connect_error);
}

/*else {
    echo 'yes';
}*/
?>
