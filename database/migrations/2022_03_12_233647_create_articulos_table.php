<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateArticulosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('articulos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('idcategoria');
            $table->string('codigo', 50)->nullable();
            $table->string('nombre', 100);
            $table->string('marca', 50)->nullable();
            $table->string('modelo', 50)->nullable();
            $table->string('codigo_interno', 20)->nullable();
            $table->decimal('precio_compra', 11, 2)->nullable();
            $table->decimal('precio_venta', 11, 2)->nullable();
            $table->decimal('precio_venta2', 11, 2)->nullable();
            $table->decimal('precio_venta3', 11, 2)->nullable();
            $table->integer('factor1')->nullable();
            $table->integer('factor2')->nullable();
            $table->integer('factor3')->nullable();
            $table->integer('stock')->nullable();
            $table->string('descripcion', 256)->nullable();
            $table->boolean('condicion')->default(1);
            $table->boolean('formatos')->default(1);
            $table->boolean('listapre')->default(1);
            $table->timestamps();

            $table->foreign('idcategoria')->references('id')->on('categories');


        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('articulos');
    }
}
