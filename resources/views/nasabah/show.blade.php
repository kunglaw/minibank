@extends("nasabah.template")
@section("nasabah.content")

<h2>{{$nasabah->nama_lengkap}}</h2>

<table class="table table-striped table-responsive">
	<tr>
    	<td>No Rekening</td>
    	<td>{{ $nasabah->no_rekening }}</td>
    </tr>
    <tr>
    	<td>Nama</td>
        <td>{{ $nasabah->nama_lengkap }}</td>
    </tr>
	<tr>
    	<td> Alamat</td>
    	<td>{{ $nasabah->alamat }}</td>
    </tr>
    <tr>
    	<td> Daftar Tanggal</td>
    	<td>{{ $nasabah->created_at }}</td>
    </tr>





</table>


@stop