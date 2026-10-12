<?php
$host = "localhost";
$user = "root";     // ناڤێ بەکارهێنەرێ لۆکەل
$pass = "";         // پاسوۆرد (ب ڤالاھی دهێلیت ل سەر localhost)
$db   = "nasmat_db";

try {
    $pdo = new PDO("mysql:host=$host;dbname=$db;charset=utf8mb4", $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("تێکچوونا گرێدانا داتابێسێ: " . $e->getMessage());
}
?>