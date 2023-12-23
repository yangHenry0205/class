<?php
$serverName = "mysql:3306";   // host,運行於XAMPP時使用localhost即可。
$userName   = "root";        // 資料庫之使用者名稱，XAMPP預設root
$password   = "admin";            // 資料庫使用者密碼，XAMPP預設空
$db         = "mysql";        // 欲連接的資料庫名稱

try {
    $connection = new PDO("mysql:host=$serverName;dbname=$db", $userName, $password);
    $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Connection successful!" . '<br>';
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}
$sql = "SELECT dp001_video_item_sn,dp001_indicator
FROM edu_bigdata_imp1
WHERE PseudoID = 281
GROUP BY dp001_video_item_sn,dp001_indicator";
$sth = $connection->prepare($sql);
$sth->execute();
$request = $sth->fetchAll();
foreach ($request as $key => $value) {
    echo ($value[0] . " " . $value[1] . "<br/>");
}
