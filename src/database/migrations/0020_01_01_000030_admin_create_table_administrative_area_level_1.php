<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AdminCreateTableAdministrativeAreaLevel1 extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
        if(! Schema::hasTable('admin_administrative_area_level_1'))
        {
            Schema::create('admin_administrative_area_level_1', function (Blueprint $table) {
                $table->engine = 'InnoDB';

                $table->increments('id');
                $table->uuid('uuid');
                $table->uuid('country_common_uuid');
                $table->string('code', 8);
                $table->string('name');
                $table->string('slug');

                $table->timestamps();
                $table->softDeletes();

                $table->index('uuid', 'admin_administrative_area_level_1_idx');
                $table->index('slug', 'admin_administrative_area_level_1_slug_idx');
                $table->foreign('country_common_uuid', 'admin_administrative_area_level_1_country_common_uuid_fk')
                    ->references('common_uuid')
                    ->on('admin_country')
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
        Schema::dropIfExists('admin_administrative_area_level_1');
	}
}
