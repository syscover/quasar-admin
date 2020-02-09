<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AdminCreateTableFieldGroupsFields extends Migration 
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
        if(! Schema::hasTable('admin_field_groups_fields'))
        {
            Schema::create('admin_field_groups_fields', function (Blueprint $table) {
                $table->engine = 'InnoDB';

                $table->uuid('field_group_uuid');
                $table->uuid('field_uuid');

                $table->primary(['field_group_uuid', 'field_uuid'], 'admin_field_groups_fields_field_group_uuid_field_uuid_pk');
                // can't to have foreign because field_common_uuid can belong to various multi language elements
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
        Schema::dropIfExists('admin_field_groups_fields');
	}
}