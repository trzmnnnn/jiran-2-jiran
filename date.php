<?php 

require 'server.php' ;

if(isset($_POST["refresh"]))
{

    $q = mysqli_query($db, "SELECT * FROM requestitem WHERE itemCat='Makanan';");
        while ($row = mysqli_fetch_array($q)){
            $postdate = $row["date"];
            $itemID = $row["itemID"];
            $expired_date = $row["expired_date"];
            date_default_timezone_set("Asia/Kuala_Lumpur");
            $today = date("Y-m-d");

            if($expired_date < $today)
            {
           

             $q_delete_expired = mysqli_query($db, "DELETE FROM requestitem WHERE itemID='$itemID';");
             
                // delete notifications
            }
        
            echo
            "<script>
            alert('Refresh!');
            document.location.href = 'myListing.php';
            </script>";


            }
         
}






   //echo "postdate"."$postdate"; 
  // echo "id"."$itemID"; 
   //echo "upcomingdays"."$upcomingdays";

 //  if($postdate < $upcomingdays)
 //  {
  //  echo "Oppsssss"; 
   // mysqli_query($db, "DELETE FROM requestitem WHERE item");
//}
// else{
//     echo "$postdate";
//     echo "$itemID";  
// }
// }



// if($postdate < $upcomingdays)
// {
// echo "Oppsssss"; 
// // mysqli_query($db, "DELETE FROM requestitem ");
// }

// else{
//  echo "$postdate";    
//  echo "$itemID";   
// }
    
?>




