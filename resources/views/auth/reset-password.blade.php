@extends('template')

@section('title', 'Redefinir Senha')

@section('content')
<div class="container d-flex justify-content-center py-5">
    <div class="card shadow-lg rounded-4 p-5 col-md-5">
        <div class="text-center mb-4">
            <i class="material-icons fs-1 text-dark">lock_reset</i>
            <h2 class="fw-bold mt-2">Redefinir Senha</h2>
            <p class="text-muted">Informe seu e-mail e a nova senha para atualizar sua conta.</p>
        </div>

        {{-- Status de erro/sucesso --}}
        @if (session('status'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('status') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif

        <form method="POST" action="{{ route('password.store') }}">
            @csrf

            <!-- Token -->
            <input type="hidden" name="token" value="{{ $request->route('token') }}">

            <!-- Email -->
            <div class="mb-3">
                <label for="email" class="form-label fw-bold">Email</label>
                <input id="email" type="email" 
                       class="form-control @error('email') is-invalid @enderror"
                       name="email" value="{{ old('email', $request->email) }}" required autofocus>
                @error('email')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <!-- Nova Senha -->
            <div class="mb-3">
                <label for="password" class="form-label fw-bold">Nova Senha</label>
                <input id="password" type="password"
                       class="form-control @error('password') is-invalid @enderror"
                       name="password" required>
                @error('password')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <!-- Confirmar Senha -->
            <div class="mb-4">
                <label for="password_confirmation" class="form-label fw-bold">Confirmar Senha</label>
                <input id="password_confirmation" type="password"
                       class="form-control @error('password_confirmation') is-invalid @enderror"
                       name="password_confirmation" required>
                @error('password_confirmation')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <!-- Botão -->
            <div class="d-grid">
                <button type="submit" class="btn btn-dark btn-lg">
                    Redefinir Senha
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
