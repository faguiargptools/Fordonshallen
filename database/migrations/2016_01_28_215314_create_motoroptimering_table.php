<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Eloquent\Model;

class CreateMotoroptimeringTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Model::unguard();
        Schema::create('motoroptimering',function(Blueprint $table){
            $table->increments("id");
            $table->string("type");
            $table->string("brand");
            $table->string("model");
            $table->string("engine")->nullable();
            $table->string("fuel")->nullable();
            $table->string("prefx")->nullable();
            $table->string("postfk")->nullable();
            $table->string("prenm")->nullable();
            $table->string("postnm")->nullable();
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
        Schema::drop('motoroptimering');
    }

}