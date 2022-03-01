@extends('layout.app')

@section('main_content')
    <section>
        <div class="container">
            <div class="card">
                <img src="{{ $car->img }}" alt="">
                <div class="card-content">
                    <h3 class="card-text">marca: {{ $car->marca }}</h3>
                    <h4 class="card-text">modello: {{ $car->modello }}</h4>
                    <h4 class="card-text">cilindrata: {{ $car->cilindrata }}</h4>
                    <h4 class="card-text">porte: {{ $car->porte }}</h4>
                    <h4 class="card-text">categoria: {{ $car->category ? $car->category->name : 'nessuna categoria' }}</h4>
                    <div class="mb-2"><h5 class="card-text">optional:</h5>
                        
                        @forelse ($car->optionals as $optional)
                            {{ $optional->name }}{{ $loop->last ? '' : ', ' }}
                        @empty
                            nessun optional
                        @endforelse
                    </div>
                    <div><a class="btn btn-primary" href="{{ route('admin.cars.edit', ['car' => $car->id]) }}">Modifica</a></div>
                    <div>
                        <form action="{{ route('admin.cars.destroy', ['car' => $car->id]) }}" method="post">
                            @csrf
                            @method('DELETE')
  
                            <button class="btn btn-danger" onclick="return confirm('Sei sicuro di voler cancellare?')">Cancella</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection