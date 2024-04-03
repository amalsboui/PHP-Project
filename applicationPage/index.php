
<div class="modal fade" tabindex="-1" role="dialog"  aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="application form">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form method="post"action="save_file.php" enctype="multipart/form-data">
       <div class="modal-body">
          <input type="file" name="cv" >
          <label for="motivation" ></label>
          <textarea name="motivation" class="form-control" cols="30" rows="10"></textarea>

      </div>
      <div class="modal-footer">
      <input type="hidden"  name="suffix" value="11">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary" name="submit">Save changes</button>
      </div>
</form>
    </div>
  </div>

</div>