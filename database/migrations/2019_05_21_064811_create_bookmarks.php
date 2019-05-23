<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBookmarks extends Migration
{
    /**
     * Run the migrations.
     *
    Table bookmarks {
    id int [primary key]
    title varchar(255)
    url varchar(512)
    description text
    thumbnail text // URI or Base64 encoded?
    user_id int [ref: > users.id]
    }
     * @return void
     */
    public function up()
    {
        Schema::create('bookmarks', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title', '255');
            $table->string('url', '512');
            $table->text('description');
            $table->text('thumbnail');
            $table->integer('user_id');
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
        Schema::dropIfExists('bookmarks');
    }
}
