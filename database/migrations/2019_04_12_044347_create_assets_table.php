<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAssetsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('assets', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('sn');
            $table->unsignedBigInteger('modelname_id');
            $table->unsignedBigInteger('status_id');
            $table->timestamps();

            $table->foreign('modelname_id')
            ->references('id')
            ->on('modelnames')
            ->onDelete('restrict')
            ->onUpdate('cascade');

            $table->foreign('status_id')
            ->references('id')
            ->on('statuses')
            ->onDelete('restrict')
            ->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('assets');
    }
}
