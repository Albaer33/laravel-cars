@extends('layout.app')

@section('main_content')
    <section>
        <div class="container">
            <div class="card">
                <img src="{{ $card->img }}" alt="">
                <div class="card-content">
                    <h3 class="card-text">{{ $car->marca }}</h3>
                    <h4 class="card-text">{{ $car->modello }}</h4>
                    <h4 class="card-text">{{ $car->cilindrata }}</h4>
                    <h4 class="card-text">{{ $car->porte }}</h4>
                    <div><a class="btn btn-primary" href="{{ route('cars.edit', ['car' => $car->id]) }}">Modifica</a></div>
                    <div>
                        <form action="{{ route('cars.destroy', ['car' => $car->id]) }}" method="post">
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