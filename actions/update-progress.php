<?php
    require_once("database/conn.php");

    $id = $_POST['id'];
    $completed = $_POST['completed'];

    if($id && $completed){
        $sql = $pdo->prepare("UPDATE to_do SET completed=? WHERE id=?");
        $sql->execute(array($completed, $id));

        echo json_encode(['success'] => true);
        exit;
    }else{
        echo json_encode(['success'] => false);
        exit;
    }
    
?>