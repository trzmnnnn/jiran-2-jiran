<?php
require_once("server.php");

if(isset($_GET['Del']))
{

    $itemID = $_GET['Del'];
    $query = "DELETE FROM requestitem where itemID = '".$itemID."'";
    $result = mysqli_query($db, $query);


    echo
    "<script>
    alert('Terima kasih atas mengemaskini status barang!');
 
    document.location.href = 'myHelp.php';
    </script>";
}
?>

