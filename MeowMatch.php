<!DOCTYPE html>
<html>
<head>
    <title> MeowMatch </title>
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #fff8f0;
            color: #333;
            text-align: center;
            padding: 20px;
        }
        form {
            background-color: #ffe8d6;
            padding: 20px;
            border-radius: 20px;
            width: 90%;
            max-width: 400px;
            margin: 0 auto;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }
        select, input[type=submit], input[type=text], input[type=number] {
            margin: 10px 0;
            padding: 10px;
            width: 90%;
            border-radius: 10px;
            border: 1px solid #ccc;
        }
        h2 { color: #b36a5e; }
        .result {
            background-color: #fefae0;
            margin-top: 20px;
            padding: 15px;
            border-radius: 10px;
            font-size: 18px;
        }
        img {
            max-width: 200px;
            border-radius: 20px;
            margin-top: 10px;
        }
        @media (max-width: 500px) {
            form { width: 95%; }
        }
    </style>
</head>
<body>
    <h2>🐾 MeowMatch: Temukan Kucing yang Sesuai dengan Dirimu! 🐾</h2>
    <p>Temukan kucing yang paling cocok untuk kamu berdasarkan gaya hidupmu!</p>

    <form method="post">
        <input type="text" name="nama" placeholder="Masukkan nama kamu" required><br>
        <input type="number" name="umur" placeholder="Masukkan umur kamu" min="1" max="120" required><br>

        <label>Seberapa sering kamu di rumah?</label><br>
        <select name="rumah">
            <option value="sering">Sering di rumah</option>
            <option value="jarang">Jarang di rumah</option>
        </select><br>

        <label>Gaya hidup kamu?</label><br>
        <select name="gaya">
            <option value="aktif">Aktif</option>
            <option value="santai">Santai</option>
        </select><br>

        <label>Punya hewan lain?</label><br>
        <select name="hewan">
            <option value="ya">Ya</option>
            <option value="tidak">Tidak</option>
        </select><br>

        <input type="submit" value="Cocokkan Sekarang!">
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // 🔹 AMBIL DATA DARI FORM
        $nama = htmlspecialchars($_POST['nama']);    // string
        $umur = (int)$_POST['umur'];                 // integer
        $rumah = $_POST['rumah'];                    // string
        $gaya = $_POST['gaya'];                      // string
        $hewan = $_POST['hewan'];                    // string

        // 🔹 HITUNG SKOR BERDASARKAN INPUT
        $skor = 0;
        if ($rumah == "sering") $skor += 2; else $skor += 1;
        if ($gaya == "aktif") $skor += 2; else $skor += 1;
        if ($hewan == "ya") $skor += 1;
        if ($umur >= 25) $skor += 2;
        elseif ($umur >= 18) $skor += 1;

        echo "<div class='result'>";
        echo "<h3>Halo, <b>$nama</b>! (umur: $umur tahun)</h3>";
        echo "<h4>Skor total: $skor</h4>";

        // 🔹 TENTUKAN WARNA KUCING BERDASARKAN SKOR
        if ($skor >= 7) {
            echo "<h3>Kucing yang cocok: 🧡 Kucing Oren</h3>";
            echo "<img src='meowmatch/oren.jpg'><br>";
            echo "Si paling rame! Lucu, manja, dan suka bikin ketawa.";
        } elseif ($skor >= 6) {
            echo "<h3>Kucing yang cocok: 🤵 Kucing Tuxedo (hitam-putih)</h3>";
            echo "<img src='meowmatch/tuxedo.jpg.jpg'><br>";
            echo "Pintar, elegan, dan punya gaya keren. Cocok buat kamu yang berkarakter santai tapi rapi.";
        } elseif ($skor >= 5) {
            echo "<h3>Kucing yang cocok: 🐾 Kucing calico (tiga warna)</h3>";
            echo "<img src='meowmatch/kaliko.jpg'><br>";
            echo "Ceria, cerewet, dan penuh semangat. Cocok buat kamu yang suka interaksi dan humoris.";
        } elseif ($skor >= 4) {
            echo "<h3>Kucing yang cocok: ⚪ Kucing Putih</h3>";
            echo "<img src='meowmatch/putih.jpg'><br>";
            echo "Lembut dan penyayang, tapi agak sensitif. Cocok buat kamu yang lembut dan perhatian.";
        } elseif ($skor >= 3) {
            echo "<h3>Kucing yang cocok: 🐈‍⬛ Kucing Abu-Abu</h3>";
            echo "<img src='meowmatch/abu.jpg'><br>";
            echo "Tenang, pintar, dan gampang adaptasi. Cocok buat kamu yang suka ketenangan.";
        } else {
            echo "<h3>Kucing yang cocok: ⚫ Kucing Hitam</h3>";
            echo "<img src='meowmatch/hitam.jpg'><br>";
            echo "Misterius tapi loyal. Cocok buat kamu yang mandiri dan kuat.";
        }

        echo "<br><br><i>Terima kasih sudah menggunakan Cat Adoption Matcher, $nama! 🐾</i>";
        echo "</div>";
    }
    ?>
</body>
</html>
