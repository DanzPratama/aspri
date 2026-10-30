<style>
/* =====================================================
   ASPRI — REKAP PENDAPATAN
   Visual redesign only — function tetap
===================================================== */

:root {
    --aspri-blue: #0b4f8a;
    --aspri-blue-dark: #083761;
    --aspri-green: #168653;
    --aspri-bg: #f3f8fb;
    --aspri-ink: #172b3b;
    --aspri-muted: #718096;
    --aspri-border: #e2ebf1;
}

.main-panel,
.content-wrapper {
    background: var(--aspri-bg);
}

.content-wrapper {
    padding: 24px !important;
}

.main-panel .card {
    border: 1px solid var(--aspri-border);
    border-radius: 16px;
    background: #fff;
    box-shadow: 0 6px 24px rgba(20,55,80,.055);
}

.main-panel .card-body {
    padding: 26px;
}

/* Breadcrumb */
.main-panel .breadcrumb {
    background: transparent;
    padding: 0;
    font-size: 11px;
    color: var(--aspri-muted);
}

.main-panel .breadcrumb a {
    color: var(--aspri-blue);
    text-decoration: none;
    font-weight: 500;
}

.main-panel .breadcrumb-item.active {
    color: var(--aspri-muted);
}

/* Page title */
.main-panel h1 {
    color: var(--aspri-ink);
    font-size: 26px;
    font-weight: 700;
    letter-spacing: -.6px;
    margin-top: 8px;
}

/* Filter container */
.main-panel .mb-3.d-flex.justify-content-between {
    align-items: flex-start;
    flex-wrap: wrap;
    gap: 18px;
    padding: 19px;
    margin: 0 0 22px !important;
    border: 1px solid var(--aspri-border);
    border-radius: 13px;
    background: #fbfdfe;
}

/* Filter buttons */
.main-panel .btn {
    min-height: 37px;
    padding: 9px 14px;
    border: 0;
    border-radius: 8px;
    font-size: 11px;
    font-weight: 600;
    transition: background .2s, transform .2s;
}

.main-panel .btn:hover {
    transform: translateY(-1px);
}

.main-panel .btn-danger {
    background: #e7f5ed;
    color: #167448;
}

.main-panel .btn-danger:hover {
    background: #d5eddf;
    color: #105c39;
}

.main-panel .btn-info {
    background: #e7f2fc;
    color: var(--aspri-blue);
}

.main-panel .btn-info:hover {
    background: #d6e9fa;
    color: var(--aspri-blue-dark);
}

.main-panel .btn-warning {
    background: #fff3dc;
    color: #916000;
}

.main-panel .btn-warning:hover {
    background: #ffebc4;
    color: #795000;
}

.main-panel .btn-primary {
    background: var(--aspri-blue);
    color: #fff;
}

.main-panel .btn-primary:hover {
    background: var(--aspri-blue-dark);
}

.main-panel .btn-success {
    background: var(--aspri-green);
    color: #fff;
}

.main-panel .btn-success:hover {
    background: #106c43;
}

/* Filter labels and inputs */
.main-panel .mb-3.d-flex.justify-content-between label {
    color: #526779;
    font-size: 11px;
    font-weight: 600;
}

.main-panel .form-control {
    min-height: 38px;
    border: 1px solid #dce6ed;
    border-radius: 8px;
    color: var(--aspri-ink);
    background-color: #fff;
    font-size: 11px;
    box-shadow: none;
}

.main-panel .form-control:focus {
    border-color: var(--aspri-blue);
    box-shadow: 0 0 0 3px rgba(11,79,138,.08);
}

/* Filter area adapts to smaller widths */
.main-panel .mb-3.d-flex.justify-content-between > div:last-child {
    width: min(100%, 390px);
    min-width: 0 !important;
    gap: 9px;
}

.main-panel .mb-3.d-flex.justify-content-between > div:last-child > div {
    gap: 8px;
}

.main-panel .mb-3.d-flex.justify-content-between > div:last-child label {
    min-width: 78px !important;
}

.main-panel .mb-3.d-flex.justify-content-between > div:last-child input {
    max-width: none !important;
    flex: 1;
    width: 100%;
    min-width: 0;
}

/* Table */
.main-panel .table-responsive {
    width: 100%;
    overflow-x: auto;
    border: 1px solid var(--aspri-border);
    border-radius: 12px;
    box-shadow: none !important;
    -webkit-overflow-scrolling: touch;
}

.main-panel .table {
    width: 100%;
    min-width: 760px;
    margin-bottom: 0;
    border-collapse: separate;
    border-spacing: 0;
    background: #fff;
}

.main-panel .table thead.thead-dark th {
    padding: 15px 13px;
    border: 0;
    border-bottom: 1px solid var(--aspri-border);
    background: #f0f6fa;
    color: #536a7e;
    font-size: 10px;
    font-weight: 700;
    letter-spacing: .4px;
    text-transform: uppercase;
    white-space: nowrap;
    vertical-align: middle;
}

.main-panel .table tbody td {
    padding: 13px;
    border-top: 0;
    border-bottom: 1px solid #edf2f6;
    color: #405466;
    font-size: 11px;
    vertical-align: middle;
}

.main-panel .table-striped tbody tr:nth-of-type(odd) {
    background: #fff;
}

.main-panel .table-striped tbody tr:hover {
    background: #f5fafe;
}

.main-panel .table tbody tr:last-child td {
    border-bottom: 0;
}

/* Nominal and total */
.main-panel .table tbody td:nth-child(6) {
    color: var(--aspri-green);
    font-weight: 700;
    white-space: nowrap;
}

.main-panel .table tbody tr.font-weight-bold.bg-light td {
    padding: 16px 13px;
    background: #eaf6ef !important;
    border-top: 1px solid #d4eade;
    color: #166b45;
    font-size: 12px;
    font-weight: 700;
}

/* CETAK — tetap tersedia */
.main-panel .table tbody .btn-danger {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    min-width: 76px;
    min-height: 34px;
    padding: 8px 12px;
    border: 0;
    border-radius: 8px;
    background: var(--aspri-blue);
    color: #fff;
    font-size: 10px;
    font-weight: 700;
    letter-spacing: .3px;
}

.main-panel .table tbody .btn-danger:hover {
    background: var(--aspri-blue-dark);
    color: #fff;
}

/* Empty state */
.main-panel .table tbody td.text-center[colspan] {
    padding: 30px 14px;
    color: var(--aspri-muted);
}

/* Kasbon modal */
#kasbonModal .modal-content {
    overflow: hidden;
    border: 1px solid var(--aspri-border);
    border-radius: 14px;
    box-shadow: 0 15px 40px rgba(20,55,80,.14);
}

#kasbonModal .modal-header {
    background: #f5f9fc;
    border-bottom: 1px solid var(--aspri-border);
}

#kasbonModal .modal-title {
    color: var(--aspri-ink);
    font-size: 15px;
    font-weight: 700;
}

#kasbonModal .modal-body {
    padding: 22px;
}

#kasbonModal label {
    color: #526779;
    font-size: 11px;
    font-weight: 600;
}

/* Tablet */
@media (max-width: 992px) {
    .content-wrapper {
        padding: 17px !important;
    }

    .main-panel .card-body {
        padding: 20px;
    }

    .main-panel .mb-3.d-flex.justify-content-between > div:last-child {
        width: 100%;
        max-width: 480px;
    }
}

/* Mobile */
@media (max-width: 576px) {
    .content-wrapper {
        padding: 10px !important;
    }

    .main-panel .card {
        border-radius: 13px;
    }

    .main-panel .card-body {
        padding: 15px 11px;
    }

    .main-panel h1 {
        font-size: 21px;
        margin-bottom: 18px !important;
    }

    .main-panel .breadcrumb {
        font-size: 10px;
        line-height: 1.8;
    }

    .main-panel .mb-3.d-flex.justify-content-between {
        padding: 12px 10px;
        gap: 14px;
    }

    .main-panel .mb-3.d-flex.justify-content-between > div:first-child {
        display: grid;
        grid-template-columns: repeat(3, minmax(0, 1fr));
        width: 100%;
        gap: 6px;
    }

    .main-panel .mb-3.d-flex.justify-content-between > div:first-child .btn {
        margin-right: 0 !important;
        padding: 8px 4px;
        font-size: 10px;
        white-space: nowrap;
    }

    .main-panel .mb-3.d-flex.justify-content-between > div:last-child {
        max-width: none;
        gap: 12px;
    }

    .main-panel .mb-3.d-flex.justify-content-between > div:last-child > div {
        display: grid !important;
        grid-template-columns: 1fr auto;
        gap: 7px;
    }

    .main-panel .mb-3.d-flex.justify-content-between > div:last-child label {
        grid-column: 1 / -1;
        min-width: 0 !important;
    }

    .main-panel .mb-3.d-flex.justify-content-between > div:last-child input {
        grid-column: 1;
    }

    .main-panel .mb-3.d-flex.justify-content-between > div:last-child button {
        grid-column: 2;
    }

    .main-panel .table thead.thead-dark th,
    .main-panel .table tbody td {
        padding: 12px 10px;
    }
}
</style>
<?php 
date_default_timezone_set('Asia/Jakarta');
?>
<body>
    <!-- partial -->
    <div class="main-panel">
        <div class="content-wrapper">
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
                        Daftar Pendapatan
                    </li>
                </ol>
            </nav>
                    <h1 class="mb-4">Daftar Pendapatan</h1>

<div class="mb-3 d-flex justify-content-between">

    <!-- LEFT: Tombol Cepat -->
    <div>
        <a href="pendapatan_harian">
            <button class="btn btn-danger mr-2">Semua</button>
        </a>
        <button class="btn btn-info mr-2" id="filter_today">Hari ini</button>
        <button class="btn btn-warning" id="filter_month">Bulan ini</button>
    </div>

    <!-- RIGHT: Filter Tanggal + Filter Kolektor (Stacked vertically) -->
    <div class="d-flex flex-column" style="min-width:360px;">

        <!-- FILTER TANGGAL -->
        <div class="d-flex align-items-center mb-2">
            <label class="mr-2 mb-0" style="min-width:80px;">Tanggal:</label>
            <input type="date"
                   id="search_input"
                   class="form-control mr-2"
                   style="max-width:160px;">
            <button id="search_button" class="btn btn-primary ">Cari</button>
        </div>

        <!-- FILTER KOLEKTOR -->
        <div class="d-flex align-items-center">
            <label class="mr-2 mb-0" style="min-width:80px;">Cari Jukir:</label>
            <input type="text"
                   id="filter_kolektor"
                   class="form-control mr-2"
                   placeholder="Nama kolektor"
                   style="max-width:160px;"
                   value="<?= isset($kolektor_filter) ? htmlspecialchars($kolektor_filter) : '' ?>">
            <button id="filter_kolektor_button" class="btn btn-success ">Filter</button>
        </div>

    </div>
</div>


                   <div class="table-responsive shadow-effect">
    <table class="table table-striped">
        <thead class="thead-dark">
            <tr>
                <th>NO</th>
                <th>Tgl/Waktu</th>
                <th>No trx</th>
                <th>Kolektor</th>
                <th>Juru Parkir</th>
                <th>Jumlah</th>
                <!--<th>Aksi</th>-->
            </tr>
        </thead>
        <tbody id="petugas_table_body">
            <?php if (!empty($setoran)): ?>
                <?php 
                  $segment = $this->uri->segment(3);
$no = is_numeric($segment) ? ((int)$segment + 1) : 1;

                    $total_semua = 0; // variabel untuk menampung total
                ?>
                <?php foreach ($setoran as $row): ?>
                    <?php $total_semua += $row->total_stor; ?>
                    <tr>
                        <td><?= $no++; ?></td>
                        <td><?= date('d-m-Y H:i:s', strtotime($row->waktu_setor)); ?></td>
                        <td><?= $row->notransaksi; ?></td>
                        <td><?= $row->kolektor; ?></td>
                        <td><?= $row->nama_petugas; ?> - <?= $row->lokasi; ?></td>
                        <td>Rp.<?= number_format($row->total_stor, 0, ',', '.'); ?></td>
                        <td>
                           
                            <a href="./print/<?= $row->notransaksi; ?>">
                                <button class="btn btn-danger">CETAK</button>
                            </a>
                        </td>
                    </tr>
                <?php endforeach; ?>
                <!-- Tambahkan baris total di bawah -->
                <tr class="font-weight-bold bg-light">
                    <td colspan="5" class="text-right">TOTAL SETORAN :</td>
                    <td colspan="2">Rp.<?= number_format($total_semua, 0, ',', '.'); ?></td>
                </tr>
            <?php else: ?>
                <tr>
                    <td colspan="6" class="text-center">Tidak ada setoran atau setoran belum diinput</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>
</div>

            </div>
        </div>
    </div>
    <!-- partial -->
    <!-- Modal -->
<div class="modal fade" id="kasbonModal" tabindex="-1" aria-labelledby="kasbonModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="kasbonModalLabel">Form Kasbon</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="kasbonForm">
                    <div class="mb-3">
                        <label for="jumlahKasbon" class="form-label">Jumlah Setoran</label>
                        <input type="number" class="form-control" id="jumlahKasbon" placeholder="Masukkan jumlah setoran">
                    </div>
                    <button type="button" class="btn btn-secondary" id="btnSemuaSetoran">Semua Setoran</button>
                    <button type="submit" class="btn btn-primary">Kasbon</button>
                </form>
            </div>
        </div>
    </div>
</div>
    <!-- Modal HTML -->

    <!-- Bootstrap JS -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>
    <!-- SweetAlert JavaScript -->

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
    
    <script>
        document.getElementById('filter_today').addEventListener('click', function() {
            const today = new Date().toISOString().split('T')[0];
            window.location.href = `<?= site_url('pendapatan_harian') ?>?tanggal=${today}`;
        });

        document.getElementById('filter_month').addEventListener('click', function() {
            const now = new Date();
            const year = now.getFullYear();
            const month = ('0' + (now.getMonth() + 1)).slice(-2); // Format bulan dengan dua digit
            const startOfMonth = `${year}-${month}-01`;
            const endOfMonth = `${year}-${month}-31`; // Atur ke tanggal akhir bulan yang sesuai
            window.location.href = `<?= site_url('pendapatan_harian') ?>?tanggal=${startOfMonth},${endOfMonth}`;
        });

        document.getElementById('search_button').addEventListener('click', function() {
            const date = document.getElementById('search_input').value;
            window.location.href = `<?= site_url('pendapatan_harian') ?>?tanggal=${date}`;
        });
        
    document.getElementById('search_button').addEventListener('click', function() {
    const date = document.getElementById('search_input').value;
    if (date) {
        window.location.href = `<?= site_url('pendapatan_harian') ?>?tanggal=${date}`;
    } else {
        alert("Silakan pilih tanggal terlebih dahulu!");
    }
});
    
    document.getElementById('filter_kolektor_button').addEventListener('click', function() {
    const kolektor = document.getElementById('filter_kolektor').value.trim();

    if (kolektor) {
        // cuma filter kolektor
        window.location.href = `<?= site_url('pendapatan_harian') ?>?kolektor=${encodeURIComponent(kolektor)}`;
    } else {
        alert("Silakan isi nama kolektor dulu!");
    }
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
    <!-- End custom js for this page -->
</body>
</body>
