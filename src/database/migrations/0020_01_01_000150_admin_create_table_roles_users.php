<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AdminCreateTableRolesUsers extends Migration 
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
        if(! Schema::hasTable('admin_roles_users'))
        {
            Schema::create('admin_roles_users', function (Blueprint $table) {
                $table->engine = 'InnoDB';

                $table->integer('role_uuid')->unsigned();
                $table->integer('user_uuid')->unsigned();

                $table->primary(['role_uuid', 'user_uuid']);
            });
        }
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
        Schema::dropIfExists('admin_roles_users');
	}
}