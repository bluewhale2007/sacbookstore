<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddAdminToMultiUsers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('multi_users', function (Blueprint $table) {
            $table->boolean('is_admin')->default(0)->after('sub_role');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('multi_users', function (Blueprint $table) {
            $table->dropColumn('is_admin');
        });
    }
}
