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
                        <input type="text" id="projectName" name="project_name" class="form-control"
                               placeholder="Enter the name of the project">
                    </div>

                    <div class="form-group">
                        <label>Select starting week</label><h6 id="startingWeek-info" class="text-danger"></h6>

                        <select class="form-control" id="startingWeek" name="starting_week">
                            <?php for ($i = 45; $i <= 53; $i++) {
                                echo "<option>$i - 2020</option>";

                            }
                            for ($i = 1; $i <= 17; $i++) {
                                echo "<option>$i - 2021</option>";

                            }
                            ?>
                        </select>
                    </div>


                    <div class="form-group">
                        <label>Duration in week</label><h6 id="duration-info" class="text-danger"></h6>
                        <input type="number" id="duration" name="project_duration" class="form-control"
                               placeholder="Enter the number of weeks">
                    </div>
                    <div class="form-group">
                        <label>Number of ressources</label><h6 id="ressource-info" class="text-danger"></h6>
                        <input type="number" id="ressource" name="nb_ressource" class="form-control"
                               placeholder="Enter the number of ressources">
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
