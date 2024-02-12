@if(Auth::check() && Auth::user()->admin)
    <div class="card my-3">
        <div class="card-body">
            <form action="{{ route('indikator.approve') }}" method="POST" class="form-inline">
                @csrf
                <input type="hidden" name="indikator" value="{{ $indikator }}">
                <input type="hidden" name="domain" value="kualitas-data">
                <input type="hidden" name="aspek" value="Relevansi">
                
                <div class="form-group mb-2">
                    <input type="radio" id="approve-{{ $indikator }}" name="disetujui" value="1" class="form-check-input" {{ $indikatorApproval && $indikatorApproval->disetujui ? 'checked' : '' }}>
                    <label for="approve-{{ $indikator }}" class="form-check-label">Setujui</label>
                </div>
                
                <div class="form-group mb-2">
                    <input type="radio" id="disapprove-{{ $indikator }}" name="disetujui" value="0" class="form-check-input" {{ $indikatorApproval && !$indikatorApproval->disetujui ? 'checked' : '' }}>
                    <label for="disapprove-{{ $indikator }}" class="form-check-label">Tidak Setujui</label>
                </div>
                
                <div class="form-group mx-sm-3 mb-2">
                    <select name="tingkat" class="form-select">
                        @for($i = 1; $i <= 5; $i++)
                            <option value="{{ $i }}" {{ $indikatorApproval && $indikatorApproval->tingkat == $i ? 'selected' : '' }}>Tingkat {{ $i }}</option>
                        @endfor
                    </select>
                </div>
                
                <div class="form-group mx-sm-3 mb-2">
                    <textarea name="reason" class="form-control" placeholder="Alasan (opsional)">{{ $indikatorApproval->reason ?? '' }}</textarea>
                </div>
                
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
@endif
