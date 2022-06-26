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
        <h2>Log Masuk Pengguna</h2>
    </div>
    <form method="post" action="loginUser.php">
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
            <button type="submit" name="login" class="btn">Log Masuk</button>
        </div>
        <p style="text-align: center;">
            Tidak mempunyai akaun? <a href="register.php">Daftar Sekarang</a>
        </p>
    </form>
</body>
</html>