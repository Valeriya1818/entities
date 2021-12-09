<?php

require 'database.php';

$id = (int) $_GET['id'];

mysqli_query($link,"DELETE FROM project_table WHERE id='".$id."'") or die(mysqli_error($link));

header("Location: http://localhost/");

?>