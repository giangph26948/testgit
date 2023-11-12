<?php
session_start();
$id = $_GET['id'];
$sql = "select * from taxi_companies where id = '$id'";
$connect = new PDO("mysql:host=127.0.0.1;dbname=thi_17_08;charset=utf8","root","");
$stmt = $connect->prepare($sql);
$stmt->execute();
$data = $stmt->fetchAll();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<h2>Sửa thông tin</h2>
    <form action="save-edit.php" method="post" enctype="multipart/form-data">
        <?php foreach($data as $value) :?>
        <input type="hidden" name="id" value="<?= $id ?>">
        <div>
            Name:
            <input type="text" name="name" value="<?= $value['name'] ?> ">
            <?php if(isset($_GET['nameerr'])): ?>
            <span style="color:red ;"><?= $_GET['nameerr']?></span>
            <?php endif?>
        </div>
        <div>
        slogan:
        <input type="text" name="slogan" value="<?= $value['slogan']?>">
                <?php if(isset($_GET['sloganerr'])): ?>
            <span style="color:red ;"><?= $_GET['sloganerr']?></span>
            <?php endif?>
        </div>
        <div>
            logo:
            <input type="file" name="logo" value="<?= $value['logo']?>">
        </div>
        <div>
        country:
        <input type="text" name="country" value="<?= $value['country']?>">
        <?php if(isset($_GET['countryerr'])): ?>
            <span style="color:red ;"><?= $_GET['countryerr']?></span>
            <?php endif?>
        </div>
        <div>
            created_at:
            <input type="datetime-local" name="created_at"  value="<?= $value['created_at']?>">
            <?php if(isset($_GET['created_aterr'])): ?>
            <span style="color:red ;"><?= $_GET['created_aterr']?></span>
            <?php endif?>
        </div>
        <div>
            updated_at:
            <input type="datetime-local" name="updated_at" value="<?= $value['updated_at']?>">
            <?php if(isset($_GET['updated_aterr'])): ?>
            <span style="color:red ;"><?= $_GET['updated_aterr']?></span>
            <?php endif?>
        </div>
        <div>
            <button type="submit">Lưu</button>
        </div>
        <?php endforeach; ?>
    </form>
</body>
</html>