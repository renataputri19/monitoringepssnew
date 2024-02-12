<div class="card mb-2">
    <div class="card-body">
        @if($indikatorApproval)
            <p class="card-text">Status: <strong>{{ $indikatorApproval->disetujui ? 'Disetujui' : 'Tidak Disetujui' }}</strong></p>
            <p class="card-text">Tingkat: <strong>{{ $indikatorApproval->tingkat }}</strong></p>
            <p class="card-text">Alasan: {{ $indikatorApproval->reason ?? 'N/A' }}</p>
        @else
            <p class="card-text">Indikator belum diperiksa</p>
        @endif
    </div>
</div>
