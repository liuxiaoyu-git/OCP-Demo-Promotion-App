<?php
$dbhost = getenv("MYSQL_SERVICE_HOST");
$dbport = getenv("MYSQL_SERVICE_PORT");
$dbuser = getenv("DATABASE_USER");
$dbname = getenv("DATABASE_NAME");
$dbpwd = getenv("DATABASE_PASSWORD");
$connection = mysqli_connect($dbhost.":".$dbport, $dbuser, $dbpwd, $dbname) or die("Error " . mysqli_error($connection));
$sql = "select AppVersion,COUNT(case when Step='buy' then 1 end)/COUNT(case when Step='look' then 1 end) as BuyRate from AB group by AppVersion";
$rs = $connection->query($query);
?>
<html>
<div id="box">
    <table width="100%" height="100%">
        <tr>
            <td align="center">
<?php
while ($row = mysqli_fetch_assoc($rs)) {
    echo "应用版本: ".$row['AppVersion'] . " 购买率: " . $row['BuyRate'] . "<br>";
}
mysqli_close($connection);
?>
            </td>
        </tr>
    </table>
</div>
</html>
