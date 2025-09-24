<?php
$db_host = '172.31.41.54';   
$db_name = 'webuser';        
$db_user = 'gallery_db';     
$db_pass = '123456';         

$dsn = "mysql:host=$db_host;dbname=$db_name;charset=utf8mb4";

// ตั้งค่า Options สำหรับ PDO
$options = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION, // แจ้ง Error แบบ Exception
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,       // ดึงข้อมูลเป็น Associative Array
    PDO::ATTR_EMULATE_PREPARES   => false,                  
];

// เชื่อมต่อ PDO
try {
    $pdo = new PDO($dsn, $db_user, $db_pass, $options);
} catch (PDOException $e) {
    die("<h1>Connection failed</h1><p>" . $e->getMessage() . "</p>");
}
?>
