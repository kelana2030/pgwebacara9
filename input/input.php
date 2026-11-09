<?php
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

$stmt = $conn->prepare("INSERT INTO industri
    (longitude, latitude, kelompok_usaha, jenis_usaha, jumlah_tenaga_kerja, jumlah_produksi)
    VALUES (?, ?, ?, ?, ?, ?)");
$stmt->bind_param("ddssis", $longitude, $latitude, $kelompok, $jenis, $tk, $produksi);
$stmt->execute();

$stmt->close();
$conn->close();

header("Location: ../index.php");
exit;
?>
