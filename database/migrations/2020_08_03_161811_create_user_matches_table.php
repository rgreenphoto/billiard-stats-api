<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserMatchesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_matches', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('user_id')->unsigned()->index();
            $table->bigInteger('match_id')->unsigned()->index();
            $table->bigInteger('partner_id')->unsigned()->nullable();
            $table->integer('format_skill_level')->nullable();
            $table->integer('fargo_rating')->nullable();
            $table->integer('other_rating')->nullable();
            $table->integer('race')->nullable();
            $table->integer('match_points')->nullable();
            $table->integer('match_score')->nullable();
            $table->integer('break_runs')->nullable();
            $table->integer('table_runs')->nullable();
            $table->integer('on_snaps')->nullable();
            $table->integer('rackless')->nullable();
            $table->integer('innings')->nullable();
            $table->boolean('home_team')->nullable();
            $table->boolean('is_win')->nullable();
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
        Schema::dropIfExists('user_matches');
    }
}
