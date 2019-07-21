<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class HargaBangunan extends Model
{
    //
    protected $table = 'm_harga_bangunan';
    protected $fillable = ['id', 'id_fungsi', 'id_klasifikasi', 'nama', 'is_bertingkat', 'is_bangunan_tambahan', 'harga', 'flag_delete'];

    public function getFungsi(){
		return $this->belongsTo('App\Fungsi','id_fungsi','id');
	}
	public function getKlasifikasiBangunan(){
		return $this->belongsTo('App\KlasifikasiBangunan','id_klasifikasi','id');
	}

	public static function roundUp($value, $precision){
    	$pow = pow ( 10, $precision ); 
    	return ( ceil ( $pow * $value ) + ceil ( $pow * $value - ceil ( $pow * $value ) ) ) / $pow; 
	}
	public static function round($value, $precision){
    	$pow = pow ( 10, $precision ); 
    	return ( floor ( $pow * $value ) + floor ( $pow * $value - floor ( $pow * $value ) ) ) / $pow; 
	}
	public static function pembulatan($uang){
		 $ribuan = substr($uang, -3);
		 $akhir = $uang + (1000-$ribuan);
		 return $akhir;
	}

    public static function getHargaBangunan($id,$jenis){

    	$hargaBangunan = DB::table('m_harga_bangunan AS a')
        		->where('a.id_klasifikasi_bangunan','=',$id)
        		->where('a.is_bertingkat','=',$jenis)
        		->first();


        return $hargaBangunan;
	}
}
