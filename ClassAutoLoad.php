<?php

date_default_timezone_set("Africa/Nairobi");

require_once "includes/constants.php";

    function ClassAutoLoad($ClassName){
        $directories = array("layouts", "includes");
        foreach($directories AS $dir){
            $FileName = dirname(__FILE__) . DIRECTORY_SEPARATOR . $dir . DIRECTORY_SEPARATOR . $ClassName . ".php";
            if(is_readable($FileName)){
                require $FileName;
            }
        }
    }
    spl_autoload_register('ClassAutoLoad', true, true);


/* Create the DB Connection */
$MYSQL = New dbConnection(DBTYPE,HOSTNAME,DBNAME,HOSTUSER,HOSTPASS,DBPORT);
// print'<pre>'; print_r($MYSQL); print'</pre>';


// instantiating classes
// creating objects.

$OBJ_Layout = NEW layouts();