<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSocialMediaLinks extends Migration
{
    /**
     * Run the migrations.
     *Table social_media_links {
    id int [primary key]
    name varchar(50)
    tag varchar(255)
    profile_id int [ref: > profiles.user_id]
    }
     * @return void
     */
    public function up()
    {
        Schema::create('social_media_links', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name', '50');
            $table->string('tag','255');
            $table->integer('profile_id');
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
        Schema::dropIfExists('social_media_links');
    }
}
