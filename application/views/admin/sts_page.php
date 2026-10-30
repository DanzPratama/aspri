<?php 
date_default_timezone_set('Asia/Jakarta');
?>
<body>
<!-- partial -->
<div class="main-panel">
  <div class="content-wrapper">

    <div class="card">
      <div class="card-body">
           <!-- BREADCRUMB -->
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-3">
                    <li class="breadcrumb-item">
                        <a href="<?= base_url('dashboard'); ?>">Dashboard</a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">
                        Surat Tanda Setor Bank
                    </li>
                </ol>
            </nav>
        <h1 class="mb-4">Surat Tanda Setor Bank</h1>

        <div class="mb-3 d-flex justify-content-between">
          <button class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#modalPilihSetoran">Pilih Setoran</button>
          
                 <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalTambahManual">
  Tambah STS Manual
</button>

                <button class="btn btn-warning" onclick="exportToExcel()">Export ke Excel</button>


        </div>
        <div class="mb-3 d-flex align-items-end gap-2">
  <div>
    <label class="form-label">Tanggal STS</label>
    <input type="date" id="filter_tanggal" class="form-control"
           value="<?= date('Y-m-d') ?>">
  </div>
  <button class="btn btn-success" id="btnFilterTanggal">
    Tampilkan
  </button>
</div>


       <div class="table-responsive shadow-effect">
  <table class="table table-striped" id="tabelSTS">
    <thead>
      <tr>
        <th>NO</th>
        <th>Waktu</th>
        <th>No Urut</th>
        <th>No Transaksi</th>
        <th>Nama Petugas</th>
        <th>Lokasi</th>
        <th>Jumlah</th>
        <th>Aksi</th>
      </tr>
    </thead>
    <tbody id="petugas_table_body">
      <!-- Data yang dipilih akan muncul di sini -->
    </tbody>
    <tfoot>
      <tr class="font-weight-bold bg-light">
        <td colspan="5" class="text-end">TOTAL SETORAN :</td>
        <td id="grand_total">Rp0</td>
        <td></td>
      </tr>
    </tfoot>
  </table>
</div>

    </div>
  </div>
</div>
<!-- Modal Tambah Manual -->
<div class="modal fade" id="modalTambahManual" tabindex="-1">
  <div class="modal-dialog">
    <div class="modal-content">
      <form id="formTambahManual">
        <div class="modal-header">
          <h5 class="modal-title">Tambah STS Manual</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
        </div>

        <div class="modal-body">

          <!-- Nama Petugas -->
          <div class="mb-3">
            <label class="form-label">Nama Petugas *</label>
    <select class="form-control select2" id="m_petugas" required style="width:100%">
  <option value="">-- Pilih Petugas --</option>
  <?php foreach ($petugas as $p): ?>
    <option 
      value="<?= $p->id ?>"
      data-lokasi="<?= htmlspecialchars($p->lokasi) ?>"
      data-no="<?= htmlspecialchars($p->no) ?>"
    >
      <?= htmlspecialchars($p->nama) ?>
    </option>
  <?php endforeach; ?>
</select>

          </div>
        <div class="mb-3">
  <label class="form-label">No urut</label>
  <input type="text" class="form-control bg-light" id="m_no" readonly>
</div>
    <div class="mb-3">
  <label class="form-label">Waktu Setor *</label>
  <input type="datetime-local"
         class="form-control"
         id="m_waktu"
         value="<?= date('Y-m-d\TH:i') ?>"
         required>
</div>


          <!-- Lokasi otomatis -->
          <div class="mb-3">
            <label class="form-label">Lokasi</label>
            <input type="text" class="form-control" id="m_lokasi" readonly>
          </div>
    
          <!-- Jumlah setoran -->
          <div class="mb-3">
            <label class="form-label">Jumlah Setoran (Rp) *</label>
            <input type="number" class="form-control" id="m_jumlah" min="1" required>
          </div>

        </div>

        <div class="modal-footer">
          <button class="btn btn-secondary" data-bs-dismiss="modal" type="button">Batal</button>
          <button class="btn btn-primary" type="submit">Simpan</button>
        </div>
      </form>
    </div>
  </div>
</div>
<!-- jQuery (wajib untuk Select2) -->





<!-- Modal Pilih Setoran -->
<div class="modal fade" id="modalPilihSetoran" tabindex="-1">
  <div class="modal-dialog modal-lg modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header bg-primary text-white">
        <h5 class="modal-title">Pilih Setoran</h5>
        <button class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
      </div>
      <div class="modal-body">
        <table class="table table-bordered" id="tabelSetoran">
          <thead>
            <tr>
              <th>Waktu</th>
              <th>No Urut</th>
              <th>No Transaksi</th>
              <th>Petugas</th>
              <th>Lokasi</th>
              <th>Jumlah</th>
              <th>Aksi</th>
            </tr>
          </thead>
          <tbody></tbody>
        </table>
      </div>
    </div>
  </div>
</div>


<script>
$(function () {

 function loadSTS(tanggal = null) {
  $.getJSON(
    '<?= site_url("Sts/get_sts_by_date") ?>',
    { tanggal: tanggal },
    function (data) {

      const tbody = $('#petugas_table_body');
      const totalEl = $('#grand_total');
      tbody.empty();

      let total = 0;

      if (!data.length) {
        tbody.html('<tr><td colspan="8" class="text-center">Tidak ada data</td></tr>');
        totalEl.text('Rp0');
        return;
      }

      data.forEach((item, i) => {
        total += parseInt(item.jumlah);
        tbody.append(`
          <tr data-id="${item.id}">
            <td>${i + 1}</td>
            <td>${item.waktu}</td>
            <td>${item.no_urut}</td>
            <td>${item.no_transaksi}</td>
            <td>${item.nama_petugas}</td>
            <td>${item.lokasi}</td>
            <td>Rp${parseInt(item.jumlah).toLocaleString('id-ID')}</td>
            <td>
              <button class="btn btn-danger btn-sm btn-hapus-baris">Hapus</button>
            </td>
          </tr>
        `);
      });

      totalEl.text('Rp' + total.toLocaleString('id-ID'));
    }
  );
}
$(document).ready(function () {
  const today = $('#filter_tanggal').val();
  loadSTS(today);
});
$('#btnFilterTanggal').on('click', function () {
  const tanggal = $('#filter_tanggal').val();
  loadSTS(tanggal);
});


  loadSTS();
  
    let stsSudahAda = [];
    function loadSTSExisting() {
  $.getJSON('<?= site_url("Sts/get_sts_no_today") ?>', function (data) {
    stsSudahAda = data; // array no_transaksi
  });
}

loadSTSExisting();

  // LOAD SETORAN KE MODAL
 $('#modalPilihSetoran')
  .off('show.bs.modal')
  .on('show.bs.modal', function () {

    const tbody = $('#tabelSetoran tbody');
    tbody.html(''); // RESET PAKSA

    $.getJSON('<?= site_url("Sts/get_setoran_modal") ?>', function (data) {

      if (!data.length) {
        tbody.html('<tr><td colspan="6" class="text-center">Tidak ada data</td></tr>');
        return;
      }

data.forEach(item => {

  const sudahAda = stsSudahAda.includes(item.notransaksi);

  tbody.append(`
    <tr>
      <td>${item.waktu_setor}</td>
      <td>${item.kode_petugas}</td>
      <td>${item.nama_petugas}</td>
      <td>${item.lokasi}</td>
      <td>Rp${parseInt(item.total_stor).toLocaleString('id-ID')}</td>
      <td>
        ${
          sudahAda
          ? `<button class="btn btn-sm btn-secondary" disabled>
               Sudah ditambahkan
             </button>`
          : `<button class="btn btn-sm btn-primary btnPilih"
  data-no="${item.notransaksi}"
  data-kode_petugas="${item.kode_petugas}"
  data-nama="${item.nama_petugas}"
  data-lokasi="${item.lokasi}"
  data-jumlah="${item.total_stor}">
  Pilih
</button>
`
        }
      </td>
    </tr>
  `);
});

    });

});


  // PILIH SETORAN
$(document).on('click', '.btnPilih', function () {
  const btn = $(this);

  // simpan teks asli
  const originalText = btn.text();

  // ubah ke loading
  btn
    .prop('disabled', true)
    .text('Loading...');

  $.ajax({
    url: '<?= site_url("Sts/simpan_sts") ?>',
    type: 'POST',
    dataType: 'json',
    data: {
      no_transaksi: btn.data('no'),
      no_urut: btn.data('kode_petugas'),
      lokasi: btn.data('lokasi'),
      nama_petugas: btn.data('nama'),
      jumlah: btn.data('jumlah')
    },
    success: function (res) {
      if (res.status === 'success') {

        // tandai frontend state
        stsSudahAda.push(btn.data('no'));

        // ubah tombol final
        btn
          .removeClass('btn-primary btnPilih')
          .addClass('btn-secondary')
          .prop('disabled', true)
          .text('Sudah ditambahkan');

        loadSTS();          // refresh tabel utama
        loadSTSExisting();  // refresh status modal

      } else {
        // gagal dari server
        btn
          .prop('disabled', false)
          .text(originalText);

        alert(res.message || 'Gagal menyimpan data');
      }
    },
    error: function (xhr, status, error) {
  btn
    .prop('disabled', false)
    .text(originalText);

  let pesan = 'Terjadi kesalahan.\n\n';

  // Status error
  pesan += 'Status: ' + status + '\n';

  // Pesan error JS
  pesan += 'Error: ' + error + '\n';

  // Respon dari server (kalau ada)
  if (xhr.responseText) {
    pesan += '\nResponse Server:\n' + xhr.responseText;
  }

  alert(pesan);

  // Bonus: log ke console (wajib saat debugging)
  console.error('AJAX Error:', {
    status: status,
    error: error,
    response: xhr.responseText
  });
}

  });
});



});
</script>

<script>
   $('#formTambahManual').on('submit', function (e) {
  e.preventDefault();

  $.ajax({
    url: '<?= site_url("Sts/simpan_sts") ?>',
    type: 'POST',
    dataType: 'json',
    data: {
      waktu: $('#m_waktu').val(),              // 🔥 WAKTU DIPILIH
      no_urut: $('#m_no').val(),
      no_transaksi: 'MANUAL-' + Date.now(),
      lokasi: $('#m_lokasi').val(),
      nama_petugas: $('#m_petugas option:selected').text(),
      jumlah: $('#m_jumlah').val()
    },
    success: function (res) {
      if (res.status === 'success') {
        $('#modalTambahManual').modal('hide');
        loadSTS($('#filter_tanggal').val()); // reload sesuai tanggal aktif
      } else {
        alert(res.message);
      }
    }
  });
});


</script>

<script>


  // Tampilkan isi modal saat dibuka


 function printSTS() {
  const rows = document.querySelectorAll('#petugas_table_body tr');
  if (rows.length === 0) {
    alert("Belum ada data yang dipilih.");
    return;
  }

const totalText = document.getElementById('grand_total').innerText || 'Rp0';
const totalAngka = parseRupiahToNumber(totalText);


  let content = `
    <html>
    <head>
      <title>Print STS</title>
      <style>
        body { font-family: Arial, sans-serif; padding: 20px; }
        h2 { text-align: center; }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        th, td { border: 1px solid #000; padding: 8px; text-align: left; }
        th { background-color: #f2f2f2; }
        tfoot td { font-weight: bold; background: #f9f9f9; }
      </style>
    </head>
    <body>
      <h2>SURAT TANDA SETOR BANK</h2>
      <p>Tanggal Cetak: ${new Date().toLocaleDateString('id-ID')}</p>load
      <table>
        <thead>
          <tr>
            <th>NO</th>
            <th>Waktu</th>
            <th>No Transaksi</th>
            <th>Kolektor</th>
            <th>Petugas</th>
            <th>Jumlah</th>
          </tr>
        </thead>
        <tbody>
  `;

  rows.forEach(row => {
    const cells = row.querySelectorAll('td');
    content += `
      <tr>
        <td>${cells[0].innerText}</td>
        <td>${cells[1].innerText}</td>
        <td>${cells[2].innerText}</td>
        <td>${cells[3].innerText}</td>
        <td>${cells[4].innerText}</td>
        <td>${cells[5].innerText}</td>
      </tr>
    `;
  });

  content += `
        </tbody>
        <tfoot>
          <tr>
            <td colspan="5" style="text-align:right;">TOTAL SETORAN :</td>
            <td>${totalText}</td>
          </tr>
        </tfoot>
      </table>
    </body>
    </html>
  `;

  const printWindow = window.open('', '', 'width=800,height=600');
  printWindow.document.write(content);
  printWindow.document.close();
  printWindow.focus();
  printWindow.print();
}



function terbilang(n) {
  n = parseInt(n);
  if (isNaN(n) || n === 0) return "Nol";

  const angka = ["", "Satu", "Dua", "Tiga", "Empat", "Lima",
                 "Enam", "Tujuh", "Delapan", "Sembilan",
                 "Sepuluh", "Sebelas"];

  if (n < 12) return angka[n];
  if (n < 20) return terbilang(n - 10) + " Belas";
  if (n < 100) return terbilang(Math.floor(n / 10)) + " Puluh " + terbilang(n % 10);
  if (n < 200) return "Seratus " + terbilang(n - 100);
  if (n < 1000) return terbilang(Math.floor(n / 100)) + " Ratus " + terbilang(n % 100);
  if (n < 2000) return "Seribu " + terbilang(n - 1000);
  if (n < 1000000) return terbilang(Math.floor(n / 1000)) + " Ribu " + terbilang(n % 1000);
  if (n < 1000000000) return terbilang(Math.floor(n / 1000000)) + " Juta " + terbilang(n % 1000000);
  if (n < 1000000000000) return terbilang(Math.floor(n / 1000000000)) + " Miliar " + terbilang(n % 1000000000);

  return "";
}

function exportToExcel() {
  const rows = document.querySelectorAll('#petugas_table_body tr');
  if (rows.length === 0) {
    alert("Belum ada data yang dipilih.");
    return;
  }

  // ===== Ambil data dari tabel STS =====
  const dataRows = Array.from(rows).map(row => {
    const cells = row.querySelectorAll('td');
    return {
      no_urut: cells[3].innerText.trim(),
      nama: cells[4].innerText.trim(),
      lokasi: cells[5].innerText.trim(),
      bukti: cells[2].innerText.trim(),
      jumlahText: cells[6].innerText.trim()
    };
  });

  // ===== Total baris data =====
  const totalBarisData = dataRows.length;

  // ===== Sort berdasarkan lokasi =====
  dataRows.sort((a, b) => a.lokasi.localeCompare(b.lokasi));
  

  // ===== Hitung total per lokasi =====
  const totalPerLokasi = {};
  const jumlahBarisLokasi = {};

  dataRows.forEach(item => {
    const angka = parseInt(item.jumlahText.replace(/\D/g, '')) || 0;
    totalPerLokasi[item.lokasi] = (totalPerLokasi[item.lokasi] || 0) + angka;
    jumlahBarisLokasi[item.lokasi] = (jumlahBarisLokasi[item.lokasi] || 0) + 1;
  });

  const counterLokasi = {};

  const totalText = document.getElementById('grand_total').innerText || 'Rp0';
  const totalAngka = parseRupiahToNumber(totalText);
  const today = new Date().toLocaleDateString('id-ID', {
    day: '2-digit',
    month: 'long',
    year: 'numeric'
  });

  // ===== Build HTML Excel =====
  let tableHTML = `
  <style>
    td, th {
      padding: 6px;
      height: 26px;
      vertical-align: middle;
    }
  </style>

  <table border="1" style="border-collapse:collapse;">
    <tr>
      <td colspan="7" style="font-weight:bold;font-size:14pt;">
        Lampiran Rincian Pendapatan Retribusi Parkir Di Tepi Jalan Umum
      </td>
    </tr>
    <tr>
      <td colspan="7">Tanggal : ${today}</td>
    </tr>

    <tr><td colspan="7"></td></tr>

    <tr style="font-weight:bold;text-align:center;">
      <td style="width:120px;">KODE REKENING</td>
      <td style="width:70px;">NO URUT</td>
      <td style="width:140px;">NAMA PETUGAS</td>
      <td style="width:200px;">LOKASI / JALAN</td>
      <td style="width:130px;">NOMOR BUKTI</td>
      <td style="width:100px;">JUMLAH</td>
      <td style="width:130px;">JUMLAH PER LOKASI</td>
    </tr>

    <tr>
      <td style="font-weight:bold;">4.1.02.01.04</td>
      <td colspan="6"> Penyediaan Pelayanan Parkir di Tepi Jalan Umum</td>
    </tr>
  `;

  // ===== Render data =====
dataRows.forEach((item, index) => {
  counterLokasi[item.lokasi] = (counterLokasi[item.lokasi] || 0) + 1;

  const isLastRow =
    counterLokasi[item.lokasi] === jumlahBarisLokasi[item.lokasi];

  tableHTML += `
    <tr>
      ${
        index === 0
          ? `<td rowspan="${totalBarisData}" style="font-weight:bold;vertical-align:middle;">
              
             </td>`
          : ''
      }

      <td>${item.no_urut}</td>
      <td>${item.nama}</td>
      <td>${item.lokasi}</td>
      <td>${item.bukti}</td>
      <td style="text-align:right;">${item.jumlahText}</td>
      <td style="text-align:right;font-weight:bold;">
        ${isLastRow
          ? 'Rp' + totalPerLokasi[item.lokasi].toLocaleString('id-ID')
          : ''}
      </td>
    </tr>
  `;
});


  // ===== Total akhir =====
  tableHTML += `
    <tr style="font-weight:bold;">
      <td colspan="5" align="right">JUMLAH TOTAL</td>
      <td style="text-align:right;">${totalText}</td>
      <td style="text-align:right;">${totalText}</td>
    </tr>

    <tr><td colspan="7"></td></tr>

    <tr>
      <td colspan="2"><b>Terbilang :</b></td>
      <td colspan="5"><i>${terbilang(totalAngka)} Rupiah</i></td>
    </tr>
  </table>
  `;

  const blob = new Blob([tableHTML], {
    type: "application/vnd.ms-excel;charset=utf-8;"
  });

  const url = URL.createObjectURL(blob);
  const link = document.createElement("a");
  link.href = url;
  link.download = `STS-${today}.xls`;
  link.click();
  URL.revokeObjectURL(url);
}



function simpanSTS() {
  const rows = document.querySelectorAll('#petugas_table_body tr');
  if (rows.length === 0) {
    alert("Belum ada data yang dipilih untuk disimpan.");
    return;
  }

  // Simulasi penyimpanan
  const dataDisimpan = [];

  rows.forEach(row => {
    const cells = row.querySelectorAll('td');
    dataDisimpan.push({
      no: cells[0].innerText,
      waktu: cells[1].innerText,
      notransaksi: cells[2].innerText,
      kolektor: cells[3].innerText,
      petugas: cells[4].innerText,
      jumlah: cells[5].innerText
    });
  });

  // Tampilkan popup berhasil
  alert("Data berhasil disimpan!");

  // Redirect ke halaman lain (misalnya halaman Surat Keluar)
  window.location.href = "/SuratKeluar";
}


</script>
<script>
// ===== Helper Format / Parse Rupiah =====
function formatRupiahID(n) {
  const num = Number(n) || 0;
  return 'Rp' + num.toLocaleString('id-ID');
}
function parseRupiahToNumber(str) {
  if (!str) return 0;
  // Hilangkan "Rp", titik pemisah ribuan, spasi
  return Number(String(str).replace(/[^0-9,-]/g, '').replace(',', '.')) || 0;
}

// ===== Hitung total dari tbody =====
function updateGrandTotal() {
  let total = 0;
  document.querySelectorAll('#petugas_table_body tr').forEach(tr => {
    const tdJumlah = tr.querySelectorAll('td')[5]; // kolom ke-6 = Jumlah
    if (tdJumlah) {
      total += parseRupiahToNumber(tdJumlah.innerText);
    }
  });
  document.getElementById('grand_total').innerText = formatRupiahID(total);
}

// ===== Re-number urutan NO agar rapi setelah tambah/hapus =====
function renumberRows() {
  const rows = document.querySelectorAll('#petugas_table_body tr');
  rows.forEach((tr, idx) => {
    const firstCell = tr.querySelector('td');
    if (firstCell) firstCell.innerText = idx + 1;
  });
}



  // Hapus baris (delegasi) + update total & nomor
$(document).on('click', '.btn-hapus-baris', function () {
  if (!confirm('Yakin hapus setoran ini?')) return;

  const tr = $(this).closest('tr');
  const id = tr.data('id');

  $.ajax({
    url: '<?= site_url("Sts/hapus_sts") ?>',
    type: 'POST',
    dataType: 'json',
    data: { id: id },
    success: function (res) {
      if (res.status === 'success') {
        tr.remove();
        renumberRows();
        updateGrandTotal();

        // ðŸ”¥ PENTING: refresh status modal
        loadSTSExisting();
      } else {
        alert(res.message);
      }
    },
    error: function () {
      alert('Gagal koneksi server');
    }
  });
});



// ===== Dipakai ketika menambahkan baris dari modal =====
function tampilkanKeTabelUtama(item) {
  const tbody = document.querySelector('#petugas_table_body');
  const no = tbody.querySelectorAll('tr').length + 1;

  const tr = document.createElement('tr');
  tr.innerHTML = `
    <td>${no}</td>
    <td>${item.waktu_setor}</td>
    <td>${item.no}</td>
    <td>${item.notransaksi}</td>
    <td>${item.lokasi}</td>
    <td>${item.nama_petugas}</td>
    <td>${formatRupiahID(parseInt(item.total_stor))}</td>
    <td><button class="btn btn-danger btn-sm btn-hapus-baris">Hapus</button></td>
  `;
  tbody.appendChild(tr);

  updateGrandTotal();
}

// ===== Panggil setelah simpan_sts sukses kalau mau langsung tampil di tabel utama =====
// Contoh di handler .btnPilihSetoran AJAX success:
// if (res.status === 'success') { tampilkanKeTabelUtama(dataDariButton); }

</script>
<!-- Select2 -->

<script>
$(document).ready(function () {

  $('#modalTambahManual').on('shown.bs.modal', function () {

    if (!$('#m_petugas').hasClass('select2-hidden-accessible')) {
      $('#m_petugas').select2({
        dropdownParent: $('#modalTambahManual'),
        placeholder: 'Cari nama petugas...',
        allowClear: true,
        width: '100%'
      });
    }

  });

  // 🔥 AMBIL NO + LOKASI
  $('#m_petugas').on('select2:select', function (e) {
    const el = e.params.data.element;

    const lokasi = $(el).data('lokasi') || '';
    const no     = $(el).data('no') || '';

    $('#m_lokasi').val(lokasi);
    $('#m_no').val(no);
  });

  // 🔄 CLEAR
  $('#m_petugas').on('select2:clear', function () {
    $('#m_lokasi').val('');
    $('#m_no').val('');
  });

});
</script>



<!-- container-scroller -->
<!-- plugins:js -->
<script src="/aspri/admins/vendors/js/vendor.bundle.base.js"></script>
<!-- endinject -->
<!-- Plugin js for this page -->
<script src="/aspri/admins/vendors/chart.js/Chart.min.js"></script>
<script src="/aspri/admins/js/jquery.cookie.js" type="text/javascript"></script>
<!-- End plugin js for this page -->
<!-- inject:js -->
<script src="/aspri/admins/js/off-canvas.js"></script>
<script src="/aspri/admins/js/hoverable-collapse.js"></script>
<script src="/aspri/admins/js/misc.js"></script>
<!-- endinject -->
<!-- Custom js for this page -->
<script src="/aspri/admins/js/dashboard.js"></script>
<script src="/aspri/admins/js/todolist.js"></script>
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<!-- End custom js for this page -->

</body>
