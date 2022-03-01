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

            <form action="{{ route('admin.cars.update', ['car' => $car->id]) }}" method="post">
                @csrf
                @method('PUT')

                <div class="mb-3">
                  <label for="marca" class="form-label">Marca</label>
                  <input type="text" class="form-control" id="marca" name="marca" value="{{ old('marca') ? old('marca') : $car->marca }}">
                </div>
                <div class="form-group mb-3">
                  <label class="form-label" for="category_id">Category</label>
                  <select id="category_id" name="category_id" class="form-select">
                    <option value="">Nessuna</option>
                      @foreach ($categories as $category)
                        <option value="{{$category->id}}" {{$car->category && old('category_id', $car->category->id) == $category->id ? 'selected' : ''}}>{{$category->name}}</option>
                      @endforeach
                  </select>
                </div>
                <div class="mb-3">
                  <label for="modello" class="form-label">Modello</label>
                  <input type="text" class="form-control" id="modello" name="modello" value="{{ old('modello') ? old('modello') : $car->modello }}">
                </div>
                <div class="mb-3">
                  <label for="cilindrata" class="form-label">Cilindrata</label>
                  <input type="text" class="form-control" id="cilindrata" name="cilindrata" value="{{ old('cilindrata') ? old('cilindrata') : $car->cilindrata }}">
                </div>
                <div class="form-group mb-3">
                  <h5>Optionals</h5>
                  @foreach ($optionals as $optional)
                    <div class="form-check">
                      @if ($errors->any())
                        <input {{ in_array($optional->id, old('optional' , [])) }} class="form-check-input" name="optional[]" type="checkbox" value="{{$optional->id}}" id="optional-{{$optional->id}}">
                      @else
                        <input {{ $car->optionals->contains($tag) ? 'checked' : '' }} class="form-check-input" name="optional[]" type="checkbox" value="{{$optional->id}}" id="optional-{{$optional->id}}">
                      @endif
                      <label class="form-check-label" for="tag-{{$tag->id}}">
                        {{$tag->name}}
                      </label>
                    </div>
                  @endforeach
                </div>
                <div class="mb-3">
                  <label for="porte" class="form-label">Porte</label>
                  <input type="text" class="form-control" id="porte" name="porte" value="{{ old('porte') ? old('porte') : $car->porte }}">
                </div>

                <div class="mb-3">
                  <label for="img" class="form-label">link immagine</label>
                  <input type="text" class="form-control" id="img" name="img" value="{{ old('img') ? old('img') : $car->img }}">
                </div>

                <button type="submit" class="btn btn-primary">Invia</button>
            </form>
        </div>
    </section>
@endsection