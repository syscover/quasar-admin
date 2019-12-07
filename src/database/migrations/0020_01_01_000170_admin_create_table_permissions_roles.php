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

                $table->uuid('permission_uuid');
                $table->uuid('role_uuid');

                $table->primary(['permission_uuid', 'role_uuid']);
                $table->foreign('permission_uuid', 'admin_permissions_roles_permission_uuid_fk')
                    ->references('uuid')
                    ->on('admin_permission')
                    ->onDelete('cascade')
                    ->onUpdate('cascade');
                $table->foreign('role_uuid', 'admin_permissions_roles_role_uuid_fk')
                    ->references('uuid')
                    ->on('admin_role')
                    ->onDelete('cascade')
                    ->onUpdate('cascade');
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