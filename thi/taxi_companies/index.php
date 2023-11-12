<?php
session_start();
$sqlQuery = "select * from taxi_companies";
$connect = new PDO("mysql:host=127.0.0.1;dbname=thi_17_08;charset=utf8","root","");
$stmt = $connect->prepare($sqlQuery);
$stmt->execute();
$data = $stmt->fetchAll();
?>
<h2 align="center" >taxi_companies</h2>
<table border="1" align="center">
    <thead>
        <tr>
            <th>id</th>
            <th>name</th></th>
            <th>slogan</th>
            <th>logo</th>
            <th>country</th>
            <th>created_at</th>
            <th>updated_at</th>
            <th>
                <a href="add.php">Thêm</a>
            </th>
        </tr>
    </thead>
    <tbody>
        <?php foreach($data as $value) :?>
            <tr>
                <td>
                    <?= $value['id']?>
                </td>
                <td>
                <?= $value['name']?>
                </td>
                <td>
                <?= $value['slogan']?>
                </td>
                <td>
                <img src="<?= $value['logo']?>" width="150">
                </td>
                <td>
                <?= $value['country']?>
                </td>
                <td>
                <?= $value['created_at']?>
                </td>
                <td>
                <?= $value['updated_at']?>
                </td>
                <td>
                    <a href="edit.php?id=<?= $value['id']?>">Sửa</a>
                    <a href="remove.php?id=<?= $value['id']?>">Xóa</a>
                </td>
            </tr>
            <?php endforeach; ?>
    </tbody>
</table>

