<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Nasabah extends Model {

	//
	protected $table = 'nasabahs';
	protected $fillable = ["no_rekening","nama_lengkap","alamat"];
}
