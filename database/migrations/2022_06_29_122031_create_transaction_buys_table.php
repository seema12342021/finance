<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransactionBuysTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transaction_buys', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id')->nullable();
            $table->integer('crypto')->nullable();
            $table->string('pay_amount')->nullable();
            $table->string('receive_amount')->nullable();
            $table->string('payment_mode')->nullable();
            $table->string('wallet_address')->nullable();
            $table->integer('payment_status')->nullable();
            $table->integer('is_active')->default(1);
            $table->integer('is_deleted')->default(1);
            $table->integer('created_by')->nullable();
            $table->integer('updated_by')->nullable();
            $table->dateTime('created_at')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->dateTime('updated_at')->nullable()->default(DB::raw('NULL on update CURRENT_TIMESTAMP'));
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('transaction_buys');
    }
}
