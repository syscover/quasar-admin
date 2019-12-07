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

                $table->uuid('role_uuid');
                $table->uuid('user_uuid');

                $table->primary(['role_uuid', 'user_uuid']);
                $table->foreign('role_uuid', 'admin_roles_users_role_uuid_fk')
                    ->references('uuid')
                    ->on('admin_role')
                    ->onDelete('cascade')
                    ->onUpdate('cascade');
                $table->foreign('user_uuid', 'admin_roles_users_user_uuid_fk')
                    ->references('uuid')
                    ->on('admin_user')
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
        Schema::dropIfExists('admin_roles_users');
	}
}