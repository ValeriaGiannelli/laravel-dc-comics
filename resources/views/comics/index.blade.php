{{-- questa view estende il file main.blade.php che è dentro la cartella view/layouts --}}
@extends('layouts.main')



@section('content')
<div class="container my-5">
    <div class="table-responsive">
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
                <th scope="col">Dettaglio</th>
              </tr>
            </thead>
            <tbody>
                @foreach ( $comics as $comic )
                    <tr>
                            <td class="col-auto">{{$comic->id}}</td>
                            <td class="col-auto"> <img class="icon" src="{{$comic->thumb}}" alt="{{$comic->title}}"></td>
                            <td class="col-auto" class="col-auto">{{$comic->title}}</td>
                            <td class="col-auto">{{$comic->price}}</td>
                            <td class="col-auto">{{$comic->series}}</td>
                            <td class="col-auto">{{$comic->type}}</td>
                            <td class="col-2">{{($comic->sale_date)->format('d-m-Y')}}</td>
                            <td class="col-auto"><a href="{{route('comics.show')}}"><i class="fa-regular fa-eye"></i></a></td>
                    </tr>
                @endforeach

            </tbody>
          </table>
    </div>

</div>

@endsection


@section('titlePage')
    fumetti
@endsection
