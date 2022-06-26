<?php include('server.php'); ?>

<!DOCTYPE html?
<html>
<head>
<title>Jiran2Jiran</title>
        <link rel="stylesheet" type="text/css" href="styleRegister.css">
</head>
<body>
    <br><br><br><br><br><br>
    <div class="header">
        <h2>Log Masuk Admin</h2>
    </div>
            <form method="post" action="loginAdmin.php">
                <!------DISPLAY VALIDATION ERRORS HERE ----->
                <?php include('errors.php'); ?>
                <div class="input-group">
                    <label>Emel</label>
                    <input type="text" name="email">
                </div>
                <div class="input-group">
                    <label>Kata Kunci</label>
                    <input type="password" name="password">
                </div>
                <br>
                <div class="input-group" style="text-align: center;">
                    <button type="submit" name="loginAdmin" class="btn">Log Masuk</button>
                </div> 
                <br>
                <p style="text-align: center;">
                    <a href="landingPage.php">Kembali ke halaman utama</a>
                </p>
           
            </form>
        </div>
    </body>
</html>


