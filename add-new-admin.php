<?php
require_once("server.php");

if(isset($_POST['addAdmin'])){

            
    $q = mysqli_query($db, "SELECT * FROM adminaccounts WHERE email='$_SESSION[email]' ;");
    $row = mysqli_fetch_assoc($q);
  
 

    
    $name = $_POST['name'];
    $email = $_POST['email'];
    

    
    $query ="INSERT INTO adminaccounts VALUES ('','$name', '$email', 0, CURRENT_TIMESTAMP,1)";
    $query_run = mysqli_query($db, $query);

    echo
    "<script>
    alert('Admin telah ditambah');
 
    document.location.href = 'adminPanel.php';
    </script>";
    
}
?>
