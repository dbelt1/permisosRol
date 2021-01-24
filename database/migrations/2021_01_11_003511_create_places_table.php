<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePlacesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('places', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->boolean('state')->default(1);
            $table->string('image');
            $table->text('description');
            $table->boolean('timeline')->default(0);
            $table->timestamp('createdDate')->nullable();
            $table->foreignId('category_id')->references('id')->on('categories');
            $table->char('length')->nullable();
            $table->char('latitude')->nullable();
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
        Schema::dropIfExists('places');
    }
}
