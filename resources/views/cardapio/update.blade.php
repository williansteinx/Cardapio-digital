@extends('template')

@section('title', 'Cardápio')

@section('content')

<div class="container mt-3">
    <div class="row justify-content-center">
        <div class="col-lg-6">
            <div class="card shadow-lg border-0">
                <div class="card-header bg-dark text-white">
                    <h3 class="mb-0">Editar Prato: {{ $prato->nm_prato }}</h3>
                </div>

                <div class="card-body mb-2">
                    {{-- Exibir erros de validação --}}
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul class="mb-0">
                                @foreach($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form action="{{ route('cardapio.update', $prato->id) }}" method="POST" enctype="multipart/form-data">
                        
                        @csrf 
                        @method('PUT')

                        <div class="mb-3">
                            <label for="nm_prato" class="form-label">Nome do Prato</label>
                            <input type="text" id="nm_prato" name="nm_prato" 
                                class="form-control @error('nm_prato') is-invalid @enderror"
                                value="{{ $prato->nm_prato }}">
                            @error('nm_prato')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="desc_ingred" class="form-label">Ingredientes</label>
                            <textarea id="desc_ingred" name="desc_ingred" rows="4"
                                class="form-control @error('desc_ingred') is-invalid @enderror">{{ $prato->desc_ingred }}</textarea>
                            @error('desc_ingred')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="vl_prato" class="form-label">Valor (R$)</label>
                            <input type="number" step="0.01" id="vl_prato" name="vl_prato" 
                                class="form-control @error('vl_prato') is-invalid @enderror"
                                value="{{ $prato->vl_prato }}">
                            @error('vl_prato')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="arquivo" class="form-label">Imagem</label>
                            <input type="file" id="arquivo" name="arquivo" 
                                class="form-control @error('arquivo') is-invalid @enderror">
                            @error('arquivo')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                         @if($prato->arquivo)
                            <div class="mt-2">
                                <img src="{{ asset('storage/' . $prato->arquivo) }}" alt="{{ $prato->nm_prato }}" width="300" class="rounded">
                            </div>
                        @endif

                        <div class="d-grid mt-3">
                            <button class="btn btn-dark btn-lg" type="submit">Atualizar Prato</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection