<?php

namespace App\Http\Controllers;

use App\Models\Pokemon;
use Illuminate\Support\Facades\Http;

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
        $starters = $this->starterQuery()->get();

        return view("details")
            ->with($pokemon)
            ->with(['starters' => $starters]);
    }

    public function getMyStarters(){
        return $this->starterQuery()->get();
    }

    public function setStarter(string $name){
        $pokemon = $this->getPokemon($name)['pokemon'];

        Pokemon::updateOrCreate(
            ['pokeapi_id' => $pokemon->id],
            [
                'name' => $pokemon->name,
                'sprite_url' => $pokemon->sprites->front_default ?? null,
                'is_starter' => true,
            ]
        );

        return redirect()->route('details', $pokemon->name);
    }

    private function starterQuery()
    {
        return Pokemon::query()
            ->where('is_starter', true)
            ->orderBy('name');
    }

    private function getPokemon(string $name)
    {
        $pokemon = Http::baseUrl($this->baseUrl)->get("pokemon/{$name}");
        $pokemon = ['pokemon' => json_decode($pokemon)];

        return $pokemon;
    }
}
