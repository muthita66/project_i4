<?php
$host = 'localhost';
$user = 'root';
$pass = '';
$dbname = 'art_gellery';

$connect = new mysqli($host, $user, $pass, $dbname);

if (!$connect) {
    die("Connection failed: ". mysqli_connect($connect));
} else {
    mysqli_set_charset($connect, 'utf8');
}
?>