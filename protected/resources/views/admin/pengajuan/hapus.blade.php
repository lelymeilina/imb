<!-- Button trigger modal -->
<!-- Modal -->

{!! Form::model($pengajuan, [ 'method' => 'PUT','id' => 'hapusfungsi','class' => 'form-horizontal','role' => 'form']) !!}

{!! Form::hidden('id', null, ['class' => 'form-control', 'placeholder' => 'Id Fungsi', 'id' => 'id']) !!}

<div class="form-group">
	<div class="col-md-12">
		Apakah Anda yakin ingin menghapus pengajuan atas nama <b>{{ $pengajuan->nama }}</b> - NIK. {{ $pengajuan->nik }}?
	</div>	
</div>
            
<div class="modal-footer">
	<button class="btn btn-default" data-dismiss="modal" aria-hidden="true" id="clear">Batal</button>
    {!! Form::submit('Hapus Data', ['class' => 'btn btn-danger']) !!}
</div>

{!! Form::close() !!}

<!-- Button trigger modal -->
<!-- Modal -->