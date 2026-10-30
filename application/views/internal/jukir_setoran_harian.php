<link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css">

<style>
.swiper-slide{
    height: auto;
}

.month-block{
    margin-bottom: 10px;
}


.month-block{
    margin-bottom:20px;
}

.month-title{
    font-weight:bold;
    margin-bottom:6px;
}

.calendar-grid{
    display:grid;
    grid-template-columns:repeat(7,1fr);
    gap:6px;
}

.calendar-day{
    min-height:45px;
    font-size:11px;
    background:#f8f9fa;
    border:1px solid #e3e6f0;
    border-radius:6px;
    padding:4px;
    text-align:center;
}

.calendar-day.has-setoran{
    background:#e6f4ff;
    border-color:#4e73df;
}

.calendar-day.has-setoran .date{
    color:#1a73e8;
    font-weight:bold;
}


</style>

<body>
<div class="main-panel">
<div class="container-fluid mt-4">

<div class="card shadow-sm border-0">
    <div class="card-header bg-gradient-primary text-white">
        <h5 class="mb-0">Setoran Harian Jukir</h5>
    </div>

<div class="card-body">


<div class="d-flex justify-content-between mb-3">
    <div>
        <?php if ($prev_id): ?>
            <a href="<?= site_url('jukir/harian/'.$prev_id) ?>" 
               class="btn btn-outline-secondary btn-sm">
                ← Jukir Sebelumnya
            </a>
        <?php else: ?>
            <button class="btn btn-outline-secondary btn-sm" disabled>
                ← Jukir Sebelumnya
            </button>
        <?php endif; ?>
    </div>

    <div>
        <?php if ($next_id): ?>
            <a href="<?= site_url('jukir/harian/'.$next_id) ?>" 
               class="btn btn-outline-primary btn-sm">
                Jukir Berikutnya →
            </a>
        <?php else: ?>
            <button class="btn btn-outline-primary btn-sm" disabled>
                Jukir Berikutnya →
            </button>
        <?php endif; ?>
    </div>
</div>

<!-- INFO -->
<div class="row g-3 mb-3">

<div class="col-lg-4 col-md-6 col-12">
    <div class="card h-100 shadow-sm border-0">
        <div class="card-body d-flex align-items-center bg-gradient-primary text-white rounded">
            <div class="me-3 fs-3">👤</div>
            <div>
                <small class="text-white-50 text-uppercase">Nama Jukir</small>
                <h6 class="fw-bold mb-0"><?= $jukir->nama ?></h6>
            </div>
        </div>
    </div>
</div>

    <div class="col-lg-4 col-md-6 col-12">
        <div class="card h-100 shadow-sm border-0">
            <div class="card-body bg-gradient-danger text-white d-flex align-items-center">
                <div class="me-3 fs-3">📍</div>
                <div>
                    <small class="text-muted">Lokasi</small>
                    <h6 class="fw-bold mb-0"><?= $jukir->lokasi ?></h6>
                </div>
            </div>
        </div>
    </div>

    <div class="col-lg-4 col-md-6 col-12">
        <div class="card h-100 shadow-sm bg-gradient-success border-0 bg-light text-center">
            <div class="card-body">
                <small class="text-muted">Target / Hari</small>
                <h5 class="fw-bold text-primary mb-0">
                    Rp <?= number_format($target_harian, 0, ',', '.') ?>
                </h5>
            </div>
        </div>
    </div>

</div>


    <?php
$total_hari_wajib = 365;
$kekurangan_hari  = max(0, $total_hari_wajib - (int)$total_hari_setor);
// target harian sudah kamu hitung
$kekurangan_rp = $kekurangan_hari * $target_harian;
?>

   <div class="row g-3 mb-4">

    <div class="col-lg-6 col-md-6 col-12">
        <div class="card h-100 shadow-sm border-0 text-center">
            <div class="card-body">
                <small class="text-muted">Total Setoran</small>
                <h5 class="fw-bold text-success mb-0">
                    <?= $total_hari_setor ?> hari
                </h5>
                <small class="text-muted">
                    Rp <?= number_format($total_setoran_tahun_ini, 0, ',', '.') ?>
                </small>
            </div>
        </div>
    </div>

    <div class="col-lg-6 col-md-6 col-12">
        <div class="card h-100 shadow-sm border-0 bg-light text-center">
            <div class="card-body">
                <small class="text-muted">Kekurangan</small>
                <h5 class="fw-bold text-danger mb-0">
                    <?= $kekurangan_hari ?> hari
                </h5>
                <small class="text-muted">
                    Rp <?= number_format($kekurangan_rp, 0, ',', '.') ?>
                </small>
            </div>
        </div>
    </div>

</div>



</div>



<!-- KALENDER (SATU-SATUNYA) -->
<!--<div class="card mt-4">-->
<!--    <div class="card-header font-weight-bold">Kalender Setoran</div>-->
<!--    <div class="card-body">-->
<!--        <div id="kalender-setoran" class="calendar-grid"></div>-->
<!--    </div>-->
<!--</div>-->

<div class="card mt-4">
    <div class="card-header font-weight-bold">
        Kalender Setoran Tahunan (<?= date('Y') ?>)
    </div>
    <div class="card-body">
      <div class="swiper kalenderSwiper">
    <div class="swiper-wrapper" id="kalender-tahunan"></div>

    <!-- Navigasi -->
    <div class="swiper-button-next"></div>
    <div class="swiper-button-prev"></div>
</div>

    </div>
</div>


</div>

</div>
</div>
</div>
</div>
</body>

<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script>
$(document).ready(function(){

    loadSetoran();
    loadCalendar();

    $('#bulan').on('change', function(){
        loadSetoran(); // tabel aja
    });

});

// ===== TABEL SETORAN =====
function loadSetoran(){
    $.post("<?= site_url('jukir/filter_bulan') ?>", {
        id_jukir: $('#id_jukir').val(),
        bulan: $('#bulan').val()
    }, function(res){

        let html = '';
        let total = 0;

        if(res.length){
            $.each(res, function(i,s){
                let jml = parseInt(s.jumlah);
                total += jml;

                html += `
                <tr>
                    <td>${i+1}</td>
                    <td>${s.waktu}</td>
                    <td>${s.no_transaksi}</td>
                    <td class="text-right text-success">
                        Rp ${jml.toLocaleString('id-ID')}
                    </td>
                </tr>`;
            });

            $('#total-setoran').html(`
                <tr>
                    <th colspan="3" class="text-right">Total</th>
                    <th class="text-right text-primary">
                        Rp ${total.toLocaleString('id-ID')}
                    </th>
                </tr>
            `);
        } else {
            html = `<tr><td colspan="4" class="text-center">Tidak ada setoran</td></tr>`;
            $('#total-setoran').html('');
        }

        $('#data-setoran').html(html);
    }, 'json');
}

// ===== KALENDER TAHUNAN (365 HARI) =====
function loadCalendar(){

    let totalHariSetor = <?= (int)$total_hari_setor ?>;

    // bulan aktif dari input
    let bulan = $('#bulan').val(); // YYYY-MM
    let year  = parseInt(bulan.split('-')[0]);
    let month = parseInt(bulan.split('-')[1]) - 1;

    // hitung hari dalam bulan
    let daysInMonth = new Date(year, month + 1, 0).getDate();

    // hitung offset hari ke-berapa dalam setahun
    let startOfYear = new Date(year, 0, 1);
    let firstDayOfMonth = new Date(year, month, 1);

    let offset = Math.floor(
        (firstDayOfMonth - startOfYear) / 86400000
    ) + 1; // hari ke-n (1-based)

    let html = '';

    for(let i = 0; i < daysInMonth; i++){
        let hariKe = offset + i;

        html += `
        <div class="calendar-day ${hariKe <= totalHariSetor ? 'has-setoran' : ''}">
            <div class="date">${i + 1}</div>
        </div>`;
    }

    $('#kalender-setoran').html(html);
}

function loadCalendarTahunan(){

    let totalHariSetor = <?= (int)$total_hari_setor ?>;
    let year = <?= date('Y') ?>;

    const namaBulan = [
        'Januari','Februari','Maret','April','Mei','Juni',
        'Juli','Agustus','September','Oktober','November','Desember'
    ];

    let startOfYear = new Date(year, 0, 1);
    let html = '';

    for(let month = 0; month < 12; month++){

        let firstDay = new Date(year, month, 1);
        let daysInMonth = new Date(year, month + 1, 0).getDate();

        let offset = Math.floor(
            (firstDay - startOfYear) / 86400000
        ) + 1;

        html += `
        <div class="swiper-slide">
            <div class="month-block">
                <div class="month-title">${namaBulan[month]}</div>
                <div class="calendar-grid">
        `;

        for(let d = 0; d < daysInMonth; d++){
            let hariKe = offset + d;

            html += `
                <div class="calendar-day ${hariKe <= totalHariSetor ? 'has-setoran' : ''}">
                    <div class="date">${d + 1}</div>
                </div>
            `;
        }

        html += `
                </div>
            </div>
        </div>`;
    }

    $('#kalender-tahunan').html(html);

    initSwiper();
}


$(document).ready(function(){
    loadCalendarTahunan();
});
</script>


<script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>

<script>
function initSwiper(){
    new Swiper('.kalenderSwiper', {
        spaceBetween: 16,
        navigation: {
            nextEl: '.swiper-button-next',
            prevEl: '.swiper-button-prev',
        },
        breakpoints: {
            0: {
                slidesPerView: 1
            },
            768: {
                slidesPerView: 2
            },
            1200: {
                slidesPerView: 3
            }
        }
    });
}

$(document).ready(function(){
    loadCalendarTahunan();
});
</script>
    <footer class="footer">
      <div class="container-fluid d-flex justify-content-between">
        <span class="text-muted d-block text-center text-sm-start d-sm-inline-block">Copyright © 2026 </span>
        <span class="float-none float-sm-end mt-1 mt-sm-0 text-end">Aplikasi Sistem Pencatatan Retribusi Parkir (ASPRI) developed by DaNzDev.ID</span>
      </div>
    </footer>
    <!-- Bootstrap JS -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>
    <!-- SweetAlert JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10.16.6/dist/sweetalert2.min.js"></script>

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