<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AdminCreateTablePackage extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		if(! Schema::hasTable('admin_package'))
		{
			Schema::create('admin_package', function (Blueprint $table) {
				$table->engine = 'InnoDB';
				
				$table->increments('id');
                $table->uuid('uuid');
				$table->string('name');
                $table->string('root');
                $table->integer('sort')->unsigned();
                $table->boolean('active')->default(false);
				
                $table->timestamps();
                $table->softDeletes();

                $table->index('uuid', 'admin_package_uuid_idx');
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
	    Schema::dropIfExists('admin_package');
	}
}
