<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCustomersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::create('customers', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('Qr');
            $table->string('c_name');
            $table->string('phone');
            $table->string('email');
            $table->string('national_id')->nullable();
            $table->unsignedBigInteger('c_id');
            $table->unsignedBigInteger('id_e');
            $table->string('image');
            $table->string('user');
            $table->string('ticket_count');
            $table->string('ticket_type');
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('c_id')->references('id')->on('colleges')->onDelete('cascade');
            $table->foreign('id_e')->references('id')->on('areas')->onDelete('cascade');


        });
//        Schema::table('customers', function (Blueprint $table) {
//
//        });
    }
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('customers');
    }
}
