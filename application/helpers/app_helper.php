<?php defined('BASEPATH') OR exit('No direct script access allowed');

// ------------------------------------------------------------------------

if (!function_exists('to_rupiah')) {
    function to_rupiah($nominal)
    {
        $hasil_rupiah = "Rp " . number_format($nominal,0,'','.');
        return $hasil_rupiah;
    }
}

// ------------------------------------------------------------------------

if (!function_exists('kalkulasi_sub_total_item')) {
    function kalkulasi_sub_total_item($item)
    {
        $total = ($item["qty"] * $item["price"]);
//        $disc = $item["disc"] * $total / 100;
//        $sub = $total - $disc;
        $disc = preg_replace("/[^0-9,]/", "", $item["disc"]);
        $sub = $total - $disc;
        return $sub;
    }
}

// ------------------------------------------------------------------------

if (!function_exists('to_angka')) {
    function to_angka($item)
    {
        return preg_replace("/[^0-9,]/", "", $item);
    }
}

// ------------------------------------------------------------------------

if (!function_exists('to_sumberwang')) {
    function to_sumberwang($item)
    {
        $item = substr($item, 0, strlen($item)-3);
        $angka = str_split($item);
        $wang = "";
        foreach ($angka as $a) {
            switch ($a){
                case 1:
                    $wang .= 'S';
                    break;
                case 2:
                    $wang .= 'U';
                    break;
                case 3:
                    $wang .= 'M';
                    break;
                case 4:
                    $wang .= 'B';
                    break;
                case 5:
                    $wang .= 'E';
                    break;
                case 6:
                    $wang .= 'R';
                    break;
                case 7:
                    $wang .= 'W';
                    break;
                case 8:
                    $wang .= 'A';
                    break;
                case 9:
                    $wang .= 'N';
                    break;
                case 0:
                    $wang .= 'G';
                    break;
            }
        }

        return $wang;
    }
}