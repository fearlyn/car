<?php
include 'koneksi.php'; // Pastikan koneksi ke database

// Periksa apakah ID mobil disediakan
if (isset($_GET['id'])) {
    $nopol = $_GET['id'];

    // Ambil data mobil berdasarkan nopol
    $sql = "SELECT * FROM tb_mobil WHERE nopol='$nopol'";
    $query = mysqli_query($koneksi, $sql);
    $data = mysqli_fetch_assoc($query);

    if (!$data) {
        die("Mobil tidak ditemukan.");
    }
} else {
    die("ID mobil tidak ditentukan.");
}

// Proses penyimpanan perubahan
if (isset($_POST['update'])) {
    $brand = $_POST['brand'];
    $type = $_POST['type'];
    $tahun = $_POST['tahun'];
    $harga = $_POST['harga'];
    $status = $_POST['status'];

    // Update data mobil
    $update_sql = "UPDATE tb_mobil SET brand='$brand', type='$type', tahun='$tahun', harga='$harga', status='$status' WHERE nopol='$nopol'";

    if (mysqli_query($koneksi, $update_sql)) {
        header("Location: list_mobil.php"); // Redirect ke daftar mobil
        exit();
    } else {
        echo '<script>alert("Gagal mengupdate data mobil: ' . mysqli_error($koneksi) . '");</script>';
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Mobil</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>

<div class="container mt-5">
    <h2 class="text-center">Edit Mobil</h2>
    <form method="POST" action="">
        <div class="mb-3">
            <label for="inputnopol" class="form-label">Nopol</label>
            <input type="text" name="nopol" class="form-control" id="inputnopol" value="<?php echo htmlspecialchars($data['nopol']); ?>" readonly>
        </div>
        <div class="mb-3">
            <label for="inputbrand" class="form-label">Brand</label>
            <input type="text" name="brand" class="form-control" id="inputbrand" value="<?php echo htmlspecialchars($data['brand']); ?>" required>
        </div>
        <div class="mb-3">
            <label for="inputtype" class="form-label">Type</label>
            <input type="text" name="type" class="form-control" id="inputtype" value="<?php echo htmlspecialchars($data['type']); ?>" required>
        </div>
        <div class="mb-3">
            <label for="inputtahun" class="form-label">Tahun</label>
            <input type="number" name="tahun" class="form-control" id="inputtahun" value="<?php echo htmlspecialchars($data['tahun']); ?>" required>
        </div>
        <div class="mb-3">
            <label for="inputharga" class="form-label">Harga</label>
            <input type="number" name="harga" class="form-control" id="inputharga" value="<?php echo htmlspecialchars($data['harga']); ?>" required>
        </div>
        <div class="mb-3">
            <label for="inputstatus" class="form-label">Status</label>
            <select name="status" class="form-control" id="inputstatus" required>
                <option value="Tersedia" <?php if($data['status'] == 'Tersedia') echo 'selected'; ?>>Tersedia</option>
                <option value="Tidak Tersedia" <?php if($data['status'] == 'Tidak Tersedia') echo 'selected'; ?>>Tidak Tersedia</option>
            </select>
        </div>
        <button type="submit" name="update" class="btn btn-primary">Update</button>
        <a href="list_mobil.php" class="btn btn-secondary">Batal</a>
    </form>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>

<?php
mysqli_close($koneksi);
?>
