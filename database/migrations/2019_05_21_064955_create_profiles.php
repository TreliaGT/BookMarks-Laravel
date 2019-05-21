<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProfiles extends Migration
{
    /**
     * Run the migrations.
     *
    Table profiles {
    user_id int [primary key, ref: > users.id]
    photo varchar(255)
    email varchar(320)
    first_name varchar(255)
    last_name varchar(255)
    }
     * @return void
     */
    public function up()
    {
        Schema::create('profiles', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->text('photo');
            $table->string('email', '320');
            $table->string('first_name', '255');
            $table->string('last_name', '255');
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
        Schema::dropIfExists('profiles');
    }
}
