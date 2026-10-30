<?php
defined('BASEPATH') OR exit('No direct script access allowed');

if (!function_exists('terbilang')) {
    function terbilang($angka) {
        $angka = (float)$angka;
        $bilangan = ['nol', 'satu', 'dua', 'tiga', 'empat', 'lima', 'enam', 'tujuh', 'delapan', 'sembilan'];
        $temp = '';

        if ($angka == 0) {
            return ''; // Return an empty string for zero
        }

        if ($angka < 10) {
            $temp = $bilangan[$angka];
        } elseif ($angka < 20) {
            $temp = ($angka == 10) ? 'sepuluh' : $bilangan[$angka - 10] . ' belas';
        } elseif ($angka < 100) {
            $temp = ($angka < 30) ? 'dua puluh ' . $bilangan[$angka - 20] : $bilangan[floor($angka / 10)] . ' puluh ' . $bilangan[$angka % 10];
        } elseif ($angka < 1000) {
            $temp = ($angka < 200) ? 'seratus ' . terbilang($angka % 100) : $bilangan[floor($angka / 100)] . ' ratus ' . terbilang($angka % 100);
        } elseif ($angka < 1000000) {
            $temp = terbilang(floor($angka / 1000)) . ' ribu ' . terbilang($angka % 1000);
        } elseif ($angka < 1000000000) {
            $temp = terbilang(floor($angka / 1000000)) . ' juta ' . terbilang($angka % 1000000);
        } elseif ($angka < 1000000000000) {
            $temp = terbilang(floor($angka / 1000000000)) . ' miliar ' . terbilang($angka % 1000000000);
        } elseif ($angka < 1000000000000000) {
            $temp = terbilang(floor($angka / 1000000000000)) . ' triliun ' . terbilang($angka % 1000000000000);
        }

        // Remove redundant "nol" and format output
        $temp = trim(preg_replace('/\b(nol)\b/', '', $temp));
        $temp = preg_replace('/\s+/', ' ', $temp); // Replace multiple spaces with a single space

        // Capitalize the first letter of the result
        $temp = ucfirst(trim($temp));

        return $temp;
    }
}
