<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AdminCreateTableAttachmentLibrary extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(! Schema::hasTable('admin_attachment_library'))
        {
            Schema::create('admin_attachment_library', function (Blueprint $table) {
                $table->engine = 'InnoDB';
                
                $table->increments('id');
                $table->uuid('uuid');
                $table->string('name');                                 // original image name
                $table->string('pathname', 1024);
                $table->string('filename');                             // file name in laravel storage
                $table->string('url', 1024);                            // url to access file
                $table->string('mime');                                 // mime type
                $table->string('extension');
                $table->integer('size')->unsigned();                    // size in bytes
                $table->smallInteger('width')->unsigned()->nullable();
                $table->smallInteger('height')->unsigned()->nullable();
                $table->json('data')->nullable();

                $table->timestamps();
                $table->softDeletes();

                $table->index('uuid', 'admin_attachment_library_uuid_idx');
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
        Schema::dropIfExists('admin_attachment_library');
    }
}
