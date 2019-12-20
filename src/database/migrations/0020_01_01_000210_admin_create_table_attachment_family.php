<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AdminCreateTableAttachmentFamily extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(! Schema::hasTable('admin_attachment_family'))
        {
            Schema::create('admin_attachment_family', function (Blueprint $table) {
                $table->engine = 'InnoDB';
                
                $table->increments('id');
                $table->uuid('uuid');
                $table->uuid('resource_uuid');
                $table->string('name');
                $table->smallInteger('width')->unsigned()->nullable();
                $table->smallInteger('height')->unsigned()->nullable();
                $table->tinyInteger('fit_type')->unsigned()->nullable(); // 1 = crop, 2 = width, 3 = height, 4 = width free crop, 5 = height free crop
                $table->json('sizes')->nullable();
                $table->tinyInteger('quality')->unsigned()->nullable();
                $table->string('format', 10)->nullable();

                $table->timestamps();
                $table->softDeletes();

                $table->index('uuid', 'admin_attachment_family_uuid_idx');
                $table->foreign('resource_uuid', 'admin_attachment_family_resource_uuid_fk')
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
        Schema::dropIfExists('admin_attachment_family');
    }
}
