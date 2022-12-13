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
            $table->string('address');
            $table->integer('precio');
            $table->string('phone');
            $table->string('cantidad');
            $table->string('image')->nullable();
            $table->string('observation')->nullable();
            $table->integer('total');

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
