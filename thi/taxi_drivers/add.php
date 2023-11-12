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
            company_id:
            <input type="number" name="company_id" id="">
            <?php if(isset($_GET['company_iderr'])) :?>
                <span style="color: red;"><?= $_GET['company_iderr']?> </span>
                <?php endif ?>
        </div>
        <div>
        taxi_plate:
        <input type="text" name="taxi_plate" id="">
                <?php if(isset($_GET['taxi_plateerr'])): ?>
            <span style="color:red ;"><?= $_GET['taxi_plateerr']?></span>
            <?php endif?>
        </div>
        <div>
            avatar:
            <input type="file" name="avatar" id="">
        </div>
        <div>
        joined_date:
        <input type="date" name="joined_date" id="">
        <?php if(isset($_GET['joined_dateerr'])): ?>
            <span style="color:red ;"><?= $_GET['joined_dateerr']?></span>
            <?php endif?>
        </div>
        <div>
        salary:
            <input type="number" name="salary" id="">
            <?php if(isset($_GET['salaryerr'])): ?>
            <span style="color:red ;"><?= $_GET['salaryerr']?></span>
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