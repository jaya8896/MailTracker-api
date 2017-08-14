<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSentTokensTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sent_tokens', function (Blueprint $table) {
            $table->integer('created_by')->unsigned();
            $table->increments('id');
            $table->integer('opens')->default(0);
            $table->timestamps('created_at');
        });

        Schema::table('sent_tokens', function (Blueprint $table){
            $table->foreign('created_by')->references('id')->on('users')->onDelete('cascade');
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sent_tokens');
    }
}