<?php require 'server.php';

if(isset($_POST['insertdata'])){

    $name = $_POST['name'];
    $email = $_POST['email'];
    $phoneNumber = $_POST['phoneNumber'];
    $notes=$_POST['notes'];
    $from_ID=$_POST['from_ID'];
    $to_ID=$_POST['to_ID'];
    

    $query = "INSERT INTO notifications (name, email, phoneNumber, notes, from_ID) VALUES ('$name','$email','$phoneNumber', 
    '$notes', '$from_ID')";
    $query_run = mysqli_query($db, $query);

    if($query_run)
    {
        echo '<script> alert("Data Saved"); </script>';
        header('Location: tryDisplay.php');
    }
    else
    {
        echo '<script> alert("Data Not Saved"); </script>';
    }
}


?>