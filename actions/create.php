<?php
require_once("../database/conn.php");

$desc = cleanPost($_POST['description']);

$sql = $pdo->prepare("INSERT INTO to_do VALUES (null,?,?)");
$sql->execute(array($desc,0));
header('location: ../index.php');
?>