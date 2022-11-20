<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('blogs_categories', function (Blueprint $table) {
            $table->id();
            $table->unsignedBiginteger('blogs_id')->unsigned();
            $table->unsignedBiginteger('categories_id')->unsigned();

            $table->foreign('blogs_id')->references('id')
                ->on('blogs')->onDelete('cascade');
            $table->foreign('categories_id')->references('id')
                ->on('categories')->onDelete('cascade');
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
        Schema::dropIfExists('blogs_categories');
    }
};
