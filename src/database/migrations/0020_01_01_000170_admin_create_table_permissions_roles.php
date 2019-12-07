<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AdminCreateTablePermissionsRoles extends Migration 
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
        if(! Schema::hasTable('admin_permissions_roles'))
        {
            Schema::create('admin_permissions_roles', function (Blueprint $table) {
                $table->engine = 'InnoDB';

                $table->integer('permission_uuid')->unsigned();
                $table->integer('role_uuid')->unsigned();

                $table->primary(['permission_uuid', 'role_uuid']);
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
        Schema::dropIfExists('admin_permissions_roles');
	}
}