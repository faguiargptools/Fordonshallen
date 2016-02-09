<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Eloquent\Model;

class CreateProdukterTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Model::unguard();
        Schema::create('produkter',function(Blueprint $table){
            $table->increments("id");
            $table->string("name");
            $table->text("short_desc");
            $table->text("long_desc");
            $table->string("article_number");
            $table->string("type");
            $table->decimal("price", 15, 2);
            $table->string("variation")->nullable();
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
        Schema::drop('produkter');
    }

}