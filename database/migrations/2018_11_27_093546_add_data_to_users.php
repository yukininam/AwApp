<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddDataToUsers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('address',255)->nullable()->after('name');
            $table->string('city',100)->nullable()->after('address');
            $table->string('state',100)->nullable()->after('city');
            $table->string('country',100)->nullable()->after('state');
            $table->string('pincode',100)->nullable()->after('country');
            $table->string('mobile',100)->nullable()->after('pincode');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            //
        });
    }
}
