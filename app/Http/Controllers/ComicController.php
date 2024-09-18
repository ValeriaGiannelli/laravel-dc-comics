<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Comic;

use App\Functions\Helper;

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
    public function store(Request $request)
    {
        // validazione dei dati
        $request->validate([
            'title'=>'required|min:3',
            'thumb'=>'required|min:3',
            'price'=>'required|min:3|max:30',
            'series'=>'required|min:3|max:70',
            'sale_date'=>'required|date',
            'type'=>'required|min:3|max:70',
        ]);

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
    public function update(Request $request, string $id)
    {
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

        return redirect()->route('comics.show', $comic);
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
