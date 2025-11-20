<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Aplikasi Jadwal Kegiatan</title>
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

    /* ✨ Animasi halus */
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

  <h1>📅 Jadwal Kegiatan</h1>
  <div class="container">
    <input type="text" id="kegiatan" placeholder="Tulis kegiatan kamu..." />
    <button onclick="tambahKegiatan()">Tambah</button>

    <ul id="daftarKegiatan"></ul>
  </div>

  <script>
    const input = document.getElementById('kegiatan');
    const daftar = document.getElementById('daftarKegiatan');

    function tambahKegiatan() {
      const teks = input.value.trim();
      if (teks === "") {
        alert("Tuliskan kegiatan terlebih dahulu!");
        return;
      }

      const li = document.createElement('li');
      li.innerHTML = `
        ${teks}
        <button onclick="hapusKegiatan(this)">Hapus</button>
      `;

      daftar.appendChild(li);
      input.value = "";
    }

    function hapusKegiatan(btn) {
      btn.parentElement.remove();
    }
  </script>

</body>
</html>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Aplikasi Jadwal Kegiatan + Kalender</title>
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
    input, button, select {
      width: 100%;
      padding: 10px;
      border: none;
      border-radius: 10px;
      margin-bottom: 10px;
      font-size: 16px;
      outline: none;
    }

    input, select {
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

    /* ✨ Kalender */
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

  <h1>📅 Jadwal Kegiatan + Kalender</h1>
  <div class="container">
    <div class="calendar" id="kalender"></div>

    <input type="date" id="tanggal" />
    <input type="text" id="kegiatan" placeholder="Tulis kegiatan kamu..." />
    <button onclick="tambahKegiatan()">Tambah</button>

    <ul id="daftarKegiatan"></ul>
  </div>

  <script>
    const inputTanggal = document.getElementById('tanggal');
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

      if (teks === "" || tanggal === "") {
        alert("Isi tanggal dan kegiatan terlebih dahulu!");
        return;
      }

      const li = document.createElement('li');
      li.innerHTML = `
        <span><b>${formatTanggal(tanggal)}:</b> ${teks}</span>
        <button onclick="hapusKegiatan(this)">Hapus</button>
      `;

      daftar.appendChild(li);
      inputKegiatan.value = "";
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
  </script>

</body>
</html>

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