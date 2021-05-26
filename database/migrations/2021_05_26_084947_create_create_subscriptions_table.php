<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCreateSubscriptionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('create_subscriptions', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->float('price', 8, 2);
            $table->float('interest_rate', 8, 2);
            $table->float('total_earning', 12, 2)->default(0);
            $table->date('start_date');
            $table->string('bill_type');
            $table->integer('maturity_date');
            $table->integer('status')->default(1);
            $table->integer('created_by')->nullable();
            $table->integer('updated_by')->nullable();
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
        Schema::dropIfExists('create_subscriptions');
    }
}
