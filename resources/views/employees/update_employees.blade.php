<!-- Modal -->
<div class="modal fade" id="updateModal" tabindex="-1" aria-labelledby="updateModalLabel" aria-hidden="true">
    <form action="" method="POST" id="updateEmployeeForm">
        @csrf
        <input type="hidden" id="update_id">
        <input type="hidden" name="_method" value="PUT">

        <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="updateModalLabel">Update Employee</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                <div class="errorMessageContainer mb-3">

                </div>
                <div class="form-group">
                    <label for="name">Employee Name</label>
                    <input type="text" class="form-control" name="update_name" id="update_name">
                </div>
                <div class="form-group mt-3">
                    <label for="basic">Employee Basic</label>
                    <input type="text" class="form-control" name="update_basic" id="update_basic">
                </div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary update_employee">Update Employee</button>
              </div>
            </div>
          </div>
    </form>
</div>