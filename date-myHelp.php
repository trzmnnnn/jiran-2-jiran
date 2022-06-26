<?php 

require 'server.php' ;

if(isset($_POST["refresh"]))
{

    $q = mysqli_query($db, "SELECT * FROM notifications INNER JOIN requestitem ON notifications.itemID=requestitem.itemID 
    INNER JOIN useraccounts ON notifications.from_ID = useraccounts.userID WHERE email='$_SESSION[email]';");
        while ($row = mysqli_fetch_array($q)){
            $selectdate = $row["noti_date"];
            $itemID = $row["itemID"];
            $from_ID = $row["from_ID"];
            $expired_date = $row["expired_date"];
            date_default_timezone_set("Asia/Kuala_Lumpur");
            $today = date("Y-m-d");

            if($selectdate < $today)
            {
           

             $q_delete_expired = mysqli_query($db, "DELETE FROM notifications WHERE from_ID ='$from_ID';");
             
                // delete notifications
            }
        
            echo
            "<script>
            alert('Refresh!');
            document.location.href = 'myHelp.php';
            </script>";


            }
         
}


    
?>




