<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStoresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('store__stores', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('domain');
            $table->text('description');
            $table->string('web_site');
            $table->bigInteger('address_id')
                ->unsigned()
                ->nullable();
            $table->foreign('address_id')
                ->references('id')
                ->on('store__addresses');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('store__stores');
    }
}
