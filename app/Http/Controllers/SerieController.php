<?php

namespace App\Http\Controllers;

use App\Lesson;
use App\Serie;
use Illuminate\Http\Request;

class SerieController extends Controller {
    public function index() {

        $series = Serie::all();
        return response()->json([
            'status'      => 'success',
            'status_code' => 200,
            'data'        => $this->transform($series)
        ]);
//        return Serie::paginate(30);
    }

    private function transform($series) {
        return array_map(function ($serie) {
            $lessons = Lesson::where('serie_id', $serie['id'])->get();
            return [
                'id'          => $serie['id'],
                'title'       => $serie['title'],
                'description' => str_limit($serie['description'], 100),
                'banner'      => env('OSS_URL') . $serie['banner'],
                'durationCount'    => collect($lessons)->pluck('id')->sum(),
                'videoCount' => collect($lessons)->count(),
                'lessons'    => $this->lessonTransform($lessons)


            ];
        }, $series->toArray());
    }

    public function show(Serie $serie) {

        return response()->json([
            'status'      => 'success',
            'status_code' => 200,
            'data'        => [
                'serie'   => $this->serieTransform($serie),
                'lessons' => $this->lessonTransform($serie->lessons)
            ]
        ]);
    }

    private function lessonTransform($lessons) {
        return array_map(function ($lesson) {
            return [
                'id'    => $lesson['id'],
                'title' => $lesson['title'],
                'duration' => $lesson['duration'],
                'updated_at' => date('Y-m-d', strtotime($lesson['updated_at']))
            ];
        }, $lessons->toArray());
    }

    private function serieTransform($serie) {
        return [
            'title'       => $serie['title'],
            'description' => $serie['description'],
        ];
    }
}
