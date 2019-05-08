<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAssetUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('asset_user', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('req_num')->unique();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('modelname_id');
            $table->unsignedBigInteger('asset_id')->nullable();
            $table->unsignedBigInteger('status_id');
            $table->timestamps();

            $table->foreign('user_id')
            ->references('id')
            ->on('users')
            ->onDelete('restrict')
            ->onUpdate('cascade');

            $table->foreign('modelname_id')
            ->references('id')
            ->on('modelnames')
            ->onDelete('restrict')
            ->onUpdate('cascade');

            $table->foreign('asset_id')
            ->references('id')
            ->on('assets')
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
        Schema::dropIfExists('asset_user');
    }
}
