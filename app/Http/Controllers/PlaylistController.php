<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;

class PlaylistController extends Controller
{
    public function show($id)
    {
        $accessToken = session('spotify_access_token');
        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . $accessToken
        ])->get('https://api.spotify.com/v1/playlists/' . $id);
        $playlistDetails = json_decode($response->getBody(), true);
        // dd($playlistDetails);
        return view('playlists.show')->with(['playlists' => $playlistDetails]);
    }
}
