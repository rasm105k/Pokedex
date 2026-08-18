<?php

namespace App\Http\Controllers;

use App\Models\Pokemon;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Http;
use Illuminate\View\View;

class PokemonController extends Controller
{
    private string $baseUrl;

    public function __construct()
    {
        $this->baseUrl = rtrim(config('services.pokeapi.base_url'), '/').'/';
    }

    public function index(): View
    {
        $response = Http::baseUrl($this->baseUrl)
            ->timeout(10)
            ->get('pokemon?limit=1000')
            ->throw();

        return view('pokemons', [
            'pokemons' => $response->json('results', []),
        ]);
    }

    public function details(string $name): View
    {
        return view('details', [
            'pokemon' => $this->getPokemon($name),
            'starters' => $this->starterQuery()->get(),
        ]);
    }

    public function getMyStarters(): View
    {
        return view('starters', [
            'starters' => $this->starterQuery()->get(),
        ]);
    }

    public function setStarter(string $name): RedirectResponse
    {
        $pokemon = $this->getPokemon($name);

        Pokemon::updateOrCreate(
            ['pokeapi_id' => $pokemon->id],
            [
                'name' => $pokemon->name,
                'sprite_url' => $pokemon->sprites->front_default ?? null,
                'is_starter' => true,
            ],
        );

        return redirect()
            ->route('details', $pokemon->name)
            ->with('success', ucfirst($pokemon->name).' was added to your starters.');
    }

    private function starterQuery()
    {
        return Pokemon::query()
            ->where('is_starter', true)
            ->orderBy('name');
    }

    private function getPokemon(string $name): object
    {
        $response = Http::baseUrl($this->baseUrl)
            ->timeout(10)
            ->get('pokemon/'.urlencode($name))
            ->throw();

        return (object) json_decode($response->body());
    }
}
