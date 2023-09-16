<?php
/*
Create on 11/12/2022
Author : Omar Rico
*/

// $dsn ="mysql:host=localhost;dbname=id20033022_cafe";
// $username ="id20033022_root";
// $password = "~cXp~ErdwbOp0rM7";

$dsn ="mysql:host=localhost;dbname=cafe";
$username ="root";
$password = "";
try{
    $db = new PDO($dsn, $username, $password);
    $db->setAttribute(PDO::ATTR_EMULATE_PREPARES, FALSE);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    error_reporting(E_ALL);
}catch(PDOException $ex){
    header("Location:../view/error.php?msg=".$ex->getMessage());
}
?>
