<div class="modal fade" id="edit_<?php echo $rec['bookID']; ?>" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Edit Book</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <form method="POST" action="editbook.php?id=<?php echo $rec['bookID']; ?>">
        <div class="modal-body">
          ISBN: <input type="text" class="form-control" name="txtIsbn" aria-describedby="ISBN" value="<?php echo $rec['isbn']; ?>">
          Title: <input type="text" class="form-control" name="txtTitle" aria-describedby="Title" value="<?php echo $rec['title']; ?>">
          Author: <input type="text" class="form-control" name="txtAuthor" aria-describedby="Author" value="<?php echo $rec['author']; ?>">
          Publisher: <input type="text" class="form-control" name="txtPublisher" aria-describedby="Publisher" value="<?php echo $rec['publisher']; ?>">
          Copyright Year: <input type="text" class="form-control" name="txtCYear" idaria-describedby="Copyright Year" value="<?php echo $rec['copyright_year']; ?>">
          Status: <select class="form-control" name="txtStatus" value="<?php echo $rec['status']; ?>">
              <option name="New">New</option>
              <option name="Old">Old</option>
              <option name="Damage">Damage</option>
              <option name="Archive">Archive</option>
              <option name="Lost">Lost</option>
              </select>
            <div class="modal-footer">
              <button type="submit" name="edit" value="Save" class="btn btn-primary">Update</a>
            </form>
          </div>
        </div>
  </div>
</div>