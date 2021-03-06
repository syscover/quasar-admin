<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AdminCreateTableAdministrativeAreaLevel3 extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
        if(! Schema::hasTable('admin_administrative_area_level_3'))
        {
            Schema::create('admin_administrative_area_level_3', function (Blueprint $table) {
                $table->engine = 'InnoDB';

                $table->increments('id');
                $table->uuid('uuid');
                $table->uuid('country_common_uuid');
                $table->uuid('administrative_area_level_1_uuid');
                $table->uuid('administrative_area_level_2_uuid');
                $table->string('code', 8);
                $table->string('custom_code', 10)->nullable(); 
                $table->string('name');
                $table->string('slug');
                $table->decimal('latitude', 17, 14)->nullable();
                $table->decimal('longitude', 17, 14)->nullable();
                $table->tinyInteger('zoom')->nullable();

                $table->timestamps();
                $table->softDeletes();

                $table->index('uuid', 'admin_administrative_area_level_3_uuid_idx');
                $table->index('code', 'admin_administrative_area_level_3_code_idx');
                $table->index('slug', 'admin_administrative_area_level_3_slug_idx');
                $table->foreign('country_common_uuid', 'admin_administrative_area_level_3_country_common_uuid_fk')
                    ->references('common_uuid')
                    ->on('admin_country')
                    ->onDelete('restrict')
                    ->onUpdate('cascade');
                // 'admin_administrative_area_level_3_administrative_area_level_1_uuid_fk' is too long
                $table->foreign('administrative_area_level_1_uuid', 'admin_area_level_3_administrative_area_level_1_uuid_fk')
                    ->references('uuid')
                    ->on('admin_administrative_area_level_1')
                    ->onDelete('restrict')
                    ->onUpdate('cascade');
                // 'admin_administrative_area_level_3_administrative_area_level_2_uuid_fk' is too long
                $table->foreign('administrative_area_level_2_uuid', 'admin_area_level_3_administrative_area_level_2_uuid_fk')
                    ->references('uuid')
                    ->on('admin_administrative_area_level_2')
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
        Schema::dropIfExists('admin_administrative_area_level_3');
	}
}
