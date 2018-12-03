@extends('Template.basic')

@section('content')

<div class="container">
    <section>
        <article>
            @if (file_exists('poke-img/images/poke-'.$pokemon->id.'.jpg'))
            <img src="{{ asset('poke-img/images/poke-'.$pokemon->id.'.jpg') }}" alt="Icono de {{ $pokemon->name }}">
            @else
            <img src="{{ asset('poke-img/images/poke-default.jpg') }}" alt="Icono de {{ $pokemon->name }}">
            @endif
            <h3>Name: {{ $pokemon->name }}</h3>
            <h3>Weight: {{ $pokemon->weight }}</h3>
            <h3>Height: {{ $pokemon->height }}</h3>
            <h3>Evolves:
                @if ($pokemon->evolves == null)
                    No tiene evolución
                @else
                    <?php $evolvesPokemon = App\Pokemon::find($pokemon->evolves); ?>
                    @if ($evolvesPokemon == null)
                        No tiene evolución
                    @else
                        Evoluciona en <a href="{{ route('pokemon.uno', $evolvesPokemon) }}">{{ $evolvesPokemon->name }}</a>
                    @endif
                @endif
            </h3>
        </article> 
    </section>
</div>

@endsection