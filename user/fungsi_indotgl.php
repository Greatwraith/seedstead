<?php
// Fungsi untuk mengubah format tanggal dari YYYY-MM-DD ke format Indonesia (DD Bulan YYYY)
function tgl_indo($tgl){
    // Mengambil bagian tanggal (2 karakter mulai dari posisi 8)
    $tanggal = substr($tgl,8,2);
    
    // Mengambil bagian bulan (2 karakter mulai dari posisi 5) dan mengkonversi ke nama bulan
    $bulan = getBulan(substr($tgl,5,2));
    
    // Mengambil bagian tahun (4 karakter mulai dari posisi 0)
    $tahun = substr($tgl,0,4);
    
    // Menggabungkan dan mengembalikan format tanggal Indonesia
    return $tanggal.' '.$bulan.' '.$tahun;
}

// Fungsi untuk mengkonversi angka bulan (1-12) menjadi nama bulan dalam Bahasa Indonesia
function getBulan($bln){
    switch ($bln){
        case 1:  // Jika bulan = 1
        return "Januari";  // Mengembalikan string "Januari"
        break;  // Menghentikan eksekusi case ini 
        case 2;
        return "februari";
        break;
        case 3;
        return "maret";
        break;
        case 4;
        return "april";
        break;
        case 5;
        return "mei";
        break;
        case 6;
        return "juni";
        break;
        case 7;
        return " juli";
        break;
        case 8;
        return " agustus";
        break;
        case 9;
        return "september";
        break;
        case 10;
        return "oktober";
        break;
        case 11;
        return "november";
        break;
        case 12;
        return "desember";
        break;
        
        
}
}
?>