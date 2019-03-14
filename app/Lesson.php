<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Lesson extends Model
{
    protected $fillable = ['user_id','serie_id','title', 'body', 'video_Path', 'views_count','comments_count','close_comment','is_hidden'];

    public function serie() {
        return $this->belongsTo(Serie::class, 'serie_id');
    }
}
