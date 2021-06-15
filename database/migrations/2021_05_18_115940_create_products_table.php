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
            $table->string('name',128)->unique();
            $table->double('price')->default(0);
            $table->double('new_price')->default(0);
            $table->boolean('in_stock');
            $table->string('barcode',128)->unique();
            $table->text('description')->nullable();
            $table->string('imagepath',255)->nullable();
            $table->integer('kCal');
            $table->integer('protein');
            $table->integer('fats');
            $table->integer('carbohydrates');
            $table->integer('category_id')->unsigned();;
            $table->timestamps();
        });

        Schema::table('products', function($table) {
            $table->foreign('category_id')
                ->references('id')
                ->on('categories')
                ->onDelete('cascade');
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
