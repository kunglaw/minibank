@extends('nasabah.template')
@section("nasabah.content")

<a class="btn btn-primary pull-right" href="<?=url("nasabah/create")?>">
	Tambah Data
</a>

 <form class="form-inline pull-left" action="<?=url("nasabah/search")?>" method="post">
 	<input type="hidden" value="{{ csrf_token() }}" name="_token">
    <input type="text" name="keyword" id="keyword" class="form-control pull-left col-md-4" >
    <input type="submit" value="search" class="form-control pull-left">
 </form>

 <span class="clearfix"></span>
 

 
 <br>
 <table class="table table-bordered">
 	<thead class="bg-primary">
    	<tr>
    	<th>No.</th>
    	<th>Nama</th>
        <th>No. Rekening </th>
        <th>Alamat</th>
        <th>Action</th>
        </tr>
    </thead>
 	<tbody>
    	@foreach($nasabah as $row)
        <tr>
          <td>{{ $row->id_nasabah }}</td>
          <td>{{ $row->nama_lengkap}}</td>
          <td>{{ $row->no_rekening }}</td>
          <td>{{ $row->alamat }}</td>
          <td>
          		<a href="<?=url("nasabah/".$row->id_nasabah."/edit")?>" class="btn btn-primary">
          		Edit</a>
                
                <a href="<?=url("nasabah/".$row->id_nasabah)?>" class="btn btn-primary">
          		Detail</a>
                
                <form method="delete" action="<?=url("nasabah/".$row->id_nasabah)?>" accept-charset="UTF-8" >
                <input type="hidden" value="{{ csrf_token() }}" name="_token">
                <input class="btn btn-danger" type="submit" value="Delete">
          		<input type="hidden" name="_delete" value="DELETE">
                </form>
                
          </td>
        </tr>
        @endforeach
 
 	</tbody>
 </table>
 <?php //echo $nasabah->render(); ?>
@stop