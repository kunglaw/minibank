<?php

namespace App\Http\Controllers;

use DB;
use App\Http\Controllers\Controller;
// use Illuminate\Database\Query\Builder;

class SiteController extends Controller {
	
	function profile()
	{
	
		return view("dw_templ/profile");	
	}
	
    public function haloJuga()
    {
        return 'halo juga, bro';
    }
	
	public function view_hj()
	{
		echo "<h2>Dari Controller SiteController, function view_hj</h2> ";
		echo "<hr>";
		return view("halo-juga");
		
	}
	
	public function test_db()
	{
		//$profiles = DB::table('pelaut_ms')->get();
		$profiles = DB::table("pelaut_ms")->paginate(2);
        
		/* $profiles =
        [
            'profiles' => $profiles
        ];*/
		
		echo "<pre>";
		print_r($profiles);
		echo "</pre>";
			
	}
	
}