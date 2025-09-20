<?php

namespace App\Http\Controllers;

use App\Models\Prato;
use Illuminate\Http\Request;
use App\Http\Requests\CardapioRequest;
use Illuminate\Support\Facades\Storage;

class CardapioController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pratos = Prato::paginate(5);
        
        return view('cardapio.index', compact('pratos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('cardapio.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CardapioRequest $request)
    {
        $data = $request->validated();

        // se houver upload de imagem
        if ($request->hasFile('arquivo')) {
            $data['arquivo'] = $request->file('arquivo')->store('pratos', 'public');
        }

        $prato = Prato::create([$data]);

        if($prato){

            return redirect()->route('cardapio.index')->with('success', 'Prato cadastrado com sucesso!');
            
        } else {

            return redirect()->route('cardapio.index')->with('error', 'Não foi possível cadastrar o prato!');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Prato $prato)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Prato $prato)
    {
        return view('cardapio.update', compact('prato'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CardapioRequest $request, Prato $prato)
    {
        $data = $request->validated();

        if ($request->hasFile('arquivo')) {
            if ($prato->arquivo && Storage::exists('public/' . $prato->arquivo)) {
                Storage::delete('public/' . $prato->arquivo);
            }

            $data['arquivo'] = $request->file('arquivo')->store('pratos', 'public');
        }

        $prato->update($data);

        if($prato){

            return redirect()->route('cardapio.index')->with('success', 'Prato atualizado com sucesso!');
            
        } else {

            return redirect()->route('cardapio.index')->with('error', 'Não foi possível atualizar o prato!');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Prato $prato)
    {
        $deletou = $prato->delete();

        if($deletou){

            return redirect()->route('cardapio.index')->with('success', 'Prato removido com sucesso!');
            
        } else {

            return redirect()->route('cardapio.index')->with('error', 'Não foi possível remover o prato!');
        }
    }
}
