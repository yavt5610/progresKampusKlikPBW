<?php
include "koneksi.php";


$id_peserta = isset($_GET['id']) ? $_GET['id'] : '';

if ($id_peserta && $_SERVER['REQUEST_METHOD'] == 'POST') {

    $apakah_proses = isset($_GET['proses']) ? $_GET['proses'] : '';

    if ($apakah_proses == 1) {

        $nm_mhs = isset($_POST['nama_mahasiswa']) ? $_POST['nama_mahasiswa'] : '';
        $npm_mhs = isset($_POST['npm_mahasiswa']) ? $_POST['npm_mahasiswa'] : '';
        $prodi_mhs = isset($_POST['prodi']) ? $_POST['prodi'] : '';


        if (!ctype_digit($npm_mhs)) {
            echo "
                <script>
                    alert('NPM harus angka');
                    window.history.back();
                </script>";
            exit();
        } elseif (strlen($npm_mhs) < 13) {
            echo "
                <script>
                    alert('NPM kurang dari 13 angka');
                    window.history.back();
                </script>";
            exit();
        } elseif (strlen($npm_mhs) > 13) {
            echo "
                <script>
                    alert('Digit NPM lebih dari 13 angka');
                    window.history.back();
                </script>";
            exit();
        }

        if ($nm_mhs && $npm_mhs && $prodi_mhs) {

$proses_update_data = mysqli_query($koneksi, "UPDATE mahasiswa SET 
                nama_mahasiswa = '".mysqli_real_escape_string($koneksi, $nm_mhs)."',  
                npm_mahasiswa = '".mysqli_real_escape_string($koneksi, $npm_mhs)."', 
                prodi = '".mysqli_real_escape_string($koneksi, $prodi_mhs)."' 
                WHERE id = '".mysqli_real_escape_string($koneksi, $id_peserta)."'")
                or die(mysqli_error($koneksi));

            if ($proses_update_data) {
                echo "<script>
                    alert('Data Berhasil Disimpan');
                    window.location.href='index.php';
                </script>";
            } else {
                echo "<script>
                    alert('Data Gagal Disimpan');
                    window.location.href='index.php';
                </script>";
            }
        } else {
            echo "<script>
                alert('Data tidak lengkap');
                window.location.href='index.php';
            </script>";
        }
    } else {

        $proses_delete_data = mysqli_query($koneksi, "DELETE FROM mahasiswa WHERE id = $id_peserta") 
            or die(mysqli_error($koneksi));

        if ($proses_delete_data) {
            echo "<script>
                alert('Data Berhasil Dihapus');
                window.location.href='index.php';
            </script>";
        } else {
            echo "<script>
                alert('Data Gagal Dihapus');
                window.location.href='index.php';
            </script>";
        }
    }
} else if (!$id_peserta) {
    echo "<script>
        alert('Parameter tidak valid');
        window.location.href='index.php';
    </script>";
}
?>