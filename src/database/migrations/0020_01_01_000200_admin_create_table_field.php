<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AdminCreateTableField extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(! Schema::hasTable('admin_field'))
        {
            Schema::create('admin_field', function (Blueprint $table) {
                $table->engine = 'InnoDB';
                
                $table->increments('id');
                $table->uuid('uuid');
                $table->string('name')->nullable();
                $table->json('labels')->nullable();                     // label value in different languages
                $table->uuid('source_uuid')->nullable();                // data source from other models
                $table->uuid('field_type_uuid');                        // see config/quasar-admin.php
                $table->string('field_type_name');
                // 1 - Text
                // 2 - Select
                // 3 - Select multiple
                // 4 - Number
                // 5 - Email
                // 6 - Checkbox
                // 7 - Select 2
                // 8 - Select 2 multiple
                // 9 - Text area
                // 10 - Wysiwyg

                $table->uuid('data_type_uuid');                         // see config/pulsar-admin.php
                $table->string('data_type_name');
                // 1 - String
                // 2 - Boolean
                // 3 - Integer
                // 4 - Float
                // 5 - Array
                // 6 - Object

                $table->boolean('is_required')->default(false);
                $table->smallInteger('sort')->unsigned()->nullable();
                $table->integer('maxlength')->unsigned()->nullable();
                $table->string('pattern')->nullable();
                $table->string('class')->nullable();                    // class style for component
                $table->json('data_lang')->nullable();                  // set different langs in json
                $table->json('data')->nullable();

                $table->timestamps();
                $table->softDeletes();

                $table->index('uuid', 'admin_field_uuid_idx');
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
        Schema::dropIfExists('admin_field');
    }
}
