<!DOCTYPE html>
<html lang="en" dir="ltr">
    <head>
        <meta charset="utf-8">
        <title>
            Database Display
        </title>
</head>
<body>
    <table border = 1 cellspacing = 0 cellpadding = 10>
        <tr>
            <td>#</td>
            <td>Name</td>
            <td>Email</td>
            <td>Maps</td>
        </tr>

        <?php
        require 'server.php';
        $rows = mysqli_query($db, "SELECT * FROM useraccounts ORDER BY userID DESC");
        $i = 1;

        foreach($rows as $row):
        ?>
        <td><?php echo $i++;?></td>
        <td><?php echo $row["name"];?></td>
        <td><?php echo $row["email"];?></td>
        <td style = "width: 450px; height: 450px;">
        <iframe src='https://www.google.com/maps?q=<?php echo $row["latitude"];?>, <?php
        echo $row["longitude"];?>&hl=es;z=14&output=embed' style="width: 100%;
        height: 100%"></iframe>
    </td>
        

        <?php endforeach; ?>
    </table>
</body>
</html>