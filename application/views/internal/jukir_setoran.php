<style>
  /* Card & table wrapper */
  .shadow-effect {
      border-radius: 0.75rem;
      overflow: hidden;
      box-shadow: 0 10px 25px rgba(15, 23, 42, 0.1);
      border: 1px solid rgba(148, 163, 184, 0.35);
  }

  .table-responsive.shadow-effect {
      position: relative;
      overflow-x: auto;
      /* biar kelihatan area scrollnya */
      background: #ffffff;
  }

  .table-setoran {
      margin-bottom: 0;
      background: #ffffff;
      min-width: 1200px; /* supaya kolom bulan bisa di-slide */
  }

  /* Header tabel lengket + gradasi */
  .table-setoran thead th {
      position: sticky;
      top: 0;
      z-index: 5;
      background: linear-gradient(90deg, #0d6efd, #0dcaf0);
      color: #fff !important;
      font-size: 0.8rem;
      text-transform: uppercase;
      letter-spacing: 0.03em;
      border-bottom: none;
      white-space: nowrap;
  }

  .table-setoran tbody tr:hover {
      background-color: #f8fafc;
  }

  /* ===== Sticky columns (NO + Nama) ===== */
  .table-setoran th.col-no,
  .table-setoran td.col-no {
      position: sticky;
      left: 0;
      z-index: 30;
      background: #ffffff;
  }

  .table-setoran th.col-nama,
  .table-setoran td.col-nama {
      position: sticky;
      left: 70px; /* lebar kira-kira kolom NO */
      z-index: 20;
      background: pink;
  }

  /* garis pemisah setelah kolom nama */
  .table-setoran td.col-nama,
  .table-setoran th.col-nama {
      box-shadow: 4px 0 6px -4px rgba(148, 163, 184, 0.8);
  }

  /* Sel bulan */
  .cell-setoran {
      font-size: 0.8rem;
      font-weight: 500;
      text-align: right;
      vertical-align: middle !important;
      min-width: 110px;
      border-top: 1px solid #eef2ff;
      white-space: nowrap;
  }

  /* Ada setoran = hijau lembut */
  .cell-setoran.has-value {
      background: rgba(25, 135, 84, 0.08);
      color: #157347;
  }

  /* Kosong/0 = merah lembut */
  .cell-setoran.empty {
      background: rgba(220, 53, 69, 0.06);
      color: #b02a37;
  }

  /* Kolom nama + kode petugas */
  .cell-nama {
      vertical-align: middle !important;
      min-width: 220px;
  }

  .nama-title {
      font-weight: 600;
      font-size: 0.9rem;
  }

  .nama-sub {
      font-size: 0.75rem;
      color: #6b7280;
  }

  .badge-kode {
      font-size: 0.7rem;
      border-radius: 999px;
      padding: 0.15rem 0.55rem;
  }

  /* Kolom lokasi */
  .cell-lokasi {
      vertical-align: middle !important;
      font-size: 0.8rem;
      color: #4b5563;
      min-width: 160px;
  }
</style>


<body>
    <!-- partial -->
        <div class="main-panel">
             <div class="content-wrapper">
          <!--<div class="content-wrapper">-->
            <div class="card">
            <div class='card-body'>
                  <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-3">
                    <li class="breadcrumb-item">
                        <a href="<?= base_url('dashboard'); ?>">Dashboard</a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">
                        Rekap Pendapatan Struk
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">
                        Rekapan Pendapatan Per Bulan
                    </li>
                </ol>
            </nav>
              <div class="d-flex flex-wrap justify-content-between align-items-center mb-3">
    <!-- Judul + subjudul -->
    <div class="mb-2">
        <h1 class="h3 mb-1">Setoran Petugas</h1>
        <p class="text-muted mb-0 small">
            Rekap setoran per petugas per bulan
        </p>
    </div>

    <!-- Filter & Search -->
   <div class="d-flex flex-wrap align-items-center mb-2">
    <!-- Filter Tahun -->
    <div class="mr-2 mb-2">
        <label for="filter_tahun" class="small text-muted mb-1 d-block">Tahun</label>
        <select id="filter_tahun" class="form-control form-control-sm">
            <option value="2024">2024</option>
            <option value="2025">2025</option>
        </select>
    </div>

    <!-- Urutkan Setoran -->
    <div class="mr-2 mb-2">
        <label for="filter_sort" class="small text-muted mb-1 d-block">Urutkan</label>
        <select id="filter_sort" class="form-control form-control-sm">
            <option value="none">Default</option>
            <option value="desc">Setoran Terbesar</option>
            <option value="asc">Setoran Terkecil</option>
        </select>
    </div>

    <!-- Search -->
    <div class="mb-2">
        <label for="search_input" class="small text-muted mb-1 d-block">Cari Petugas / Lokasi / Kode</label>
        <div class="input-group input-group-sm">
            <div class="input-group-prepend">
                <span class="input-group-text bg-white border-right-0">
                    <i class="mdi mdi-magnify"></i>
                </span>
            </div>
            <input type="text"
                   id="search_input"
                   class="form-control border-left-0"
                   placeholder="Ketik kata kunci...">
            <div class="input-group-append">
                <button class="btn btn-primary w-100" id="search_button">
                    Cari
                </button>
            </div>
        </div>
    </div>
</div>

</div>


             <div class="table-responsive shadow-effect">
    <table class="table table-setoran table-sm">
       <thead>
    <tr>
        <th class="col-no">NO</th>
        <th class="col-nama">Nama</th>
        <th style="text-align:center">Lokasi</th>
        <th>Januari</th>
        <th>Februari</th>
        <th>Maret</th>
        <th>April</th>
        <th>Mei</th>
        <th>Juni</th>
        <th>Juli</th>
        <th>Agustus</th>
        <th>September</th>
        <th>Oktober</th>
        <th>November</th>
        <th>Desember</th>
    </tr>
</thead>

       <tbody id="petugas_setoran_body">
    <tr><td colspan="15" class="text-center py-4 text-muted" id="loading_row">
        <div class="spinner-border spinner-border-sm text-primary mr-2"></div>
        Loading data...
    </td></tr>
</tbody>

    </table>
</div>

              <button id="load_more" class="btn btn-primary">Load More</button>
          </div>
          </div>
    </div>
      </div>  
          <!-- partial -->
        </div>
        <!-- main-panel ends -->
      </div>
      <!-- page-body-wrapper ends -->
    </div>


    <!-- Modal HTML -->
<script>
    // Loading spiner
    function showLoading() {
    $('#petugas_setoran_body').html(`
        <tr>
            <td colspan="15" class="text-center py-4 text-muted">
                <div class="spinner-border spinner-border-sm text-primary mr-2"></div>
                Loading data...
            </td>
        </tr>
    `);
}

    // Langsung pakai endpoint lengkap dari CodeIgniter
    const ENDPOINT_SETORAN = "<?= base_url('Petugas/get_setoran_petugas'); ?>";

    $(document).ready(function () {
        // ====== VARIABEL GLOBAL UNTUK PAGINATION & SEARCH ======
        let allData = [];        // semua data dari API
        let filteredData = [];   // data setelah di-search
        let currentPage = 1;     // halaman sekarang
        const pageSize = 100;     // max 50 baris per halaman

        // ambil tahun aktif dari select, kalau nggak ada pakai tahun sekarang
        let currentYear = $('#filter_tahun').length
            ? ($('#filter_tahun').val() || new Date().getFullYear())
            : new Date().getFullYear();

        let currentSort = 'none';  // none | desc | asc
        let currentKeyword = '';

        // ====== FORMAT RUPIAH ======
        function formatRupiah(angka) {
            if (angka === null || angka === undefined || angka === '' || angka == 0) return '-';
            angka = parseFloat(angka);
            if (isNaN(angka)) return '-';
            return 'Rp ' + angka.toLocaleString('id-ID');
        }

        // ====== RENDER TABEL BERDASARKAN filteredData + currentPage ======
     // ====== RENDER TABEL BERDASARKAN filteredData + currentPage ======
// ====== RENDER TABEL BERDASARKAN filteredData + currentPage ======
function renderTable() {
    let html = '';

    if (!filteredData || filteredData.length === 0) {
        $('#petugas_setoran_body').html(
            '<tr><td colspan="15" class="text-center">Tidak ada data</td></tr>'
        );
        $('#load_more').hide();
        return;
    }

    const startIndex = (currentPage - 1) * pageSize;
    const endIndex = Math.min(startIndex + pageSize, filteredData.length);
    let no = startIndex + 1;

    // helper: cek ada setoran atau tidak
    function hasValue(val) {
        if (val === null || val === undefined || val === '') return false;
        const n = parseFloat(val);
        return !isNaN(n) && n > 0;
    }

    for (let i = startIndex; i < endIndex; i++) {
        const row = filteredData[i];

        html += `
            <tr>
                <td class="align-middle col-no">${no++}</td>

                <!-- Kolom Nama + Kode (sticky) -->
                <td class="cell-nama col-nama">
                    <div class="nama-title">${row.nama || '-'}</div>
                 
                    </div>
                </td>

                <!-- Kolom Lokasi -->
                <td class="cell-lokasi" style="text-align:center">
                    ${row.lokasi || '-'}
                </td>

                <!-- Kolom Bulanan -->
                <td class="cell-setoran ${hasValue(row.jan) ? 'has-value' : 'empty'}">
                    ${formatRupiah(row.jan)}
                </td>
                <td class="cell-setoran ${hasValue(row.feb) ? 'has-value' : 'empty'}">
                    ${formatRupiah(row.feb)}
                </td>
                <td class="cell-setoran ${hasValue(row.mar) ? 'has-value' : 'empty'}">
                    ${formatRupiah(row.mar)}
                </td>
                <td class="cell-setoran ${hasValue(row.apr) ? 'has-value' : 'empty'}">
                    ${formatRupiah(row.apr)}
                </td>
                <td class="cell-setoran ${hasValue(row.mei) ? 'has-value' : 'empty'}">
                    ${formatRupiah(row.mei)}
                </td>
                <td class="cell-setoran ${hasValue(row.jun) ? 'has-value' : 'empty'}">
                    ${formatRupiah(row.jun)}
                </td>
                <td class="cell-setoran ${hasValue(row.jul) ? 'has-value' : 'empty'}">
                    ${formatRupiah(row.jul)}
                </td>
                <td class="cell-setoran ${hasValue(row.ags) ? 'has-value' : 'empty'}">
                    ${formatRupiah(row.ags)}
                </td>
                <td class="cell-setoran ${hasValue(row.sep) ? 'has-value' : 'empty'}">
                    ${formatRupiah(row.sep)}
                </td>
                <td class="cell-setoran ${hasValue(row.okt) ? 'has-value' : 'empty'}">
                    ${formatRupiah(row.okt)}
                </td>
                <td class="cell-setoran ${hasValue(row.nov) ? 'has-value' : 'empty'}">
                    ${formatRupiah(row.nov)}
                </td>
                <td class="cell-setoran ${hasValue(row.des) ? 'has-value' : 'empty'}">
                    ${formatRupiah(row.des)}
                </td>
            </tr>
        `;
    }

    $('#petugas_setoran_body').html(html);

    // atur tombol Load More
    if (endIndex < filteredData.length) {
        $('#load_more').show();
    } else {
        $('#load_more').hide();
    }
}



        // ====== APPLY FILTER SEARCH KE allData ======
      function applyFilter() {
    const keyword = currentKeyword.toLowerCase();

    // filter berdasarkan keyword
    if (!keyword) {
        filteredData = allData.slice(); // copy semua
    } else {
        filteredData = allData.filter(function (row) {
            const nama   = (row.nama || '').toLowerCase();
            const lokasi = (row.lokasi || '').toLowerCase();
            const kode   = (row.kode_petugas || '').toLowerCase();

            return (
                nama.includes(keyword) ||
                lokasi.includes(keyword) ||
                kode.includes(keyword)
            );
        });
    }

    // urutkan berdasarkan total setoran
    if (currentSort === 'desc') {
        // terbesar ke terkecil
        filteredData.sort(function (a, b) {
            return (b._total_setoran || 0) - (a._total_setoran || 0);
        });
    } else if (currentSort === 'asc') {
        // terkecil ke terbesar
        filteredData.sort(function (a, b) {
            return (a._total_setoran || 0) - (b._total_setoran || 0);
        });
    }
    // kalau 'none' → urutan sesuai dari backend (nggak di-sort)

    currentPage = 1; // reset ke halaman pertama tiap kali filter/sort
    renderTable();
}

        // ====== LOAD DATA DARI API ======
       // ====== LOAD DATA DARI API ======
function loadSetoranBulanan(tahun) {
    showLoading();
    currentYear = 2026 || new Date().getFullYear();

    $.ajax({
        url: ENDPOINT_SETORAN,
        type: 'GET',
        dataType: 'json',
        data: { tahun: currentYear },
     success: function (res) {
            // helper parse angka
            const num = (val) => {
                if (val === null || val === undefined || val === '') return 0;
                const n = parseFloat(val);
                return isNaN(n) ? 0 : n;
            };

            // simpan semua data + hitung total setoran per tahun per petugas
            allData = (res || []).map(function (row) {
                const total =
                    num(row.jan) +
                    num(row.feb) +
                    num(row.mar) +
                    num(row.apr) +
                    num(row.mei) +
                    num(row.jun) +
                    num(row.jul) +
                    num(row.ags) +
                    num(row.sep) +
                    num(row.okt) +
                    num(row.nov) +
                    num(row.des);

                row._total_setoran = total; // simpan di property baru
                return row;
            });

            applyFilter(); // otomatis render dengan keyword + sort saat ini
        },
        error: function (xhr, status, error) {
            console.error('AJAX Error:', {
                statusCode: xhr.status,
                statusText: xhr.statusText,
                readyState: xhr.readyState,
                jqStatus: status,
                error: error,
                responseText: xhr.responseText
            });

            // potong responseText biar nggak terlalu panjang
            let responseSnippet = (xhr.responseText || '').toString();
            if (responseSnippet.length > 500) {
                responseSnippet = responseSnippet.substring(0, 500) + '... (dipotong)';
            }

            // tampilkan di tabel
            $('#petugas_setoran_body').html(
                `<tr>
                    <td colspan="15" class="text-danger">
                        <strong>Gagal memuat data.</strong><br>
                        <strong>Status:</strong> ${xhr.status} (${xhr.statusText})<br>
                        <strong>jQuery status:</strong> ${status}<br>
                        <strong>Error:</strong> ${error}<br>
                        <strong>Response:</strong><br>
                        <pre style="white-space:pre-wrap; max-height:200px; overflow:auto; background:#f8f9fa; border:1px solid #ddd; padding:8px; margin-top:4px;">${responseSnippet}</pre>
                    </td>
                </tr>`
            );

            $('#load_more').hide();

            // optional: popup SweetAlert juga
            if (typeof Swal !== 'undefined') {
                Swal.fire({
                    icon: 'error',
                    title: 'Gagal memuat data',
                    html: `
                        <div style="text-align:left">
                            <b>Status:</b> ${xhr.status} (${xhr.statusText})<br>
                            <b>Error:</b> ${error}<br>
                            <b>jQuery status:</b> ${status}
                        </div>
                    `
                });
            }
        }
    });
}


        // ====== EVENT: FILTER TAHUN ======
$('#filter_tahun').on('change', function () {
    const tahun = $(this).val();
    loadSetoranBulanan(tahun);
});

        // ====== EVENT: SEARCH (BUTTON CARI) ======
        $('#search_button').on('click', function () {
            currentKeyword = $('#search_input').val().trim();
            applyFilter();
        });
    // ====== EVENT: URUTKAN SETORAN ======
$('#filter_sort').on('change', function () {
    currentSort = $(this).val(); // none | desc | asc
    applyFilter();
});
        // ====== EVENT: SEARCH (ENTER DI INPUT) ======
        $('#search_input').on('keypress', function (e) {
            if (e.which === 13) { // Enter
                currentKeyword = $('#search_input').val().trim();
                applyFilter();
            }
        });

        // ====== EVENT: LOAD MORE (PAGINATION) ======
        $('#load_more').on('click', function () {
            if (currentPage * pageSize < filteredData.length) {
                currentPage++;
                renderTable();
            }
        });

        // ====== LOAD AWAL (PAKAI TAHUN DI SELECT) ======
        loadSetoranBulanan(currentYear);
    });
</script>

    <!-- Bootstrap JS -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>
    <!-- SweetAlert JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10.16.6/dist/sweetalert2.min.js"></script>
    <script src="<?= base_url('assets/img/js/petugas.js'); ?>"></script>
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
      <!-- Custom js for this page -->
    <script src="/aspri/admins/js/dashboard.js"></script>
    <script src="/aspri/admins/js/todolist.js"></script>
    </body>
    </html>`