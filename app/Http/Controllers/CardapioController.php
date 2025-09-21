<?php

namespace App\Http\Controllers;

use App\Models\Prato;
use Illuminate\Http\Request;
use App\Http\Requests\CardapioRequest;
use Illuminate\Support\Facades\Storage;

class CardapioController extends Controller
{
    public function index()
    {
        $pratos = Prato::paginate(5);
        return view('cardapio.index', compact('pratos'));
    }

    public function create()
    {
        return view('cardapio.create');
    }

    public function store(CardapioRequest $request)
    {
        $data = $request->validated();

        if ($request->hasFile('arquivo')) {
            $data['arquivo'] = $request->file('arquivo')->store('pratos', 'public');
        }

        $data['user_id'] = auth()->id();

        $prato = Prato::create($data);

        return $prato
            ? redirect()->route('cardapio.index')->with('success', 'Prato cadastrado com sucesso!')
            : redirect()->route('cardapio.index')->with('error', 'Não foi possível cadastrar o prato!');
    }

    public function show(Prato $prato)
    {
        return view('cardapio.show', compact('prato'));
    }

    public function edit(Prato $prato)
    {
        $this->authorize('update', $prato); // Garantido
        return view('cardapio.update', compact('prato'));
    }

    public function update(CardapioRequest $request, Prato $prato)
    {
        $this->authorize('update', $prato); // Garantido

        $data = $request->validated();

        if ($request->hasFile('arquivo')) {
            if ($prato->arquivo && Storage::disk('public')->exists($prato->arquivo)) {
                Storage::disk('public')->delete($prato->arquivo);
            }
            $data['arquivo'] = $request->file('arquivo')->store('pratos', 'public');
        }

        $prato->update($data);

        return redirect()->route('cardapio.index')
            ->with('success', 'Prato atualizado com sucesso!');
    }

    public function destroy(Prato $prato)
    {
        $this->authorize('delete', $prato); // Garantido

        if ($prato->arquivo && Storage::disk('public')->exists($prato->arquivo)) {
            Storage::disk('public')->delete($prato->arquivo);
        }

        $deletou = $prato->delete();

        if ($deletou) {
            return redirect()->route('cardapio.index')->with('success', 'Prato removido com sucesso!');
        }

        return redirect()->route('cardapio.index')->with('error', 'Não foi possível remover o prato!');
    }
}
