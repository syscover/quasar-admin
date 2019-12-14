<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AdminCreateTableLang extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		if(! Schema::hasTable('admin_lang'))
		{
			Schema::create('admin_lang', function (Blueprint $table) {
				$table->engine = 'InnoDB';

                $table->increments('id');
                $table->uuid('uuid');
                $table->string('name');
                $table->string('image')->nullable();
                $table->char('iso_639_2', 2);
                $table->char('iso_639_3', 3);
                $table->char('ietf', 5);
				$table->smallInteger('sort')->unsigned()->nullable();
				$table->boolean('is_active')->default(false);

                $table->timestamps();
                $table->softDeletes();

                $table->index('uuid', 'admin_lang_uuid_idx');
                $table->unique('iso_639_2', 'admin_lang_iso_639_2_uq');
                $table->unique('iso_639_3', 'admin_lang_iso_639_3_uq');
                $table->unique('ietf', 'admin_lang_ietf_uq');
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
        Schema::dropIfExists('admin_lang');
	}
}
