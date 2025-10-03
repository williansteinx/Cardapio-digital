@extends('template')

@section('title', 'Registrar')

@section('content')
<div class="container d-flex justify-content-center align-items-center" style="min-height: 70vh;">
    <div class="card shadow-lg p-4 col-md-4 py-5 rounded-4">
        <h2 class="text-center text-orange-600 mb-4 fw-bold mt-2">Criar conta</h2>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <div class="mb-3">
                <label for="name" class="form-label fw-bold">Nome</label>
                <input id="name" type="text"
                       class="form-control @error('name') is-invalid @enderror"
                       name="name" value="{{ old('name') }}" required autofocus>
                @error('name') <div class="invalid-feedback">{{ $message }}</div> @enderror
            </div>

            <div class="mb-3">
                <label for="email" class="form-label fw-bold">E-mail</label>
                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" 
                       name="email" value="{{ old('email') }}" required>
                @error('email') <div class="invalid-feedback">{{ $message }}</div> @enderror
            </div>

            <div class="mb-3">
                <label for="password" class="form-label fw-bold">Senha</label>
                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required>
                @error('password') <div class="invalid-feedback">{{ $message }}</div> @enderror
            </div>

            <div class="mb-4">
                <label for="password_confirmation" class="form-label fw-bold">Confirmar senha</label>
                <input id="password_confirmation" type="password" class="form-control" name="password_confirmation" required>
            </div>

            <div class="d-flex justify-content-between align-items-center gap-2">
                <a href="{{ route('login') }}" class="text-decoration-none">Já possui conta?</a>

                <button type="submit" class="btn btn-dark">Registrar</button>
            </div>
        </form>
    </div>
</div>
@endsection
