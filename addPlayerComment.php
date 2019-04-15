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
    include ("bd.php");

    $check = mysql_query("SELECT * FROM players WHERE id='$id'", $db);
    $myrow = mysql_fetch_array($check);
    $actual_comment = $myrow['comment'] . $comment;
    if (empty($myrow['id']))
    {
        exit("Unknown Player number");
    }

    $result = mysql_query("UPDATE players SET comment='$actual_comment' WHERE id='$id'");
}
else
{
    exit("Data not correct");
}
exit();
?>