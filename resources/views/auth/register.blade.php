@extends('layouts.app')
@section('content')
<section class="auth-card">
    <p class="eyebrow">Akun petugas</p>
    <h1 class="page-heading">Daftarkan petugas</h1>
    <p class="page-description">Buat akun untuk mengakses daftar laporan dan informasi petugas.</p>
    @if($errors->any())
        <div class="error" role="alert">
            <ul>@foreach($errors->all() as $e)<li>{{ $e }}</li>@endforeach</ul>
        </div>
    @endif
    <form class="auth-form" action="{{ route('register') }}" method="POST">
        @csrf
        <div class="field">
            <label for="name">Nama</label>
            <input id="name" type="text" name="name" value="{{ old('name') }}" autocomplete="name" required>
        </div>
        <div class="field">
            <label for="email">Email</label>
            <input id="email" type="email" name="email" value="{{ old('email') }}" autocomplete="email" required>
        </div>
        <div class="field">
            <label for="password">Password</label>
            <input id="password" type="password" name="password" autocomplete="new-password" required>
        </div>
        <div class="field">
            <label for="password_confirmation">Konfirmasi password</label>
            <input id="password_confirmation" type="password" name="password_confirmation" autocomplete="new-password" required>
        </div>
        <button class="button" type="submit">Buat akun</button>
    </form>
</section>
@endsection
