
import pandas as pd

df = pd.read_csv("./data/edu_bigdata_imp1.csv",encoding="big5",low_memory=False)

df_filtered = df[df["PseudoID"]==71]
df_filtered = df_filtered[df_filtered["dp001_record_plus_view_action"]=="paused"]

print(len(df_filtered))<?php
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
$sql = "SELECT COUNT(*)
FROM edu_bigdata_imp1
WHERE PseudoID = 71 AND dp001_record_plus_view_action = 'paused'";
$sth = $connection->prepare($sql);
$sth->execute();
$request = $sth->fetchColumn();
echo ($request);
