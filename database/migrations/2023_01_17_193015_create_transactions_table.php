<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransactionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transactions', function (Blueprint $table) {
            $table->id('id_transaction');
            $table->string('user_id');
            $table->string('item_id');
            $table->integer('quantity');
            $table->enum('status', ['non-checkout', 'checkout']);
            $table->string('receiver_name')->nullable();
            $table->string('receiver_address')->nullable();
            $table->date('date_checkout')->nullable();
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
        Schema::dropIfExists('transactions');
    }
}
