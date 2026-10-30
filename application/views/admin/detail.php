<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Halaman Detail Jukir</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <style>
    .jukir-image {
      width: 100%;
      max-width: 300px;
    }
    .detail-card {
      box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);
      transition: 0.3s;
      border-radius: 10px;
      margin-top: 20px;
      padding: 20px;
    }
    .detail-card:hover {
      box-shadow: 0 8px 16px 0 rgba(0,0,0,0.2);
    }
  </style>
</head>
<body>

<div class="container">
  <h2 class="mt-5 mb-4">Informasi Jukir</h2>
  <div id="searchForm">
    <div class="row">
      <div class="col-md-6">
        <form>
          <div class="form-group">
            <label for="kodeInput">Masukkan Kode Jukir:</label>
            <input type="text" class="form-control" id="kodeInput">
          </div>
          <button type="button" class="btn btn-primary" id="submitKodeButton">Cari</button>
        </form>
      </div>
    </div>
  </div>
  <div class="row mt-5" id="detailJukir" style="display: none;">
    <div class="col-md-6">
      <div class="card detail-card">
        <center><img src="" alt="Jukir Photo" class="card-img-top jukir-image mb-3" id="jukirImage">
        <div class="card-body">
          <h3 class="card-title">  <span id="namaInfo"></span>  # <span id="kodeJukir"></span></h3></span></p></center>
          <table class="table">
            <tbody>
              <tr>
                <th scope="row">No KTP:</th>
                <td id="noKTPInfo"></td>
              </tr>
              <tr>
                <th scope="row">Lokasi:</th>
                <td id="lokasiInfo"></td>
              </tr>
              <tr>
                <th scope="row">Target Tahun ini:</th>
                <td id="targetPerbulanInfo"></td>
              </tr>
              <tr>
                <th scope="row">Tanggal Terakhir Setor:</th>
                <td id="tanggalTerakhirSetorInfo"></td>
              </tr>
              <tr>
                <th scope="row">Sisa Setoran:</th>
                <td id="sisaSetoranInfo"></td>
              </tr>
              </tbody>
              </table>
           
   
            
          
          <!-- Form input setoran -->
          <form>
          <div class="form-group row">
    <label for="inputTanggal" class="col-6 col-md-3 col-form-label">Tanggal Setoran:</label>
    <div class="col-6 col-md-3">
      <input type="text" class="form-control" id="inputTanggal" readonly>
    </div>
    <label for="inputWaktu" class="col-6 col-md-3 col-form-label">Waktu Setoran:</label>
    <div class="col-6 col-md-3">
      <input type="text" class="form-control" id="inputWaktu" readonly>
    </div>
  </div>
            <div class="form-group">
  <label for="inputBulan">Bulan Setoran:</label>
  <select class="form-control" id="inputBulan">
    <option value="" selected>--Pilih Bulan Setoran--</option>
    <option value="1">Januari</option>
    <option value="2">Februari</option>
    <option value="3">Maret</option>
    <option value="4">April</option>
    <option value="5">Mei</option>
    <option value="6">Juni</option>
    <option value="7">Juli</option>
    <option value="8">Agustus</option>
    <option value="9">September</option>
    <option value="10">Oktober</option>
    <option value="11">November</option>
    <option value="12">Desember</option>
  </select>
</div>

            <div class="form-group">
              <label for="inputSetoran">Input Setoran:</label>
              <div class="input-group mb-3">
                <div class="input-group-prepend">
                  <span class="input-group-text">Rp</span>
                </div>
                <input type="text" class="form-control" id="inputSetoran" placeholder="0" aria-describedby="basic-addon1">
              </div>
            </div>
            <button type="button" class="btn btn-primary w-100" id="submitSetoranButton">Simpan Setoran</button>
          </form>
          <!-- Tombol untuk mencari jukir lain -->
          <button type="button" class="btn btn-warning w-100 mt-3" id="searchAgainButton">Cari Jukir Lain</button>
        </div>
      </div>
    </div>
  </div>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

<script>
$(document).ready(function() {
  // Fungsi untuk mengubah format input setoran menjadi format rupiah
  $('#inputSetoran').keyup(function(event) {
    // Mendapatkan nilai input setoran
    var inputSetoran = $(this).val();
    
    // Menghapus karakter selain angka
    inputSetoran = inputSetoran.replace(/[^\d]/g, '');
    
    // Mengatur format rupiah
    inputSetoran = formatRupiah(inputSetoran);
    
    // Menampilkan kembali nilai input setoran dengan format rupiah
    $(this).val(inputSetoran);
  });

  // Fungsi untuk mengisi tanggal dan waktu saat ini
  function fillDateTime() {
    // Ambil tanggal saat ini
    var currentDate = new Date();

    // Format tanggal menjadi "dd/mm/yyyy"
    var day = currentDate.getDate();
    var month = currentDate.getMonth() + 1;
    var year = currentDate.getFullYear();
    var formattedDate = day + '/' + month + '/' + year;

    // Isi nilai input tanggal dengan tanggal saat ini
    $('#inputTanggal').val(formattedDate);

    // Ambil waktu saat ini
    var currentTime = currentDate.toLocaleTimeString([], {hour: '2-digit', minute:'2-digit'});

    // Isi nilai input waktu dengan waktu saat ini
    $('#inputWaktu').val(currentTime);
  }

  $('#submitKodeButton').click(function() {
    var kode = $('#kodeInput').val(); // mengambil nilai dari input kode

    // Daftar kode jukir yang valid beserta informasi yang sesuai
    var jukirData = {
      'JUKIR01': {
        nama: 'Suherlan',
        kodeJukir: 'HZ0601',
        noKTP: '3278070606660014',
        lokasi: 'Jl. KHZ. Mustofa (Toko Mega Mendung)',
        targetPerbulan: 'Rp 10.800.000',
        tanggalTerakhirSetor: '01/06/2024',
        sisaSetoran: 'Rp 5.000.000',
        foto: 'http://parkir.tasikmalayakota.go.id/aspri/assets/img/JUKIR01.jpg' // Ubah sesuai dengan struktur direktori Anda
      },
      'JUKIR02': {
        nama: 'Nurtadi',
        kodeJukir: 'PB0601',
        noKTP: '3278080906730006',
        lokasi: 'Jl. Pasar Baru (Depan Bank BNP Shift II)',
        targetPerbulan: 'Rp 12.600.000',
        tanggalTerakhirSetor: '02/06/2024',
        sisaSetoran: 'Rp 7.000.000',
        foto: 'http://parkir.tasikmalayakota.go.id/aspri/assets/img/JUKIR02.jpg' // Ubah sesuai dengan struktur direktori Anda
      },
      'JUKIR03': {
        nama: 'Yuyu Wahyu',
        noKTP: '-',
        kodeJukir: 'PB0601',
        lokasi: 'Jl. Veteran (Depan TMC)',
        targetPerbulan: 'Rp 7.200.000',
        tanggalTerakhirSetor: '03/06/2024',
        sisaSetoran: 'Rp 2.000.000',
        foto: 'http://parkir.tasikmalayakota.go.id/aspri/assets/img/JUKIR03.jpg' // Ubah sesuai dengan struktur direktori Anda
      },
      'JUKIR04': {
        nama: 'Rahmat',
        noKTP: '3278011811710002',
        kodeJukir: 'MB0601',
        lokasi: 'Jl. Mitra Batik (Depan Toko Budi Sport)',
        targetPerbulan: 'Rp 10.800.000',
        tanggalTerakhirSetor: '03/06/2024',
        sisaSetoran: 'Rp 2.000.000',
        foto: 'http://parkir.tasikmalayakota.go.id/aspri/assets/img/JUKIR03.jpg' // Ubah sesuai dengan struktur direktori Anda
      }
    };

    // Cek apakah kode ada dalam daftar kodeValid
    if (jukirData.hasOwnProperty(kode)) {
      // Mengisi informasi pada halaman detail berdasarkan kode jukir yang diinput
      $('#namaInfo').text(jukirData[kode].nama);
      $('#kodeJukir').text(jukirData[kode].kodeJukir); // Menampilkan kode jukir
      $('#noKTPInfo').text(jukirData[kode].noKTP);
      $('#lokasiInfo').text(jukirData[kode].lokasi);
      $('#targetPerbulanInfo').text(jukirData[kode].targetPerbulan);
      $('#tanggalTerakhirSetorInfo').text(jukirData[kode].tanggalTerakhirSetor);
      $('#sisaSetoranInfo').text(jukirData[kode].sisaSetoran);
      $('#jukirImage').attr('src', jukirData[kode].foto);
      $('#detailJukir').show(); // Tampilkan informasi detail jukir setelah tombol 'Cari' diklik
      $('#searchForm').hide(); // Sembunyikan formulir pencarian setelah informasi jukir ditampilkan
      fillDateTime(); // Isi tanggal dan waktu saat ini
    } else {
      alert('Kode jukir tidak ditemukan.');
    }
  });

  $('#searchAgainButton').click(function() {
    $('#searchForm').show();
    $('#detailJukir').hide(); // Sembunyikan informasi detail jukir saat mencari jukir lain
  });

  // Ketika tombol simpan setoran diklik
  $('#submitSetoranButton').click(function() {
    var inputSetoran = $('#inputSetoran').val(); // Ambil nilai input setoran
    
    // Cek apakah input setoran kosong
    if (inputSetoran == '') {
      alert('Masukkan jumlah setoran terlebih dahulu.');
    } else {
      // Lanjutkan dengan aksi simpan setoran
      // Tambahkan kode untuk menyimpan setoran ke database atau melakukan aksi yang diinginkan di sini
      alert('Setoran berhasil disimpan: ' + inputSetoran);
    }
  });

  // Fungsi untuk mengatur format rupiah
  function formatRupiah(angka) {
    var number_string = angka.toString();
    var sisa = number_string.length % 3;
    var rupiah = number_string.substr(0, sisa);
    var ribuan = number_string.substr(sisa).match(/\d{3}/g);
    
    if (ribuan) {
      separator = sisa ? '.' : '';
      rupiah += separator + ribuan.join('.');
    }
    
    return rupiah;
  }
});
</script>

</body>
</html>
