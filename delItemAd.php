<?php
require_once("server.php");

if(isset($_GET['Del']))
{

    $itemID = $_GET['Del'];
    $query = "DELETE FROM requestitem where itemID = '".$itemID."'";
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
    header("location: viewItem.php");
}
?>

