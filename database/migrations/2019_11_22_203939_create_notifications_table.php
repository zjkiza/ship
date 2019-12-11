<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNotificationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('notifications', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('rank_id');
            $table->string('ship_id', 60);
            $table->text('message');
            $table->timestamps();

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
        Schema::dropIfExists('notifications');
    }
}
