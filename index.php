<?php
session_start();
?>
<html>

<head>
    <title>Spartak Team Page</title>
</head>

<body>
    <?php

if (empty($_SESSION['login']) or empty($_SESSION['id']))
{
    echo "<form action='testreg.php' method='post'>";
    echo "<p>";
    echo "<label>��� �����:<br /></label>";
    echo "<input name='login' type='text' size='15' maxlength='15'>";
    echo "</p>";
    echo "<p>";
    echo "<label>��� ������:<br /></label>";
    echo "<input name='password' type='password' size='15' maxlength='15'>";
    echo "</p>";
    echo "<p>";
    echo "<input type='submit' name='submit' value='�����'>";
    echo "<br />";
    echo "<a href='reg.php'>������������������</a>";
    echo "</p>";
    echo "</form>";
    echo "<br />";
}
else
{
    echo "�� ����� �� ����, ��� " . $_SESSION['login'] . " ���� " . $_SESSION['role'];
    echo "<br /><a href='logout.php'>�����</a>";
}

?>
   <?php
ob_start();
require 'players.php';

$output = ob_get_clean();
echo $output;

if ($_SESSION['role'] == 'moder')
{
    echo "<p>Add Player</p>";
    echo "<form action='addPlayer.php' method='post'>";
    echo "<p>";
    echo "<label>���<br /></label>";
    echo "<input name='name' type='text' size='15' maxlength='15'>";
    echo "</p>";
    echo "<p>";
    echo "<label>�����������<br /></label>";
    echo "<input name='comment' type='text' size='15'>";
    echo "</p>";
    echo "<p>";
    echo "<input type='submit' name='submit' value='��������'>";
    echo "</form>";
    echo "<br />";
    echo "<p>Edit Comment to Player</p>";
    echo "<form action='editPlayerComment.php' method='post'>";
    echo "<p>";
    echo "<label>�����<br /></label>";
    echo "<input name='id' type='number' size='15' maxlength='15'>";
    echo "</p>";
    echo "<p>";
    echo "<label>�����������<br /></label>";
    echo "<input name='comment' type='text' size='15'>";
    echo "</p>";
    echo "<p>";
    echo "<input type='submit' name='submit' value='��������'>";
    echo "</form>";
    echo "<br />";
}

echo "<p>Add Comment to Player</p>";
echo "<form action='addPlayerComment.php' method='post'>";
echo "<p>";
echo "<label>�����<br /></label>";
echo "<input name='id' type='number' size='15' maxlength='15'>";
echo "</p>";
echo "<p>";
echo "<label>�����������<br /></label>";
echo "<input name='comment' type='text' size='15'>";
echo "</p>";
echo "<p>";
echo "<input type='submit' name='submit' value='��������'>";
echo "</form>";
echo "<br />";
?>

    <?php
ob_start();
require 'events.php';

$output = ob_get_clean();
echo $output;

if ($_SESSION['role'] == 'moder')
{
    echo "<p>Add Event</p>";
    echo "<form action='addEvent.php' method='post'>";
    echo "<p>";
    echo "<label>��������<br /></label>";
    echo "<input name='name' type='text' size='15' maxlength='15'>";
    echo "</p>";
    echo "<p>";
    echo "<label>����<br /></label>";
    echo "<input name='date' type='date' size='15'>";
    echo "</p>";
    echo "<p>";
    echo "<label>�����������<br /></label>";
    echo "<input name='comment' type='text' size='15'>";
    echo "</p>";
    echo "<p>";
    echo "<input type='submit' name='submit' value='��������'>";
    echo "</form>";
    echo "<br />";
    echo "<p>Edit Comment to Event</p>";
    echo "<form action='editEventComment.php' method='post'>";
    echo "<p>";
    echo "<label>�����<br /></label>";
    echo "<input name='id' type='number' size='15' maxlength='15'>";
    echo "</p>";
    echo "<label>��������<br /></label>";
    echo "<input name='name' type='text' size='15' maxlength='15'>";
    echo "</p>";
    echo "<p>";
    echo "<label>����<br /></label>";
    echo "<input name='date' type='date' size='15'>";
    echo "</p>";
    echo "<p>";
    echo "<label>�����������<br /></label>";
    echo "<input name='comment' type='text' size='15'>";
    echo "</p>";
    echo "<p>";
    echo "<input type='submit' name='submit' value='��������'>";
    echo "</form>";
    echo "<br />";
}

echo "<p>Add Comment to Event</p>";
echo "<form action='addEventComment.php' method='post'>";
echo "<p>";
echo "<label>�����<br /></label>";
echo "<input name='id' type='number' size='15' maxlength='15'>";
echo "</p>";
echo "<p>";
echo "<label>�����������<br /></label>";
echo "<input name='comment' type='text' size='15'>";
echo "</p>";
echo "<p>";
echo "<input type='submit' name='submit' value='��������'>";
echo "</form>";
echo "<br />";
?>
</body>

</html>
