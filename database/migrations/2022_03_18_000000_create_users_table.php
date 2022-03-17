<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->unsignedBigInteger('id');
            $table->foreign('id')->references('id')->on('personas')->onDelete('cascade'); 
            
            $table->string('usuario')->unique();
            //$table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->boolean('condicion')->default(1);
            $table->unsignedBigInteger('idrol');
            $table->foreign('idrol')->references('id')->on('roles');
            
            $table->rememberToken();
            //$table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
