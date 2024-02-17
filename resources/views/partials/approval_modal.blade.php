<!-- Modal -->


<div class="modal fade" data-bs-backdrop="static" data-backdrop="false" id="actionModal" tabindex="-1" role="dialog" aria-labelledby="actionModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="actionModalLabel">Action Confirmation</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="approvalForm">
                    @csrf
                    <div class="form-group">
                        <label for="reason">Reason:</label>
                        <textarea class="form-control" id="reason" name="reason"></textarea>
                    </div>
                    <input type="hidden" name="actionType" id="actionType">
                    <input type="hidden" name="fileId" id="fileId">
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" id="submitActionBtn">Submit</button>
            </div>
        </div>
    </div>
</div>


{{-- <div class="modal fade" id="actionModal" tabindex="-1" role="dialog" aria-labelledby="actionModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="actionModalLabel">Action Confirmation</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <form id="approvalForm">
                @csrf
                <div class="form-group">
                    <label for="reason">Reason:</label>
                    <textarea class="form-control" id="reason" name="reason"></textarea>
                </div>
                <!-- Hidden inputs for action type and file ID -->
                <input type="hidden" name="actionType" id="actionType">
                <input type="hidden" name="fileId" id="fileId">
            </form>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary" id="submitActionBtn">Submit</button>
        </div>
        
      </div>
    </div>
</div> --}}
  