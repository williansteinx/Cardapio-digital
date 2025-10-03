@extends('template')

@section('title', 'Login')

@section('content')
<div class="container d-flex justify-content-center align-items-center" style="min-height: 70vh;">
    <div class="card shadow-lg p-4 col-md-4 py-5">
        <h2 class="text-center text-orange-600 mb-4">Acesse sua conta</h2>

        <!-- Status da sessão -->
        @if (session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
        @endif

        <form method="POST" action="{{ route('login') }}">
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

            <!-- Senha -->
            <div class="mb-3">
                <label for="password" class="form-label fw-bold">Senha</label>
                <input id="password" type="password"
                       class="form-control @error('password') is-invalid @enderror"
                       name="password" required>
                @error('password')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <!-- Lembrar-me -->
            <div class="form-check mb-3">
                <input class="form-check-input" type="checkbox" name="remember" id="remember">
                <label class="form-check-label" for="remember">
                    Lembrar-me
                </label>
            </div>

            <!-- Links e Botão -->
            <div class="d-flex justify-content-between align-items-center">
                @if (Route::has('password.request'))
                    <a class="text-decoration-none" href="{{ route('password.request') }}">
                        Esqueceu sua senha?
                    </a>
                @endif

                <button type="submit" class="btn btn-dark">
                    Entrar
                </button>
            </div>
        </form>

        <hr class="my-4">

        <p class="text-center">
            Não possui conta?
            <a href="{{ route('register') }}" class="text-decoration-none">
                Registrar-se
            </a>
        </p>
    </div>
</div>
@endsection

