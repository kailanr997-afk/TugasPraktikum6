@extends('layouts.app')
@section('content')
<h2>Daftar Laporan Warga</h2>
<table border="1" cellpadding="10" cellspacing="0" style="width:100%; margin-top:10px;">
    <tr><th>No</th><th>Nama</th><th>Alamat</th><th>Keterangan</th><th>Waktu</th></tr>
    @forelse($laporans as $i => $l)
    <tr><td>{{$i+1}}</td><td>{{$l->nama_pelapor}}</td><td>{{$l->alamat_lokasi}}</td><td>{{$l->keterangan}}</td><td>{{$l->created_at}}</td></tr>
    @empty
    <tr><td colspan="5" align="center">Belum ada laporan.</td></tr>
    @endforelse
</table>
@endsection