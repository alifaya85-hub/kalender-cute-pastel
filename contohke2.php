<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Aplikasi Jadwal Kegiatan dengan Jam</title>
  <style>
    /* 🌸 Tampilan utama */
    body {
      font-family: 'Poppins', sans-serif;
      background-color: #ffe6ef;
      margin: 0;
      padding: 0;
      display: flex;
      flex-direction: column;
      align-items: center;
      min-height: 100vh;
      transition: background 0.5s ease;
    }

    h1 {
      margin-top: 40px;
      color: #e75480;
      text-shadow: 1px 1px 3px #fff;
      animation: fadeInDown 1s ease;
    }

    .container {
      background-color: white;
      border-radius: 20px;
      box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
      width: 90%;
      max-width: 400px;
      padding: 20px;
      margin-top: 20px;
      animation: fadeInUp 0.8s ease;
    }

    /* Input dan tombol */
    input, button {
      width: 100%;
      padding: 10px;
      border: none;
      border-radius: 10px;
      margin-bottom: 10px;
      font-size: 16px;
      outline: none;
    }

    input {
      background-color: #fff0f5;
    }

    button {
      background-color: #e75480;
      color: white;
      cursor: pointer;
      transition: 0.3s;
    }

    button:hover {
      background-color: #ff7fa6;
      transform: scale(1.03);
    }

    /* Daftar kegiatan */
    ul {
      list-style-type: none;
      padding: 0;
    }

    li {
      background: #ffeaf3;
      margin: 5px 0;
      padding: 10px;
      border-radius: 10px;
      display: flex;
      justify-content: space-between;
      align-items: center;
      animation: fadeIn 0.5s ease;
    }

    li button {
      background: #ff4d6d;
      color: white;
      border: none;
      border-radius: 8px;
      padding: 5px 10px;
      cursor: pointer;
    }

    li button:hover {
      background: #ff6f91;
    }

    /* ✨ Kalender dan jam */
    .calendar {
      text-align: center;
      margin-bottom: 15px;
      color: #d6336c;
      font-weight: bold;
    }

    /* Animasi */
    @keyframes fadeInDown {
      from { opacity: 0; transform: translateY(-20px); }
      to { opacity: 1; transform: translateY(0); }
    }

    @keyframes fadeInUp {
      from { opacity: 0; transform: translateY(20px); }
      to { opacity: 1; transform: translateY(0); }
    }

    @keyframes fadeIn {
      from { opacity: 0; }
      to { opacity: 1; }
    }
  </style>
</head>
<body>

  <h1>📅 Jadwal Kegiatan + Jam</h1>
  <div class="container">
    <div class="calendar" id="kalender"></div>

    <input type="date" id="tanggal" />
    <input type="time" id="waktu" />
    <input type="text" id="kegiatan" placeholder="Tulis kegiatan kamu..." />
    <button onclick="tambahKegiatan()">Tambah</button>

    <ul id="daftarKegiatan"></ul>
  </div>

  <script>
    const inputTanggal = document.getElementById('tanggal');
    const inputWaktu = document.getElementById('waktu');
    const inputKegiatan = document.getElementById('kegiatan');
    const daftar = document.getElementById('daftarKegiatan');
    const kalender = document.getElementById('kalender');

    // 🗓 Tampilkan tanggal hari ini di atas
    const hariIni = new Date();
    const namaBulan = [
      "Januari","Februari","Maret","April","Mei","Juni",
      "Juli","Agustus","September","Oktober","November","Desember"
    ];
    kalender.innerHTML = ${hariIni.getDate()} ${namaBulan[hariIni.getMonth()]} ${hariIni.getFullYear()};
    inputTanggal.valueAsDate = hariIni;

    // 🔹 Fungsi tambah kegiatan
    function tambahKegiatan() {
      const teks = inputKegiatan.value.trim();
      const tanggal = inputTanggal.value;
      const waktu = inputWaktu.value;

      if (teks === "" || tanggal === "" || waktu === "") {
        alert("Isi tanggal, jam, dan kegiatan terlebih dahulu!");
        return;
      }

      const li = document.createElement('li');
      li.innerHTML = `
        <span><b>${formatTanggal(tanggal)} ${formatJam(waktu)}</b> — ${teks}</span>
        <button onclick="hapusKegiatan(this)">Hapus</button>
      `;

      daftar.appendChild(li);
      inputKegiatan.value = "";
      inputWaktu.value = "";
    }

    // 🔹 Fungsi hapus kegiatan
    function hapusKegiatan(btn) {
      btn.parentElement.remove();
    }

    // 🔹 Format tanggal jadi "13 November 2025"
    function formatTanggal(tgl) {
      const date = new Date(tgl);
      return ${date.getDate()} ${namaBulan[date.getMonth()]} ${date.getFullYear()};
    }

    // 🔹 Format jam jadi "08:30"
    function formatJam(jam) {
      return pukul ${jam};
    }
  </script>

</body>
</html>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Notifikasi Jadwal</title>
  <style>
    body {
      background-color: #ffe6ef;
      font-family: 'Poppins', sans-serif;
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
      margin: 0;
    }

    .notifikasi {
      background-color: white;
      padding: 20px 30px;
      border-radius: 20px;
      box-shadow: 0 4px 10px rgba(0,0,0,0.1);
      text-align: center;
      animation: fadeIn 0.7s ease;
    }

    .notifikasi h2 {
      color: #e75480;
      margin-bottom: 10px;
    }

    .notifikasi p {
      color: #555;
      font-size: 16px;
    }

    .tombol {
      margin-top: 15px;
      background-color: #e75480;
      color: white;
      border: none;
      padding: 10px 20px;
      border-radius: 10px;
      cursor: pointer;
      font-size: 16px;
      transition: 0.3s;
    }

    .tombol:hover {
      background-color: #ff7fa6;
      transform: scale(1.05);
    }

    @keyframes fadeIn {
      from { opacity: 0; transform: translateY(-10px); }
      to { opacity: 1; transform: translateY(0); }
    }
  </style>
</head>
<body>

  <div class="notifikasi" id="notifBox">
    <h2>🔔 Notifikasi Jadwal</h2>
    <p id="pesan">Kamu belum memiliki jadwal kegiatan untuk saat ini.</p>
    <button class="tombol" onclick="cekWaktu()">Cek Jadwal Sekarang</button>
  </div>

  <script>
    // 🕐 Notifikasi otomatis setiap beberapa detik
    function cekWaktu() {
      const waktu = new Date();
      const jam = waktu.getHours();
      const menit = waktu.getMinutes();

      // Ganti contoh jadwal di sini
      if (jam === 8 && menit >= 0 && menit <= 5) {
        tampilkanNotifikasi("Sekarang pukul 08:00 - Saatnya belajar atau rapat pagi!");
      } else if (jam === 12 && menit >= 0 && menit <= 5) {
        tampilkanNotifikasi("Waktu makan siang 🍱 Jangan lupa istirahat!");
      } else if (jam === 20 && menit >= 0 && menit <= 5) {
        tampilkanNotifikasi("Waktunya bersantai atau menyiapkan kegiatan esok hari 🌙");
      } else {
        tampilkanNotifikasi("Belum ada jadwal penting sekarang.");
      }
    }

    function tampilkanNotifikasi(teks) {
      document.getElementById("pesan").innerText = teks;
    }

    // 🔁 Cek otomatis tiap 60 detik
    setInterval(cekWaktu, 60000);
  </script>

</body>
</html>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Aplikasi Jadwal Kegiatan + Jam</title>
  <style>
    body {
      font-family: 'Poppins', sans-serif;
      background-color: #ffe6ef;
      margin: 0;
      padding: 0;
      display: flex;
      flex-direction: column;
      align-items: center;
      min-height: 100vh;
    }

    h1 {
      margin-top: 40px;
      color: #e75480;
      text-shadow: 1px 1px 3px #fff;
      animation: fadeInDown 1s ease;
    }

    .container {
      background-color: white;
      border-radius: 20px;
      box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
      width: 90%;
      max-width: 400px;
      padding: 20px;
      margin-top: 20px;
      animation: fadeInUp 0.8s ease;
    }

    input, button {
      width: 100%;
      padding: 10px;
      border: none;
      border-radius: 10px;
      margin-bottom: 10px;
      font-size: 16px;
      outline: none;
    }

    input {
      background-color: #fff0f5;
    }

    button {
      background-color: #e75480;
      color: white;
      cursor: pointer;
      transition: 0.3s;
    }

    button:hover {
      background-color: #ff7fa6;
      transform: scale(1.03);
    }

    ul {
      list-style-type: none;
      padding: 0;
    }

    li {
      background: #ffeaf3;
      margin: 5px 0;
      padding: 10px;
      border-radius: 10px;
      display: flex;
      justify-content: space-between;
      align-items: center;
    }

    li button {
      background: #ff4d6d;
      color: white;
      border: none;
      border-radius: 8px;
      padding: 5px 10px;
      cursor: pointer;
    }

    li button:hover {
      background: #ff6f91;
    }

    .calendar {
      text-align: center;
      margin-bottom: 15px;
      color: #d6336c;
      font-weight: bold;
    }

    @keyframes fadeInDown {
      from { opacity: 0; transform: translateY(-20px); }
      to { opacity: 1; transform: translateY(0); }
    }

    @keyframes fadeInUp {
      from { opacity: 0; transform: translateY(20px); }
      to { opacity: 1; transform: translateY(0); }
    }
  </style>
</head>
<body>

  <h1>📅 Jadwal Kegiatan + Jam</h1>
  <div class="container">
    <div class="calendar" id="kalender"></div>

    <input type="date" id="tanggal" />
    <input type="time" id="waktu" />
    <input type="text" id="kegiatan" placeholder="Tulis kegiatan kamu..." />
    <button onclick="tambahKegiatan()">Tambah</button>

    <ul id="daftarKegiatan"></ul>
  </div>

  <script>
    const inputTanggal = document.getElementById('tanggal');
    const inputWaktu = document.getElementById('waktu');
    const inputKegiatan = document.getElementById('kegiatan');
    const daftar = document.getElementById('daftarKegiatan');
    const kalender = document.getElementById('kalender');

    const hariIni = new Date();
    const namaBulan = [
      "Januari","Februari","Maret","April","Mei","Juni",
      "Juli","Agustus","September","Oktober","November","Desember"
    ];
    kalender.innerHTML = ${hariIni.getDate()} ${namaBulan[hariIni.getMonth()]} ${hariIni.getFullYear()};
    inputTanggal.valueAsDate = hariIni;

    // Tambah kegiatan
    function tambahKegiatan() {
      const teks = inputKegiatan.value.trim();
      const tanggal = inputTanggal.value;
      const waktu = inputWaktu.value;

      if (teks === "" || tanggal === "" || waktu === "") {
        alert("Isi tanggal, jam, dan kegiatan terlebih dahulu!");
        return;
      }

      const li = document.createElement('li');
      li.innerHTML = `
        <span><b>${formatTanggal(tanggal)} ${formatJam(waktu)}</b> — ${teks}</span>
        <button onclick="hapusKegiatan(this)">Hapus</button>
      `;

      daftar.appendChild(li);

      // Kirim data ke notifikasi.js (disimpan ke localStorage)
      const kegiatanBaru = { tanggal, waktu, teks };
      let data = JSON.parse(localStorage.getItem("jadwal")) || [];
      data.push(kegiatanBaru);
      localStorage.setItem("jadwal", JSON.stringify(data));

      inputKegiatan.value = "";
      inputWaktu.value = "";
    }

    function hapusKegiatan(btn) {
      btn.parentElement.remove();
    }

    function formatTanggal(tgl) {
      const date = new Date(tgl);
      return ${date.getDate()} ${namaBulan[date.getMonth()]} ${date.getFullYear()};
    }

    function formatJam(jam) {
      return pukul ${jam};
    }
  </script>
</body>
</html>