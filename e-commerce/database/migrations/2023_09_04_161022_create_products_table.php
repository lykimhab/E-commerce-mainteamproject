<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedBigInteger('category_id'); // Foreign key column
            $table->string('name');
            $table->mediumText('small_description');
            $table->longText('description');
            $table->decimal('original_price');
            $table->decimal('selling_price');
            $table->string('images');
            $table->integer('qty_stock');
            $table->decimal('tax');
            $table->tinyInteger('status')->default(0);
            $table->tinyInteger('trending')->default(0);
            $table->mediumText('meta_title');
            $table->mediumText('meta_keywords');
            $table->mediumText('meta_description');
            // Define the foreign key constraint
            $table->foreign('category_id')
                ->references('id')
                ->on('categories')
                ->onDelete('cascade'); // This ensures that if a category is deleted, associated products are also deleted.

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
        Schema::dropIfExists('products');
    }
}
