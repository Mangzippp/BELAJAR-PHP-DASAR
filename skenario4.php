<?php
// Data hari, bulan, dan tahun
$hari = ["Minggu", "Senin", "Selasa", "Rabu", "Kamis", "Jumat", "Sabtu"];
$tanggal = range(1, 31);
$bulan = ["Jan", "Feb", "Mar", "Apr", "Mei", "Jun", "Jul", "Ags", "Sep", "Okt", "Nov", "Des"];
$tahun = [2024, 2025, 2026];

// Default nilai jika belum dipilih
$tgl = $_POST['tanggal'] ?? 1;
$bln = $_POST['bulan'] ?? 3;
$thn = $_POST['tahun'] ?? 2025;

// Menghitung nama hari berdasarkan tanggal yang dipilih
$timestamp = strtotime("$thn-$bln-$tgl");
$hari_ke = date("w", $timestamp); // Mendapatkan indeks hari (0 = Minggu, 1 = Senin, dst)
$nama_hari = $hari[$hari_ke];
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pilih Tanggal</title>
</head>
<body>
    <h2>Pilih Tanggal:</h2>
    <form method="POST">
        <label for="tanggal">Tanggal:</label>
        <select name="tanggal" id="tanggal">
            <?php foreach ($tanggal as $i): ?>
                <option value="<?= $i ?>" <?= ($i == $tgl) ? 'selected' : '' ?>><?= $i ?></option>
            <?php endforeach; ?>
        </select>

        <label for="bulan">Bulan:</label>
        <select name="bulan" id="bulan">
            <?php 
            $index = 0;
            while ($index < count($bulan)): ?>
                <option value="<?= $index + 1 ?>" <?= (($index + 1) == $bln) ? 'selected' : '' ?>><?= $bulan[$index] ?></option>
            <?php 
                $index++;
            endwhile; ?>
        </select>

        <label for="tahun">Tahun:</label>
        <select name="tahun" id="tahun">
            <?php 
            $j = 0;
            do { ?>
                <option value="<?= $tahun[$j] ?>" <?= ($tahun[$j] == $thn) ? 'selected' : '' ?>><?= $tahun[$j] ?></option>
            <?php 
                $j++;
            } while ($j < count($tahun)); ?>
        </select>

        <button type="submit">Tampilkan</button>
    </form>

    <h3>Hasil:</h3>
    <p><strong>
        <?php 
        // Menampilkan hari dari array menggunakan for loop
        for ($i = 0; $i < count($hari); $i++) {
            if ($hari[$i] == $nama_hari) {
                echo "$hari[$i], ";
                break;
            }
        }
        echo "$tgl-".$bulan[$bln - 1]."-$thn"; 
        ?>
    </strong></p>
</body>
</html>
