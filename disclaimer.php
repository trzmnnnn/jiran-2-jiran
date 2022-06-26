
<?php

require_once ("server.php");


$q = mysqli_query($db, "SELECT * FROM useraccounts WHERE email='$_SESSION[email]' ;");
                            
?>
<?php $row = mysqli_fetch_assoc($q);
  $userID = $row['userID']; 
  $myname = $row['name'];
  ?>




<link href="disclaimer.css" rel="stylesheet">
<html>
    <body>
        <div class="popup">
            <div class="contentBox">
                <div class="close"></div>
          
                <div class="content">
                    <div>
                        <br>
                        <hr>
                        <h3 style="text-align: center;">Alert</h3>
                        <hr>
                    </div>
                    <br><br><br>
                    <?php 



                    $mysql = "SELECT * FROM notifications INNER JOIN requestitem ON notifications.itemID=requestitem.itemID 
                    INNER JOIN useraccounts ON notifications.from_ID = useraccounts.userID WHERE email='$_SESSION[email]' ORDER BY notifications.noti_date ASC LIMIT 1 ;";
                    $result =  mysqli_query($db, $mysql);
                    if(mysqli_num_rows($result) > 0){
                    
                    while ($row = mysqli_fetch_array($result)){
                    $itemID = $row['itemID'];
                    $itemImage = $row['image'];
                    $itemName = $row['itemName'];
                    $name = $row['email'];
                    $to_ID = $row['to_ID'];
                    $date = $row['date'];
                    $receipient = $row['giver'];
                    $requester = $row['name'];

      ?>
                              <div class="card" style="width: 250px; height: 180px;">
                                                                <img class="card-img-top" src="img/<?php echo $row['image']; ?>" width="200px" height="250px" class="img-responsive">
                                                              </div>
                                  <h3 class="card-title" style="text-align: center";><hr><strong>Nama Barang: <?php echo $itemName;?></strong></hr></h3>
                                  <p class="card-text">Diminta Pada: </strong><br> <?php echo $date;?></br></p>
                                  <p class="card-text">Diminta Oleh: </strong><br> <?php echo $to_ID;?></br></p>
                              
                                </a>
                             </div>     
                        </div>
                    </div>
                </div>
        <?php
            }
        }?>
  </div>

        <script>
            const popup = document.querySelector('.popup');
            const close = document.querySelector('.close');


            window.onload = function()
            {
                setTimeout(function(){
                    popup.style.display = "block";
                },1000)
            }

            close.addEventListener('click', ()=>{
                popup.style.display = "none";
            })
        </script>
    </body>
</html>