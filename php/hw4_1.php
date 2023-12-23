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
$sql = "SELECT dp001_review_sn 
FROM(
    SELECT COUNT(dp001_review_sn) as dp001_review_sn_count,dp001_review_sn
     FROM edu_bigdata_imp1 
     GROUP BY dp001_review_sn)as d 
     WHERE dp001_review_sn_count = (
        SELECT MAX(dp001_review_sn_count) 
        FROM( SELECT COUNT(dp001_review_sn) as dp001_review_sn_count,dp001_review_sn 
        FROM edu_bigdata_imp1 
        GROUP BY dp001_review_sn)as t
        );";
$sth = $connection->prepare($sql);
$sth->execute();
$request = $sth->fetchALL();
foreach($request as $key =>$val){
    echo ($val[0]."<br/>");
}
