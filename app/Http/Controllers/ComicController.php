<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Comic;

use App\Functions\Helper;

// importo la validazione request
use App\Http\Requests\ComicRequest;

class ComicController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //qui andrà la view della tabella con le info dei fumetti
        $comics = Comic::All();
        return view('comics.index', compact('comics'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //form per creare il nuovo fumetto
        return view('comics.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ComicRequest $request)
    {
        // validazione dei dati
        // $request->validate([
        //     'title'=>'required|min:3',
        //     'thumb'=>'required|min:3',
        //     'price'=>'required|min:3|max:30',
        //     'series'=>'required|min:3|max:70',
        //     'sale_date'=>'required|date',
        //     'type'=>'required|min:3|max:70',
        // ], [
        //     'title.required' => 'Il titolo è un campo obbligatorio',
        //     'title.min' => 'Il titolo deve avere almeno :min caratteri',
        //     'thumb.required' => 'L\'immagine è un campo obbligatorio',
        //     'thumb.min' => 'L\'immagine deve avere almeno :min caratteri',
        //     'price.required' => 'Il prezzo è un campo obbligatorio',
        //     'price.min' => 'Il prezzo deve avere almeno :min caratteri',
        //     'price.max' => 'Il prezzo deve avere massimo :max caratteri',
        //     'series.required' => 'La serie è un campo obbligatorio',
        //     'series.min' => 'La serie deve avere almeno :min caratteri',
        //     'series.max' => 'La serie deve avere massimo :max caratteri',
        //     'sale_date.required' => 'La data è un campo obbligatorio',
        //     'sale_date.date' => 'La data deve avere un formato corretto',
        //     'type.required' => 'La tipologia è un campo obbligatorio',
        //     'type.min' => 'La tipologia deve avere almeno :min caratteri',
        //     'type.max' => 'La tipologia deve avere massimo :max caratteri',

        // ]);

        //questo prende i dati del form e lo salva nel DB
        $data = $request->all();
        $new_comic = new Comic();
        $new_comic->fill($data);
        // $new_comic->title = $data['title'];
        // $new_comic->description = $data['description'];
        // $new_comic->thumb = $data['thumb'];
        // $new_comic->price = $data['price'];
        // $new_comic->series = $data['series'];
        // $new_comic->sale_date = $data['sale_date'];
        // $new_comic->type = $data['type'];
        $new_comic->slug = Helper::generateSlug($data['title'], Comic::class);
        $new_comic->save();


        return redirect()->route('comics.show', $new_comic->id);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //qua si andrà a vedere il dettaglio del fumetto
        $comic = Comic::find($id);
        return view('comics.show', compact('comic'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //qui modifico l'elemento
        // prendo l'elemento
        $comic = Comic::find($id);

        // lo devo mandare ad un form compilato dei suoi elementi
        return view('comics.edit', compact('comic'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ComicRequest $request, string $id)
    {
        // la validatzione dei dati viene fatta da ComicRequest

        //request prende i dati che vengono passati
        $data = $request->all();

        // istanza del fumetto all'indice passato
        $comic = Comic::find($id);

        // gestione dello slug
        if($data['title'] === $comic->title){
            $data['slug'] = $comic->slug;
        }else {
            $data['slug'] = Helper::generateSlug($data['title'], Comic::class);
        }

        // faccio update di quel fumetto
        $comic->update($data);

        return redirect()->route('comics.show', $comic)->with('edited', 'Il fumetto è stato modificato correttamente');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //Prendo l'elelemtno all'indice corrispondente
        $comic = Comic::find($id);
        $comic->delete();

        return redirect()->route('comics.index');
    }
}
