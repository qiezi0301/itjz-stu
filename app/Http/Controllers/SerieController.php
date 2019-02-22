<?php

namespace App\Http\Controllers;

use App\Serie;
use Illuminate\Http\Request;

class SerieController extends Controller
{
    public function index() {
        return Serie::paginate(30);
    }

    public function show(Serie $serie) {
        return $serie;
    }
}
