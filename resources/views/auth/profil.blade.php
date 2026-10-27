@extends('layouts.app')
@section('content')
<p class="eyebrow">Area petugas</p>
<h1 class="page-heading">Profil petugas</h1>
<p class="page-description">Informasi akun yang digunakan untuk mengelola laporan.</p>
<ul class="profile-list">
    <li><strong>Nama</strong>{{ Auth::user()->name }}</li>
    <li><strong>Email</strong>{{ Auth::user()->email }}</li>
    <li><strong>Terdaftar sejak</strong>{{ Auth::user()->created_at }}</li>
</ul>
@endsection
