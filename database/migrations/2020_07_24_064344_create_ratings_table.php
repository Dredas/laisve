<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRatingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ratings', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->integer('election');

            $table->integer('party')->nullable();;
            $table->integer('candidate')->nullable();;

            $table->integer('county')->nullable();
            $table->integer('district')->nullable();

            $table->integer('priority_score')->nullable()->default(null);

            $table->boolean('skipped')->nullable()->default(false);
            $table->integer('skipped_key')->nullable()->default(false);
            $table->string('skipped_file')->nullable()->default(false);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ratings');
    }
}
