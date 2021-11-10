<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCheckoutsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('checkouts', function (Blueprint $table) {
            $table->id();
            $table->string('card_number', 20);
            $table->date('expired');
            $table->string('cvc', 3);
            $table->string('status')->default('PENDING');
            $table->timestamps();
            $table->softDeletes();
            $table->foreignId('user_id')->constrained();
            $table->foreignId('camp_id')->constrained();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('checkouts');
    }
}
