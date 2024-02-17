<h4>{{ $tingkatTitles[$tingkat] }}</h4>
@if(count($files) > 0)
    <div class="container section-bukti">
        <div class="row">
            <div class="col">
                <table class="table table-hover align-middle">
                    <thead>
                        <tr>
                            <th scope="col">File bukti Dukung</th>
                            <th scope="col">Hasil</th>
                            <th scope="col">Reasons</th>
                            <th scope="col">Action</th>
                            <th scope="col">Last Updated</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($files as $file)
                            <tr>
                                <td><a href="{{ asset('/storage/'.$file->filename) }}">Download File</a></td>
                                <td>
                                    @if($file->disetujui === null)
                                        Lagi Diperiksa
                                    @elseif($file->disetujui)
                                        Disetujui
                                    @else
                                        Tidak Disetujui
                                    @endif  
                                </td>
                                <td>{{ $file->reason ?? '-' }}</td>
                                <td>
                                    @if(Auth::check() && Auth::user()->admin)
                                        <button type="button" class="btn btn-primary" onclick="showActionModal({{ $file->id }}, 'approve')">Approve</button>
                                        <button type="button" class="btn btn-danger" onclick="showActionModal({{ $file->id }}, 'disapprove')">Disapprove</button>
                                    @endif
                                        <button type="button" class="btn btn-secondary" onclick="confirmDelete({{ $file->id }});">Delete</button>
                                </td>
                                <td>{{ $file->updated_at->format('d/m/Y H:i') }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    
@else
    <p>No files</p>
@endif

<!-- At the bottom of your Blade file that lists the files -->
@include('partials.approval_modal')

    
<script>
    // Function to show the modal

    
    function showActionModal(id, actionType) {
        // Set the file ID and action type in the modal's form
        document.getElementById('fileId').value = id;
        document.getElementById('actionType').value = actionType;
        
        // Change the modal title based on the action
        document.getElementById('actionModalLabel').innerText = actionType.charAt(0).toUpperCase() + actionType.slice(1) + ' Confirmation';

        // Show the modal
        $('#actionModal').modal('show');
    }

    // Function to submit the action
    // function submitAction() {
    //     var id = document.getElementById('fileId').value;
    //     var actionType = document.getElementById('actionType').value;
    //     var reason = document.getElementById('reason').value;
        
    //     // AJAX POST request with jQuery
        
    //     $.post('/your-endpoint', {
    //         fileId: id,
    //         action: actionType,
    //         reason: reason,
    //         _token: '{{ csrf_token() }}' // CSRF token for Laravel
    //     }, function(data, status){
    //         // Handle the response from the server
    //         console.log(data);
    //         $('#actionModal').modal('hide');
    //         // Optionally, refresh the page or update the UI
    //     });
    // }

    function submitAction() {
        var id = document.getElementById('fileId').value;
        var actionType = document.getElementById('actionType').value;
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
                // Refresh page or update UI as needed
            },
            error: function(xhr, status, error) {
                // Handle the error response
                console.error("Error:", xhr.responseText, status, error);
                // Display an error message to the user
            }
        });
    }


    
    // Event listener for the submit button
    document.getElementById('submitActionBtn').addEventListener('click', submitAction);

    // Function to confirm deletion
    function confirmDelete(id) {
        if(confirm('Are you sure you want to delete this file?')) {
            // Replace this with your deletion logic, possibly another AJAX call
        }
    }
</script>

    
    

{{-- @foreach($files as $file)
<div class="mb-2 card">
    <div class="card-header">
        <a href="{{ asset('/storage/'.$file->filename) }}">Download File</a>
    </div>
    <div class="card-body">
        <div class="file-status">
            <span>
                @if($file->disetujui === null)
                    Lagi Diperiksa
                @elseif($file->disetujui)
                    Disetujui
                    @if($file->reason)
                        <p>Alasan: {{ $file->reason }}</p>
                    @endif
                @else
                    Tidak Disetujui
                    @if($file->reason)
                        <p>Alasan: {{ $file->reason }}</p>
                    @endif
                @endif
            </span>
        </div>
        
        @if(Auth::check() && Auth::user()->admin)
            <div class="admin-actions d-grid gap-2 d-md-block">
                <!-- Approve and disapprove buttons with space between -->
                <button type="button" class="btn btn-success me-1" onclick="showApprovalForm({{ $file->id }});">Approve</button>
                <button type="button" class="btn btn-warning me-1" onclick="showDisapprovalForm({{ $file->id }});">Disapprove</button>
                
            </div>

            <!-- Approve form -->
            <div id="approve-form-{{ $file->id }}" style="display: none;">
                <form action="{{ route('file.approve', $file->id) }}" method="POST">
                    @csrf
                    <textarea name="reason" placeholder="Enter reason for approval (optional)"></textarea>
                    <button type="submit" class="btn btn-success">Submit Approval</button>
                </form>
            </div>

            <!-- Disapprove form -->
            <div id="disapprove-form-{{ $file->id }}" style="display: none;">
                <form action="{{ route('file.disapprove', $file->id) }}" method="POST">
                    @csrf
                    <textarea name="reason" placeholder="Enter reason for disapproval" required></textarea>
                    <button type="submit" class="btn btn-warning">Submit Disapproval</button>
                </form>
            </div>
        @endif


        <!-- Delete file button -->
        <button type="button" class="btn btn-danger mt-2" onclick="confirmDelete({{ $file->id }});">Delete File</button>

        <!-- Delete file form outside the admin-actions div to prevent accidental submissions -->
        <form id="delete-form-{{ $file->id }}" action="{{ route('files.destroy', $file->id) }}" method="POST" style="display: none;">
            @csrf
            @method('DELETE')
            
        </form>

    </div>
</div>
@endforeach --}}












    

