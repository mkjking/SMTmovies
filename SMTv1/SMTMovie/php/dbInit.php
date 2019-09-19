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

@param sqlconnection $connection Is the SQLconnection object

@return null
 **/
function checkDB($connection) 
{
    $table = false;
    $import = false;
    /**
    Reconnect to db now created to create table
    **/
    $sqlCreateTable = "CREATE TABLE IF NOT EXISTS movies(
    ID int NOT NULL AUTO_INCREMENT,
    title varchar(4),
     studio varchar(82),
      status varchar(15),
       sound varchar(12),
        versions varchar(11),
         recprice varchar(18),
          rating varchar(11),
           year varchar(6),
            genre varchar(4),
             aspect varchar(17),
              count int(5),
                PRIMARY KEY (ID)) 
                DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;";
    $testingTable = "CREATE TABLE IF NOT EXISTS movies(
    						ID int NOT NULL AUTO_INCREMENT,
   							title VARCHAR(128),
                            genre VARCHAR(128),
                            rating VARCHAR(128),
                            year VARCHAR(128),
  							search int,
   							PRIMARY KEY (ID)
    						);";
    mysqli_select_db($connection, 'SMT_db');

    if (mysqli_query($connection, $sqlCreateTable)) {
        $table = true;
    } else {
        echo "%s.<br/>", mysqli_error($connection);
    }
    
    /**
    Populate database with datafile
    **/
    $excelFile = "movies.csv";
    /**
    Local data read, statement runs succesfully, file rights issue??
    **/
    $sqlPopulate = "LOAD DATA LOCAL INFILE '$excelFile'
                        INTO TABLE movies
                        FIELDS TERMINATED BY ','
                        LINES TERMINATED BY '\r\n'
                        IGNORE 1 LINES;";

    if ($table) {
        echo "<p>DB : Database ready</p>";

    } else {
        echo "<p>DB : Table cannot be setup</p>";
    }
}
checkDB($connection);
