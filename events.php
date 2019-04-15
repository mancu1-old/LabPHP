<?php
include ("bd.php");

$query = 'SELECT id,name,comment,time FROM events';
$result = mysql_query($query) or die('Запрос не удался: ' . mysql_error());
echo "<br />";
echo "<h2>Game</h2>";
echo "<table>\n";
echo "<tr>";
echo "<td>\t#</td>";
echo "<td>\tEvent</td>";
echo "<td>\tComment</td>";
echo "<td>\tData</td>";
echo "</tr>";

while ($line = mysql_fetch_array($result, MYSQL_ASSOC))
{
    echo "\t<tr>\n";
    foreach($line as $col_value)
    {
        echo "\t\t<td>$col_value</td>\n";
    }

    echo "\t</tr>\n";
}

echo "</table>\n";
mysql_free_result($result);
?>