<?php

require 'database.php';

?>

<!DOCTYPE html>
<html lang="en">
    <head>
    
        <title>Название вкладки</title>
</head>
<body>
    
    <h1>Просмотр сущностей</h1>
    
    <button onclick="location.href='/edit.php?id=0'">Создать</button>
    <br><br>

    <table border="1">

    <tr>
        <td>id</td>
        <td>title</td>
        <td>content</td>
        <td>slug</td>
        <td>category_id</td>
        <td>file</td>
        <td>edit</td>
        <td>delete</td>
    </tr>

        <?php
            $aItems = mysqli_query($link,"SELECT * FROM project_table") or die(mysqli_connect_error());
            while($item = mysqli_fetch_assoc($aItems)) { ?>

            <tr>
                <td><?= $item['id'] ?></td>
                <td><?= $item['title']?></td>
                <td><?= $item['content']?></td>
                <td><?= $item['slug']?></td>
                <td><?= $item['category_id']?></td>
                <td><?= $item['file']?></td>
                <td><button onclick="location.href='/edit.php?id=<?= $item['id'] ?>'">Изменить</button></td>
                <td><button onclick="location.href='/delete.php?id=<?= $item['id'] ?>'">Удалить</button></td>
            </tr>

        <?php } ?>

    </table>
</body>
</html>