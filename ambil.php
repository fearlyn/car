<?php
include 'koneksi.php'; // Pastikan file ini memiliki koneksi ke database

if (isset($_GET['id'])) {
    $id_transaksi = $_GET['id'];

    // Query untuk mengambil data berdasarkan ID
    $sql = "SELECT * FROM tb_transaksi WHERE id_transaksi='$id_transaksi'";
    $query = mysqli_query($koneksi, $sql);
    $data = mysqli_fetch_assoc($query);

    if (!$data) {
        die("Transaksi tidak ditemukan.");
    }
} else {
    die("ID transaksi tidak ditentukan.");
}

// Proses konfirmasi pengambilan
if (isset($_POST['confirm'])) {
    // Update status ke 'ambil'
    $update_sql = "UPDATE tb_transaksi SET status='ambil' WHERE id_transaksi='$id_transaksi'";
    mysqli_query($koneksi, $update_sql);
    header("Location: listboking.php"); // Redirect kembali ke daftar booking
    exit();
}

// Proses mengembalikan
if (isset($_POST['kembalikan'])) {
    $update_sql = "UPDATE tb_transaksi SET status='kembali' WHERE id_transaksi='$id_transaksi'";
    mysqli_query($koneksi, $update_sql);
    header("Location: listboking.php"); // Redirect kembali ke daftar booking
    exit();
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Konfirmasi Ambil</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>

<div class="container mt-5">
    <h2 class="text-center">Konfirmasi Pengambilan</h2>
    <div class="card">
        <div class="card-body">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>ID Transaksi</th>
                        <th>NIK</th>
                        <th>Nopol</th>
                        <th>Tanggal Booking</th>
                        <th>Tanggal Ambil</th>
                        <th>Tanggal Kembali</th>
                        <th>Total</th>
                        <th>Down Payment</th>
                        <th>Kekurangan</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><?php echo htmlspecialchars($data['id_transaksi']); ?></td>
                        <td><?php echo htmlspecialchars($data['nik']); ?></td>
                        <td><?php echo htmlspecialchars($data['nopol']); ?></td>
                        <td><?php echo htmlspecialchars($data['tgl_booking']); ?></td>
                        <td><?php echo htmlspecialchars($data['tgl_ambil']); ?></td>
                        <td><?php echo htmlspecialchars($data['tgl_kembali']); ?></td>
                        <td><?php echo number_format($data['total'], 2, ',', '.'); ?></td>
                        <td><?php echo number_format($data['downpayment'], 2, ',', '.'); ?></td>
                        <td><?php echo number_format($data['kekurangan'], 2, ',', '.'); ?></td>
                        <td><?php echo htmlspecialchars($data['status']); ?></td>
                    </tr>
                </tbody>
            </table>

            <form method="POST" action="">
                <button type="submit" name="confirm" class="btn btn-primary">Konfirmasi Ambil</button>
                <a href="kembalikan.php?id=<?php echo htmlspecialchars($data['id_transaksi']); ?>" class="btn btn-danger">Kembalikan</a>

                <a href="listboking.php" class="btn btn-secondary">Batal</a>
            </form>
        </div>
    </div>
</div>

<!-- Vendor JS Files -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>

<?php
// Tutup koneksi database
mysqli_close($koneksi);
?>
