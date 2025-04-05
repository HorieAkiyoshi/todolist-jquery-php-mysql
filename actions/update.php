<?php
require_once("../database/conn.php");

$id = cleanPost($_POST['id']);
$description = cleanPost($_POST['description']);

$sql = $pdo->prepare("UPDATE to_do SET description=? WHERE id=?");
$sql->execute(array($description,$id));
header("location: ../index.php");
?>