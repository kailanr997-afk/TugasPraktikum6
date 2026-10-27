@extends('layouts.app')
@section('content')
<section class="auth-card">
    <p class="eyebrow">Area petugas</p>
    <h1 class="page-heading">Selamat datang kembali</h1>
    <p class="page-description">Masuk untuk melihat dan mengelola laporan banjir yang masuk.</p>
    @if($errors->any())
        <div class="error" role="alert">{{ $errors->first() }}</div>
    @endif
    <form class="auth-form" action="{{ route('login') }}" method="POST">
        @csrf
        <div class="field">
            <label for="email">Email</label>
            <input id="email" type="email" name="email" value="{{ old('email') }}" autocomplete="username" required>
        </div>
        <div class="field">
            <label for="password">Password</label>
            <input id="password" type="password" name="password" autocomplete="current-password" required>
        </div>
        <button class="button" type="submit">Login</button>
    </form>
</section>
@endsection
