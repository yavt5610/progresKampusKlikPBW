<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Edit Data Mahasiswa</title>
    <link href="library/bootstrap/css/bootstrap.min.css" rel="stylesheet" media="screen">
    <link href="library/bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet" media="screen">
    <link href="library/assets/styles.css" rel="stylesheet" media="screen">
    <script src="library/vendors/modernizr-2.6.2-respond-1.1.0.min.js"></script>
</head>

<body>
    <div class="container">
        <h3 class="mt-5">Edit Data Mahasiswa</h3>
        <?php
        include "koneksi.php";

        $id_peserta = isset($_GET['id']) ? $_GET['id'] : '';
        $apakah_proses = isset($_GET['proses']) ? $_GET['proses'] : '';

        if ($id_peserta) {
            
            $query = mysqli_query($koneksi, "SELECT * FROM mahasiswa WHERE id = $id_peserta");
            $data = mysqli_fetch_assoc($query);

    
            if ($data) {
                $nama_mahasiswa = $data['nama_mahasiswa'];
                $npm_mahasiswa = $data['npm_mahasiswa'];
                $prodi = $data['prodi'];
        ?>
        <form action="editData.php?id=<?php echo $id_peserta; ?>&proses=1" method="POST">
            <div class="mb-3">
                <label for="nama_mahasiswa" class="form-label">Nama Mahasiswa</label>
                <input type="text" class="form-control" id="nama_mahasiswa" name="nama_mahasiswa"
                    value="<?php echo htmlspecialchars($nama_mahasiswa); ?>" required>
            </div>
            <div class="mb-3">
                <label for="npm_mahasiswa" class="form-label">NPM Mahasiswa</label>
                <input type="text" class="form-control" id="npm_mahasiswa" name="npm_mahasiswa"
                    value="<?php echo htmlspecialchars($npm_mahasiswa); ?>" required>
            </div>
            <div class="mb-3">
                <label for="prodi" class="form-label">Prodi</label>
                <input type="text" class="form-control" id="prodi" name="prodi"
                    value="<?php echo htmlspecialchars($prodi); ?>" required>
            </div>
            <button type="submit" class="btn btn-primary">Update Data</button>
        </form>
        <?php
            } else {
                echo "<div>Data tidak ditemukan.</div>";
            }
        } else {
            echo "<div>Parameter ID tidak valid.</div>";
        }
        ?>

    </div>

    <script src="library/bootstrap/js/bootstrap.bundle.min.js"></script>
</body>

</html>