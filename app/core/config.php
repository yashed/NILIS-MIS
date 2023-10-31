<?php

/**
 * databse cpmfig
 */

 define('APP_NAME','NILIS_MIS');
 define('APP_DESC', 'Examination Managment System');

/**
 * app info
 */

if($_SERVER['SERVER_NAME'] == 'localhost'){
    //databse config for local server
    define('DBHOST','localhost');
    define('DBNAME','nilis_bd');
    define('DBUSER','root');
    define('DBPASS','');
    define('DBDRIVER','mysql');

    //root path (localhost)
    //root path 
    define('ROOT', 'http://localhost/NILIS-MIS/public/');
}
else{
   //database config for live server
    define('DBHOST','localhost');
    define('DBNAME','nilis_bd');
    define('DBUSER','root');
    define('DBPASS','');
    define('DBDRIVER','mysql');

    //root path 
    define('ROOT', 'http://');
}
?>