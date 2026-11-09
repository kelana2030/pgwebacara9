<?php
$id = (int) $_GET['id'];

$conn = new mysqli("localhost", "root", "", "latihan");

if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

$stmt = $conn->prepare("DELETE FROM industri WHERE id = ?");
$stmt->bind_param("i", $id);
$stmt->execute();

$stmt->close();
$conn->close();

header("Location: index.php");
exit;
?>
