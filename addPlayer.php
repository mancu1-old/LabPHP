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

if (!empty($name))
{
    $name = stripslashes($name);
    $name = htmlspecialchars($name);
    $comment = stripslashes($comment);
    $comment = htmlspecialchars($comment);
    include ("bd.php");

    $result = mysql_query("INSERT INTO players (name,comment) VALUES('$name','$comment')");
}
else
{
    exit("�� ����� �� ��� ����������, ��������� ����� � ��������� ��� ����!");
}



exit();
?>