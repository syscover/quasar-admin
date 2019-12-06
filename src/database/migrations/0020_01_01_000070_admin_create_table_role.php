<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AdminCreateTableRole extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		if(! Schema::hasTable('admin_role'))
		{
			Schema::create('admin_role', function (Blueprint $table) {
				$table->engine = 'InnoDB';
				
                $table->increments('id');
                $table->uuid('uuid');
				$table->string('name');

                $table->timestamps();
                $table->softDeletes();

                $table->index('uuid', 'admin_role_uuid_idx');
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
		Schema::dropIfExists('admin_role');
	}
}