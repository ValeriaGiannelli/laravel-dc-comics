{{-- questa view estende il file main.blade.php che è dentro la cartella view/layouts --}}
@extends('layouts.main')

@section('hero')
    <div>HERO HOME</div>
@endsection

@section('content')
<div class="container my-5">
    <h1>Home page</h1>
    <p>
       Benvenuti nella Dashboard dei Fumetti
    </p>
</div>

@endsection


@section('titlePage')
    home
@endsection
