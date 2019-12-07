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

                $table->integer('profile_uuid')->unsigned();
                $table->integer('user_uuid')->unsigned();

                $table->primary(['profile_uuid', 'user_uuid']);
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