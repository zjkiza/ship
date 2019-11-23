<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCrawsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('craws', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('sur_name');
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('rank_id');
            $table->string('ship_id', 8);
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')
                ->onUpdate('cascade')
                ->onDelete('cascade');

            $table->foreign('rank_id')->references('id')->on('ranks')
                ->onUpdate('cascade')
                ->onDelete('cascade');

            $table->foreign('ship_id')->references('serial_number')->on('ships')
                ->onUpdate('cascade')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('craws');
    }
}
