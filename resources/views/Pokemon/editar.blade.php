@extends('Template.basic')

@section('content')

<div class="container">

    <section>
        <article>
            <form action="{{ route('pokemon.actualizar', $pokemon) }}" method="post">
                @csrf
                @method('put')
                <div>
                    <label for="name">Name</label>
                    <input type="text"  name="name" value="{{ $pokemon->name }}" required>
                </div>
                <div>
                    <label for="weight">Weight</label>
                    <input type="text"  name="weight" value="{{ $pokemon->weight }}" required>
                </div>
                <div>
                    <label for="height">Height</label>
                    <input type="text"  name="height" value="{{ $pokemon->height }}" required>
                </div>
                <div>
                    <label for="evolves">Type</label>
                    <select name="type_id" class="form-control">
                        @foreach (App\Type::all() as $type)
                            <option value="{{ $type->id }}" {{ ($type->id == $pokemon->type_id) ? 'selected' : ''}}>{{ $type->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div>
                    <label for="evolves">Evolves</label>
                    <select name="evolves" >
                        <option value="">No tiene evolución</option>
                        @foreach (App\Pokemon::all() as $pokemon)
                            <option value="{{ $pokemon->id }}">{{ $pokemon->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div>
                    <button type="submit" >Editar</button>
                </div>
            </form>
        </article> 
    </section>
</div>

@endsection