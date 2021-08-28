	<nav class="navbar navbar-expand-lg sticky-top navbar-dark bg-dark">
  <a class="navbar-brand" href="<?php echo $url ?>">The visual project</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav">
      <li class="nav-item active">
        <a class="nav-link" href="">Viewer<span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="project/project.php">Projects</a>
      </li>
       <li class="nav-item active">
        <a class="nav-link" href="ressource/ressource.php">Ressources</a>
      </li>
       <li class="nav-item active">
        <a class="nav-link" href="">Create constraint</a>
      </li>
       <li class="nav-item active">
        <a class="nav-link" href="">Solver ressources</a>
      </li>
       </ul>
    </div>
    <?php echo $logoutlink ?>
 </nav>