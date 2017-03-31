<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCatagoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('catagories', function (Blueprint $table) {
            $table->increments('id');
            $table->text('name');
            $table->text('logo_url')->after('name');
            $table->timestamps();

        });
    }


    public function down()
    {
        Schema::drop('catagories');
    }
}
