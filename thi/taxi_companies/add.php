<?php
session_start();
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
    <h1>Thêm</h1>
    <form action="save-add.php" method="post" enctype="multipart/form-data">
        <div>
            Name:
            <input type="text" name="name" id="">
            <?php if(isset($_GET['nameerr'])): ?>
            <span style="color:red ;"><?= $_GET['nameerr']?></span>
            <?php endif?>
        </div>
        <div>
        slogan:
        <input type="text" name="slogan" id="">
                <?php if(isset($_GET['sloganerr'])): ?>
            <span style="color:red ;"><?= $_GET['sloganerr']?></span>
            <?php endif?>
        </div>
        <div>
            logo:
            <input type="file" name="logo" id="">
        </div>
        <div>
        country:
        <input type="text" name="country" id="">
        <?php if(isset($_GET['countryerr'])): ?>
            <span style="color:red ;"><?= $_GET['countryerr']?></span>
            <?php endif?>
        </div>
        <div>
            created_at:
            <input type="datetime-local" name="created_at" id="">
            <?php if(isset($_GET['created_aterr'])): ?>
            <span style="color:red ;"><?= $_GET['created_aterr']?></span>
            <?php endif?>
        </div>
        <div>
            updated_at:
            <input type="datetime-local" name="updated_at" id="">
            <?php if(isset($_GET['updated_aterr'])): ?>
            <span style="color:red ;"><?= $_GET['updated_aterr']?></span>
            <?php endif?>
        </div>
        <div>
            <button type="submit">Lưu</button>
        </div>
    </form>
</body>
</html>