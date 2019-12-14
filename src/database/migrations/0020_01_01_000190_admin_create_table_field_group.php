<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AdminCreateTableFieldGroup extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(! Schema::hasTable('admin_field_group'))
        {
            Schema::create('admin_field_group', function (Blueprint $table) {
                $table->engine = 'InnoDB';
                
                $table->increments('id');
                $table->uuid('uuid');
                $table->string('name')->nullable();
                $table->uuid('resource_uuid');

                $table->timestamps();
                $table->softDeletes();

                $table->index('uuid', 'admin_field_group_uuid_idx');
                $table->foreign('resource_uuid', 'admin_field_group_resource_uuid_fk')
                    ->references('uuid')
                    ->on('admin_resource')
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
        Schema::dropIfExists('admin_field_group');
    }
}
