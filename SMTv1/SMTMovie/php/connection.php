<?php
/**
PHP version 7

@category SQL

@package Web_Programming_Project

@author Original Author <mitchel_king@icloud.com>

@license http://www.php.net/license PHP license 7

@link http:/pear.php.net
 **/
/**
PHP script to check database and table, create if not

@return null
 **/
$SQLServer = "mysql1:3306";
$SQLUserName = "root";
$SQLPassword = "delical300";
$connection = mysqli_connect($SQLServer, $SQLUserName, $SQLPassword);
if (!$connection) {
     die("Cannot connect to database.");
}
 $sqlCreateDB = "CREATE DATABASE IF NOT EXISTS SMT_db;";
if (mysqli_query($connection, $sqlCreateDB) == true) {
        $db = true;
} else {
        echo "%s.<br/>", mysqli_error($connection);
}