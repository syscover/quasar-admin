<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AdminCreateTablePermission extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		if(! Schema::hasTable('admin_permission'))
		{
			Schema::create('admin_permission', function (Blueprint $table) {
                $table->engine = 'InnoDB';
                
                $table->increments('id');
                $table->uuid('uuid');
				$table->string('name');
                $table->string('package_uuid');
				
                $table->timestamps();
                $table->softDeletes();

                $table->index('uuid', 'admin_permission_uuid_idx');
				
				$table->foreign('package_uuid', 'admin_permission_package_uuid_fk')
					->references('uuid')
					->on('admin_package')
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
		Schema::dropIfExists('admin_permission');
	}
}