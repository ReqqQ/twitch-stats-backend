<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users_twitch_details', function (Blueprint $table) {
            $table->unsignedBigInteger('user_id');
            $table->string('display_name');
            $table->integer('twitch_id');
            $table->string('broadcaster_type');
            $table->text('twitch_description');
            $table->string('profile_image_url');
            $table->string('offline_image_url');
            $table->string('twitch_created_at');
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users_twitch_details');
    }
};
