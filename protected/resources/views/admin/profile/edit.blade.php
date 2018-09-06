<!-- Button trigger modal -->
<!-- Modal -->


{!! Form::model($profile, [ 'method' => 'PUT','id' => 'ubahprofile','class' => 'form-horizontal','role' => 'form']) !!}

  {!! Form::hidden('id', null, ['class' => 'form-control', 'placeholder' => 'Id Profile', 'id' => 'id']) !!}


                          <div class="form-group">
                            {!! Form::label('nama', 'Judul',['class' => 'col-md-3 control-label']) !!}
                            <div class="col-md-8">
                                   {!! Form::text('judul', null, ['class' => 'form-control', 'placeholder' => 'Judul']) !!}
                            </div>
                          </div>

                          <div class="form-group">
                            {!! Form::label('nama', 'Kata Kunci',['class' => 'col-md-3 control-label']) !!}
                            <div class="col-md-8">
                                   {!! Form::text('katakunci', null, ['class' => 'form-control', 'placeholder' => 'Kata Kunci']) !!}
                            </div>
                          </div>

                          <div class="form-group">
                            {!! Form::label('nama', 'Deskripsi Profile',['class' => 'col-md-3 control-label']) !!}
                            <div class="col-md-8">
                              <textarea name="content" rows="3" class="summernote form-control" placeholder="Deskripsi Profile">{{$profile->content}}</textarea>
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
  $(document).ready(function() { 
      $('.summernote').summernote({
          height:200,
          callbacks: {
              onImageUpload: function(files, editor, welEditable) {
                  // upload image to server and create imgNode...
                  sendFile(files[0], editor, welEditable);
              },
              onMediaDelete : function($target, editor, $editable) {
                  delFile($target[0].src);
              }
          }
      });
    });
</script>