<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pengajuan extends Model
{
    //
    protected $table = 't_pengajuan';
    protected $fillable = ['id','no_registrasi','id_jenis_identitas','nik','nama','id_jenis_imb','id_jenis_klasifikasi_bangunan','jenis_bangunan','lokasi','tahun','luas_tidakbertingkat','luas_bertingkat','luas_basement','kdb_lama','klb_lama','kdb_baru','klb_baru','jumlah_biaya','jumlah_biaya_prasarana','total_biaya_pembulatan','id_surveyor_1','id_surveyor_2','tgl_survey','id_status_pengajuan','no_nib','latitude','longitude','nip_kepala_bidang','kepala_bidang','pangkat_kepala_bidang','nip_kasi','kasi','pangkat_kasi','flag_delete','created_at','updated_at'];

    public function getJenisKlasifikasiBangunan(){
		return $this->belongsTo('App\JenisKlasifikasiBangunan','id_jenis_klasifikasi_bangunan','id');
	}

	public function getJenisImb(){
		return $this->belongsTo('App\JenisImb','id_jenis_imb','id');
	}

	public function getSurveyor1(){
		return $this->belongsTo('App\Surveyor','id_surveyor_1','id');
	}

	public function getSurveyor2(){
		return $this->belongsTo('App\Surveyor','id_surveyor_2','id');
	}
    
}
