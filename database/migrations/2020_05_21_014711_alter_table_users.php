<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterTableUsers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string("username", 100)->unique()->after('email_verified_at');
            $table->string("roles", 50)->after('password');
            $table->text("address")->after('roles');
            $table->string("phone", 50)->after('address');
            $table->string("avatar")->nullable(true)->after('phone');
            $table->enum("status", ["ACTIVE", "INACTIVE"])->after('avatar');
            $table->softDeletes();
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
            $table->dropColumn(['username', 'roles', 'address', 'phone', 'avatar', 'status']);
        });
    }
}
