<?php
// Replace the placeholders with your actual database connection details
$conf = array(
    'db_type' => 'mysql',           // Database type (e.g., MySQL)
    'db_hostname' => 'localhost',   // Hostname or IP address of the database server
    'db_port' => '3307',            // Port number for the database server
    'db_username' => 'root', // Database username
    'db_password' => '', // Database user password
    'db_name' => 'clients'           // Name of the database
);

define("DBTYPE", $conf['db_type']);
define("HOSTNAME", $conf['db_hostname']);
define("DBPORT", $conf['db_port']);
define("HOSTUSER", $conf['db_username']);
define("HOSTPASS", $conf['db_password']);
define("DBNAME", $conf['db_name']);
?>
