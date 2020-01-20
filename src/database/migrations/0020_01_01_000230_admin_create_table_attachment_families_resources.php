<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AdminCreateTableAttachmentFamiliesResources extends Migration 
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
        if(! Schema::hasTable('admin_attachment_families_resources'))
        {
            Schema::create('admin_attachment_families_resources', function (Blueprint $table) {
                $table->engine = 'InnoDB';

                $table->uuid('attachment_family_uuid');
                $table->uuid('resource_uuid');

                $table->primary(['attachment_family_uuid', 'resource_uuid']);
                // 'admin_attachment_families_resources_attachment_family_uuid_resource_uuid_primary' is too long
                $table->foreign('attachment_family_uuid', 'admin_attachment_families_resources_attachment_family_uui_fk')
                    ->references('uuid')
                    ->on('admin_attachment_family')
                    ->onDelete('cascade')
                    ->onUpdate('cascade');
                $table->foreign('resource_uuid', 'admin_attachment_families_resources_resource_uuid_fk')
                    ->references('uuid')
                    ->on('admin_resource')
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
        Schema::dropIfExists('admin_attachment_families_resources');
	}
}