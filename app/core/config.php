<?php

/**
 * databse cpmfig
 */

define('APP_NAME', 'NILIS_MIS');
define('APP_DESC', 'Examination Managment System');

/**
 * app info
 */


//connect to live server
//database config for live server
define('DBNAME', 'nilisdb_aws');
define('DBHOST', '127.0.0.1');
define('DBUSER', 'root');
define('DBPASS', '');
define('DBDRIVER', 'mysql');

// define('DBHOST', 'bitnami@13.251.194.207');
// define('DBNAME', 'nilisdb_aws');
// define('DBUSER', 'root');
// define('DBPASS', ' ');
// define('DBDRIVER', 'mysql');



// root path 
define('ROOT', 'http://13.251.194.207/');

// if ($_SERVER['SERVER_NAME'] == 'localhost') {

//     //databse config for local server
//     define('DBHOST', 'localhost');
//     define('DBNAME', 'nilis_db');
//     define('DBUSER', 'root');
//     define('DBPASS', '');
//     define('DBDRIVER', 'mysql');

//     //root path (localhost)
//     //root path 
//     define('ROOT', 'http://localhost/NILIS-MIS/public/');
//     define('ROOTDIR', 'http://localhost/NILIS-MIS/');
// }
//  else {
//     //database config for live server
//     define('DBHOST', 'sql6.freesqldatabase.com');
//     define('DBNAME', 'sql6683375');
//     define('DBUSER', 'sql6683375');
//     define('DBPASS', '9d2kNaSuiA');
//     define('DBDRIVER', 'mysql');


//     //root path 
//     define('ROOT', 'http://localhost/NILIS-MIS/public/');
// }
?>