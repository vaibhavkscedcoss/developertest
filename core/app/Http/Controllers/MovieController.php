<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MovieModel;

class MovieController extends Controller
{
    /**
     * Load Main view file
     *
     * @return void
     */

    public function mainView()
    {
        return view('mainView');
    }

    /**
     * Process Search of Users
     *
     * @return
     *  json data
     */
    public function processSearchMovies(Request $request)
    {
        $movieToSearch = $request->input('searchValue');

        if (!empty($movieToSearch)) {
            $apiUrl = env('OMDB_URL', 'http://www.omdbapi.com/');
            $apiKey = env('OMDB_API_KEY', '');
            $url =  $apiUrl . '?s=' . $movieToSearch . '&apikey=' . $apiKey;

            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, $url);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            $result = curl_exec($ch);
            $response = json_decode($result, true);
            $res = isset($response['Search']) ? $response['Search'] : [];

            if (!empty($res)) {
                foreach ($res as $value) {
                    $movieDetails[] = [
                        'title' => $value['Title'],
                        'year' => $value['Year'],
                        'type' => $value['Type'],
                        'image' => $value['Poster'],
                        'color' => $movieToSearch,
                    ];

                    MovieModel::insertData([
                        'title' => $value['Title'],
                        'year' => $value['Year'],
                        'type' => $value['Type'],
                        'poster' => $value['Poster'],
                    ]);
                }
                return response()->json(['status' => 'success', 'data' => $movieDetails]);
            }
        } else {
            return response()->json(['status' => 'error', 'message' => "Something went wrong."]);
        }
    }
}
