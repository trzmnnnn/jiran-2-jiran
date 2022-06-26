<?php
require_once("server.php");

if(isset($_GET['Del']))
{

    $userID = $_GET['Del'];
    $query = "DELETE FROM useraccounts where userID = '".$userID."'";
    $result = mysqli_query($db, $query);

    if($result)
    {
        header("location: viewUser.php");
    }
    else{
        echo 'Please check your query';
    }
}
else{
    header("location: viewUser.php");
}
?>

