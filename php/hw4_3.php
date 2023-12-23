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
$sql = "SELECT dp002_verb_display_zh_TW
FROM (SELECT COUNT(dp002_verb_display_zh_TW) as dp002_verb_display_zh_TW_count,dp002_verb_display_zh_TW
FROM edu_bigdata_imp1
WHERE dp002_verb_display_zh_TW <> 'NA'
GROUP BY dp002_verb_display_zh_TW)as d
ORDER BY dp002_verb_display_zh_TW_count DESC
LIMIT 3;";
$sth = $connection->prepare($sql);
$sth->execute();
$request = $sth->fetchAll();
foreach($request as $key =>$val){
    echo ($val[0]."<br/>");
}