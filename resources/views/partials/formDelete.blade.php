<form class="d-inline" action="{{route('comics.destroy', $comic)}}" method="POST" onsubmit="return confirm('Sei sicuro di voler eliminare il fumetto: {{$comic->title}}?')">
    @csrf
    @method('DELETE')
    <button type="submit" class="btn btn-danger"><i class="fa-solid fa-trash"></i></button>
</form>
