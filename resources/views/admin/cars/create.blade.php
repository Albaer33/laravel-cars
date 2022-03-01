@extends('layout.app')

@section('main_content')
    <div class="container">
        <h3>Aggiungi una nuova auto alla tua collezione</h3>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{$error}}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div>
            <form action="{{route('admin.cars.store')}}" method="post">
                @csrf
                @method('POST')
                <div class="mb-3">
                  <label for="exampleInputEmail1" class="form-label">Marca Auto</label>
                  <input type="text" class="form-control" id="marca" name="marca" value="{{old('marca')}}">
                </div>
                <div class="form-group">
                    <label class="form-label" for="category_id">Category</label>
                    <select id="category_id" name="category_id" class="form-select">
                        <option value="">Nessuna</option>
                        @foreach ($categories as $category)
                            <option value="{{$category->id}}" {{old('category_id') == $category->id ? 'selected' : ''}}>{{$category->name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <h5>Optional</h5>
                    @foreach ($optionals as $optional)
                      <div class="form-check">
                        <input {{ in_array($optional->id, old('optional', [])) ? 'checked' : '' }} class="form-check-input" name="optional[]" type="checkbox" value="{{$optional->id}}" id="optional-{{$optional->id}}">
                        <label class="form-check-label" for="optional-{{$optional->id}}">
                          {{$optional->name}}
                        </label>
                      </div>
                    @endforeach
                </div>
                <div class="mb-3">
                  <label for="exampleInputPassword1" class="form-label">Modello</label>
                  <input type="text" class="form-control" id="modello" name="modello" value="{{old('modello')}}">
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Cilindrata</label>
                    <input type="text" class="form-control" id="cilindrata" name="cilindrata" value="{{old('cilindrata')}}">
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Porte</label>
                    <input type="text" class="form-control" id="porte" name="porte" value="{{old('porte')}}">
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Immagine</label>
                    <input type="text" class="form-control" id="img" name="img" value="{{old('img')}}">
                </div>
                <button type="submit" class="btn btn-primary">Invia</button>
              </form>
        </div>
    </div>
@endsection