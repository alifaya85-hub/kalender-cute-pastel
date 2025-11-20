<?php
$data_file = "kegiatan.json";
if (!file_exists($data_file)) file_put_contents($data_file, json_encode([]));

$kegiatan = json_decode(file_get_contents($data_file), true);

if (isset($_POST['tanggal']) && isset($_POST['deskripsi'])) {
    $tgl = $_POST['tanggal'];
    $desc = trim($_POST['deskripsi']);
    if ($desc != "") {
        $kegiatan[$tgl][] = $desc;
        file_put_contents($data_file, json_encode($kegiatan, JSON_PRETTY_PRINT));
    }
}

$bulan = isset($_GET['bulan']) ? $_GET['bulan'] : date('n');
$tahun = isset($_GET['tahun']) ? $_GET['tahun'] : date('Y');
$hari_dlm_bulan = cal_days_in_month(CAL_GREGORIAN, $bulan, $tahun);
$hari_pertama = date('w', strtotime("$tahun-$bulan-1"));
$nama_bulan = date('F', strtotime("$tahun-$bulan-1"));
?>
<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<title>Kalender Jadwal Kegiatan</title>
<style>
    body {
        font-family: Arial, sans-serif;
        background: #ffe6f0;
        margin: 0;
        padding: 20px;
        color: #333;
        transition: background 0.5s ease;
    }
    h1 {
        text-align: center;
        color: #d63384;
        margin-bottom: 10px;
    }
    .kalender {
        display: grid;
        grid-template-columns: repeat(7, 1fr);
        gap: 10px;
        max-width: 700px;
        margin: 20px auto;
    }
    .hari, .tanggal {
        text-align: center;
        padding: 10px;
        border-radius: 10px;
        box-shadow: 0 0 5px rgba(0,0,0,0.1);
        transition: all 0.3s;
    }
    .hari {
        background: #ffb3c6;
        font-weight: bold;
    }
    .tanggal:hover {
        transform: scale(1.1);
        background: #ffcce0;
        cursor: pointer;
    }
    .kosong { background: none; box-shadow: none; }
    .kegiatan {
        font-size: 12px;
        color: #d63384;
        margin-top: 5px;
    }
    form {
        text-align: center;
        margin-top: 20px;
        background: #fff;
        padding: 15px;
        border-radius: 15px;
        box-shadow: 0 0 10px rgba(0,0,0,0.1);
        max-width: 500px;
        margin-left: auto;
        margin-right: auto;
    }
    input, textarea, button {
        width: 90%;
        padding: 10px;
        margin: 5px;
        border: 1px solid #ccc;
        border-radius: 10px;
        font-size: 14px;
    }
    button {
        background: #d63384;
        color: white;
        border: none;
        cursor: pointer;
        transition: background 0.3s;
    }
    button:hover {
        background: #bf2a73;
    }
</style>
</head>
<body>
<h1>📅 Kalender Jadwal Kegiatan</h1>

<div style="text-align:center;">
    <a href="?bulan=<?= $bulan-1 ?>&tahun=<?= $tahun ?>">◀️ Bulan Sebelumnya</a> |
    <b><?= $nama_bulan . " " . $tahun ?></b> |
    <a href="?bulan=<?= $bulan+1 ?>&tahun=<?= $tahun ?>">Bulan Berikutnya ▶️</a>
</div>

<div class="kalender">
    <?php
    $hari_array = ['Min','Sen','Sel','Rab','Kam','Jum','Sab'];
    foreach ($hari_array as $h) echo "<div class='hari'>$h</div>";

    for ($i=0; $i<$hari_pertama; $i++) echo "<div class='tanggal kosong'></div>";

    for ($t=1; $t<=$hari_dlm_bulan; $t++) {
        $tgl_format = sprintf("%04d-%02d-%02d", $tahun, $bulan, $t);
        echo "<div class='tanggal' onclick='isiTanggal(\"$tgl_format\")'>
              <b>$t</b>";
        if (isset($kegiatan[$tgl_format])) {
            foreach ($kegiatan[$tgl_format] as $keg) {
                echo "<div class='kegiatan'>• $keg</div>";
            }
        }
        echo "</div>";
    }
    ?>
</div>

<form method="POST">
    <h3>Tambah Kegiatan</h3>
    <input type="text" id="tanggal" name="tanggal" placeholder="Klik tanggal di kalender" readonly required>
    <textarea name="deskripsi" placeholder="Tuliskan kegiatan..." required></textarea>
    <button type="submit">Simpan</button>
</form>

<script>
function isiTanggal(tgl) {
    document.getElementById('tanggal').value = tgl;
    window.scrollTo({ top: document.body.scrollHeight, behavior: 'smooth' });
}
</script>

</body>
</html>
