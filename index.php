<?php
require_once("database/conn.php");

$sql = $pdo->query("SELECT * FROM to_do ORDER BY id ASC");
{
    
}
?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="src/styles/style.css">
    <title>Document</title>
</head>
<body>
    <div id="to_do">
        <h1>Things to do</h1>

        <form action="actions/create.php" method="POST" class="to-do-form">
            <input type="text" name="description" placeholder="Write your task here" required>
            <button type="submit" class="form-button"><i class="fa-solid fa-plus"></i></button>
        </form>

        <div id="tasks">
            <?php 
                if($sql->rowCount() > 0): 
                $tasks = $sql->fetchAll(PDO:: FETCH_ASSOC);
            ?>
            <?php foreach($tasks as $task): ?>
            <div class="task">
                <p class="task-description">
                    <?= $task['description']; ?>
                </p>
                <div class="task-actions">
                    <a href="#" class="action-button edit-button"><i class="fa-solid fa-pen-to-square"></i></a>

                    <a href="actions/delete.php?id=<?= $task['id'] ?>" class="action-button delete-button"><i class="fa-solid fa-trash-can"></i></a>
                </div>
                
                <form action="actions/update.php" method="POST" class="to-do-form edit-task hidden">
                    <input type="text" class="hidden" name="id" value="<?php echo $task['id'] ?>">
                    <input type="text" name="description" placeholder="Edit your task here" value="<?php $task['description'] ?>">
                    <button type="submit" class="form-button confirm button"><i class="fa-solid fa-check"></i></button>
                </form>
            </div>
            <?php  endforeach; ?>
            <?php else: ?>
                <p style="color: #fff;">There are no tasks yet.</p>
            <?php endif ?>
        </div>
    </div>
    
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script>
    $(document).ready(function(){
        $('.edit-button').on('click',function(){
            var $task = $(this).closest('.task');
            $task.find('.progress').addClass('hidden');
            $task.find('.task-description').addClass('hidden');
            $task.find('.task-actions').addClass('hidden');
            $task.find('.edit-task').removeClass('hidden');
        });
    })
    </script>
</body>
</html>