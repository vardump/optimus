<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOptSchedulsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('opt_scheduls', function (Blueprint $table) {
            $table->increments('id');
            $table->string('postId');
            $table->string('title');
            $table->string('caption');
            $table->string('link');
            $table->string('image');
            $table->string('description');
            $table->string('content');
            $table->string('fb');
            $table->string('fbg');
            $table->string('tw');
            $table->string('tu');
            $table->string('wp');
            $table->string('type');
            $table->string('pageId');
            $table->string('pageToken');
            $table->string('groupId');
            $table->string('blogName');
            $table->string('imagetype');
            $table->string('sharetype');
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
        Schema::drop('opt_scheduls');
    }
}
