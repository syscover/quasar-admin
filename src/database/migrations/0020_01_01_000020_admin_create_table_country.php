<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AdminCreateTableCountry extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
        if(! Schema::hasTable('admin_country'))
        {
            Schema::create('admin_country', function (Blueprint $table) {
                $table->engine = 'InnoDB';

                $table->increments('id');
                $table->uuid('uuid');
                $table->uuid('common_uuid');
                $table->uuid('lang_uuid');
                $table->char('iso_3166_alpha_2', 2);
                $table->char('iso_3166_alpha_3', 3);
                $table->char('iso_3166_numeric', 3);
                $table->string('custom_code', 10)->nullable(); 
                $table->string('prefix', 5)->nullable();
                $table->string('name');
                $table->string('slug');
                $table->string('image')->nullable();
                $table->smallInteger('sort')->unsigned()->nullable();
                $table->string('administrative_area_level_1', 50)->nullable();
                $table->string('administrative_area_level_2', 50)->nullable();
                $table->string('administrative_area_level_3', 50)->nullable();
                $table->json('administrative_areas')->nullable();
                $table->decimal('latitude', 17, 14)->nullable();
                $table->decimal('longitude', 17, 14)->nullable();
                $table->tinyInteger('zoom')->nullable();
                $table->json('data_lang')->nullable();

                $table->timestamps();
                $table->softDeletes();

                $table->index('uuid', 'admin_country_uuid_idx');
                $table->index('common_uuid', 'admin_country_common_uuid_idx');
                $table->index('custom_code', 'admin_country_custom_code_idx');
                $table->index('slug', 'admin_country_slug_idx');
                $table->index('iso_3166_alpha_2', 'admin_country_iso_3166_alpha_2_idx');
                $table->index('iso_3166_alpha_3', 'admin_country_iso_3166_alpha_3_idx');
                $table->index('iso_3166_numeric', 'admin_country_iso_3166_numeric_idx');

                $table->foreign('lang_uuid', 'admin_country_lang_uuid_fk')
                    ->references('uuid')
                    ->on('admin_lang')
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
        Schema::dropIfExists('admin_country');
	}
}
