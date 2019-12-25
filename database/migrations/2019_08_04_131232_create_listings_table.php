<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateListingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('listings', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('active');
            $table->string('title');
            $table->string('category');
            $table->date('start_date');
            $table->date('end_date');
            $table->string('address');
            $table->string('city');
            $table->string('state')->default('LA');
            $table->string('zip');
            $table->string('public_description');
            $table->string('private_description');
            $table->integer('shares');
            $table->string('share_price');
            $table->string('minimum_raise');
            $table->string('target_raise');
            $table->string('document_1_title');
            $table->string('document_1_path');
            $table->string('document_2_title');
            $table->string('document_2_path');
            $table->string('document_3_title');
            $table->string('document_3_path');
            $table->string('document_4_title');
            $table->string('document_4_path');
            $table->string('document_5_title');
            $table->string('document_5_path');
            $table->string('image_1_path');
            $table->string('image_2_path');
            $table->string('image_3_path');
            $table->string('image_4_path');
            $table->string('image_5_path');
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
        Schema::dropIfExists('listings');
    }
}
