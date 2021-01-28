<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSalesDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sales_details', function (Blueprint $table) {
            $table->string('nota_id', 30);
            $table->foreign('nota_id')->references('nota_id')->on('sales')->onUpdate('cascade')->onDelete('cascade');
            //$table->integer('product_id');
            $table->string('product_id',30);
            $table->foreign('product_id')->references('product_id')->on('products')->onUpdate('cascade')->onDelete('cascade');
            $table->primary(['nota_id', 'product_id']);
            $table->float('quantity', 2, 0);
            $table->float('selling_price', 10,0);
            $table->float('discount', 10,0);
            $table->float('total_price', 10,0);
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
        Schema::dropIfExists('sales_details');

        Schema::table('sales_details', function(Blueprint $table){
            $table->dropForeign('sales_details_nota_id_foreign');
        });

        Schema::table('sales_details', function(Blueprint $table){
            $table->dropIndex('sales_details_nota_id_foreign');
        }); 

        Schema::table('sales_details', function(Blueprint $table){
            $table->integer('nota_id')->change();
        });

        Schema::table('sales_details', function(Blueprint $table){
            $table->dropForeign('sales_details_product_id_foreign');
        });

        Schema::table('sales_details', function(Blueprint $table){
            $table->dropIndex('sales_details_product_id_foreign');
        }); 

        Schema::table('sales_details', function(Blueprint $table){
            $table->integer('product_id')->change();
        });
    }
}
