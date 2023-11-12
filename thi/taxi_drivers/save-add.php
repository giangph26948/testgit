<?php
session_start();

$connect = new PDO("mysql:host=127.0.0.1;dbname=thi_17_08;charset=utf8","root","");
$name = $_POST['name'];
$company_id = $_POST['company_id'];
$taxi_plate = $_POST['taxi_plate'];
$avatar = $_FILES['avatar'];
$joined_date = $_POST['joined_date'];
$salary = $_POST['salary'];
$created_at = $_POST['created_at'];
$updated_at = $_POST['updated_at'];

$nameerr = "";
$company_iderr = "";
$taxi_plateerr = "";
$joined_dateerr = "";
$salaryerr = "";
$created_aterr = "";
$updated_aterr = "";
if(strlen($name) == 0){
    $nameerr = 'hãy nhập name';
}
if(strlen($company_id) == 0){
    $company_iderr = 'hãy nhập company_id';
}
if(strlen($taxi_plate) == 0){
    $taxi_plateerr = 'hãy nhập taxi_plate';
}
if(strlen($joined_date) == 0){
    $joined_dateerr = 'hãy nhập joined_date';
}
if(strlen($salary) == 0){
    $salaryerr = 'hãy nhập salary';
}else{
    $sqlCheckSalary = "select count(*) as total from taxi_drivers where salary = '$salary'";

    $stmt = $connect->prepare($sqlCheckSalary);

    $stmt->execute();
    
    $countData = $stmt->fetch();

    if($countData['total'] > 0){
        $salaryerr = "salary đã tồn tại, vui lòng chọn salary khác";
    }
}
if(strlen($created_at) == 0){
    $created_aterr = 'hãy nhập created_at';
}
if(strlen($updated_at) == 0){
    $updated_aterr = 'hãy nhập updated_at';
}
if(!empty($nameerr) || !empty($company_iderr) || !empty($taxi_plateerr) || !empty($joined_dateerr) || !empty($salaryerr) || !empty($created_aterr) || !empty($updated_aterr)){
    header("location: add.php?nameerr=$nameerr&company_iderr=$company_iderr&taxi_plateerr=$taxi_plateerr&joined_dateerr=$joined_dateerr&salaryerr=$salaryerr&created_aterr=$created_aterr&updated_aterr=$updated_aterr");
    die;
}

if($avatar['size'] > 0){
    $avatarName =  './upload/' . uniqid() . '-' . $avatar['name'];
    move_uploaded_file($avatar['tmp_name'], $avatarName);
};
$insertQuery = "insert into taxi_drivers(name,company_id,taxi_plate,avatar,joined_date,salary,created_at,updated_at) values('$name','$company_id','$taxi_plate','$avatarName','$joined_date','$salary','$created_at','$updated_at')";
$stmt = $connect->prepare($insertQuery);
$stmt->execute();
header('location: index.php')
?>