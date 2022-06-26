<?php
require_once("server.php");

if(isset($_GET['DelID']))
{

    $itemID = $_GET['DelID'];
    $query = "DELETE FROM requestitem where itemID = '".$itemID."'";
    $result = mysqli_query($db, $query);

    if($result)
    {
        header("location: viewItem.php");
    }
    else{
        echo 'Please check your query';
    }
}
else{
    header("location: viewItem.php");
}
?>

