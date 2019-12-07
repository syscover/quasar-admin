<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AdminCreateTableProfilesUsers extends Migration 
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
        if(! Schema::hasTable('admin_profiles_users'))
        {
            Schema::create('admin_profiles_users', function (Blueprint $table) {
                $table->engine = 'InnoDB';

                $table->uuid('profile_uuid');
                $table->uuid('user_uuid');

                $table->primary(['profile_uuid', 'user_uuid']);
                $table->foreign('profile_uuid', 'admin_profiles_users_profile_uuid_fk')
                    ->references('uuid')
                    ->on('admin_profile')
                    ->onDelete('cascade')
                    ->onUpdate('cascade');
                $table->foreign('user_uuid', 'admin_profiles_users_user_uuid_fk')
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
        Schema::dropIfExists('admin_profiles_users');
	}
}