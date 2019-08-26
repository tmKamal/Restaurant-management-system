<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInventoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inventories', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('Product_Name');
            $table->string('Brand_Name');
            $table->string('Quantity');
            $table->string('Category');
            $table->date('Ordered_Date')->nullable();
            $table->date('Arrived_Date')->nullable();
            $table->date('Expire_Date')->nullable();
            $table->date('Manufactured_Date')->nullable();
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
        Schema::dropIfExists('inventories');
    }
}
