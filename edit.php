<?php

require 'database.php';

$aData = [];

$id = (int) $_GET['id'];

if (isset($_GET['redirect'])) {

    if ($id) {
        mysqli_query($link,"UPDATE project_table SET title='".htmlentities($_GET['title'], ENT_QUOTES)."',content='".htmlentities($_GET['content'], ENT_QUOTES)."',slug='".htmlentities($_GET['slug'], ENT_QUOTES)."',category_id='".htmlentities($_GET['category_id'], ENT_QUOTES)."',file='".htmlentities($_GET['file'], ENT_QUOTES)."',deleted=FALSE where id='".$id."' limit 1") or die(mysqli_error($link));
    } else {
        mysqli_query($link,"INSERT project_table SET title='".htmlentities($_GET['title'], ENT_QUOTES)."',content='".htmlentities($_GET['content'], ENT_QUOTES)."',slug='".htmlentities($_GET['slug'], ENT_QUOTES)."',category_id='".htmlentities($_GET['category_id'], ENT_QUOTES)."',file='".htmlentities($_GET['file'], ENT_QUOTES)."',deleted=FALSE") or die(mysqli_error($link));
    }

    header("Location: http://localhost/");
    exit();
}

$aItems = mysqli_query($link,"SELECT * FROM project_table WHERE id='".$id."' order by id limit 1") or die(mysqli_connect_error());
$item = mysqli_fetch_assoc($aItems);

?>

<!DOCTYPE html>
<html lang="en">
    <head>
    
        <title>Название вкладки</title>
</head>
<body>
    
    <?php if($id==0) { ?>

        <h1>Создание сущности</h1>

    <?php } else { ?>
        
        <h1>Редактирование сущности</h1>

    <?php } ?>
    
    <button onclick="location.href='/'">Назад</button>
    <br><br>

    <form method="GET" action="/edit.php" accept-charset="utf-8">
        <input type="hidden" name="id" value="<?= $id ?>">
        <input type="text" name="title" value="<?= html_entity_decode($item['title']) ?>" placeholder="title"><br><br>
        <input type="text" name="content" value="<?= html_entity_decode($item['content']) ?>" placeholder="content"><br><br>
        <input type="text" name="slug" value="<?= html_entity_decode($item['slug']) ?>" placeholder="slug"><br><br>
        <input type="number" name="category_id" value="<?= html_entity_decode($item['category_id']) ?>" placeholder="category_id"><br><br>
        <input type="text" name="file" value="<?= html_entity_decode($item['file']) ?>" placeholder="file"><br><br>
        <input type="hidden" name="redirect" value="1">
        <button type="submit">Сохранить</button>
    </form>
    </body>
</html>