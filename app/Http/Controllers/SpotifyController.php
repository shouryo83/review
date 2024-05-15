<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;

class SpotifyController extends Controller
{
    public function getPlaylists()
    {
        $accessToken = session('spotify_access_token');
        // ユーザーのプレイリストを取得
        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . $accessToken
        ])->get('https://api.spotify.com/v1/users/314fcjmchs5c2y63xgxgsbc3gcvi/playlists');
        // レスポンスをデコード
        $playlists = json_decode($response->getBody(), true);
        $playlistDetails = [];
        // 各プレイリストIDについて詳細情報を取得
        foreach ($playlists['items'] as $playlist) {
            $playlistId = $playlist['id'];
            $response2 = Http::withHeaders([
                'Authorization' => 'Bearer ' . $accessToken
            ])->get('https://api.spotify.com/v1/playlists/' . $playlistId);
            $playlistDetails[] = json_decode($response2->getBody(), true);
        }
        // dd($playlistDetails);
        // ビューにデータを渡す
        unset($playlistDetails[0],$playlistDetails[10]);
        krsort($playlistDetails);
        // dd($playlistDetails);
        return view('playlists.index')->with(['playlists' => $playlistDetails]);
    }
}
