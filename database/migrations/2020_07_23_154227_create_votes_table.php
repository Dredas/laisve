<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVotesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('votes', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->integer('election');
            $table->integer('tour');

            $table->integer('party')->nullable();;
            $table->integer('candidate')->nullable();;

            $table->integer('county')->nullable();
            $table->integer('district')->nullable();

            $table->integer('votes')->nullable()->default(null);
            $table->integer('post_votes')->nullable()->default(null);
            $table->integer('total_votes')->nullable()->default(null);

            $table->boolean('skipped')->nullable()->default(false);
            $table->integer('skipped_key')->nullable()->default(false);

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('votes');
    }
}
