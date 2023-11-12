<?php
session_start();

$connect = new PDO("mysql:host=127.0.0.1;dbname=thi_17_08;charset=utf8","root","");
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
    header("location: add.php?nameerr=$nameerr&sloganerr=$sloganerr&countryerr=$countryerr&created_aterr=$created_aterr&updated_aterr=$updated_aterr");
    die;
}

if($logo['size'] > 0){
    $logoName =  './upload/' . uniqid() . '-' . $logo['name'];
    move_uploaded_file($logo['tmp_name'], $logoName);
};
$insertQuery = "insert into taxi_companies(name,slogan,logo,country,created_at,updated_at) values('$name','$slogan','$logoName','$country','$created_at','$updated_at')";
$stmt = $connect->prepare($insertQuery);
$stmt->execute();
header('location: index.php')
?>