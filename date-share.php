<?php 

require 'server.php' ;

if(isset($_POST["refreshshare"]))
{

    $q = mysqli_query($db, "SELECT * FROM shareitem WHERE s_itemCat='Makanan';");
        while ($row = mysqli_fetch_array($q)){
            $postdate = $row["s_date"];
            $itemID = $row["s_itemID"];
            $expired_date = $row["s_expired_date"];
            date_default_timezone_set("Asia/Kuala_Lumpur");
            $today = date("Y-m-d");

            if($expired_date < $today)
            {
           

             $q_delete_expired = mysqli_query($db, "DELETE FROM shareitem WHERE s_itemID='$itemID';");
             
                // delete notifications
            }
        
            echo
            "<script>
            alert('Refresh!');
            document.location.href = 'myListing.php';
            </script>";


            }
         
}

    
?>




