@extends('template')

@section('title', 'Verificar Email')

@section('content')
<div class="container d-flex justify-content-center py-5">
    <div class="card shadow-lg rounded-4 p-5 col-md-6">
        <div class="text-center mb-4">
            <i class="material-icons fs-1 text-dark">email</i>
            <h2 class="fw-bold mt-2">Verifique seu email</h2>
            <p class="text-muted">
                Obrigado por se registrar! Antes de começar, clique no link que enviamos para seu e-mail.
                Se não recebeu, podemos enviar outro.
            </p>
        </div>

        {{-- Status da sessão --}}
        @if (session('status') == 'verification-link-sent')
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                Um novo link de verificação foi enviado para o e-mail informado durante o cadastro.
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif

        <div class="d-flex flex-column flex-md-row justify-content-between align-items-center gap-3 mt-4">
            {{-- Reenviar email --}}
            <form method="POST" action="{{ route('verification.send') }}">
                @csrf
                <button type="submit" class="btn btn-dark btn-lg">
                    Reenviar Email de Verificação
                </button>
            </form>

            {{-- Logout --}}
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="btn btn-outline-secondary btn-lg">
                    Sair
                </button>
            </form>
        </div>
    </div>
</div>
@endsection
