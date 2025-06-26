<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CarrinhoController extends Controller
{
    public function index()
{
 $carrinho = session()->get('carrinho', []);
 return view('carrinho.index', compact('carrinho'));
}

public function adicionar($produtoId)
{
    $produto = [
        'id' => $produtoId,
        'nome' => "Produto $produtoId",
        'quantidade' => 1,
        'preco' => rand(10, 100),
    ];

    $carrinho = session()->get('carrinho', []);
    if (isset($carrinho[$produtoId])) {
        $carrinho[$produtoId]['quantidade']++;
    } else {
        $carrinho[$produtoId] = $produto;
    }

    session()->put('carrinho', $carrinho);

    return redirect('/carrinho')->with('success', 'Produto adicionado ao carrinho!');
}

public function remover($produtoId)
{
    $carrinho = session()->get('carrinho', []);
    if (isset($carrinho[$produtoId])) {
        unset($carrinho[$produtoId]);
        session()->put('carrinho', $carrinho);
    }

    return redirect('/carrinho')->with('success', 'Produto removido do carrinho!');
}


}
