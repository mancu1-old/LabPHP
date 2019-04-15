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

if (!empty($id))
{
    $resp = "UPDATE events SET ";
    $rep_dot = ",";
    if ($name != '')
    {
        $name_active = true;
        $resp_name = " name='$name'";
        $resp = $resp . $resp_name;
    }

    if ($date != '')
    {
        $date_active = true;
        if ($name_active == true)
        {
            $resp = $resp . $rep_dot;
        }

        $resp_data = " time='$date'";
        $resp = $resp . $resp_data;
    }

    if ($comment != '')
    {
        if ($date_active == true)
        {
            $resp = $resp . $rep_dot;
        }

        $resp_comment = " comment='$comment'";
        $resp = $resp . $resp_comment;
    }

    $resp_end = " WHERE id='$id'";
    $resp = $resp . $resp_end;
    echo $resp;
    include ("bd.php");

    $check = mysql_query("SELECT * FROM events WHERE id='$id'", $db);
    $myrow = mysql_fetch_array($check);
    if (empty($myrow['id']))
    {
        exit("Unknown Event number");
    }

    // $result = mysql_query("UPDATE events SET name='$name',time='$date',comment='$comment' WHERE id='$id'");

    $result = mysql_query($resp);
}
else
{
    exit("Data not correct");
}
    exit();
?>