<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReadsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reads', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('craw_id');
            $table->unsignedBigInteger('notification_id');
            $table->dateTime('date_of_read');
            $table->timestamps();

            $table->foreign('craw_id')->references('id')->on('craws')
                ->onUpdate('cascade')
                ->onDelete('cascade');

            $table->foreign('notification_id')->references('id')->on('notifications')
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
        Schema::dropIfExists('reads');
    }
}
