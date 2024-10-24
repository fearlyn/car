<?php
include 'koneksi.php'; // Pastikan koneksi ke database

if (isset($_GET['id'])) {
    $nopol = $_GET['id'];
    
    // Hapus data dari tabel tb_mobil
    $delete_query = "DELETE FROM tb_mobil WHERE nopol='$nopol'";
    
    if (mysqli_query($koneksi, $delete_query)) {
        header("Location: list_mobil.php"); // Redirect ke halaman daftar mobil
        exit();
    } else {
        echo '<script>alert("Gagal menghapus data: ' . mysqli_error($koneksi) . '");</script>';
    }
} else {
    die("ID mobil tidak ditentukan.");
}
?>
