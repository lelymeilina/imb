<!-- Button trigger modal -->
<!-- Modal -->

{!! Form::model($persyaratanteknis, [ 'method' => 'PUT','id' => 'hapuspersyaratanteknis','class' => 'form-horizontal','role' => 'form']) !!}

{!! Form::hidden('id', null, ['class' => 'form-control', 'placeholder' => 'Id persyaratanteknis', 'id' => 'id']) !!}

<div class="form-group">
	<div class="col-md-8">
		Apakah Anda yakin ingin menghapus <b>{{ $persyaratanteknis->nama }}</b> ?
	</div>	
</div>
            
<div class="modal-footer">
	<button class="btn btn-default" data-dismiss="modal" aria-hidden="true" id="clear">Batal</button>
    {!! Form::submit('Hapus Data', ['class' => 'btn btn-danger']) !!}
</div>

{!! Form::close() !!}

<!-- Button trigger modal -->
<!-- Modal -->