<h1>💡 Keepinho</h1>
<p>Seja bem-vindo ao Keepinho, o seu assistente pessoal (melhor do que o Google).</p>
<hr>
<a href="{{ route('keep.lixeira') }}">🗑️ Lixeira</a>
<hr>

@if ($errors->any())
<div style="color:red">
    <h3>Erro!</h3>
    
    <ul>
        @foreach ($errors->all() as $err)
        <li>{{ $err }}</li>
        @endforeach
    </ul>
</div>
@endif

<form action="{{ route('keep.gravar') }}" method="post">
    @csrf
    <input type="text" name="titulo" placeholder="Título da nota" value="{{ old('titulo') }}">
    <br>
    <textarea name="texto" cols="30" rows="10" placeholder="Digite sua nota aqui...">{{ old('texto') }}</textarea>
    <br>
    <input type="submit" value="Gravar nota">
</form>
<hr>

@foreach ($notas as $nota)
    <div style="border:1px dashed green;padding:2px">
        <p><strong>{{ $nota->titulo }}</strong></p>
        {{ $nota->texto }}
        <br>
        <!-- Editar -->
        <a href="{{ route('keep.editar', $nota->id) }}">Editar</a>
        <br>
        
        <!-- Excluir -->
        <form action="{{ route('keep.apagar', $nota->id) }}" method="post">
            @method('DELETE')
            @csrf
            <input type="submit" value="Apagar">
        </form>

    </div>
@endforeach