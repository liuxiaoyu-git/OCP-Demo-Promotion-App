<?php
$dbhost = getenv("MYSQL_SERVICE_HOST");
$dbport = getenv("MYSQL_SERVICE_PORT");
$dbuser = getenv("DATABASE_USER");
$dbname = getenv("DATABASE_NAME");
$dbpwd = getenv("DATABASE_PASSWORD");
$connection = mysqli_connect($dbhost.":".$dbport, $dbuser, $dbpwd, $dbname) or die("Error " . mysqli_error($connection));
$sql = "insert into AB values('discount','buy')";
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
                <image src="discount.png" /><br>
                <font size="16" color="#FF0000">谢谢你喜欢50%的折扣促销方案！ </font>
            </td>
        </tr>
    </table>
</div>
</html>
