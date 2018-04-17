<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;


class CreateClientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
	    if (!Schema::hasTable('users')) {
		    Schema::create('users', function (Blueprint $table) {
			    $table->increments('id');
			    $table->string('name',50);
			    $table->integer('prov_id')->unsigned();
			    $table->string('telephone',14);
			    $table->string('postal',7);
			    $table->string('salary',14);
			    $table->timestamps();
			    $table->softDeletes('deleted_at');
			    $table->index(['name', 'telephone', 'postal', 'salary'],'uk_client');
			    $table->foreign('prov_id','fk_client_province_id')->references('id')->on('provinces');
			    $table->engine = 'InnoDB';
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
