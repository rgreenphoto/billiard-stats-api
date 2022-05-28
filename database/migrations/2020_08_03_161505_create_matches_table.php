<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMatchesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('matches', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('user_id')->unsigned()->index();
            $table->bigInteger('opponent_id')->unsigned()->nullable()->index();
            $table->bigInteger('venue_id')->unsigned()->index();
            $table->bigInteger('format_id')->unsigned()->index();
            $table->bigInteger('game_type_id')->unsigned()->index();
            $table->bigInteger('table_type_id')->unsigned()->index();
            $table->bigInteger('rack_type_id')->unsigned()->index();
            $table->boolean('is_scotch_doubles')->default(0);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('matches');
    }
}
