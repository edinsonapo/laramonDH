@extends('Template.basic')

@section('content')

<div class="container">
    <section>
        <article>
            <h1><a href="{{ route('pokemon.nuevo') }}">Nuevo pokemon</a></h1>
        </article>
    </section>
    <section>
        @foreach (App\Pokemon::all() as $pokemon)
        <article>
            <div>
                <h2>{{ $pokemon->name }}</h2>
                <a href="{{ route('pokemon.uno', $pokemon) }}">< Info ></a>
                <a href="{{ route('pokemon.editar', $pokemon) }}">< Editar ></a>
                <a href="{{ route('pokemon.borrar', $pokemon) }}" onclick="event.preventDefault(); document.getElementById('delete-pokemon-{{ $pokemon->id }}-form').submit();"> < Eliminar ></a>
                
                <form id="delete-pokemon-{{ $pokemon->id }}-form" action="{{ route('pokemon.borrar', $pokemon) }}" method="POST" style="display: none;">
                    @csrf
                    @method('delete')
                </form>
            </div>
        </article>
        @endforeach
    </section>
</div>

@endsection