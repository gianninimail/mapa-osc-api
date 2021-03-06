<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToCmsoscintegrantesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('cmsosc.integrantes', function(Blueprint $table)
		{
			$table->foreign('cmsuser_id', 'integrantes_cmsuser_id_foreign')->references('id')->on('cmsosc.cms_users')->onUpdate('RESTRICT')->onDelete('RESTRICT');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('cmsosc.integrantes', function(Blueprint $table)
		{
			$table->dropForeign('integrantes_cmsuser_id_foreign');
		});
	}

}
