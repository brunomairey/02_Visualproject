
  	<?php
           $sql = "SELECT * FROM project WHERE fk_user=".$_SESSION['user'];
          
           $result = $connect->query($sql);

if($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {

$project_before = $row['starting_week'];
if ($project_before >=45 && $project_before <=56){
  $project_before -= 45;

} elseif( $project_before>0 && $project_before <=17){
  $project_before +=8;
  
} else {echo" i is outside of the field";}
        

$project_duration = $row['project_duration'];
$project_before_and_duration = $project_duration + $project_before;
$project_after = 26 - $project_before_and_duration ;
if($project_before_and_duration>=26){ 
$project_duration = 26 - $project_before; } ?>

  <tr>
    <td colspan="10"><?= $row['project_name'] ?>
      
<span style="float:right">
       
           <span style="display:none"><?= $row['id_project'] ?></span>
           <span style="display:none"><?= $row['project_name'] ?></span>

           <?php 
           $i = $row['starting_week'];
           if ($i >= 45) { $year = " - 2020";}
           else {$year = " - 2021";} ?>

           <span style="display:none"><?= $row['starting_week'] . $year ?></span>
           <span style="display:none"><?= $row['project_duration'] ?></span>
           <span style="display:none"><?= $row['nb_ressource'] ?></span>
           <span style="display:none"><?= $row['project_color'] ?></span>


   </span>
    </td>
    
<?php if($project_before!=0){ ?>
    <td colspan="<?= $project_before ?>"></td>
 <?php } ?>
<?php if($project_duration!=0){ ?>
    <td colspan="<?= $project_duration ?>" style="background-color: <?= $row['project_color'] ?>; cursor: pointer; ">
    

       <div class="d-flex align-content-start flex-wrap">
 
      
<span style="border: 1px solid black; padding: 2px; margin: 2px;">Bruno</span>
<span style="border: 1px solid black; padding: 2px; margin: 2px;">Jean Maxime</span>
<span style="border: 1px solid black;padding: 2px; margin: 2px;">Bernard</span>
<span style="border: 1px solid black; padding: 2px; margin: 2px;">Thierry</span>
<span style="border: 1px solid black; padding: 2px; margin: 2px;">Jean Michel</span>
<span style="border: 1px solid black; padding: 2px; margin: 2px;">Philippe Lucas</span>

</div> 
    </td>
<?php } ?>
<?php if($project_after>0){ ?>
    <td colspan="<?= $project_after ?>"></td>
 <?php } ?>

   <!--  rajouter une inversion de couleur en fonction de l'id :) utiliser un count++-->
    </tr>

        <?php ;
               }
           } else  {
               echo  "No result";
           } 

           ?>

