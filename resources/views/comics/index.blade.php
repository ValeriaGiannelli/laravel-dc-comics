{{-- questa view estende il file main.blade.php che è dentro la cartella view/layouts --}}
@extends('layouts.main')



@section('content')
<div class="container my-5">
    <table class="table">
        <thead>
          <tr>
            <th scope="col">id</th>
            <th scope="col">Immagine</th>
            <th scope="col">Nome fumetto</th>
            <th scope="col">Prezzo</th>
            <th scope="col">Serie</th>
            <th scope="col">Tipo</th>
            <th scope="col">Data</th>
            <th scope="col">Descrizione</th>
          </tr>
        </thead>
        <tbody>
            @foreach ( $comics as $comic )
                <tr>
                        <td>{{$comic->id}}</td>
                        <td> <img src="{{$comic->thumb}}" alt="{{$comic->title}}"></td>
                        <td>{{$comic->title}}</td>
                        <td>{{$comic->price}}</td>
                        <td>{{$comic->series}}</td>
                        <td>{{$comic->type}}</td>
                        <td>{{($comic->sale_date)->format('d-m-Y')}}</td>
                        <td>{{$comic->description}}</td>
                </tr>
            @endforeach

        </tbody>
      </table>
</div>

@endsection


@section('titlePage')
    fumetti
@endsection
