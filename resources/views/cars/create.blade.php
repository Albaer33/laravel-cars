@extends('layouts.app')

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
            <form>
                <div class="mb-3">
                  <label for="exampleInputEmail1" class="form-label">Marca Auto</label>
                  <input type="text" class="form-control" id="exampleInputEmail1">
                  <div id="emailHelp" class="form-text"></div>
                </div>
                <div class="mb-3">
                  <label for="exampleInputPassword1" class="form-label">Modello</label>
                  <input type="text" class="form-control" id="exampleInputPassword1">
                </div>
                <div class="mb-3 form-check">
                  <input type="text" class="form-check-input" id="exampleCheck1">
                  <label class="form-check-label" for="exampleCheck1">Cilindrata</label>
                </div>
                <div class="mb-3 form-check">
                    <input type="number" class="form-check-input" id="exampleCheck1">
                    <label class="form-check-label" for="exampleCheck1">Porte</label>
                </div>
                <div class="mb-3 form-check">
                    <input type="text" class="form-check-input" id="exampleCheck1">
                    <label class="form-check-label" for="exampleCheck1">Link Immagine</label>
                </div>
                <button type="submit" class="btn btn-primary">Invia</button>
              </form>
        </div>
    </div>
@endsection