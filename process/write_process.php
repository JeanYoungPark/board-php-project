<?php
require_once($_SERVER['DOCUMENT_ROOT'].'/config.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/class/mysql.php');

$_POST['title'] = htmlspecialchars($_POST['title'], ENT_QUOTES, 'UTF-8');
$_POST['content'] = htmlspecialchars($_POST['content'], ENT_QUOTES, 'UTF-8');

$query = <<<JYP
INSERT INTO board_table(title,content,date)
VALUES ('{$_POST['title']}','{$_POST['content']}',{$GLOBALS['time']});
JYP;
$mysql = new mysql;
$result = $mysql->query($query);

if($result) {
    echo("<script>location.replace('/topic/article.php?id={$result}');</script>"); 
}
?>