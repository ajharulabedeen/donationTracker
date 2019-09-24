
<?php
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Expanse extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('expanse', function (Blueprint $table) {
            $table->increments('id');
            $table->string('post_id',191);
            $table->mediumText('purpose');
            $table->string('date');
            $table->mediumText('notes');
            $table->string('privacy_notes',512);
            $table->date('created_at');
            $table->date('updated_at');
            $table->string('amount',191);
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
