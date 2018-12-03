@extends('Template.basic')

@section('content')

<div class="container">
    <section>
        <article>
            <form action="{{ route('pokemon.guardar') }}" method="post">
                @csrf
                <div>
                    <label for="name">Name</label>
                    <input type="text"  name="name" required>
                </div>
                <div>
                    <label for="weight">Weight</label>
                    <input type="text"  name="weight" required>
                </div>
                <div>
                    <label for="height">Height</label>
                    <input type="text"  name="height" required>
                </div>
                <div>
                    <label for="evolves">Type</label>
                    <select name="type_id" >
                        @foreach (App\Type::all() as $type)
                            <option value="{{ $type->id }}">{{ $type->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div>
                    <label for="evolves">Evolves</label>
                    <select name="evolves">
                        <option value="">No tiene evolución</option>
                        @foreach (App\Pokemon::all() as $pokemon)
                            <option value="{{ $pokemon->id }}">{{ $pokemon->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div>
                    <button type="submit" >Agregar</button>
                </div>
            </form>
        </article> 
    </section>
</div>

@endsection