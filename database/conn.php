<?php
define("SERVER","localhost");
define("PASSWORD","");
define("USER","root");
define("DATEBASE","to_do_list");

try{
    $pdo = new PDO('mysql:host='.SERVER.';dbname='.DATEBASE,USER,PASSWORD);
    $pdo->setAttribute(PDO:: ATTR_ERRMODE, PDO:: ERRMODE_EXCEPTION);
    $pdo->setAttribute(PDO:: ATTR_DEFAULT_FETCH_MODE, PDO:: FETCH_OBJ);
}catch(PDOException $err){
    echo "Err: "->$err->getMessage();
}

function cleanPost($value){
    $value = trim($value);
    $value = htmlspecialchars($value);
    $value = stripslashes($value);
    return $value;
}

?>