@extends('layouts.app')
@section('content')
<p class="eyebrow">Layanan tanggap darurat</p>
<h1 class="page-heading">Laporkan kejadian banjir</h1>
<p class="page-description">Bantu petugas merespons lebih cepat. Lengkapi informasi lokasi dan kondisi yang Anda temui.</p>

<form action="{{ route('laporan.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="form-grid">
        <div class="field">
            <label for="nama_pelapor">Nama pelapor</label>
            <input id="nama_pelapor" type="text" name="nama_pelapor" value="{{ old('nama_pelapor') }}" autocomplete="name" required>
        </div>
        <div class="field">
            <label for="alamat_lokasi">Alamat / lokasi kejadian</label>
            <input id="alamat_lokasi" type="text" name="alamat_lokasi" value="{{ old('alamat_lokasi') }}" placeholder="Contoh: Jl. Melati No. 10, Kecamatan ..." required>
        </div>
        <div class="field field-wide">
            <label for="keterangan">Keterangan kondisi</label>
            <textarea id="keterangan" name="keterangan" placeholder="Jelaskan ketinggian air, kondisi warga, atau akses jalan..." required>{{ old('keterangan') }}</textarea>
        </div>
        <div class="field field-wide">
            <label for="foto">Foto kejadian <span style="color: var(--muted); font-weight: 500;">(opsional)</span></label>
            <input id="foto" type="file" name="foto" accept="image/*">
            <span class="field-hint">Unggah foto untuk membantu petugas memahami situasi di lokasi.</span>
        </div>
        <div class="form-actions">
            <button class="button" type="submit">Kirim laporan</button>
        </div>
    </div>
</form>
@endsection
