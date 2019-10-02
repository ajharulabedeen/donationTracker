<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Post extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->increments('id');
            $table->string('user_id',512);
            $table->string('title',512);
            $table->mediumText('description');
            $table->double('total_needed', 12, 2);
            $table->double('total_collected', 12, 2);
            $table->double('total_expanse', 12, 2);
            $table->string('start_date');
            $table->string('end_date');
            $table->boolean('active');
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
        Schema::dropIfExists('post');
    }
}
