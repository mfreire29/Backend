<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;

class StarWarsController extends Controller
{

    public function getPeople()
    {
        $client = new Client();
        $response = $client->get(config('swapi.url') . "/people/");

        $data = json_decode($response->getBody(), true);

        return response()->json($data);     
    }

    public function getPeopleById($id)
    {
        $client = new Client();
        $response = $client->get(config('swapi.url') . "/people/{$id}");

        $data = json_decode($response->getBody(), true);

        return response()->json($data);
    }

    public function getPlanets()
    {
        $client = new Client();
        $response = $client->get(config('swapi.url') . "/planets/");

        $data = json_decode($response->getBody(), true);

        return response()->json($data);     
    }

    public function getPlanetsById($id)
    {
        $client = new Client();
        $response = $client->get(config('swapi.url') . "/planets/{$id}");

        $data = json_decode($response->getBody(), true);

        return response()->json($data);
    }

    public function getVehicles()
    {
        $client = new Client();
        $response = $client->get(config('swapi.url') . "/vehicles/");

        $data = json_decode($response->getBody(), true);

        return response()->json($data);     
    }

    public function getVehiclesById($id)
    {
        $client = new Client();
        $response = $client->get(config('swapi.url') . "/vehicles/{$id}");

        $data = json_decode($response->getBody(), true);

        return response()->json($data);
    }
}
        