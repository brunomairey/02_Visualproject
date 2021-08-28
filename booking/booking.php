
<?php 

include '../common/database_connection.php';

?>

  <link rel="stylesheet" href="../common/styletable.css">

</head>
<body>
  <!-- <div class="containersticky" style="position: sticky;"> -->
<?php include '../common/nav.php'; ?>
 <main>

  <div class="container-fluid" >
<div class="fixed-table-container complex" style="height: 60vh">
      <div class="header-background"> </div>
      <div class="fixed-table-container-inner">
		<!-- style="height:59vh;" -->

<table class=" table-hover table-bordered" cellspacing="0" >
  <!-- class='table table-hover table-bordered display' border=1 style="table-layout: fixed; width: 100%;" -->

<div style="position: relative; top:0; background-color: grey">
 
   <thead > <tr class="complex-top">
    <!-- how to make a sticky table -->
    <th class="first" colspan="6">
      <div class="th-inner">Projects   </div></th>
<!-- Button trigger modal -->
  <th class="first" colspan="4">
  
  </th>
        <th colspan="4" class="second text-center"><div class="th-inner"> November 2020</div> </th>
        <th colspan="5" class="second text-center"><div class="th-inner"> December 2020 </div></th> <th colspan="4" class="second text-center"><div class="th-inner"> Jan 2021 </div></th><th colspan="4" class="second text-center"><div class="th-inner"> Feb 2021</div> </th>
        <th colspan="5" class="second text-center"><div class="th-inner"> March 2021 </div></th>
        <th colspan="4" class="second text-center"><div class="th-inner"> April 2021 </div></th>
  </tr>
  <tr class="complex-bottom">
    <th class="first text-center" colspan="10" ><div class="th-inner">Week number</div></th>
    <!-- style="cursor: pointer" onclick='alert("the world is mine")' -->
  <?php for ($i = 45; $i <= 53; $i++) {
  echo "<th class='second text-center'><div class='th-inner'>$i</div></th>" ;

  }
for ($i = 1; $i <= 17; $i++) {
  echo "<th class='second text-center'><div class='th-inner'>$i</div></th>" ;

  }


  ?></tr>
  </thead>
</div>
 <tbody>
 <?php include 'readproject.php'; ?>
   </tbody>
</table>
		</div>
    </div>
</div>
			
<!-- End of container for projects -->
<div class="container-fluid">
<div class="fixed-table-container complex" style="height: 30vh">
  <div class="d-flex align-content-start flex-wrap">
  here are the ressources
  <?php include 'readressource.php'; ?>
</div>
</div></div>
<?php include 'insertmodal.php'; ?>
<?php include 'updatemodal.php'; ?>
<?php include 'deletemodal.php'; ?>


</main>
<?php include '../common/footer.php'; ?>

    

 <script src='project.js'></script>
<!-- sweetiealert -->
   
    <?php 
    if(isset($_SESSION['status']) && $_SESSION['status'] !='')
    {
        ?>
        <script type="text/javascript">
          swal({
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



     
</body>
</html>

<!-- 
              <tr>
    <th colspan="5">En cliquant ici on a un apercu des ressources - ne pas oublier que le nom du projet fait office de receptionneur du drag and drop</th>
    <td colspan="5"></td><td colspan="20" style="background-color: lightblue;">Ici est le lieu pour editer ou supprimer un projet en apparation alert/popup - hoover effect lorsque le client approche son clique</td><td colspan="1"></td>
    </tr>