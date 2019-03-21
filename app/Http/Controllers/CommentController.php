<?php

namespace App\Http\Controllers;

use App\Comment;
use App\Lesson;
use Auth;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function store(Request $request)
    {
        $comment = Comment::create([
            'commentable_id'   => $request['model'],
            'commentable_type' => $request['type'],
            'parent_id'        => $request['parentId'],
            'user_id'          => Auth::guard('api')->user()->id,
            'body'             => $request['body']
        ]);

        return $comment;
    }

    public function lesson($id) {
        $lesson = Lesson::with('comments', 'comments.user', 'comments.replies')->where('id', $id)->first();
        $comments = $lesson->comments;

//        return $this->transform($comments);
        return $comments;
    }

    private function transform($comments) {
        return array_map(function ($comment) {
            return [
                'id'            => $comment['id'],
                'user_id'         => $comment['user_id'],
                'body'         => $comment['body'],
                'parent_id'         => $comment['parent_id'],
                'updated_at'         => $comment['updated_at'],
                'user'         => $comment['user'],
                'replies'         => $comment['user'],
            ];
        }, $comments->toArray());
    }
}
