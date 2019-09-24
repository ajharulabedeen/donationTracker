<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Donations extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('donations', function (Blueprint $table) {
            $table->increments('id',191);
            $table->string('post_id',191);
            $table->string('amount',191);
            $table->string('date');
            
            $table->string('name',512);
            $table->string('address',512);
            $table->string('email',512);
            $table->string('phone',512);
            $table->string('privacy_donner');
            
            $table->mediumText('notes');
            $table->string('privacy_notes');
            $table->date('created_at');
            $table->date('updated_at');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
