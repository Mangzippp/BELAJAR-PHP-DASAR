<!DOCTYPE html>
<html lang="id">
<head>
    <title>Fauzi Skenario 1</title>
</head>
<body>
    <h2>Masukkan Nilai Anda :</h2>
    <form method="post">
        <input type="number" name="nilai" placeholder="Masukkan nilai" required>
        <button type="submit">Cek nilai</button>
    </form>

    <?php

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $nilai = intval($_POST["nilai"]);

        if ($nilai >= 90 && $nilai <= 100) {
            echo "<p>Nilai $nilai = A</p>";

        } elseif ($nilai >= 80 && $nilai <= 89) {
            echo "<p>Nilai $nilai = B</p>";

        } elseif ($nilai >= 70 && $nilai <= 79) {
            echo "<p>Nilai $nilai = C</p>";

        } elseif ($nilai >= 0 && $nilai <= 69) {
            echo "<p>Nilai $nilai = D</p>";

        } else {
            echo "<p>Nilai wajib di antara 0 - 100</p>";
        }
    }

    ?>
</body>
</html>