@extends('template')

@section('title', 'Cardápio')

@section('content')
<div class="container py-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="fw-bold">Cardápio</h1>
        <a href="{{ route('cardapio.create') }}" class="btn btn-dark">
            <span class="material-icons align-middle">add_box</span>
            Adicionar prato
        </a>
    </div>

    {{-- Mensagens de sucesso e erro --}}
    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    @if (session('error'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            {{ session('error') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    <div class="card shadow-sm">
        <div class="table-responsive">
            <table class="table table-hover align-middle mb-0">
                <thead class="table-dark">
                    <tr>
                        <th>Nome</th>
                        <th>Ingredientes</th>
                        <th>Valor</th>
                        <th>Imagem</th>
                        <th class="text-center">Editar</th>
                        <th class="text-center">Excluir</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($pratos as $prato)
                        <tr>
                            <td class="fw-semibold text-center">{{ $prato->nm_prato }}</td>
                            <td>{{ $prato->desc_ingred ?? '-' }}</td>
                            <td>R$ {{ number_format($prato->vl_prato, 2, ',', '.') ?? '-' }}</td>
                            <td>
                                @if($prato->arquivo)
                                    <img src="{{ asset('storage/' . $prato->arquivo) }}"
                                         alt="{{ $prato->nm_prato }}"
                                         class="img-thumbnail"
                                         style="max-width: 150px;">
                                @else
                                    <span class="text-muted">Sem imagem</span>
                                @endif
                            </td>

                            @if(auth()->id() === $prato->user_id)
                                <td class="text-center">
                                    <a href="{{ route('cardapio.edit', $prato->id) }}" class="btn btn-sm btn-outline-primary">
                                        <span class="material-icons">edit</span>
                                    </a>
                                </td>
                                <td class="text-center">
                                    <form action="{{ route('cardapio.destroy', $prato->id) }}" method="POST" onsubmit="return confirm('Deseja excluir este item?')" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-sm btn-outline-danger">
                                            <span class="material-icons">delete</span>
                                        </button>
                                    </form>
                                </td>
                            @else
                                <td></td>
                                <td></td>
                            @endif
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="text-center text-muted">Nenhum prato cadastrado.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    <div class="mt-3">
        {!! $pratos->links('pagination::bootstrap-5') !!}
    </div>
</div>
@endsection
