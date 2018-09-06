<!-- Button trigger modal -->
<!-- Modal -->



{!! Form::open(['id' => 'ubahslider','class' => 'form-horizontal','role' => 'form']) !!}

  {!! Form::hidden('id', $slider->id, ['class' => 'form-control', 'placeholder' => 'Id Slider', 'id' => 'id']) !!}


                          <div class="form-group">
                            {!! Form::label('nama', 'Judul',['class' => 'col-md-3 control-label']) !!}
                            <div class="col-md-8">
                                   {!! Form::text('judul', $slider->judul, ['class' => 'form-control', 'placeholder' => 'Judul']) !!}
                            </div>
                          </div>

                          <div class="form-group">
                            {!! Form::label('nama', 'Kata Kunci',['class' => 'col-md-3 control-label']) !!}
                            <div class="col-md-8">
                                   {!! Form::text('katakunci', $slider->katakunci, ['class' => 'form-control', 'placeholder' => 'Kata Kunci']) !!}
                            </div>
                          </div>

                          <div class="form-group">
                            {!! Form::label('nama', 'Gambar / Foto',['class' => 'col-md-3 control-label']) !!}
                            <div class="col-md-8">
                              {!! Form::file('image', null, ['required' => 'required','id'=>'image']) !!}
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