<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePedidosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pedidos', function (Blueprint $table) {
            $table->id();

            $table->string('name');
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('id_product');
            $table->unsignedBigInteger('categoryProd_id');
            $table->string('estado');
            $table->string('description');
            $table->integer('precio');
            $table->integer('cantidad');
            $table->string('image')->nullable();

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
        Schema::dropIfExists('pedidos');
    }
}