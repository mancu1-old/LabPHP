<?php
session_start();
ob_start();
header("location:index.php");
ob_end_flush();
include 'index.php';
if (isset($_POST['login']))
{
    $login = $_POST['login'];
    if ($login == '')
    {
        unset($login);
    }
}

if (isset($_POST['password']))
{
    $password = $_POST['password'];
    if ($password == '')
    {
        unset($password);
    }
}

if (empty($login) or empty($password))

{
    exit("�� ����� �� ��� ����������, ��������� ����� � ��������� ��� ����!");
}

$login = stripslashes($login);
$login = htmlspecialchars($login);
$password = stripslashes($password);
$password = htmlspecialchars($password);

$login = trim($login);
$password = trim($password);

include ("bd.php");

$result = mysql_query("SELECT * FROM users WHERE login='$login'", $db);
$myrow = mysql_fetch_array($result);

if (empty($myrow['password']))
{
    exit("��������, �������� ���� login ��� ������ ��������.");
}
else
{
    if ($myrow['password'] == $password)
    {
        $_SESSION['login'] = $myrow['login'];
        $_SESSION['id'] = $myrow['id'];
        $_SESSION['role'] = $myrow['role'];

        exit();
    }
    else
    {
        exit("��������, �������� ���� login ��� ������ ��������.");
    }
}

?>
