<h1>keepinho</h1>
<h2>🗑️ Lixeira</h2>
<hr>
<a href="{{ route('keep') }}">🔙 Voltar</a>

@if(session('secesso'))
<div>{{ session('secesso') }}</div>
@endif

@foreach ($notas as $nota)
        <p><strong>{{ $nota->titulo }}</strong></p>
        {{ $nota->texto }}
        <br>
        <a href="{{ route('keep.restaurar', $nota->id) }}">♻️ Restaurar</a>
    </div>
@endforeach

