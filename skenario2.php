<!DOCTYPE html>
<html lang="id">
<head>
    <title>Fauzi Skenario 2</title>
</head>
<body>
    <h2>Masukkan Jam :</h2>
    <p>Cara masukan adalah dengan (JJ:MM), contoh 15:30 lalu akan keluar keterangan waktu</p>
    <form method="post">
        <input type="text" name="jam" placeholder="Masukan Jam" required>
        <button type="submit">Cek Waktu</button>
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $jamInput = $_POST["jam"];

        // Validasi format jam
        if (preg_match("/^(?:[01]\d|2[0-3]):[0-5]\d$/", $jamInput)) {
            list($jam, $menit) = explode(":", $jamInput);
            $waktu = "$jam:$menit";

            if ($waktu >= "00:00" && $waktu < "04:00") {
                echo "<p>$waktu = Dini hari</p>";
            } elseif ($waktu >= "04:00" && $waktu < "10:00") {
                echo "<p>$waktu = Pagi</p>";
            } elseif ($waktu >= "10:00" && $waktu < "15:00") {
                echo "<p>$waktu = Siang</p>";
            } elseif ($waktu >= "15:00" && $waktu < "17:30") {
                echo "<p>$waktu = Sore</p>";
            } elseif ($waktu >= "17:30" && $waktu < "18:30") {
                echo "<p>$waktu = Petang</p>";
            } elseif ($waktu >= "18:30" && $waktu <= "23:59") {
                echo "<p>$waktu = Malam</p>";
            } else {
                echo "<p>$waktu = Dunia lain</p>";
            }
        } else {
            echo "<p>Format jam tidak valid. Gunakan format HH:MM (contoh: 18:30).</p>";
        }
    }
    ?>
</body>
</html>
