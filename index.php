<?php

$dbhost = getenv("MYSQL_SERVICE_HOST");
$dbport = getenv("MYSQL_SERVICE_PORT");
$dbuser = getenv("DATABASE_USER");
$dbname = getenv("DATABASE_NAME");
$dbpwd = getenv("DATABASE_PASSWORD");
$connection = mysqli_connect($dbhost.":".$dbport, $dbuser, $dbpwd, $dbname) or die("Error " . mysqli_error($connection));

$sql = "insert into AB values('discount','')";
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
                <font size="16" color="#FF0000">我们所有的商品都可享受50%的折扣！如果你喜欢，<a href="makedeal.php">就快来剁手</a></font>
            </td>
        </tr>
    </table>
</div>
</html>
