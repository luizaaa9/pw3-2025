<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
</head>
<body>
    <h1>Carrinho</h1>
    @if(session('success'))
        <p>{{ session('success') }}</p>
    @endif

    @if(count($carrinho) > 0)
        <ul>
            @foreach($carrinho as $id => $item)
                <li>
                    {{ $item['nome'] }} - Quantidade: {{ $item['quantidade'] }} - Preço: R$ {{ $item['preco'] }}
                    <a href="{{ url('/carrinho/remover/' . $id) }}">Remover</a>
                </li>
            @endforeach
        </ul>
</body>
</html>
