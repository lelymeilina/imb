
 @extends('home.layout')

@section('title')
    <title>IMB Karangasem</title>
@endsection
@section('content')
        

<!-- Start Big Heading -->
<div class="big-title text-center" data-animation="fadeInDown" data-animation-delay="01" style="margin-bottom:0px !important;">
	<h2>Simulasi Perkiraan Perhitungan<strong> IMB</strong></h2>
</div>

 <div class="hr1 margin-top"></div>
 <br/>

<style type="text/css">
	.select2-selection{
		height: 35px !important;
		padding-top: 3px;
	}
</style>

<!-- End Big Heading -->
<div class="container blog-post gallery-post " style="padding-top:0px !important;">
	<div class="post-content" style="padding-left:0px !important;">
		<div class="author-info clearfix">
			<div class="col-md-12">
				{!! Form::open(['id' => 'tambahpengajuan','class' => 'form-horizontal','role' => 'form']) !!}
					  

                      <h3>Retribusi Bangunan Utama</h3>
                      <div class="hr1 margin-top"></div>

	                  <div class="form-group">
	                    {!! Form::label('nama', 'Fungsi Bangunan',['class' => 'col-md-3 control-label']) !!}
	                    <div class="col-md-9">
	                           {!! Form::select('id_harga_bangunan',[""=>"Pilih Fungsi Bangunan Utama"]+$hargaBangunan, null, ['class' => 'form-control select2','style'=>'width:100%;','required'=>'required']) !!}
	                    </div>
	                  </div>

	                  <div class="form-group">
                        {!! Form::label('luas', 'Luas Bangunan Utama',['class' => 'col-md-3 control-label']) !!}
                        <div class="col-md-9">
                               {!! Form::text('luas', null, ['class' => 'form-control', 'placeholder' => 'Masukkan Luas Perkiraan Bangunan Utama','required'=>'required']) !!}
                        </div>
                      </div>

                      <h3>Retribusi Bangunan Prasarana</h3>
                      <div class="hr1 margin-top"></div>

                      <!-- <div class="control-group" id="fields">
                      	  {!! Form::label('luas', 'Rincian Bangunan Prasarana',['class' => 'col-md-3 control-label']) !!}
				          <div class="controls col-md-9">
					          <div class="entry input-group col-xs-12">
					                <div class="col-md-7">
				                        {!! Form::select('id_harga_bangunan_prasarana[]',[""=>"Pilih Fungsi Bangunan Prasarana"]+$hargaBangunan, null, ['class' => 'form-control select2','style'=>'width:100%;','required'=>'required']) !!}
				                    </div>
				                    <div class="col-md-3">
				                    	{!! Form::text('volume[]', null, ['class' => 'form-control', 'placeholder' => 'Volume Prasarana','required'=>'required']) !!}
				                    </div>
				                    <div class="col-md-2">
						                <span class="input-group-btn">
						              	<button class="btn btn-success btn-add" type="button">
						                       <span class="glyphicon glyphicon-plus"></span>
						                </button>
						                </span>
					            	</div>
					            	<div class="col-md-12">&nbsp;</div>
					          </div>
				      	  </div>

				       </div> -->

				       <div class="form-group">
						       <div class="row" id="form_t_rfid">
								<div class="col-md-12">

								   <fieldset>
								      <div class="row">
								         <div class="col-md-8">
								            <div class="form-group">
								               {!! Form::label('luas', 'Fungsi Bangunan Prasarana',['class' => 'col-md-5 control-label']) !!}
								               <div class="col-md-7">
								               		{!! Form::select('id_harga_bangunan_prasarana[]',[""=>"Pilih Fungsi Bangunan Prasarana"]+$hargaBangunan, null, ['class' => 'form-control select2','style'=>'width:100%;','required'=>'required','id'=>'id_harga_bangunan_prasarana1']) !!}
								               </div>
								            </div>
								         </div>
								         <div class="col-md-4">
								               <div class="form-group">
								                  {!! Form::label('luas', 'Volume',['class' => 'col-md-2 control-label']) !!}
								                  <div class="col-md-9">
								                  		{!! Form::text('volume[]', null, ['class' => 'form-control', 'placeholder' => 'Volume Prasarana','required'=>'required','id'=>'volume1']) !!}
								              	  </div>
								            </div>
								         </div>
								      </div>
								  </fieldset>

								  <fieldset class="hide" id="xxxTemplate">
								      <div class="row">
								         <div class="col-md-12 col-lg-12">
								            <div class="form-group">
								               <a href="javascript:;"><i class="btn btn-danger fa fa-times removeButton pull-right" aria-hidden="true"></i></a>
								            </div>
								         </div>
								      </div>
								      <div class="row">
								         <div class="col-md-8">
								            <div class="form-group">
								               {!! Form::label('luas', 'Fungsi Bangunan Prasarana',['class' => 'col-md-5 control-label']) !!}
								               <div class="col-md-7">
								               		{!! Form::select('',[""=>"Pilih Fungsi Bangunan Prasarana"]+$hargaBangunan, null, ['class' => 'form-control fungsi_bangunan','style'=>'width:100%;','required'=>'required']) !!}
								               </div>
								            </div>
								         </div>
								         <div class="col-md-4">
								               <div class="form-group">
								                  {!! Form::label('luas', 'Volume',['class' => 'col-md-2 control-label']) !!}
								                  <div class="col-md-9">
								                  		{!! Form::text('', null, ['class' => 'form-control tmp_volume', 'placeholder' => 'Volume Prasarana','required'=>'required']) !!}
								              	  </div>
								            </div>
								         </div>
								      </div>
								   </fieldset>
								   <div class="row" style="margin-bottom: 20px;">
								      <div class="col-md-12 col-lg-12" align="right">
								         <div class="form-group">
								            <button type="button" class="btn btn-success btn-flat addButton" data-template="xxx"><i class="fa fa-plus" aria-hidden="true"></i> Tambah Prasarana</button>
								         </div>
								      </div>
								  </div>
								</div>
								</div>
						</div>

	                  <div class="hr1 margin-top"></div>
	                  <br/>
	                  <br/>
	                  <div class="col-md-12" align="right">
		                  <button class="btn btn-default reset" data-dismiss="modal" aria-hidden="true" id="clear" type="reset" onclick="location.reload()">Batal</button>
		                  {!! Form::submit('Proses', ['class' => 'btn btn-info']) !!}
	                  </div>

	            {!! Form::close() !!}
			</div>
			
		</div>
	</div>
</div>
@endsection