<?php
include 'koneksi.php'; // Pastikan file ini memiliki koneksi ke database

// Cek apakah ada ID transaksi dari URL
if (isset($_GET['id'])) {
    $id_transaksi = $_GET['id'];

    // Hapus data dari tabel tb_transaksi
    $delete_sql = "DELETE FROM tb_transaksi WHERE id_transaksi='$id_transaksi'";
    
    if (mysqli_query($koneksi, $delete_sql)) {
        echo "<script>alert('Transaksi berhasil dihapus!'); window.location='listboking.php';</script>";
    } else {
        echo "Error: " . mysqli_error($koneksi);
    }
} else {
    echo "ID transaksi tidak ditemukan.";
}

// Tutup koneksi database
mysqli_close($koneksi);
?>
