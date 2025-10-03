@extends('template')

@section('title', 'Home')

@section('content')
    <h1 class="display-4 fw-bold text-center mb-4">Bem-vindo ao Cardápio</h1>
    <p class="lead text-center mb-5">Confira os pratos disponíveis em nosso restaurante</p>

    <div class="container">
        <div class="row">
            @forelse($pratos as $prato)
                <div class="col-md-4 mb-4">
                    <div class="card shadow border-0 h-100">
                        @if($prato->arquivo)
                            <img src="{{ asset('storage/' . $prato->arquivo) }}" 
                                 class="card-img-top" 
                                 alt="{{ $prato->nm_prato }}" 
                                 style="height: 200px; object-fit: cover;">
                        @else
                            <img src="https://via.placeholder.com/300x200?text=Sem+Imagem" 
                                 class="card-img-top" 
                                 alt="Sem imagem">
                        @endif

                        <div class="card-body d-flex flex-column">
                            <h5 class="card-title fw-bold text-dark">{{ $prato->nm_prato }}</h5>
                            <p class="card-text text-muted flex-grow-1">{{ $prato->desc_ingred }}</p>
                            <p class="fw-bold fs-5">
                                R$ {{ number_format($prato->vl_prato, 2, ',', '.') }}
                            </p>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-12 text-center">
                    <p class="text-muted">Nenhum prato cadastrado no momento.</p>
                </div>
            @endforelse
        </div>
    </div>
@endsection
