<h4>{{ $tingkatTitles[$tingkat] }}</h4>
@if(count($files) > 0)
    @foreach($files as $file)
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
    @endforeach
@else
    <p>No files</p>
@endif

<script>
    function showApprovalForm(id) {
        document.getElementById('approve-form-' + id).style.display = 'block';
        document.getElementById('disapprove-form-' + id).style.display = 'none';
    }
    
    function showDisapprovalForm(id) {
        document.getElementById('disapprove-form-' + id).style.display = 'block';
        document.getElementById('approve-form-' + id).style.display = 'none';
    }
    
    function confirmDelete(id) {
        if(confirm('Are you sure you want to delete this file?')) {
            document.getElementById('delete-form-' + id).submit();
        }
    }
</script>
