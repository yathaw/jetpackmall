<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('items', function (Blueprint $table) {
            $table->id();
            $table->string('codeno');
            $table->string('name');
            $table->longText('photo');
            $table->string('price');
            $table->string('discount');
            $table->longText('description')->nullable();

            $table->foreignId('subcategory_id')
                    ->references('id')
                    ->on('subcategories')
                    ->onDelete('cascade');

            $table->foreignId('brand_id')
                    ->references('id')
                    ->on('brands')
                    ->onDelete('cascade');

            $table->softDeletes();
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
        Schema::dropIfExists('items');
    }
}
