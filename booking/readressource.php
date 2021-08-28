
  	<?php
          $sql = "SELECT * FROM ressource WHERE fk_user=".$_SESSION['user'];
          
           $result = $connect->query($sql);

if($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {

?>
  <span style="border: 1px solid black; padding: 2px; margin: 2px;"><?= $row['ressource_name'] ?> <br> <?= $row['ressource_type'] ?></span>
 

        <?php ;
               }
           } else  {
               echo  "No result";
           } 

           ?>


