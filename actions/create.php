<?php
require_once("../database/conn.php");

$desc = cleanPost($_POST['description']);

$sql = $pdo->prepare("INSERT INTO to_do VALUES (null,?)");
$sql->execute(array($desc));
header('location: ../index.php');
?>