<!-- Modal -->


<div class="modal fade" data-bs-backdrop="static" id="actionModal" tabindex="-1" role="dialog" aria-labelledby="actionModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="actionModalLabel">Action Confirmation</h5>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
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
                
                <button type="button" class="btn btn-primary" onclick="submitActionBtn('approve')">Approve</button>
                <button type="button" class="btn btn-danger" onclick="submitActionBtn('disapprove')">Disapprove</button>
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

@section('scripts')

<script>
    // Function to show the modal

    function confirmDelete(id) {
        if(confirm('Are you sure you want to delete this file?')) {
            document.getElementById('delete-form-' + id).submit();
        }
    }


    function showActionModal(id) {
        // Set the file ID and action type in the modal's form
        document.getElementById('fileId').value = id;

        // Show the modal
        $('#actionModal').modal('show');
    }

    function submitActionBtn(actionType) {
        // e.preventDefault();
        var id = document.getElementById('fileId').value;
        var reason = document.getElementById('reason').value;

        // Determine the correct URL based on actionType
        var url = "";
        switch (actionType) {
            case "approve":
                url = "/files/" + id + "/approve";
                break;
            case "disapprove":
                url = "/files/" + id + "/disapprove";
                break;
            default:
                console.error("Invalid action type:", actionType);
                return; // Or handle invalid action type differently
        }

        // Perform the AJAX POST request
        $.ajax({
            url: url,
            type: "POST",
            data: {
                _token: "{{ csrf_token() }}", // CSRF protection
                reason: reason // Reason for the action
            },
            success: function(data, status) {
                // Handle the successful response
                console.log("Success:", data);
                $('#actionModal').modal('hide');
                location.reload();
            },
            error: function(xhr, status, error) {
                // Handle the error response
                console.error("Error:", xhr.responseText, status, error);
                // Display an error message to the user
            }
        });
    };

</script>


@endsection


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
  