{{-- questa view estende il file main.blade.php che è dentro la cartella view/layouts --}}
@extends('layouts.main')

@section('content')
<div class="container my-5">
    <h1>{{$comic->title}}</h1>
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
