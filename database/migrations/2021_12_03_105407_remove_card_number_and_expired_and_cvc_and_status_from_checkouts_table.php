<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RemoveCardNumberAndExpiredAndCvcAndStatusFromCheckoutsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('checkouts', function (Blueprint $table) {
            $table->dropColumn([
                'card_number',
                'expired',
                'cvc',
                'status',
            ]);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('checkouts', function (Blueprint $table) {
            $table->string('card_number', 20)->nullable()->after('id');
            $table->date('expired')->nullable()->after('card_number');
            $table->string('cvc', 3)->nullable()->after('expired');
            $table->string('status')->default('PENDING')->after('cvc');
        });
    }
}
