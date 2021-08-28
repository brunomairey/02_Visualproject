

<!-- Begin Modal Edit a ressource-->
<div class="modal fade" id="editmodal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
      <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Update a ressource</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <form class="contact-form" action="updateressource.php" method="POST" id="edit-form">
          <div class="modal-body">
            <input type="hidden" name="id_ressource" id="id_ressource">
        
            <div class="form-group">
              <label>Name of the ressource</label><h6 id="ressource_name-info" class="text-danger"></h6>
              <input type="text" id="ressource_name" name="ressource_name" class="form-control" placeholder="Enter the name of the ressource">
            </div>

            <div class="form-group">
              <label>Type of ressources</label><h6 id="ressource_type-info" class="text-danger"></h6>
              <input type="text" id="ressource_type" name="ressource_type" class="form-control" placeholder="Enter the type of ressources">
            </div>

        <div class="form-group">
            <label>Status of the ressource</label>

                <select name="ressource_status" class="form-control">
                 <option hidden id="ressource_status"></option>
                   <option>Available</option>
                  <option>Booked</option>
                </select>
           
          </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" name="updateressource" class="btn btn-primary">Update the ressource</button>
        </div>
        </form>
      </div>
    </div>
</div>

<!-- end of form edit ressource -->