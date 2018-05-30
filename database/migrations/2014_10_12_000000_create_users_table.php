<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
		if(!Schema::hasTable('users')){
			Schema::create('users', function (Blueprint $table) {
				$table->increments('id');
				$table->string('employeeid',50)->unique();
				$table->string('password');
				$table->string('fullname',100);
				$table->string('email',50)->unique();
				$table->string('phone',15)->unique();
				$table->date('dob')->nullable();
				$table->string('address',255)->nullable();
				$table->integer('region_id');
				$table->integer('office_id');
				$table->string('hometown',50)->nullable();
				$table->string('favorite',100)->nullable();
				$table->string('hobbies',255)->nullable();
				$table->string('nationality',20)->nullable();
				$table->string('favorite_color',255)->nullable();
				$table->integer('college_attended')->nullable();
				$table->string('languages',150)->nullable();
				$table->tinyInteger('marital_status')->nullable();
				$table->string('favorite_food',100)->nullable();
				$table->string('picture',100)->nullable();
				$table->integer('manager_id');
				$table->tinyInteger('status');
				$table->integer('added_by');
				$table->integer('role_id');
				$table->date('joining_date');
				$table->date('added_date');
				$table->rememberToken();
				$table->timestamps();

				//$table->primary('employeeid');
				$table->unique(['email','phone']);
				$table->index(['region_id']);
				$table->index(['office_id']);
				$table->index(['nationality']);
				$table->index(['college_attended']);
				$table->index(['marital_status']);
				$table->index(['manager_id']);
				$table->index(['role_id']);

				$table->foreign('region_id')->references('region_id')->on('regions');
				$table->foreign('office_id')->references('office_id')->on('offices');
				$table->foreign('role_id')->references('role_id')->on('role');
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
        Schema::dropIfExists('users');
    }
}
