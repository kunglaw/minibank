<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNasabahsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('nasabahs', function(Blueprint $table)
		{
			$table->increments('id_nasabah');
			$table->string("no_rekening",8);
			$table->string("nama_lengkap",100);
			$table->text("alamat");
			$table->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('nasabahs');
	}

}
