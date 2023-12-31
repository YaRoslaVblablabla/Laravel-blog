<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostUserLikesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('post_user_likes', function (Blueprint $table) {
            $table->id();
            
            $table->unsignedBigInteger('post_id');
            $table->unsignedBigInteger('user_id');

            $table->index('post_id', 'put_post_idx');
            $table->index('user_id', 'put_user_idx');

            $table->foreign('post_id', 'put_post_fk')->on('posts')->references('id');
            $table->foreign('user_id', 'put_user_fk')->on('users')->references('id');
           
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
        Schema::dropIfExists('post_user_likes');
    }
}
