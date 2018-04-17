<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProvincesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
	    if (!Schema::hasTable('provinces')) {
		    Schema::create('provinces', function (Blueprint $table) {
			    $table->increments('id');
			    $table->string('name',25)->charset('utf8')->collation('utf8_general_ci');
			    $table->timestamps();
			    $table->softDeletes('deleted_at');
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
        Schema::dropIfExists('provinces');
    }
}
