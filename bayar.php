<?php
include 'koneksi.php'; // Pastikan file ini memiliki koneksi ke database

// Cek apakah ada ID transaksi dari URL
if (isset($_GET['id'])) {
    $id_transaksi = $_GET['id'];

    // Query untuk mengambil data berdasarkan ID
    $sql = "SELECT * FROM tb_transaksi WHERE id_transaksi='$id_transaksi'";
    $query = mysqli_query($koneksi, $sql);
    $data = mysqli_fetch_assoc($query);

    if (!$data) {
        die("Transaksi tidak ditemukan.");
    }

    // Cek apakah form telah disubmit
    if (isset($_POST['submit'])) {
        $tgl_bayar = $_POST['tgl_bayar'];
        $total_bayar = $_POST['total_bayar'];

        // Insert data ke dalam tabel tb_bayar
        $insert_bayar_sql = "INSERT INTO tb_bayar (id_kembali, tgl_bayar, total_bayar, status) 
                             VALUES ('$id_transaksi', '$tgl_bayar', '$total_bayar', 'lunas')";

        if (mysqli_query($koneksi, $insert_bayar_sql)) {
            // Update status di tb_transaksi menjadi 'kembali' dan update tgl_kembali
            $tgl_kembali = date('Y-m-d'); // Tanggal kembali adalah tanggal saat ini
            $update_sql = "UPDATE tb_transaksi 
                           SET status='kembali', tgl_kembali='$tgl_kembali' 
                           WHERE id_transaksi='$id_transaksi'";
            mysqli_query($koneksi, $update_sql);

            echo "<script>alert('Pembayaran berhasil dilakukan!'); window.location='listboking.php';</script>";
        } else {
            echo "Error: " . mysqli_error($koneksi);
        }
    }
} else {
    echo "ID transaksi tidak ditemukan.";
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pembayaran</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
<div class="container mt-5">
    <h2 class="text-center">Form Pembayaran</h2>
    
    <!-- Tampilkan detail transaksi -->
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
                <td><?php echo date('Y-m-d'); ?></td> <!-- Tanggal Kembali -->
                <td><?php echo number_format($data['total'], 2, ',', '.'); ?></td>
                <td><?php echo number_format($data['downpayment'], 2, ',', '.'); ?></td>
                <td><?php echo number_format($data['kekurangan'], 2, ',', '.'); ?></td>
                <td><?php echo htmlspecialchars($data['status']); ?></td>
            </tr>
        </tbody>
    </table>

    <!-- Form input pembayaran -->
    <form action="" method="post">
        <div class="form-group">
            <label for="tgl_bayar">Tanggal Bayar:</label>
            <input type="date" name="tgl_bayar" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="total_bayar">Total Bayar:</label>
            <input type="number" name="total_bayar" class="form-control" required>
        </div>
        <button type="submit" name="submit" class="btn btn-primary">Simpan Pembayaran</button>
        <a href="listboking.php" class="btn btn-secondary">Kembali</a>
    </form>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>

<?php
// Tutup koneksi database
mysqli_close($koneksi);
?>
