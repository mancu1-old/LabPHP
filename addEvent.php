<?php
ob_start();
header("location:index.php");
ob_end_flush();
include 'index.php';

if (isset($_POST['name']))
{
    $name = $_POST['name'];
    if ($name == '')
    {
        unset($name);
    }
}

if (isset($_POST['comment']))
{
    $comment = $_POST['comment'];
    if ($comment == '')
    {
        unset($comment);
    }
}

if (isset($_POST['date']))
{
    $date = $_POST['date'];
    if ($date == '')
    {
        unset($date);
    }
}

if (!empty($name))
{
    $name = stripslashes($name);
    $name = htmlspecialchars($name);
    $date = stripslashes($date);
    $date = htmlspecialchars($date);
    $comment = stripslashes($comment);
    $comment = htmlspecialchars($comment);
    include ("bd.php");

    $result = mysql_query("INSERT INTO events (name,comment,time) VALUES('$name','$comment','$date')");
}
else
{
    exit("Вы ввели не всю информацию, вернитесь назад и заполните все поля!");
}
exit();
?>