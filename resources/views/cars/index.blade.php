@extends('layout.app')

@section('main_content')
    <section>
        <div class="container">
            <h1>Lista delle macchine</h1>
            <div class="list-group">
                @foreach ($cars as $car)
                    <a href="{{ route('cars.show', ['car'=>$car->id]) }}" class="list-group-item list-group-item-action " aria-current="true">
                        <img src="{{ $car->img }}" alt="">
                        <h3>{{ $car->marca }}</h3>
                        <h4>{{ $car->modello }}</h4>
                        <h4>{{ $car->cilindrata }}</h4>
                        <h4>{{ $car->porte }}</h4>
                    </a>
                @endforeach
            </div>
        </div>
    </section>
@endsection