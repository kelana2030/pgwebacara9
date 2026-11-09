<?php

// Koneksi database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "latihan";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

// Mengambil data industri
$sql = "SELECT * FROM industri";
$result = $conn->query($sql);

// Mengubah "industri_tekstil" menjadi "Industri Tekstil"
function rapikan($teks) {
    return ucwords(str_replace('_', ' ', $teks));
}

?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Sumber Sektor Industri Magelang</title>

    <style>

        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            font-family: Arial, sans-serif;
            background: linear-gradient(135deg, #e0eaff, #f3e8ff);
            padding: 40px 20px;
            min-height: 100vh;
        }

        .container {
            max-width: 1150px;
            margin: auto;
            background: white;
            padding: 30px;
            border-radius: 18px;
            box-shadow: 0 8px 25px rgba(0,0,0,0.10);
        }

        .header {
            text-align: center;
            margin-bottom: 25px;
        }

        .header h1 {
            color: #4338ca;
            font-size: 28px;
            margin-bottom: 10px;
        }

        .top-menu {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
            flex-wrap: wrap;
            gap: 12px;
        }

        .total {
            background: #ede9fe;
            color: #6d28d9;
            padding: 10px 16px;
            border-radius: 10px;
            font-weight: bold;
        }

        .btn-input {
            display: inline-block;
            background: linear-gradient(135deg, #4f46e5, #7c3aed);
            color: white;
            text-decoration: none;
            padding: 12px 20px;
            border-radius: 10px;
            font-weight: bold;
            transition: 0.3s;
        }

        .btn-input:hover {
            background: #3730a3;
            transform: translateY(-2px);
        }

        .table-wrapper {
            overflow-x: auto;
            border-radius: 12px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            min-width: 900px;
        }

        thead {
            background: linear-gradient(135deg, #4338ca, #7c3aed);
            color: white;
        }

        th {
            padding: 16px 12px;
            font-size: 14px;
            text-align: center;
        }

        td {
            padding: 14px 12px;
            text-align: center;
            font-size: 14px;
            color: #334155;
            border-bottom: 1px solid #e2e8f0;
        }

        tbody tr:nth-child(even) {
            background: #f5f3ff;
        }

        tbody tr:nth-child(odd) {
            background: #ffffff;
        }

        tbody tr:hover {
            background: #e0e7ff;
            transition: 0.2s;
        }

        .jenis {
            font-weight: bold;
            color: #4338ca;
        }

        .btn-edit {
            display: inline-block;
            background: #0ea5e9;
            color: white;
            text-decoration: none;
            padding: 8px 13px;
            border-radius: 7px;
            font-size: 12px;
            font-weight: bold;
        }

        .btn-edit:hover {
            background: #0369a1;
        }

        .btn-delete {
            display: inline-block;
            background: #ef4444;
            color: white;
            text-decoration: none;
            padding: 8px 13px;
            border-radius: 7px;
            font-size: 12px;
            font-weight: bold;
        }

        .btn-delete:hover {
            background: #b91c1c;
        }

        .empty {
            padding: 25px;
            color: #64748b;
            text-align: center;
        }

        @media (max-width: 600px) {
            body {
                padding: 15px 8px;
            }

            .container {
                padding: 18px 12px;
            }

            .header h1 {
                font-size: 20px;
            }
        }

    </style>
</head>

<body>

<div class="container">

    <div class="header">
        <h1>DATA SUMBER SEKTOR INDUSTRI MAGELANG</h1>
    </div>

    <div class="top-menu">

        <div class="total">
            Total Data:
            <?php echo $result->num_rows; ?> Usaha
        </div>

        <a href="input/index.html" class="btn-input">
            + Input Data
        </a>

    </div>

    <div class="table-wrapper">

        <table>

            <thead>
                <tr>
                    <th>No.</th>
                    <th>Longitude</th>
                    <th>Latitude</th>
                    <th>Kelompok Usaha</th>
                    <th>Jenis Usaha</th>
                    <th>Jumlah Tenaga Kerja</th>
                    <th>Jumlah Produksi</th>
                    <th colspan="2">Aksi</th>
                </tr>
            </thead>

            <tbody>

            <?php

            if ($result->num_rows > 0) {

                $no = 1;

                while ($row = $result->fetch_assoc()) {

            ?>

                <tr>

                    <td><?php echo $no++; ?></td>

                    <td><?php echo $row["longitude"]; ?></td>

                    <td><?php echo $row["latitude"]; ?></td>

                    <td>
                        <?php echo htmlspecialchars(rapikan($row["kelompok_usaha"])); ?>
                    </td>

                    <td class="jenis">
                        <?php echo htmlspecialchars($row["jenis_usaha"]); ?>
                    </td>

                    <td><?php echo number_format($row["jumlah_tenaga_kerja"], 0, ',', '.'); ?></td>

                    <td>
                        <?php echo htmlspecialchars($row["jumlah_produksi"]); ?>
                    </td>

                    <td>
                        <a class="btn-edit"
                           href="edit/index.php?id=<?php echo $row["id"]; ?>">
                           Edit
                        </a>
                    </td>

                    <td>
                        <a class="btn-delete"
                           href="delete.php?id=<?php echo $row["id"]; ?>"
                           onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">
                           Hapus
                        </a>
                    </td>

                </tr>

            <?php

                }

            } else {

                echo "<tr><td colspan='9' class='empty'>
                      Belum ada data industri.
                      </td></tr>";

            }

            ?>

            </tbody>

        </table>

    </div>

</div>

</body>
</html>

<?php
$conn->close();
?>
