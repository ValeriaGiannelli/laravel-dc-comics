{{-- questa view estende il file main.blade.php che è dentro la cartella view/layouts --}}
@extends('layouts.main')



@section('content')
<div class="container my-5">
    <form class="row g-3" action="{{route('comics.update', $comic)}}" method="POST">
        @csrf
        @method("PUT")

        <div class="col-md-6">
          <label for="title" class="form-label">Titolo del fumetto</label>
          <input value="{{$comic->title}}" type="text" class="form-control" id="title" name="title" placeholder="Scrivi il titolo del fumetto">
        </div>
        <div class="col-md-6">
            <label for="thumb" class="form-label">URL immagine</label>
            <input value="{{$comic->thumb}}" type="text" class="form-control" id="thumb" name="thumb" placeholder="Inserisci l'URL dell'immagine">
        </div>
        <div class="col-md-6">
            <label for="price" class="form-label">Prezzo</label>
            <input value="{{$comic->price}}" type="text" class="form-control" id="price" name="price" placeholder="Inserisci il prezzo">
        </div>
        <div class="col-md-6">
            <label for="series" class="form-label">Serie</label>
            <input value="{{$comic->series}}" type="text" class="form-control" id="series" name="series" placeholder="Inserisci la serie">
        </div>
        <div class="col-md-6">
            <label for="type" class="form-label">Tipo</label>
            <input value="{{$comic->type}}" type="text" class="form-control" id="type" name="type" placeholder="Inserisci la tipologia del fumetto">
        </div>
        <div class="col-md-6">
            <label for="sale_date" class="form-label">Data di acquisto</label>
            <input value="{{$comic->sale_date}}" type="text" class="form-control" id="sale_date" name="sale_date" placeholder="Inserisci la data di acquisto">
        </div>

        <div class="col-12">
            <label for="description" class="form-label">Trama</label>
            <textarea class="form-control" name="description" id="description" cols="30" rows="10" placeholder="Descrizione della trama">{{$comic->description}}</textarea>
        </div>

        <div class="col-12">
          <button type="submit" class="btn btn-primary">Invia</button>
        </div>
        <div class="col-12">
          <button type="reset" class="btn btn-primary">Cancella</button>
        </div>
      </form>
</div>

@endsection


@section('titlePage')
    Aggiungi fumetto
@endsection
