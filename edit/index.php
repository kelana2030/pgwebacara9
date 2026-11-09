<?php
$conn = new mysqli("localhost", "root", "", "latihan");

if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

$id = (int) $_GET['id'];

$stmt = $conn->prepare("SELECT * FROM industri WHERE id = ?");
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();
$row = $result->fetch_assoc();

if (!$row) {
    die("Data tidak ditemukan.");
}
?>
<!DOCTYPE html>
<html>
<body>
<h2>Form Edit</h2>

<form action="edit.php" onsubmit="return validateForm()" method="post">
    <input type="hidden" name="id" value="<?php echo $row['id']; ?>">

    <label>Longitude:</label><br>
    <input type="text" id="long" name="longitude" value="<?php echo $row['longitude']; ?>"><br>

    <label>Latitude:</label><br>
    <input type="text" id="lat" name="latitude" value="<?php echo $row['latitude']; ?>"><br>

    <label>Kelompok Usaha:</label><br>
    <select id="kelompok" name="kelompok_usaha">
        <option value="industri_tekstil" <?php if ($row['kelompok_usaha'] == 'industri_tekstil') echo 'selected'; ?>>Industri Tekstil</option>
        <option value="industri_makanan" <?php if ($row['kelompok_usaha'] == 'industri_makanan') echo 'selected'; ?>>Industri Makanan</option>
    </select><br>

    <label>Jenis Usaha:</label><br>
    <input type="text" id="jenis" name="jenis_usaha" value="<?php echo htmlspecialchars($row['jenis_usaha']); ?>"><br>

    <label>Jumlah Tenaga Kerja:</label><br>
    <input type="text" id="tk" name="jumlah_tenaga_kerja" value="<?php echo $row['jumlah_tenaga_kerja']; ?>"><br>

    <label>Jumlah Produksi:</label><br>
    <input type="text" id="produksi" name="jumlah_produksi" value="<?php echo htmlspecialchars($row['jumlah_produksi']); ?>"><br><br>

    <input type="submit" value="Submit">
</form>

<p id="informasi" style="color:red"></p>

<script>
function validateForm() {
    let lng = document.getElementById("long").value;
    let lat = document.getElementById("lat").value;
    let jenis = document.getElementById("jenis").value.trim();
    let tk = document.getElementById("tk").value;
    let produksi = document.getElementById("produksi").value.trim();
    let text = "";

    if (lng === "" || isNaN(lng) || lat === "" || isNaN(lat)) {
        text = "Longitude dan Latitude harus berupa angka";
    } else if (jenis === "") {
        text = "Jenis usaha tidak boleh kosong";
    } else if (tk === "" || isNaN(tk) || tk < 0) {
        text = "Jumlah tenaga kerja harus angka dan tidak boleh negatif";
    } else if (produksi === "") {
        text = "Jumlah produksi tidak boleh kosong";
    }

    document.getElementById("informasi").innerHTML = text;
    return text === "";
}
</script>
</body>
</html>
