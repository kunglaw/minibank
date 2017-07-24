<form class="form" role="form" method="post" action="{{ url('nasabah/'.$nasabah->id_nasabah.'') }}" enctype="multipart/form-data">
    	<input type="hidden" value="{{ csrf_token() }}" name="_token">
        <?php // wajib ada pada routes method patch ?>
        <input type="hidden" value="PATCH" name="_method">
        <input type="hidden" value="<?=$nasabah["id_nasabah"]?>" name="id_nasabah">
		<div class="form-group">
        	<label>No Rekening</label>
            <input type="text" name="no_rekening" value="<?=$nasabah["no_rekening"]?>" class="form-control">
        </div>
        <div class="form-group">
        	<label>Nama</label>
            <input type="text" name="nama_lengkap" class="form-control" 
            value="<?=$nasabah["nama_lengkap"]?>" >
        </div>
        <div class="form-group">
        	<label>Alamat</label>
            <input type="text" name="alamat" class="form-control" 
            value="<?=$nasabah["alamat"]?>">
        </div>
        <div class="form-group">
        	<label> Photo </label>
        	<input type="file" name="photo" class="">
        </div>
		<input type="submit" value="Update" class="btn btn-primary">
        <input type="reset" value="reset" class="btn btn-default">
        <a class="btn btn-danger" href="<?=url("nasabah")?>"> Back</a>
	</form>