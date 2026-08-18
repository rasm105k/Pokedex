<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Http;
use DB;

class PokemonController extends Controller
{
    private ?string $baseUrl = null;
    private $starters = [];

    public function __construct() {
        $this->baseUrl = env('POKEAPI_BASE_URL'); 
    }

    public function index(){
        $result = Http::baseUrl($this->baseUrl)->get('pokemon?limit=1000');
        $pokemons = $result->json()["results"];
        return view("pokemons")->with(['pokemons' => $pokemons]);
    }

    
    public function details(string $name){
        $pokemon = $this->getPokemon($name);
        return view("details")->with($pokemon);
        }
        
    public function getMyStarters(){
        
        $starters = DB::select('pokemon')->get();
        dd($starters);

        return $starters;
    }

    public function setStarter(string $name){
        $pokemon = $this->getPokemon($name);
        $this->starters[$name] = $pokemon;
        dd($this->starters);
    }
            
    private function getPokemon(string $name)
    {
        $pokemon = Http::baseUrl($this->baseUrl)->get("pokemon/{$name}");
        $pokemon = ['pokemon' => json_decode($pokemon)];

        return $pokemon;
    }
}
