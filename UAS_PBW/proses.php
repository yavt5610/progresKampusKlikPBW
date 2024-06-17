<?php
include "koneksi.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    $nama_mhs = $_POST['nama'];
    $npm_mhs = $_POST['npm'];
    $prodi_mhs = $_POST['prodi'];
  
    if(!ctype_digit($npm_mhs)) {
        echo "<script>alert('NPM harus angka');window.location.href='index.php';</script>";
        exit;
    }
    else if(strlen($npm_mhs) < 13) {
        echo "<script>alert('NPM kurang dari 13 angka');window.location.href='index.php';</script>";
        exit;
    }
    else if(strlen($npm_mhs) > 13) {
        echo "<script>alert('Digit NPM lebih dari 13 angka');window.location.href='index.php';</script>";
        exit;
    }

    $proses = mysqli_query($koneksi, "INSERT INTO mahasiswa (nama_mahasiswa, npm_mahasiswa, prodi) VALUES ('$nama_mhs','$npm_mhs', '$prodi_mhs')")
        or die(mysqli_error($koneksi));

    if ($proses) {
        echo "
            <script>
                alert('Data Berhasil Disimpan');
                window.location.href='index.php';
            </script>";
    } else {
        echo "
            <script>
                alert('Data Gagal Disimpan');
                window.location.href='index.php';
            </script>";
    }
} else {
    $proses = mysqli_query($koneksi, "SELECT * FROM mahasiswa") 
        or die(mysqli_error($koneksi));
}
?>