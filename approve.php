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
    if (isset($_POST['approve'])) {
        // Update status transaksi menjadi 'approve'
        $update_sql = "UPDATE tb_transaksi SET status='approve' WHERE id_transaksi='$id_transaksi'";
        if (mysqli_query($koneksi, $update_sql)) {
            echo "<script>alert('Transaksi telah disetujui!'); window.location='listboking.php';</script>";
        } else {
            echo "Error: " . mysqli_error($koneksi);
        }
    } elseif (isset($_POST['reject'])) {
        // Update status transaksi menjadi 'ditolak' (atau bisa disesuaikan)
        $update_sql = "UPDATE tb_transaksi SET status='ditolak' WHERE id_transaksi='$id_transaksi'";
        if (mysqli_query($koneksi, $update_sql)) {
            echo "<script>alert('Transaksi telah ditolak!'); window.location='listboking.php';</script>";
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
    <title>Approve Transaksi</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
<div class="container mt-5">
    <h2 class="text-center">Approve Transaksi</h2>

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

    <form method="post" class="text-center">
        <button type="submit" name="approve" class="btn btn-success">Approve</button>
        <button type="submit" name="reject" class="btn btn-danger">Tolak</button>
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
