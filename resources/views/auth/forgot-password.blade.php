@extends('template')

@section('title', 'Recuperar Senha')

@section('content')
<div class="container py-5 d-flex justify-content-center">
    <div class="card shadow-lg rounded-4 p-5 col-md-5 mt-5 mb-5">
        <div class="text-center mb-4">
            <i class="material-icons fs-1 text-dark">lock_reset</i>
            <h2 class="fw-bold mt-2">Recuperar Senha</h2>
            <p class="text-muted">Informe seu e-mail para receber o link de redefinição</p>
        </div>

        {{-- Status da sessão --}}
        @if (session('status'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('status') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif

        <form method="POST" action="{{ route('password.email') }}">
            @csrf

            <!-- Email -->
            <div class="mb-3">
                <label for="email" class="form-label fw-bold">Email</label>
                <input id="email" type="email" 
                       class="form-control @error('email') is-invalid @enderror"
                       name="email" value="{{ old('email') }}" required autofocus>
                @error('email')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <!-- Botão -->
            <div class="d-grid">
                <button type="submit" class="btn btn-dark btn-lg">
                    Enviar link de redefinição
                </button>
            </div>
        </form>

        <hr class="my-4">

        <p class="text-center text-muted">
            Lembrou a senha? 
            <a href="{{ route('login') }}" class="fw-semibold text-decoration-none">
                Faça login
            </a>
        </p>
    </div>
</div>
@endsection
