<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
global $db;

function pdo_connect(){

try{

    // Include database info
    include 'database.php';

if(!isset($db)){
    echo 'Database connection not available!';
        exit;
}   
        $dbdriver   = $db['default']['dbdriver'];//'mysql'; 
        $hostname   = $db['default']['hostname'];//'localhost';
        $database   = $db['default']['database'];//'config';
        $username   = $db['default']['username'];//'root';
        $password   = $db['default']['password'];//'password';


    //to connect
    $DB = new PDO($dbdriver.':host='.$hostname.'; dbname='.$database, $username, $password);
    return $DB;

}catch(PDOException $e) {
    echo 'Please contact Admin: '.$e->getMessage();
}

}
