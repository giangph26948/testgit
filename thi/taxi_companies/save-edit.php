<?php
session_start();
$connect = new PDO("mysql:host=127.0.0.1;dbname=thi_17_08;charset=utf8","root","");
$id = $_POST['id'];
$name = $_POST['name'];
$slogan = $_POST['slogan'];
$logo = $_FILES['logo'];
$country = $_POST['country'];
$created_at = $_POST['created_at'];
$updated_at = $_POST['updated_at'];

$nameerr = "";
$sloganerr = "";
$countryerr = "";
$created_aterr = "";
$updated_aterr = "";
if(strlen($name) == 0){
    $nameerr = 'hãy nhập name';
}
if(strlen($slogan) == 0){
    $sloganerr = 'hãy nhập slogan';
}
if(strlen($country) == 0){
    $countryerr = 'hãy nhập country';
}
if(strlen($created_at) == 0){
    $created_aterr = 'hãy nhập created_at';
}
if(strlen($updated_at) == 0){
    $updated_aterr = 'hãy nhập updated_at';
}
if(!empty($nameerr) || !empty($sloganerr) || !empty($countryerr) || !empty($created_aterr) || !empty($updated_aterr)){
    header("location: edit.php?id=$id&nameerr=$nameerr&sloganerr=$sloganerr&countryerr=$countryerr&created_aterr=$created_aterr&updated_aterr=$updated_aterr");
    die;
}

if($logo['size'] > 0){
    $logoName =  './upload/' . uniqid() . '-' . $logo['name'];
    move_uploaded_file($logo['tmp_name'], $logoName);
};

$sqlQuery = "UPDATE taxi_companies SET
name='$name',
slogan='$slogan',
logo='$logoName',
country='$country',
created_at='$created_at',
updated_at='$updated_at'
where id = '$id'
";


$stmt = $connect->prepare($sqlQuery);
$stmt->execute();
header('location:index.php');
?>