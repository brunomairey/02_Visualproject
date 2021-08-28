<?php 

include '../common/database_connection.php';

?>

<style type ="text/css">

/*.table-wrapper{
  overflow-y: scroll;
  height: 59vh;
}*/

/*.table-wrapper thead{
    position: sticky;
    top: 0;
}*/

/*   table {
       table-layout: fixed
       height: 59vh;
       border-collapse: collapse;
       width: 100%;
       margin: 10px;
       font-size: 0.8em;
   }

   thead tr.first th, thead tr.first td {
       position: sticky;
       position: -webkit-sticky; /* Safari */
    /*   top:0;
       background: #eee;
   }

   thead tr.second th, thead tr.second td {
       position: sticky;
       position: -webkit-sticky; /* Safari */
     /*  background: #eee;
   }*/

/*tbody, thead{
  display: block;
}*/
/*tbody{
  height:50vh;
  overflow-y: scroll;
}*/



</style>

</head>
<body>
  <!-- <div class="containersticky" style="position: sticky;"> -->
<?php include '../common/nav.php'; ?>
 <main>

  <div class="container-fluid table-wrapper">

		<!-- style="height:59vh;" -->

<table id="projecttableid" class='table table-hover table-bordered display' border=1 style="table-layout: fixed; width: 100%; ">

<div style="position: relative; top:0; background-color: grey">
 
   <thead > <tr class="first">
    <!-- how to make a sticky table -->
    <th colspan="7">Projects   
<!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addaproject" style="cursor: pointer;">+</button>

    

  </th>
        <th colspan="4" class="text-center"> November 2020 </th>
                <th colspan="5" class="text-center"> December 2020 </th> <th colspan="4" class="text-center"> Jan 2021 </th><th colspan="4" class="text-center"> Feb 2021 </th>
                <th colspan="5" class="text-center"> March 2021 </th>
                <th colspan="4" class="text-center"> April 2021 </th>
  </tr>
  <tr class="second">
    <th colspan="7" class="text-center" >Week number</th>
    <!-- style="cursor: pointer" onclick='alert("the world is mine")' -->
  <?php for ($i = 45; $i <= 53; $i++) {
  echo "<th class='text-center'>$i</th>" ;

  }
for ($i = 1; $i <= 17; $i++) {
  echo "<th class='text-center'>$i</th>" ;

  }


  ?></tr>
  </thead>
</div>

  <tbody>
  	<?php
           $sql = "SELECT * FROM project";
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
    <th colspan="7"><?= $row['project_name'] ?>
      
<span style="float:right">
           <button type="button" class="btn btn-info btn-sm mx-1 editbtn"  id="<?= $row['id_project']?>">Edit</button> 
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

            <button type="button" class="btn btn-danger btn-sm mx-1 deletebtn"  id="<?= $row['id_project']?>">Del.</button>

   </span>
    </th>
    
<?php if($project_before!=0){ ?>
    <td colspan="<?= $project_before ?>"></td>
 <?php } ?>
<?php if($project_duration!=0){ ?>
    <td colspan="<?= $project_duration ?>" style="background-color: <?= $row['project_color'] ?>; cursor: pointer;"></td>
<?php } ?>
<?php if($project_after>0){ ?>
    <td colspan="<?= $project_after ?>"></td>
 <?php } ?>

   <!--  rajouter une inversion de couleur en fonction de l'id :) -->
    </tr>

        <?php ;
               }
           } else  {
               echo  "No result";
           } 

           ?>
<!-- 
              <tr>
    <th colspan="5">En cliquant ici on a un apercu des ressources - ne pas oublier que le nom du projet fait office de receptionneur du drag and drop</th>
    <td colspan="5"></td><td colspan="20" style="background-color: lightblue;">Ici est le lieu pour editer ou supprimer un projet en apparation alert/popup - hoover effect lorsque le client approche son clique</td><td colspan="1"></td>
    </tr>

  <tr>
      <th colspan="5">Project Name coming in php </th>
  <td colspan="5">3 callspans to define</td><td colspan="5"> before the project</td><td style="background-color: coral;" colspan="10"> - the project to be fulfilled with a background color</td><td colspan="6">After the project is before the project</td></tr> -->
   
  </tbody>
</table>
		
</div>
			
<!-- End of container for projects -->





