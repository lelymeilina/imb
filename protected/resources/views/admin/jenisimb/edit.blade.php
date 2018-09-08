<!-- Button trigger modal -->
<!-- Modal -->


{!! Form::model($jenisimb, [ 'method' => 'PUT','id' => 'ubahjenisimb','class' => 'form-horizontal','role' => 'form']) !!}

  {!! Form::hidden('id', null, ['class' => 'form-control', 'placeholder' => 'Id jenisimb', 'id' => 'id']) !!}


                          <div class="form-group">
                            {!! Form::label('nama', 'Nama',['class' => 'col-md-3 control-label']) !!}
                            <div class="col-md-8">
                                   {!! Form::text('nama', null, ['class' => 'form-control', 'placeholder' => 'Nama Jenis Imb']) !!}
                            </div>
                          </div>

                          <div class="form-group">
                            {!! Form::label('nama', 'Indeks',['class' => 'col-md-3 control-label']) !!}
                            <div class="col-md-8">
                                   {!! Form::text('indeks', null, ['class' => 'form-control', 'placeholder' => 'Indeks']) !!}
                            </div>
                          </div>



                        <div class="modal-footer">
                          <button class="btn btn-default" data-dismiss="modal" aria-hidden="true" id="clear">Batal</button>
                          {!! Form::submit('Ubah Data', ['class' => 'btn btn-primary']) !!}
                        </div>

{!! Form::close() !!}
<!-- Button trigger modal -->
<!-- Modal -->

<script type="text/javascript">
    $(".select2").select2();
</script>