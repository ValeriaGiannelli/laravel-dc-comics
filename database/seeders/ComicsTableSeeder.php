<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\Comic;

// importo str
use Illuminate\Support\Str;

class ComicsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $comics = config('comics');

        foreach($comics as $comic){
            $new_comic = new Comic();
            // dd($comic);
            $new_comic->title = $comic['title'];
            $new_comic->description = $comic['description'];
            $new_comic->thumb = $comic['thumb'];
            $new_comic->price = $comic['price'];
            $new_comic->series = $comic['series'];
            $new_comic->sale_date = $comic['sale_date'];
            $new_comic->type = $comic['type'];
            $new_comic->slug = $this->generateSlug($new_comic->title);
            // dump($new_comic);
        }
    }

        // funzione per lo slug
        private function generateSlug($string){
            // variabile che prenda la stringa e sostituisca gli spazi col trattino
            $slug = Str::slug($string, '-');

            // variabile aggiuntiva per il ciclo while
            $original_slug = $slug;

            // se trovo uno slug esistente $exists non sarà null
            $exists = Comic::where('slug', $slug)->first();

            // inizializzo un contatore
            $c = 1;
            // queso ciclo partirà solo se lo slug non è null, quindi c'è
            while($exists){
                // concatena il contatore
                $slug = $original_slug . '-' . $c;
                // ricontrolla che anche questo slug non esiste
                $exists = Comic::where('slug', $slug)->first();
                // se esiste aumenta il contatore di 1
                $c++;
            }

            return $slug;
        }
}
