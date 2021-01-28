<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            //$table->integer('product_id')->autoIncrement();
            $table->string('product_id', 30);
            $table->primary('product_id');
            //$table->integer('category_id');
            $table->string('category_id',30);
            $table->foreign('category_id')->references('category_id')->on('categories')->onUpdate('cascade')->onDelete('cascade');
            $table->string('product_name', 50);
            $table->float('product_price', 10,0);
            $table->float('product_stock', 3,0);
            $table->text('explanation')->nullable();
            $table->boolean('status')->default(1);
            $table->timestamps();
            $table->timestamp('deleted_at',0)->nullable();

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

        Schema::table('products', function(Blueprint $table){
            $table->dropForeign('products_category_id_foreign');
        });

        Schema::table('products', function(Blueprint $table){
            $table->dropIndex('products_category_id_foreign');
        });

        Schema::table('products', function(Blueprint $table){
            $table->integer('category_id')->change();
        });
    }
}
