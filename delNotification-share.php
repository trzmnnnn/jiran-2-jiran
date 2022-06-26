<?php
require_once("server.php");

if(isset($_GET['DelID']))
{

    $notiID = $_GET['DelID'];
    $query = "DELETE FROM s_notifications where notiID = '".$notiID."'";
    $result = mysqli_query($db, $query);

    echo
    "<script>
    alert('Sila kemas kini status barang permintaan anda!');
 
    document.location.href = 'getNotification.php';
    </script>";
}
?>

