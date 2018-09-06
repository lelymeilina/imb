<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class tanggalIndo extends Model
{
    //
    public static function TanggalIndo($date){
        $BulanIndo = array("Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember");
     
        $tahun = substr($date, 0, 4);
        $bulan = substr($date, 5, 2);
        $tgl   = substr($date, 8, 2);
        $result = $tgl . " " . $BulanIndo[(int)$bulan-1] . " ". $tahun;        
        return($result);
    }
}
