<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSalesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sales', function (Blueprint $table) {
            $table->string('nota_id', 30);
            $table->primary('nota_id');
            //$table->integer('customer_id');
            $table->string('customer_id',30);
            $table->foreign('customer_id')->references('customer_id')->on('customers')->onUpdate('cascade')->onDelete('cascade');
            //$table->integer('user_id');
            $table->string('user_id',30);
            $table->foreign('user_id')->references('user_id')->on('users')->onUpdate('cascade')->onDelete('cascade');
            $table->date('nota_date');
            $table->float('total_payment', 10,0);
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
        Schema::dropIfExists('sales');

        Schema::table('sales', function(Blueprint $table){
            $table->dropForeign('sales_customer_id_foreign');
        });

        Schema::table('sales', function(Blueprint $table){
            $table->dropIndex('sales_customer_id_foreign');
        });

        Schema::table('sales', function(Blueprint $table){
            $table->integer('customer_id')->change();
        });

        Schema::table('sales', function(Blueprint $table){
            $table->dropForeign('sales_user_id_foreign');
        });

        Schema::table('sales', function(Blueprint $table){
            $table->dropIndex('sales_user_id_foreign');
        });

         Schema::table('sales', function(Blueprint $table){
            $table->integer('user_id')->change();
        });
    }
}
