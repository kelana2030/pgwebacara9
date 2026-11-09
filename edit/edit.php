<?php
$id = (int) $_POST['id'];
$longitude = $_POST['longitude'];
$latitude = $_POST['latitude'];
$kelompok = $_POST['kelompok_usaha'];
$jenis = $_POST['jenis_usaha'];
$tk = (int) $_POST['jumlah_tenaga_kerja'];
$produksi = $_POST['jumlah_produksi'];

$conn = new mysqli("localhost", "root", "", "latihan");

if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

$stmt = $conn->prepare("UPDATE industri SET
    longitude = ?, latitude = ?, kelompok_usaha = ?, jenis_usaha = ?,
    jumlah_tenaga_kerja = ?, jumlah_produksi = ?
    WHERE id = ?");
$stmt->bind_param("ddssisi", $longitude, $latitude, $kelompok, $jenis, $tk, $produksi, $id);
$stmt->execute();

$stmt->close();
$conn->close();

header("Location: ../index.php");
exit;
?>
