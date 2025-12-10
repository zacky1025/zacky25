<?php
// Proses form jika disubmit
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Ambil data dari form
    $nama = htmlspecialchars($_POST['nama']);
    $alamat = htmlspecialchars($_POST['alamat']);
    $tanggal = $_POST['tanggal'];
    $bulan = $_POST['bulan'];
    $tahun = $_POST['tahun'];
    
    // Proses upload foto
    $foto = "";
    if (isset($_FILES['foto']) && $_FILES['foto']['error'] == 0) {
        $targetDir = "uploads/"; // Folder untuk menyimpan foto (buat folder ini di direktori yang sama)
        $targetFile = $targetDir . basename($_FILES['foto']['name']);
        $imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));
        
        // Cek apakah file adalah gambar (opsional, tambahkan validasi lebih lanjut jika perlu)
        $check = getimagesize($_FILES['foto']['tmp_name']);
        if ($check !== false) {
            if (move_uploaded_file($_FILES['foto']['tmp_name'], $targetFile)) {
                $foto = $targetFile; // Path file yang berhasil diupload
            } else {
                echo "Error: Gagal mengupload foto.<br>";
            }
        } else {
            echo "Error: File bukan gambar.<br>";
        }
    } else {
        echo "Error: Tidak ada foto yang diupload atau ada kesalahan.<br>";
    }
    
    // Tampilkan data (untuk demo)
    echo "<h2>Data yang Diterima:</h2>";
    echo "Nama: $nama<br>";
    echo "Alamat: $alamat<br>";
    echo "Tanggal Lahir: $tanggal<br>";
    echo "Bulan Lahir: $bulan<br>";
    echo "Tahun Lahir: $tahun<br>";
    if ($foto) {
        echo "Foto: <img src='$foto' alt='Foto' width='100'><br>";
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Data Diri</title>
</head>
<body>
    <h1>Form Data Diri</h1>
    <form action="" method="POST" enctype="multipart/form-data">
        <label for="foto">Foto:</label><br>
        <input type="file" name="foto" id="foto" accept="image/*" required><br><br>
        
        <label for="nama">Nama:</label><br>
        <input type="text" name="nama" id="nama" required><br><br>
        
        <label for="alamat">Alamat:</label><br>
        <textarea name="alamat" id="alamat" rows="4" cols="50" required></textarea><br><br>
        
        <label for="tanggal">Tanggal Lahir:</label><br>
        <select name="tanggal" id="tanggal" required>
            <option value="">Pilih Tanggal</option>
            <?php for ($i = 1; $i <= 31; $i++) { echo "<option value='$i'>$i</option>"; } ?>
        </select><br><br>
        
        <label for="bulan">Bulan Lahir:</label><br>
        <select name="bulan" id="bulan" required>
            <option value="">Pilih Bulan</option>
            <option value="Januari">Januari</option>
            <option value="Februari">Februari</option>
            <option value="Maret">Maret</option>
            <option value="April">April</option>
            <option value="Mei">Mei</option>
            <option value="Juni">Juni</option>
            <option value="Juli">Juli</option>
            <option value="Agustus">Agustus</option>
            <option value="September">September</option>
            <option value="Oktober">Oktober</option>
            <option value="November">November</option>
            <option value="Desember">Desember</option>
        </select><br><br>
        
        <label for="tahun">Tahun Lahir:</label><br>
        <select name="tahun" id="tahun" required>
            <option value="">Pilih Tahun</option>
            <?php for ($i = 2023; $i >= 1900; $i--) { echo "<option value='$i'>$i</option>"; } ?>
        </select><br><br>
        
        <input type="submit" value="Kirim">
    </form>
</body>
</html>