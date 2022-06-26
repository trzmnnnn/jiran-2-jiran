<?php require 'server.php' ?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
    <head>
        <meta charset="utf-8">
        <title>Data</title>
    </head>
    <body>
        <table border = 1 cellspacing = 0 cellpadding = 10>
            <tr>
                <td>#</td>
                <td>Nama Barang</td>
                <td>Deskripsi Barang</td>
                <td>Kategori</td>
                <td>Gambar Barang</td>
            </tr>
            <?php 
            $i = 1;
            $rows = mysqli_query($db, "SELECT * FROM requestitem ORDER BY itemID DESC");
            ?>
            <?php foreach($rows as $row) : ?>
                <tr>
                    <td><?php echo $i++;?></td>
                    <td><?php echo $row["itemName"];?></td>
                    <td><?php echo $row["itemDesc"];?></td>
                    <td><?php echo $row["itemCat"];?></td>
                    <td><img src="img/<?php echo $row["image"]; ?>" width = 200 title ="<?php echo $row["image"]; ?>"></td>
                </tr>
                <?php endforeach; ?>
        </table>
    </body>
</html>
