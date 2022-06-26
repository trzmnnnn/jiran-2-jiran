<?php
require_once("server.php");

if(isset($_GET['Del']))
{

    $from_ID = $_GET['Del'];
    $query = "DELETE FROM notifications where from_ID = '".$from_ID."'";
    $result = mysqli_query($db, $query);

    if($result)
    {
        header("location: myHelp.php");
    }
    else{
        echo 'Please check your query';
    }
}
else{
    header("location: myHelp.php");
}
?>

