<?php

namespace App\Http\Controllers;

use App\Serie;
use Illuminate\Http\Request;

class SerieController extends Controller {
    public function index() {

        $series = Serie::all();
        return response()->json([
            'status' => 'success',
            'status_code' => 200,
            'data' => $this->transform($series)
        ]);
//        return Serie::paginate(30);
    }

    private function transform($series) {
        return array_map(function ($serie) {
            return [
                'id'       => $serie['id'],
                'title'       => $serie['title'],
                'description' => $serie['description'],
                'banner'      => env('OSS_URL').$serie['banner']
            ];
        }, $series->toArray());
    }

    public function show(Serie $serie) {
        return $serie;
    }
}
