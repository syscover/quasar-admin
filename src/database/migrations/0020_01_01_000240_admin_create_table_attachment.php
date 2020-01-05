<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AdminCreateTableAttachment extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(! Schema::hasTable('admin_attachment'))
        {
            Schema::create('admin_attachment', function (Blueprint $table) {
                $table->engine = 'InnoDB';

                $table->increments('id');
                $table->uuid('uuid');
                $table->uuid('common_uuid');
                $table->uuid('lang_uuid');
                $table->string('attachable_type');
                $table->uuid('attachable_uuid');
                $table->uuid('family_uuid')->nullable();
                $table->integer('sort')->unsigned()->nullable();
                $table->string('alt')->nullable();
                $table->string('title')->nullable();
                $table->string('base_path', 1024);
                $table->string('file_name');
                $table->string('url', 1024);
                $table->string('mime');
                $table->string('extension');
                $table->integer('size')->unsigned();
                $table->smallInteger('width')->unsigned()->nullable();
                $table->smallInteger('height')->unsigned()->nullable();
                $table->uuid('library_uuid')->nullable();                   // original element in library
                $table->string('library_file_name')->nullable();
                $table->json('data')->nullable();

                $table->timestamps();
                $table->softDeletes();

                $table->index('uuid', 'admin_attachment_uuid_idx');
                
                $table->foreign('lang_uuid', 'admin_attachment_lang_id_fk')
                    ->references('uuid')
                    ->on('admin_lang')
                    ->onDelete('restrict')
                    ->onUpdate('cascade');
                $table->foreign('family_uuid', 'admin_attachment_family_id_fk')
                    ->references('uuid')
                    ->on('admin_attachment_family')
                    ->onDelete('restrict')
                    ->onUpdate('cascade');
                $table->foreign('library_uuid', 'admin_attachment_library_id_fk')
                    ->references('uuid')
                    ->on('admin_attachment_library')
                    ->onDelete('set null')
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
        Schema::dropIfExists('admin_attachment');
    }
}
