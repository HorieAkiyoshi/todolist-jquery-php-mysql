<?php
require_once("../database/conn.php");

$id = cleanPost($_GET['id']);

$sql = $pdo->prepare("DELETE FROM to_do WHERE id=?");
$sql->execute(array($id));
header('location: ../index.php');

?>