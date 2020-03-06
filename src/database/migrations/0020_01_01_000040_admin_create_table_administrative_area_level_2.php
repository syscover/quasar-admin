<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AdminCreateTableAdministrativeAreaLevel2 extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
        if(! Schema::hasTable('admin_administrative_area_level_2'))
        {
            Schema::create('admin_administrative_area_level_2', function (Blueprint $table) {
                $table->engine = 'InnoDB';

                $table->increments('id');
                $table->uuid('uuid');
                $table->uuid('country_uuid');
                $table->uuid('administrative_area_level_1_uuid');
                $table->string('name');
                $table->string('slug');

                $table->timestamps();
                $table->softDeletes();

                $table->index('uuid', 'admin_administrative_area_level_2_idx');
                $table->index('slug', 'admin_administrative_area_level_2_slug_idx');
                $table->foreign('country_uuid', 'admin_administrative_area_level_2_country_uuid_fk')
                    ->references('uuid')
                    ->on('admin_country')
                    ->onDelete('restrict')
                    ->onUpdate('cascade');
                // 'admin_administrative_area_level_2_administrative_area_level_1_uuid_fk' is too long
                $table->foreign('administrative_area_level_1_uuid', 'admin_area_level_2_administrative_area_level_1_uuid_fk')
                    ->references('uuid')
                    ->on('admin_administrative_area_level_1')
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
        Schema::dropIfExists('admin_administrative_area_level_2');
	}
}
