<?php
require_once("server.php");

if(isset($_GET['DelID']))
{

    $itemID = $_GET['DelID'];
    $query = "DELETE FROM shareitem where s_itemID = '".$itemID."'";
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

