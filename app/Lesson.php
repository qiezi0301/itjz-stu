<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Lesson extends Model
{
    protected $fillable = ['user_id','serie_id','title', 'body', 'video_Path', 'views_count','comments_count','close_comment','is_hidden'];

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function serie() {
        return $this->belongsTo(Serie::class, 'serie_id');
    }

    //  eloquent 的多态关联关系
    public function comments() {
        return $this->hasMany(Comment::class,'commentable_id');
    }

    //获取这篇文章的评论以parent_id来分组
    public function getComments()
    {
        return $this->comments()->with('user')->get()->groupBy('parent_id');
    }
}
