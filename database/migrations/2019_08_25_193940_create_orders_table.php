<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('itemid');
            $table->string('itemname');
            $table->string('userid');
            $table->string('paymentid');
            $table->string('paymenttype');
            $table->string('address');
            $table->integer('qty');
            $table->double('price');
            $table->string('ordertype');
            $table->string('chefid')->nullable();
            $table->string('paystatus');
            $table->string('chefstatus');
            $table->string('orderstatus');
            $table->decimal('long', 10, 7);/* latitude */
            $table->decimal('lat', 10, 7);/* longitude */
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
        Schema::dropIfExists('orders');
    }
}
