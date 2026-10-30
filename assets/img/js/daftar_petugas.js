/* =====================
   VAR GLOBAL
===================== */
let limit         = 500;
let currentSearch = '';
let currentJalur  = '';
let currentFilter = 'default';

let allPetugas   = [];
let currentData  = [];

let kalenderSwiper = null;

function initSwiper(){
    if (kalenderSwiper) {
        kalenderSwiper.destroy(true, true);
    }

    kalenderSwiper = new Swiper('.kalenderSwiper', {
        spaceBetween: 16,
        navigation: {
            nextEl: '.swiper-button-next',
            prevEl: '.swiper-button-prev',
        },
        breakpoints: {
            0: { slidesPerView: 1 },
            768: { slidesPerView: 2 },
            1200: { slidesPerView: 3 }
        }
    });
}


$(document).on('click', '.btn-detail', function () {
    let id = $(this).data('id');

   // $('#detailModal').modal('show');
    $('#modalDetailContent').html('Loading...');

    $.getJSON('/aspri/jukir/harian_ajax/' + id, function (res) {

        if (!res.status) {
            $('#modalDetailContent').html('<div class="alert alert-danger">Data tidak ditemukan</div>');
            return;
        }

        let kekuranganHari = 364 - res.hari_setor;
        let kekuranganRp   = kekuranganHari * parseInt(res.target_harian.replace(/\./g,''));

        $('#modalDetailContent').html(`
<style>
.calendar-grid{display:grid;grid-template-columns:repeat(7,1fr);gap:6px}
.calendar-day{min-height:45px;font-size:11px;background:#f8f9fa;border:1px solid #e3e6f0;border-radius:6px;padding:4px;text-align:center}
.calendar-day.has-setoran{background:#e6f4ff;border-color:#4e73df}
.calendar-day.has-setoran .date{color:#1a73e8;font-weight:bold}
</style>

<div class="container-fluid">

<div class="row g-3 mb-3">

<div class="col-lg-4 col-md-6 col-12">
  <div class="card h-100 shadow-sm border-0 card-rounded-xl">
    <div class="card-body d-flex align-items-center bg-gradient-primary text-white rounded">
      <div class="me-3 fs-3">👤</div>
      <div>
        <small class="text-white-50">Nama Jukir</small>
        <h6 class="fw-bold mb-0">${res.nama}</h6>
      </div>
    </div>
  </div>
</div>

<div class="col-lg-4 col-md-6 col-12">
  <div class="card h-100 shadow-sm border-0 card-rounded-xl">
    <div class="card-body bg-gradient-danger text-white d-flex align-items-center">
      <div class="me-3 fs-3">📍</div>
      <div>
        <small>Lokasi</small>
        <h6 class="fw-bold mb-0">${res.lokasi}</h6>
      </div>
    </div>
  </div>
</div>

<div class="col-lg-4 col-md-6 col-12">
  <div class="card h-100 shadow-sm border-0 card-rounded-xl text-center">
    <div class="card-body">
      <small>Target / Hari</small>
      <h5 class="fw-bold text-primary mb-0">
        Rp ${res.target_harian}
      </h5>
        <small>Rp ${res.target} / 30 Hari</small>
    </div>
  </div>
</div>

</div>

<div class="row g-3 mb-4">

<div class="col-6">
  <div class="card text-center card-rounded-xl">
    <div class="card-body">
      <small>Total Setoran</small>
      <h5 class="fw-bold text-success">${res.hari_setor} hari</h5>
      <small>Rp ${res.total_setoran}</small>
    </div>
  </div>
</div>

<div class="col-6">
  <div class="card text-center card-rounded-xl">
    <div class="card-body">
      <small>Kekurangan</small>
      <h5 class="fw-bold text-danger">${kekuranganHari} hari</h5>
      <small>Rp ${kekuranganRp.toLocaleString('id-ID')}</small>
    </div>
  </div>
</div>

</div>

<div class="card mt-3">
  <div class="card-header fw-bold">
    Kalender Setoran Tahunan (${res.tahun})
  </div>
  <div class="card-body">
    <div id="kalender-tahunan" class="kalender-tahunan"></div>
  </div>
</div>

</div>
        `);

       renderCalendarTahunan(res.hari_setor, res.tahun);

    });
});

function renderCalendar(totalHariSetor){
    let year = new Date().getFullYear();
    let start = new Date(year,0,1);
    let html = '';

    for(let i=0;i<365;i++){
        html += `
        <div class="calendar-day ${i < totalHariSetor ? 'has-setoran' : ''}">
            <div class="date">${i+1}</div>
        </div>`;
    }

    $('#kalender-tahunan').html(html);
}

function renderCalendarTahunan(totalHariSetor, year){

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
        </div>`;
    }

    $('#kalender-tahunan').html(html);
}


/* =====================
   HITUNG TOTAL HARI SETOR
===================== */
function hitungHariSetor(p) {
    const TOTAL_HARI_TAHUN = 365;

    let targetBulanan = parseInt((p.target || '0').toString().replace(/\D/g, ''));
    let totalSetoran  = parseInt(p.total_setoran || 0);

    if (targetBulanan <= 0 || totalSetoran <= 0) return 0;

    let bulanTercapai = totalSetoran / targetBulanan;
    let hari = Math.floor(bulanTercapai * 30);

    return Math.min(TOTAL_HARI_TAHUN, hari);
}

/* =====================
   LOAD DATA
===================== */
function loadPetugasSetoran() {

    $('#petugas_setoran_cards').empty();
    $('#loadingMessage').show();

    $.ajax({
        url: './get_petugas',
        method: 'POST',
        data: { limit: limit, offset: 0, search: '' },
        dataType: 'json',

        success: function (data) {

            $('#loadingMessage').hide();

            if (!data || !data.petugas || data.petugas.length === 0) {
                $('#petugas_setoran_cards').html(`
                    <div class="col-12 text-center text-muted">
                        Data tidak ditemukan
                    </div>
                `);
                return;
            }

            allPetugas = data.petugas.map(p => ({
                ...p,
                totalHariSetor: hitungHariSetor(p)
            }));

            populateFilterJalur(allPetugas);
            applyFilter();
        
            updateCountBelumBayar();

        },

        error: function () {
            $('#loadingMessage').hide();
            alert('Gagal memuat data');
        }
    });
}

/* =====================
   FILTER JALUR
===================== */
function populateFilterJalur(data) {

    let jalurSet = new Set();
    data.forEach(p => { if (p.lokasi) jalurSet.add(p.lokasi); });

    let html = `<option value="">Semua Jalur</option>`;
    [...jalurSet].sort().forEach(jalur => {
        html += `<option value="${jalur}">${jalur}</option>`;
    });

    $('#filter_jalur').html(html);
}

/* =====================
   APPLY FILTER
===================== */
// OPTIONAL: update juga setiap filter dijalankan
function applyFilter() {
  let filtered = allPetugas.filter(p => {
    let cocokJalur  = currentJalur === '' || p.lokasi === currentJalur;
    let cocokSearch = currentSearch === '' ||
      p.nama.toLowerCase().includes(currentSearch.toLowerCase()) ||
      p.area.toLowerCase().includes(currentSearch.toLowerCase());
    return cocokJalur && cocokSearch;
  });

  if (currentFilter === 'terbanyak') {
    filtered.sort((a, b) => b.totalHariSetor - a.totalHariSetor);
  }
  if (currentFilter === 'terkecil') {
  filtered = filtered
    .filter(p => p.totalHariSetor > 0) // buang 0
    .sort((a, b) => a.totalHariSetor - b.totalHariSetor);
}

if (currentFilter === 'belum_bayar') {
  filtered = filtered.filter(p => p.totalHariSetor === 0);
}


  currentData = filtered;
  renderCards(currentData);
}


/* =====================
   RENDER CARD
===================== */
function renderCards(data) {

    if (!data || data.length === 0) {
        $('#petugas_setoran_cards').html(`
            <div class="col-12 text-center text-muted">
                Data tidak ditemukan
            </div>
        `);
        return;
    }

    let cards = '';

    data.forEach(p => {

        let hari = p.totalHariSetor || 0;
        let persen = Math.round((hari / 365) * 100);

        let fotoUrl = `/aspri/assets/img/jukir/${p.noktp}.jpg`;
        let detail  = `/aspri/jukir_harian/${p.id}`;

        cards += `
        <div class="col">
          <div class="card modern-card h-100 text-center">

            <div class="photo-wrapper">
              <img src="${fotoUrl}" onerror="this.src='/aspri/assets/img/icon.png'" class="petugas-photo">
            </div>

            <div class="pt-2">
              <span class="badge bg-dark px-3 py-2 rounded-pill">${p.lokasi}</span>
            </div>

            <div class="card-body pt-3">
              <h5 class="card-title mb-1 fw-bold">${p.nama}</h5>

            <div class="text-muted small mb-3">
  ${p.kategori == 1 ? 'Pihak Ketiga' : 'Petugas Parkir'}
</div>


              <div class="text-start small mb-3">
                <strong>Area</strong><br>
                <span class="text-muted">${p.area}</span>
              </div>

              <div class="text-start small">
                <strong>Total Hari Setor</strong>
                <div class="d-flex justify-content-between mt-1">
                  <span class="text-muted">${hari} / 365 HARI</span>
                  <span class="fw-bold text-primary">${persen}%</span>
                </div>
                <div class="progress mt-2" style="height:12px;border-radius:10px;">
                  <div class="progress-bar bg-primary" style="width:${persen}%"></div>
                </div>
              </div>
            </div>

            <div class="card-footer bg-transparent border-0 pb-3">
         <button 
  class="btn btn-detail w-100 text-white btn-primary"
  data-id="${p.id}">
  Detail
</button>

            </div>

          </div>
        </div>`;
    });

    $('#petugas_setoran_cards').html(cards);
}

/* =====================
   EVENT
===================== */
$('#filter_jalur').on('change', function () {
    currentJalur = $(this).val();
    applyFilter();
});

$('#search_button').on('click', function () {
    currentSearch = $('#search_input').val().trim();
    applyFilter();
});

$('#search_input').on('keyup', function (e) {
    if (e.key === 'Enter') $('#search_button').click();
});

/* FILTER KOTAK */
$(document).on('click', '#filterSetoran .filter-box', function () {
    currentFilter = $(this).data('filter');
    $('#filterSetoran .filter-box').removeClass('active');
    $(this).addClass('active');
    applyFilter();
});
/* UPDATE JUMLAH BELUM BAYAR */
function updateCountBelumBayar() {
  const count = allPetugas.filter(p => p.totalHariSetor === 0).length;
  $('#countBelumBayar').text(count);
}

/* =====================
   INIT
===================== */
$(document).ready(function () {
    loadPetugasSetoran();
    
});

/* RADIO FILTER SETORAN */
$(document).on('change', 'input[name="filter_setoran"]', function () {

  currentFilter = this.value;

  $('#filterSetoran .filter-radio').removeClass('active');
  $(this).closest('.filter-radio').addClass('active');

  applyFilter();
});