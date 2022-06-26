<?php
require_once("server.php");
if(isset($_POST['submitprofile']))
{

    $userID  = $_GET['ID'];
    $name = $_POST['name'];
    $email = $_POST['email'];

    $query = " UPDATE profilepicture set userID='".$userID."', image='".$image."' WHERE userID='".$userID."'";
    $result = mysqli_query($db, $query);
    if($result)
    {
        header("location:profile.php");
    }
    else{
        echo 'Please check your query';
    }
}

else{
 header("location:profile.php");
}
?>
