<?php
require_once("server.php");

if(isset($_GET['Del']))
{

    $adminID = $_GET['Del'];
    $query = "DELETE FROM adminaccounts where adminID = '".$adminID."'";
    $result = mysqli_query($db, $query);

    if($result)
    {
        header("location: adminPanel.php");
    }
    else{
        echo 'Please check your query';
    }
}
else{
    header("location: adminPanel.php");
}
?>

