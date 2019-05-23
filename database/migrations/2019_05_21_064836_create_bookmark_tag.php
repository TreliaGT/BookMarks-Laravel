<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBookmarkTag extends Migration
{
    /**
     * Run the migrations.
     *Table bookmark_tag {
    bookmark_id int [primary key, ref: > bookmarks.id]
    tag_id int [primary key, ref: > tags.id]
    }

     * @return void
     */
    public function up()
    {
        Schema::create('bookmark_tag', function (Blueprint $table) {
            $table->integer('bookmark_id');
            $table->integer('tag_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('bookmark_tag');
    }
}
