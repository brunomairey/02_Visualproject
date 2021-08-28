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

<!-- Modal Add a project-->
<div class="modal fade" id="addaproject" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add a project</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <!-- Beginning of the form add project -->
      <form class="contact-form" action="insertproject.php" method="POST" id="contact-form">
      <div class="modal-body">
        

			
			  <div class="form-group">
			    <label>Name of the project</label><h6 id="projectName-info" class="text-danger"></h6>
			    <input type="text" id="projectName" name="project_name" class="form-control" placeholder="Enter the name of the project">
			  </div>

			   <div class="form-group">
				    <label>Select starting week</label><h6 id="startingWeek-info" class="text-danger"></h6>

					    <select class="form-control" id="startingWeek" name="starting_week">
					       <?php for ($i = 45; $i <= 53; $i++) {
            					echo "<option>$i - 2020</option>" ;

          						}
            					for ($i = 1; $i <= 17; $i++) {
            					echo "<option>$i - 2021</option>" ;

        						 }
           						 ?>
					    </select>
				</div>


			  <div class="form-group">
			    <label>Duration in week</label><h6 id="duration-info" class="text-danger"></h6>
			    <input type="number" id="duration" name="project_duration" class="form-control" placeholder="Enter the number of weeks">
			  </div>
			  <div class="form-group">
			    <label>Number of ressources</label><h6 id="ressource-info" class="text-danger"></h6>
			    <input type="number" id="ressource" name="nb_ressource" class="form-control" placeholder="Enter the number of ressources">
			  </div>


			 	<div class="form-group">
    				<label>Color of the projects</label>

					      <select name="project_color" id="project-color" class="form-control">
					        <option value="#7bd148">#7bd148 - Green</option>
					        <option value="#5484ed">#5484ed - Bold blue</option>
					        <option value="#a4bdfc">#a4bdfc - Blue</option>
					        <option selected value="#46d6db">#46d6db - Turquoise</option>
					        <option value="#7ae7bf">#7ae7bf - Light green</option>
					        <option value="#51b749">#51b749 - Bold green</option>
					        <option value="#fbd75b">#fbd75b - Yellow</option>
					        <option value="#ffb878">#ffb878 - Orange</option>
					        <option value="#ff887c">#ff887c - Red</option>
					        <option value="#dc2127">#dc2127 - Bold red</option>
					        <option value="#dbadff">#dbadff - Purple</option>
					        <option value="#e1e1e1">#e1e1e1 - Gray</option>
					      </select>
					 
  				</div>
		
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" name="insertproject" class="btn btn-primary">Add the project</button>
      </div>
      	</form>
    </div>
  </div>
</div>

<!-- end of form add project -->

<!-- Begin Modal Edit a project-->
<div class="modal fade" id="editmodal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog">
    	<div class="modal-content">
      		<div class="modal-header">
	        	<h5 class="modal-title" id="exampleModalLabel">Update a project</h5>
	        	<button type="button" class="close" data-dismiss="modal" aria-label="Close">
	          		<span aria-hidden="true">&times;</span>
	        	</button>
		    </div>
		    <form class="contact-form" action="updateproject.php" method="POST" id="edit-form">
      		<div class="modal-body">
        		<input type="hidden" name="id_project" id="id_project">
				
			  		<div class="form-group">
			    		<label>Name of the project</label><h6 id="project_name-info" class="text-danger"></h6>
			    		<input type="text" id="project_name" name="project_name" class="form-control" placeholder="Enter the name of the project">
			  		</div>

			   		<div class="form-group">
				    	<label>Select starting week</label>

					    <select class="form-control"  name="starting_week">
					    	 <option hidden id="starting_week"></option>
					       <?php for ($i = 45; $i <= 53; $i++) {
            					echo "<option>$i - 2020</option>" ;

          						}
            					for ($i = 1; $i <= 17; $i++) {
            					echo "<option>$i - 2021</option>" ;

        						 }
           						 ?>
					    </select>
					</div>
				  	<div class="form-group">
				    	<label>Duration in week</label><h6 id="project_duration-info" class="text-danger"></h6>
				    	<input type="number" id="project_duration" name="project_duration" class="form-control" placeholder="Enter the number of weeks">
				  	</div>

				  	<div class="form-group">
				    	<label>Number of ressources</label><h6 id="nb_ressource-info" class="text-danger"></h6>
				    	<input type="number" id="nb_ressource" name="nb_ressource" class="form-control" placeholder="Enter the number of ressources">
				  	</div>

			 	<div class="form-group">
    				<label>Color of the projects</label>

					      <select name="project_color" id="project_color" class="form-control">
					        <option value="#7bd148">#7bd148 - Green</option>
					        <option value="#5484ed">#5484ed - Bold blue</option>
					        <option value="#a4bdfc">#a4bdfc - Blue</option>
					        <option selected value="#46d6db">#46d6db - Turquoise</option>
					        <option value="#7ae7bf">#7ae7bf - Light green</option>
					        <option value="#51b749">#51b749 - Bold green</option>
					        <option value="#fbd75b">#fbd75b - Yellow</option>
					        <option value="#ffb878">#ffb878 - Orange</option>
					        <option value="#ff887c">#ff887c - Red</option>
					        <option value="#dc2127">#dc2127 - Bold red</option>
					        <option value="#dbadff">#dbadff - Purple</option>
					        <option value="#e1e1e1">#e1e1e1 - Gray</option>
					      </select>
					 
  				</div>
    		</div>
		    <div class="modal-footer">
		        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
		        <button type="submit" name="updateproject" class="btn btn-primary">Update the project</button>
		    </div>
		    </form>
    	</div>
  	</div>
</div>

<!-- end of form edit project -->


<!-- Begin Modal Delete a project-->
<div class="modal fade" id="deletemodal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog">
    	<div class="modal-content">
      		<div class="modal-header">
	        	<h5 class="modal-title" id="exampleModalLabel">Delete this project</h5>
	        	<button type="button" class="close" data-dismiss="modal" aria-label="Close">
	          		<span aria-hidden="true">&times;</span>
	        	</button>
		    </div>
		    <form class="contact-form" action="deleteproject.php" method="POST">
      		<div class="modal-body">
        		<input type="hidden" name="id_delete" id="id_delete">
				<h3 class="text-danger m-5">Do you really want to delete this project?</h3>
			  		
    		</div>
		    <div class="modal-footer">
		        <button type="button" class="btn btn-primary" data-dismiss="modal">No, go back!</button>
		        <button type="submit" name="deleteproject" class="btn btn-danger">Yes, delete it!</button>
		    </div>
		    </form>
    	</div>
  	</div>
</div>

<!-- end of modal delete a  project -->
</main>
<?php include '../common/footer.php'; ?>

   <!-- begin fix the header -->
<!--    <script type="text/javascript">
  $(document).ready(function() { 
        var firstheight = $('.first').height();
        $("thead tr.second th, thead tr.second td").css("top", firstheight)
    });
  </script> -->
  <!-- End fix the header  -->

<!-- Begin Edit popupfile appel ligne 83-->

<script type="text/javascript">
	$(document).ready(function() {
		$('.editbtn').on('click', function() {
			$('#editmodal').modal('show');

				$span =$(this).closest('span');

				var data = $span.children('span').map(function() {
						return $(this).text();
				}).get();

				console.log(data);
				$('#id_project').val(data[0]);
				$('#project_name').val(data[1]);
				$('#starting_week').text(data[2]);
				$('#project_duration').val(data[3]);
				$('#nb_ressource').val(data[4]);
				$('#project_color').val(data[5]);


		})
	});

</script>

<!-- End Edit popupfile -->


<!-- Begin Delete popupfile appel ligne 96-->

<script type="text/javascript">
	$(document).ready(function() {
		$('.deletebtn').on('click', function() {
			$('#deletemodal').modal('show');

				$span =$(this).closest('span');

				var data = $span.children('span').map(function() {
						return $(this).text();
				}).get();

				console.log(data);
				$('#id_delete').val(data[0]);
			


		})
	});

</script>

<!-- End Delete popupfile -->
<!-- Validateur add a project -->
<script>
$(document).ready(function () {
   
    //Contact Form validation on click event
    $("#contact-form").on("submit", function () {
        var valid = true;
               
        var projectName = $("#projectName").val();
        var duration = $("#duration").val();
        var ressource = $("#ressource").val();
      

        if (projectName == "") {
            $("#projectName-info").html("This is a required field");
         	valid = false;
        }
             
        if (duration == "") {
            $("#duration-info").html("This is a required field");
            valid = false;
        }
        if (ressource == "") {
            $("#ressource-info").html("This is a required field");
            valid = false;
        }
        
        return valid;

    });
});
</script>
<!-- end of validator add a project -->

<!-- Validateur edit a project -->
<script>
$(document).ready(function () {
   
    //Contact Form validation on click event
    $("#edit-form").on("submit", function () {
        var valid = true;
            
        var projectName = $("#project_name").val();
        var duration = $("#project_duration").val();
        var ressource = $("#nb_ressource").val();
      

        if (projectName == "") {
            $("#project_name-info").html("This is a required field");
            valid=false;
        }
     
      
        if (duration == "") {
            $("#project_duration-info").html("This is a required field");
            valid = false;
        }
        if (ressource == "") {
            $("#nb_ressource-info").html("This is a required field");
            valid = false;
        }
        
        return valid;

    });
});
</script>
<!-- end of validator edit a project -->

<!-- sweetiealert -->
   
    <?php 
    if(isset($_SESSION['status']) && $_SESSION['status'] !='')
    {
    	?>
    	<script type="text/javascript">swal({
  title: "<?php echo $_SESSION['status'] ?>",
  // text: "You clicked the button!",
  icon: "<?php echo $_SESSION['status_code'] ?>",
  button: "<?php echo $_SESSION['status_button'] ?>",
});</script>
    	<?php
    	unset($_SESSION['status']);
    }
    ?>
 <!-- End of sweetie alert -->

   <script>
$(".form-control option").each(function() {


  $(this).css("background-color", $(this).val())
})
</script>
     
</body>
</html>