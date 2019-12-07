<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AdminCreateTableUser extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
        if(! Schema::hasTable('admin_user'))
        {
            Schema::create('admin_user', function (Blueprint $table) {
                $table->engine = 'InnoDB';
                
                $table->increments('id');
                $table->uuid('uuid');
                $table->string('name');
                $table->string('surname')->nullable();
                $table->string('email');
                $table->uuid('lang_uuid');
                $table->string('username');
                $table->string('password');
                $table->string('remember_token')->nullable();
                $table->boolean('is_active')->default(false);

                $table->timestamps();
                $table->softDeletes();

                $table->unique('username', 'admin_user_user_uq');
                $table->foreign('lang_uuid', 'admin_user_lang_uuid_fk')
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
        Schema::dropIfExists('admin_user');
	}
}
