<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCommentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comments', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('user_id');
            $table->text('body');
            //多态关联
            $table->unsignedInteger('commentable_id');
            $table->string('commentable_type');
            //嵌套评论
            $table->unsignedInteger('parent_id')->nullable();
            //评论层级
            $table->smallInteger('level')->default(1);
            //屏蔽评论
            $table->string('is_hidden', 8)->default('F');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('comments');
    }
}
