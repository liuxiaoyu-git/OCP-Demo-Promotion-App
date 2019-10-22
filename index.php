<?php
$dbhost = getenv("MYSQL_SERVICE_HOST");
$dbport = getenv("MYSQL_SERVICE_PORT");
$dbuser = getenv("DATABASE_USER");
$dbname = getenv("DATABASE_NAME");
$dbpwd = getenv("DATABASE_PASSWORD");
$connection = mysqli_connect($dbhost.":".$dbport, $dbuser, $dbpwd, $dbname) or die("Error " . mysqli_error($connection));
$sql = "insert into AB values('buy1get1','look')";
if ($connection->query($sql) !== TRUE) {  
    echo "发生数据库操作错误";  
} 
mysqli_close($connection);
?>

<html>
<div id="box">
    <table width="100%" height="100%">
        <tr>
            <td align="center">
                <a href="makedeal.php"><image src="B1G1.png" /></a>
                <font size="16" color="#FF0000"><br>买iPhoneX送手机壳！<br>如果你喜欢，<a href="makedeal.php">就快来剁手吧</a></font>
            </td>
        </tr>
    </table>
</div>
</html>
