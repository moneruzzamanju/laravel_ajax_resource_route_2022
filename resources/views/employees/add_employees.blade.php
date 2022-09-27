<!-- Modal -->
<div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="addModalLabel" aria-hidden="true">
    <form action="" method="POST" id="addEmployeeForm">
        @csrf
        <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="addModalLabel">Add Employee</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                <div class="errorMessageContainer mb-3">

                </div>
                <div class="form-group">
                    <label for="name">Employee Name</label>
                    <input type="text" class="form-control" name="name" id="name">
                </div>
                <div class="form-group mt-3">
                    <label for="basic">Employee Basic</label>
                    <input type="text" class="form-control" name="basic" id="basic">
                </div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary add_employee">Save Employee</button>
              </div>
            </div>
          </div>
    </form>
</div>