<?php

namespace App\Http\Controllers;

use App\Lesson;
use Illuminate\Http\Request;
use GrahamCampbell\Markdown\Facades\Markdown;

class LessonController extends Controller {
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Lesson $lesson
     * @return \Illuminate\Http\Response
     */
    public function show(Lesson $lesson) {
        return response()->json([
            'status'      => 'success',
            'status_code' => 200,
            'data'        => [
                'lesson' => $this->lessonTransform($lesson)
            ]
        ]);
    }

    private function lessonTransform(Lesson $lesson) {
        return [
            'title'         => $lesson['title'],
            'serie_id'      => $lesson['serie_id'],
            'serie'         => $lesson->serie->title,
            'body'          => Markdown::convertToHtml($lesson['body']),
            'video_Path'    => env('OSS_URL') . $lesson['video_Path'],
            'close_comment' => $lesson['close_comment'],
            'is_hidden'     => $lesson['is_hidden'],
            'updated_at'    => date('Y-m-d', strtotime($lesson['updated_at'])),
        ];
    }

//    public function lessonsBySerie(Lesson $lesson) {
//        $lessons = Lesson::where('serie_id', $lesson['serie_id'])->get();
//        return response()->json([
//            'status'      => 'success',
//            'status_code' => 200,
//            'data'        => [
//                'lessons' => $this->lessonsTransform($lessons)
//            ]
//        ]);
//    }
//
//    private function lessonsTransform($lessons) {
//        return array_map(function ($lesson) {
//            return [
//                'id'         => $lesson['id'],
//                'title'      => $lesson['title']
//            ];
//        }, $lessons->toArray());
//    }
}
