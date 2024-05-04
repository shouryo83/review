<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use GuzzleHttp\Client;

class AuthController extends Controller
{
    public function redirectToSpotify()
    {
        $query = http_build_query([
            'client_id' => env('SPOTIFY_CLIENT_ID'),
            'response_type' => 'code',
            'redirect_uri' => env('SPOTIFY_REDIRECT_URI'),
            'scope' => 'playlist-read-private playlist-modify-public',

        ]);
        return Redirect::to('https://accounts.spotify.com/authorize?' . $query);
    }
    
    public function handleSpotifyCallback(Request $request)
    {
        $client = new Client();
            $response = $client->post('https://accounts.spotify.com/api/token', [
            'form_params' => [
                'grant_type' => 'authorization_code',
                'code' => $request->code,
                'redirect_uri' => env('SPOTIFY_REDIRECT_URI'),
                'client_id' => env('SPOTIFY_CLIENT_ID'),
                'client_secret' => env('SPOTIFY_CLIENT_SECRET'),
            ],     
        ]);
        $tokens = json_decode($response->getBody(), true);
        $accessToken = $tokens['access_token'];
        $refreshToken = $tokens['refresh_token'];
        session([
            'spotify_access_token' => $accessToken,
            'spotify_refresh_token' => $refreshToken
        ]);
        return redirect('/playlists/index');
    }
}
