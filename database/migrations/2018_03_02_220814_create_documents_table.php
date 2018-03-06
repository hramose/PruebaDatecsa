<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateDocumentsTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('documents', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre_archivo');
            $table->integer('tipo_documento')->unsigned();
            $table->integer('user_id')->unsigned();
            $table->string('indice1');
            $table->string('indice2');
            $table->string('indice3');
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('tipo_documento')->references('id')->on('type_documents');
            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('documents');
    }
}
