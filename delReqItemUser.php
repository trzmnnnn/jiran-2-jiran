<?php
require_once("server.php");

if(isset($_GET['Del']))
{

    $itemID = $_GET['Del'];
    $query = "DELETE FROM requestitem where itemID = '".$itemID."'";
    $result = mysqli_query($db, $query);

    echo
    "<script>
    alert('Tahniah berjaya mendapatkan pertolongan.');
 
    document.location.href = 'myListing.php';
    </script>";
}
?>

