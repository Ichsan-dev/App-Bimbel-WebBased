<?php
use App\Models\Jumbotron;
use App\Models\Review;
use App\Models\section;
use App\Models\setting;

function get_setting_value($key)
{
    $data = setting::where('key', $key)->first();
    if(isset($data->value)){
        return $data->value;
    }else{
        return 'empty';
    }
}

function get_section()
{
    $data = section::all();
    return $data;
}

function get_jumbotron()
{
    $data = Jumbotron::all();
    return $data;
}

function get_reviews()
{
    $datareview = Review::all();
    return $datareview;
}

function terbilang($angka) {
    $angka = abs($angka);
    $baca = array("", "satu", "dua", "tiga", "empat", "lima", "enam", "tujuh", "delapan", "sembilan", "sepuluh", "sebelas");
    $terbilang = "";

    if ($angka < 12) {
        $terbilang = " " . $baca[$angka];
    } else if ($angka < 20) {
        $terbilang = terbilang($angka - 10) . " belas";
    } else if ($angka < 100) {
        $terbilang = terbilang($angka / 10) . " puluh" . terbilang($angka % 10);
    } else if ($angka < 200) {
        $terbilang = " seratus" . terbilang($angka - 100);
    } else if ($angka < 1000) {
        $terbilang = terbilang($angka / 100) . " ratus" . terbilang($angka % 100);
    } else if ($angka < 2000) {
        $terbilang = " seribu" . terbilang($angka - 1000);
    } else if ($angka < 1000000) {
        $terbilang = terbilang($angka / 1000) . " ribu" . terbilang($angka % 1000);
    } else if ($angka < 1000000000) {
        $terbilang = terbilang($angka / 1000000) . " juta" . terbilang($angka % 1000000);
    }

    return $terbilang;
}

?>
