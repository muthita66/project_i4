<?php
$host = '172.31.38.87';
$user = 'galleryDB';
$dbname = 'art_gellery';
$pass = '123456';

$connect = new mysqli($host, $user, $pass, $dbname);

if (!$connect) {
    die("Connection failed: ". mysqli_connect($connect));
} else {
    mysqli_set_charset($connect, 'utf8');
}
?>