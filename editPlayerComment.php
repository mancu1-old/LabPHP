<?php
ob_start();
header("location:index.php");
ob_end_flush();
include 'index.php';

if (isset($_POST['id']))
{
    $id = $_POST['id'];
    if ($id == '')
    {
        unset($id);
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

if (!empty($id))
{
    $comment = stripslashes($comment);
    $comment = htmlspecialchars($comment);
    include ("bd.php");

    $check = mysql_query("SELECT * FROM players WHERE id='$id'", $db);
    $myrow = mysql_fetch_array($check);
    if (empty($myrow['id']))
    {
        exit("Unknown Player number");
    }

    $result = mysql_query("UPDATE players SET comment='$comment' WHERE id='$id'");
}
else
{
    exit("Data not correct");
}
exit();
?>