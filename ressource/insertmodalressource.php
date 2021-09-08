<!-- Modal Add a ressource-->
<div class="modal fade" id="addaressource" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add a ressource</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <!-- Beginning of the form add ressource -->
            <form class="contact-form" action="insertressource.php" method="POST" id="contact-form">
                <div class="modal-body">


                    <div class="form-group">
                        <label>Name of the ressource</label><h6 id="ressource-name-info" class="text-danger"></h6>
                        <input type="text" id="ressource-name" name="ressource_name" class="form-control"
                               placeholder="Enter the name of the ressource">
                    </div>

                    <div class="form-group">
                        <label>Type of the ressource</label><h6 id="ressource-type-info" class="text-danger"></h6>
                        <input type="text" id="ressource-type" name="ressource_type" class="form-control"
                               placeholder="Enter the type of the ressource">
                    </div>

                    <div class="form-group">
                        <label>Ressource status</label>

                        <select id="ressource-status" name="ressource_status" class="form-control">
                            <option selected>Available</option>
                            <option>Booked</option>
                        </select>

                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" name="insertressource" class="btn btn-primary">Add the ressource</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- end of form add ressource -->
