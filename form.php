<DOCTYPE html>
<html>
    <head>
      <title>Kalkulator Dua Bilangan</title>
</head>
<body>
    <form method="post">
        Bilangan ke 1 : <input type="text" name="bil1"><br>
        Bilangan ke 2 : <input type="text" name="bil2"><br>
        <input type="submit" name="tambah" value="+">
        <input type="submit" name="kurang" value="-">
        <input type="submit" name="kali" value="*">
        <input type="submit" name="bagi" value="/">
    </form>
    <?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $bil1 = $_POST['bil1'];
    $bil2 = $_POST['bil2'];

    if (isset($_POST['tambah'])) {
        $hasil = $bil1 + $bil2;
        echo "<h3>Hasil Penjumlahan: $hasil</h3>";
    } elseif (isset($_POST['kurang'])) {
        $hasil = $bil1 - $bil2;
        echo "<h3>Hasil Pengurangan: $hasil</h3>";
    } elseif (isset($_POST['kali'])) {
        $hasil = $bil1 * $bil2;
        echo "<h3>Hasil Perkalian: $hasil</h3>";
    } elseif (isset($_POST['bagi'])) {
        if ($bil2 == 0) {
            echo "<h3>Tidak bisa dibagi dengan nol!</h3>";
        } else {
            $hasil = $bil1 / $bil2;
            echo "<h3>Hasil Pembagian: $hasil</h3>";
        }
    }
}
    ?>
    </body>
    </html>