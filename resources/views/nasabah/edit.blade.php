@extends("nasabah.template")
@section("nasabah.content")

<div>
	<h2> Edit new Nasabah </h2>
    <hr>
    <ul>
     <?php foreach($errors->all() as $row ){ echo "<li>".$row."</li>"; } ?>
    </ul>
	@include('nasabah.form')
</div>

@stop