<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSubscriptionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('subscriptions', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('user_id')->unsigned();
            $table->unsignedInteger('create_subscription_id')->unsigned();
            $table->date('active_date');
            $table->string('status')->default(1);
            $table->date('cancel_date')->nullable();
            $table->foreign('user_id')->references('id')->on('categories')->onDelete('users')->onUpdate('cascade');
            $table->foreign('create_subscription_id')->references('id')->on('create_subscriptions')->onDelete('restrict')->onUpdate('cascade');

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
        Schema::dropIfExists('subscriptions');
    }
}
