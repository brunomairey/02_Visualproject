<!-- Begin Modal Delete a ressource-->
<div class="modal fade" id="deletemodal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Delete this ressource</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form class="contact-form" action="deleteressource.php" method="POST">
                <div class="modal-body">
                    <input type="hidden" name="id_delete" id="id_delete">
                    <h3 class="text-danger m-5">Do you really want to delete this ressource?</h3>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-dismiss="modal">No, go back!</button>
                    <button type="submit" name="deleteressource" class="btn btn-danger">Yes, delete it!</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- end of modal delete a  ressource -->
