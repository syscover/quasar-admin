<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AdminCreateTableResource extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		if(! Schema::hasTable('admin_resource'))
		{
			Schema::create('admin_resource', function (Blueprint $table) {
				$table->engine = 'InnoDB';

                $table->increments('id');
                $table->uuid('uuid');
				$table->uuid('package_uuid');
                $table->string('name');
                $table->boolean('has_field_group')->default(false);

                $table->timestamps();
                $table->softDeletes();

                $table->index('uuid', 'admin_package_uuid_idx');
				$table->foreign('package_uuid', 'admin_resource_package_uuid_fk')
					->references('uuid')
					->on('admin_package')
					->onDelete('restrict')
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
		Schema::dropIfExists('admin_resource');
	}
}
