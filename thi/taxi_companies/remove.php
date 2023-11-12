<?php
session_start();
$id = $_GET['id'];
$removeQuery = "delete from taxi_companies where id = $id";
$connect = new PDO("mysql:host=127.0.0.1;dbname=thi_17_08;charset=utf8","root","");
$stmt = $connect->prepare($removeQuery);
$stmt->execute();
header('location: index.php');
?>