<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCheckoutsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('checkouts', function (Blueprint $table) {
            $table->id();

            $table->engine = 'InnoDB';
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('book_id');

           $table->dateTime('checkout_date');
           $table->dateTime('return_date');
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');;
            $table->foreign('book_id')->references('id')->on('books')->onDelete('cascade');;


        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('checkouts');
    }
}
