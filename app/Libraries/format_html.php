<?php
	
	namespace App\Libraries;
	
	use App\Http\Requests;
	use Illuminate\Http\Request;
	
	class format_html
	{
		function __construct()
		{
			
		}
		
		function bold($val)
		{
			return "<b> $val </b>";
		}
		
	}