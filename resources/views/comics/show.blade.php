{{-- questa view estende il file main.blade.php che è dentro la cartella view/layouts --}}
@extends('layouts.main')

@section('content')
<div class="container my-5">
    <h1>{{$comic->title}}</h1>
    <p>Serie: {{$comic->series}}</p>
    <div class="row">
        <div class="col">
            <img class="icon img-fluid" src="{{$comic->thumb}}" alt="{{$comic->title}}">
        </div>
    </div>

    <p>
        {{$comic->description}}
    </p>

    <a href="{{route('comics.index')}}">
        <button class="btn btn-primary">
            Torna indietro
        </button>
    </a>
</div>

@endsection


@section('titlePage')
    Descrizione fumetto
@endsection
