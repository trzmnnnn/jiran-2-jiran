<?php include('server.php'); ?>


<!DOCTYPE html?
<html>
<head>
<meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Jiran2Jiran</title>
  <link rel="stylesheet" type="text/css" href="styleRegister.css">
  <meta content="" name="description">

  <meta content="" name="keywords">

  <!-- Favicons -->


  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

</head>
<body    onload = "getLocation();">
<br><br>
    <div class="header">
        <h2>Daftar</h2>
    </div>
    
    <form class="myForm" method="post" action="register.php" autocomplete="off">
        <!------DISPLAY VALIDATION ERRORS HERE ----->

        <?php include('errors.php'); ?>

        <div class="input-group">
            <label>Nama</label>
            <input id="name" type="text" name="name" value="<?php echo $name; ?>">
        </div>
        <div class="input-group">
            <label>Emel</label>
            <input id="email" type="text" name="email" onkeyup="return validation()" value="<?php echo $email; ?>">
        </div>
     
        <small id="email_valid" style="font-style: italic">Email is valid</small>
        
        <input type="hidden" name="latitude" value="">
         <input type="hidden" name="longitude" value="">
        <div class="input-group">
            <label>Kata Kunci</label>
            <input type="password" name="password" id="pass1" onkeyup="return validate()">
        </div>
        <div class="input-group">
            <label>Pengesahan Kata Kunci</label>
            <input type="password" name="password2">
        </div>

                <div class="validate_password">
        <ul>
        <li id="upper">At least one uppercase</li>
        <li id="lower">At least one lowercase</li>
        <li id="special_char">At least one special symbol</li>
        <li id="number">At least one number</li>
        <li id="length">At least 6 characters</li>
        </ul>
        </div>


    
        
        <div class="input-group">
            <button type="submit" name="register" class="btn1">Daftar</button>
        </div>
        <p>
            Sudah berdaftar sebagai pengguna? <a href="loginUser.php">Log Masuk</a>
        </p>
    </form>
    <br>

    <script type="text/javascript">
            function getLocation(){
                if(navigator.geolocation){
                    navigator.geolocation.getCurrentPosition(showPosition, showError);
                }
            }

            function showPosition(position){
                document.querySelector('.myForm input[name = "latitude"]').value=
                position.coords.latitude;
                document.querySelector('.myForm input[name = "longitude"]').value=
                position.coords.longitude;
            }
            function showError(error){
                switch(error.code){
                    case error.PERMISSION_DENIED:
                        alert("You must allow the request for Geolocation to fill the form");
                        location.reload();
                        break;
                 }
            }
        </script>

<script>
function validation()
{
	var email=document.getElementById("email").value;
	var email_valid = document.getElementById('email_valid');
	var pattern = /^[^ ]+@[^ ]+\.[a-z]{2,3}$/;
	
if(email.match(pattern))
{
		email_valid.style.color = 'green';
	}
	else
	{
		email_valid.style.color='red';
	}
}
</script>

        <script>

function validate()
{

	var pass = document.getElementById('pass1');
	var upper = document.getElementById('upper');
	var lower = document.getElementById('lower');
	var num = document.getElementById('number');
	var len = document.getElementById('length');
	var sp_char = document.getElementById('special_char');
	
	// check if pass value contain a number
	if(pass.value.match(/[0-9]/)) {//match function used to match a regular expressions
		num.style.color = 'green';
	}
	else

	{
		num.style.color = 'red';
	}

	// check if pass value contain an uppercase
	if(pass.value.match(/[A-Z]/)) {//match function used to match a regular expressions
		upper.style.color = 'green';
	}
	else

	{
		upper.style.color = 'red'
	}
	// check if pass value contain a lowercase
	if(pass.value.match(/[a-z]/)) {//match function used to match a regular expressions
		lower.style.color = 'green';
	}
	else

	{
		lower.style.color = 'red';
	}
	// checking special symbols
		// check if pass value contain an uppercase
	if(pass.value.match(/[\!\@\#\$\%\^\&\*\(\)\_\+\=\?]/)) {//match function used to match a regular expressions
		sp_char.style.color = 'green';
	}
	else

	{
		sp_char.style.color = 'red';
	}

	//length of password
	if(pass.value.length < 6)
	{
		len.style.color = 'red';
	}
	else
	{
		len.style.color='green';
	}
	
}


</script>
</body>
</html>