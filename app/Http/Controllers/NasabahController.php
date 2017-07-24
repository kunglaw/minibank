<?php 

namespace App\Http\Controllers;


use App\Http\Requests;
use App\Http\Controllers\Controller;

use DB; // database tradisional
use Input;
use Validator;
use Illuminate\Http\Request;
use App\Nasabah;

use App\Http\Requests\createNasabah;

class NasabahController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		//
		// $nasabah = Nasabah::all(); // menampilkan seluruh data dalam satu halaman
		$nasabah = Nasabah::paginate(5);
		$data["nasabah"] =  $nasabah;
		//$data["name"] = array("Aries Dimas Yudhistira","Rini Julistia","Rifal Qori Kurniawan");
		
		return view("nasabah/index",$data); // sudah dalam bentuk content
	}
	
	function search(Request $request)
	{
		$keyword = $request["keyword"];
		
		//
		$nasabah = Nasabah::where("alamat","LIKE","%".$keyword."%")->paginate(2); // menampilkan seluruh data dalam satu halaman
		//$nasabah = Nasabah::paginate(5);
		$data["nasabah"] =  $nasabah;
		//$data["name"] = array("Aries Dimas Yudhistira","Rini Julistia","Rifal Qori Kurniawan");
		
		return view("nasabah/index",$data); // sudah dalam bentuk content
	}
	
	function test()
	{
		echo "sadsad";
		//
		// $nasabah = Nasabah::all(); // menampilkan seluruh data dalam satu halaman
		$nasabah = Nasabah::paginate(5);
		$data["nasabah"] =  $nasabah;
		
		print_r($data["nasabah"]);
		
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
		
		
		$data["nasabah"] = "";
		return view("nasabah/create",$data);
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(Request $request)
	{
		
		/*
		
		1. cara pertama 
		
		$this->validate($request,[
			"no_rekening"=>"required",
			"nama_lengkap"=>"required",
			"alamat"=>"required"
		]);
		
		*/
		
		$no_rekening = $request->input("no_rekening");
		$nama_lengkap = $request->input("nama_lengkap");
		$alamat 	 = $request->input("alamat");
		
		
		$validator = Validator::make(
		
			array(
				"no_rekening" => $no_rekening,
				"nama_lengkap" => $nama_lengkap,
				"alamat" => $alamat
				
			),
			array(
				"name" => "required",
				"nama_lengkap" => "required|max:8",
				"alamat" => "required"
			)
		
		);
		
		if($validator->passes())
		{
			$data = $request->all();
			//return $data;
			Nasabah::create($data);
			return redirect("nasabah");
		}
		else
		{
			return redirect("nasabah/create") ->withErrors($validator)
                        ->withInput();
		}
		
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
		//$data["nasabah"] = Nasabah::find($id);
		$data["nasabah"] = Nasabah::where("id_nasabah",$id)->first();
		return view("nasabah.show",$data);
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id_nasabah)
	{
		//
		$nasabah = Nasabah::where("id_nasabah",$id_nasabah)->first();
		$data["nasabah"] = $nasabah;
		//print_r($nasabah);
		
		return view("nasabah.edit",$data);
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	 									// bisa menggunakan Request
										// kalau namanya bukan Request berarti bisa di create sendiri request nya 
							
	public function update($id_nasabah, createNasabah $request)
	{
		//print_r($_FILES);
		//echo $file_name = Input::file("photo")->getClientOriginalName();
		//die();
		
		$no_rekening = $request->input("no_rekening");
		$nama_lengkap = $request->input("nama_lengkap");
		$alamat 	 = $request->input("alamat");
		
		$data = $request->all();
		//return $data;
		//$nasabah = Nasabah::where("id_nasabah",$id_nasabah)->first();
		
		//pakai cara tradisional 
		$str  = "UPDATE nasabahs SET 			 ";
		$str .= "no_rekening = '$no_rekening'	,";
		$str .= "nama_lengkap = '$nama_lengkap'	,";
		$str .= "alamat		 = '$alamat'		,";
		$str .= "created_at	 = now()			,";
		$str .= "updated_at	 = now()			 ";
		$str .= "WHERE id_nasabah = ? 			 ";
		
		$q = DB::update($str,[$id_nasabah]);
		
		//$nasabah->update($data);
		return redirect("nasabah/$id_nasabah/edit");
	}
	
	public function update_backup($id_nasabah, Request $request)
	{
		$no_rekening = $request->input("no_rekening");
		$nama_lengkap = $request->input("nama_lengkap");
		$alamat 	 = $request->input("alamat");
		
		//$a = array($no_rekening,$nama_lengkap,$alamat);
		//print_r($a); exit;
		
		
		$validator = Validator::make(
		
			array(
				"no_rekening" => $no_rekening,
				"nama_lengkap" => $nama_lengkap,
				"alamat" => $alamat
				
			),
			array(
				"name" => "required",
				"nama_lengkap" => "required|max:8",
				"alamat" => "required"
			)
		
		);
		
		if($validator)
		{
			$data = $request->all();
			//return $data;
			//$nasabah = Nasabah::where("id_nasabah",$id_nasabah)->first();
			
			//pakai cara tradisional 
			$str  = "UPDATE nasabahs SET 			 ";
			$str .= "no_rekening = '$no_rekening'	,";
			$str .= "nama_lengkap = '$nama_lengkap'	,";
			$str .= "alamat		 = '$alamat'		,";
			$str .= "created_at	 = now()			,";
			$str .= "updated_at	 = now()			 ";
			$str .= "WHERE id_nasabah = ? 			 ";
			
			$q = DB::update($str,[$id_nasabah]);
			
			//$nasabah->update($data);
			return redirect("nasabah/$id_nasabah/edit");
		}
		else
		{
			echo "why ..? ";exit;
			return redirect("nasabah/$id_nasabah/edit") ->withErrors($validator)
                        ->withInput();
		}
		
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$deleted = DB::delete('delete from Nasabahs');
		//$nasabah = Nasabah::find($id);
		//$nasabah->delete();
		return redirect("nasabah");
	}

}
