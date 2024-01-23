<?php

include("config.php");

// cek apakah tombol daftar sudah diklik atau blum?
if(isset($_POST['daftar'])){

    // ambil data dari formulir
    $nama = $_POST['nama'];
    $alamat = $_POST['alamat'];
    $jk = $_POST['jenis_kelamin'];
    $agama = $_POST['agama'];
    $sekolah_asal = $_POST['sekolah_asal'];
    $tanggal_lahir = $_POST['tanggal_lahir'];
    $no_telepon = $_POST['no_telepon'];
    $email = $_POST['email'];
    $desa_kelurahan = $_POST['desa_kelurahan'];
    $kecamatan = $_POST['kecamatan'];
    $kabupaten = $_POST['kabupaten'];
    $provinsi = $_POST['provinsi'];
    $kode_pos = $_POST['kode_pos'];

    // Ambil tanggal dari input HTML
    $tanggal = $_POST['tanggal'];

    // Format tanggal sesuai dengan format MySQL (YYYY-MM-DD)
    $tanggal_mysql = date("Y-m-d", strtotime($tanggal_lahir));

    // Query untuk menyimpan tanggal ke dalam database
    $query = "INSERT INTO pendaftaran (tanggal) VALUES ('$tanggal_mysql')";

    // buat query
    $sql = "INSERT INTO pendaftaran (nama, alamat, jenis_kelamin, agama,sekolah_asal,tanggal_lahir,no_telepon,
    email,desa_kelurahan,kecamatan,kabupaten,provinsi,kode_pos)
     VALUE ('$nama', '$alamat', '$jk', '$agama','$sekolah_asal','$tanggal_lahir','$no_telepon','$email',
     '$desa_kelurahan','$kecamatan','$kabupaten','$provinsi','$kode_pos')";
    $query = mysqli_query($db, $sql);

    // apakah query simpan berhasil?
    if( $query ) {
        // kalau berhasil alihkan ke halaman index.php dengan status=sukses
        header('Location: index.php?status=sukses');
    } else {
        // kalau gagal alihkan ke halaman indek.php dengan status=gagal
        header('Location: index.php?status=gagal');
    }


} else {
    die("Akses dilarang...");
}

?>