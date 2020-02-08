<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AdminCreateTableFieldValue extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(! Schema::hasTable('admin_field_value'))
        {
            Schema::create('admin_field_value', function (Blueprint $table) {
                $table->engine = 'InnoDB';

                $table->increments('id');
                $table->uuid('uuid');
                $table->uuid('common_uuid');
                $table->string('code', 50);
                $table->uuid('lang_uuid');
                $table->uuid('field_uuid');
                $table->string('name');
                $table->smallInteger('sort')->unsigned()->nullable();
                $table->boolean('is_featured')->default(false);
                $table->json('data_lang')->nullable();
                $table->json('data')->nullable();

                $table->timestamps();
                $table->softDeletes();

                $table->index('uuid', 'admin_field_value_uuid_idx');
                $table->index('common_uuid', 'admin_field_value_common_uuid_idx');
                $table->index('code', 'admin_field_value_code_idx');
                $table->unique(['code', 'lang_uuid', 'field_uuid'], 'admin_field_value_uuid_lang_uuid_field_uuid_uq');
                $table->foreign('lang_uuid', 'admin_field_value_lang_uuid_fk')
                    ->references('uuid')
                    ->on('admin_lang')
                    ->onDelete('restrict')
                    ->onUpdate('cascade');
                $table->foreign('field_uuid', 'admin_field_value_field_uuid_fk')
                    ->references('uuid')
                    ->on('admin_field')
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
        Schema::dropIfExists('admin_field_value');
    }
}
