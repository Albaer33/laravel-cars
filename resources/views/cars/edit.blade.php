@extends('layout.app')

@section('main_content')
    <section>
        <div class="container">
            
            <h2>Modifica la tua auto</h2>
            
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('cars.update', ['car' => $car->id]) }}" method="post">
                @csrf
                @method('PUT')

                <div class="mb-3">
                  <label for="marca" class="form-label">Marca</label>
                  <input type="text" class="form-control" id="marca" name="marca" value="{{ old('marca') ? old('marca') : $car->marca }}">
                </div>
                <div class="mb-3">
                  <label for="modello" class="form-label">Modello</label>
                  <input type="text" class="form-control" id="modello" name="modello" value="{{ old('modello') ? old('modello') : $car->modello }}">
                </div>
                <div class="mb-3">
                  <label for="cilindrata" class="form-label">Cilindrata</label>
                  <input type="text" class="form-control" id="cilindrata" name="cilindrata" value="{{ old('cilindrata') ? old('cilindrata') : $car->cilindrata }}">
                </div>
                <div class="mb-3">
                  <label for="porte" class="form-label">Porte</label>
                  <input type="text" class="form-control" id="porte" name="porte" value="{{ old('porte') ? old('porte') : $car->porte }}">
                </div>

                <button type="submit" class="btn btn-primary">Invia</button>
            </form>
        </div>
    </section>
@endsection