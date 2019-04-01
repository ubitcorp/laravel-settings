<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create(config('settings.model'), function (Blueprint $table) {
            $table->increments('id');
            $table->string('model_type');
            $table->unsignedBigInteger('model_id');            
            $table->string('keyword');
            $table->string('value');
            $table->string('info')->nullable();
            $table->timestamps();
            $table->unique(['model_type', 'model_id', 'keyword']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists(config('settings.model'));        
    }
}
