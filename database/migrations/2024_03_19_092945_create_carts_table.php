<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCartsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('carts', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            // Khi bản ghi cha bị xóa, bản ghi con cũng bị xóa
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->string('name_prd');
            $table->string('img_prd');
            $table->integer('quantity_prd');
            $table->string('price_prd');
            $table->smallInteger('status_cart')->comment('CartStatusEnum')->index();
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
        Schema::dropIfExists('carts');
    }
}
