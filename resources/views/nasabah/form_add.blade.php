<form class="form" role="form" method="POST" action="{{ url('nasabah') }}" >

    	<input type="hidden" value="{{ csrf_token() }}" name="_token">
        <?php // wajib ada pada routes method patch ?>
        <input type="hidden" value="PATCH" name="_method">
        <input type="hidden" value="" name="id_nasabah">
		<div class="form-group">
        	<label>No Rekening</label>
            <input type="text" name="no_rekening" value="form add" class="form-control">
        </div>
        <div class="form-group">
        	<label>Nama</label>
            <input type="text" name="nama_lengkap" class="form-control" 
            value="" >
        </div>
        <div class="form-group">
        	<label>Alamat</label>
            <input type="text" name="alamat" class="form-control" 
            value="">
        </div>
        <!-- <div class="form-group">
        	<label> Photo </label>
        	<input type="file" name="photo" class="">
        </div> -->
		<input type="submit" value="Add" class="btn btn-primary">
        <input type="reset" value="reset" class="btn btn-default">
        <a class="btn btn-danger" href="<?=url("nasabah")?>"> Back</a>
	</form>