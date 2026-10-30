<style>
  /* ==========================================================================
     APPDASHBOARD REDESIGN — DAFTAR JURU PARKIR (MAIN PANEL ONLY)
     100% Preserves all IDs, Classes, Dynamic jQuery Card Selectors, & Scripts
     ========================================================================== */
  .main-panel .content-wrapper {
    background: var(--ad-bg, #f8fafc) !important;
    padding: 26px 28px !important;
    font-family: 'Inter', 'Poppins', -apple-system, BlinkMacSystemFont, sans-serif;
  }

  .jukir-directory-page {
    --jk-primary: #2563eb;
    --jk-primary-hover: #1d4ed8;
    --jk-primary-soft: rgba(37, 99, 235, 0.1);
    --jk-surface: #ffffff;
    --jk-surface-alt: #f8fafc;
    --jk-text: #0f172a;
    --jk-muted: #64748b;
    --jk-border: #e2e8f0;
    color: var(--jk-text);
  }

  body.aspri-dark .jukir-directory-page,
  html.dark .jukir-directory-page {
    --jk-surface: #111827;
    --jk-surface-alt: #1e293b;
    --jk-text: #f8fafc;
    --jk-muted: #94a3b8;
    --jk-border: #1f2937;
    --jk-primary-soft: rgba(59, 130, 246, 0.16);
  }

  /* --- Breadcrumb --- */
  .jukir-directory-page .breadcrumb {
    background: transparent;
    padding: 0;
    margin-bottom: 1.15rem;
    font-size: 0.78rem;
    font-weight: 600;
    display: flex;
    align-items: center;
    gap: 0.35rem;
  }

  .jukir-directory-page .breadcrumb-item + .breadcrumb-item::before {
    content: "/";
    color: var(--jk-muted);
    padding-right: 0.35rem;
  }

  .jukir-directory-page .breadcrumb a {
    color: var(--jk-primary);
    text-decoration: none;
  }

  .jukir-directory-page .breadcrumb a:hover {
    text-decoration: underline;
  }

  .jukir-directory-page .breadcrumb-item.active {
    color: var(--jk-muted);
    font-weight: 500;
  }

  /* --- Main Container Card --- */
  .jukir-directory-page .directory-shell-card {
    background: var(--jk-surface) !important;
    border: 1px solid var(--jk-border) !important;
    border-radius: 18px !important;
    box-shadow: 0 4px 24px -4px rgba(15, 23, 42, 0.05) !important;
    overflow: hidden;
  }

  .jukir-directory-page .directory-header {
    padding: 22px 26px;
    border-bottom: 1px solid var(--jk-border);
    background: linear-gradient(90deg, rgba(37, 99, 235, 0.04) 0%, transparent 100%);
    display: flex;
    align-items: center;
    justify-content: space-between;
    flex-wrap: wrap;
    gap: 16px;
  }

  .jukir-directory-page .eyebrow-badge {
    display: inline-flex;
    align-items: center;
    gap: 6px;
    padding: 4px 10px;
    border-radius: 999px;
    background: var(--jk-primary-soft);
    color: var(--jk-primary);
    text-transform: uppercase;
    letter-spacing: 0.08em;
    font-size: 10px;
    font-weight: 800;
    margin-bottom: 6px;
  }

  .jukir-directory-page .eyebrow-dot {
    width: 6px;
    height: 6px;
    border-radius: 50%;
    background: var(--jk-primary);
  }

  .jukir-directory-page .page-heading {
    font-size: 22px;
    font-weight: 800;
    letter-spacing: -0.02em;
    color: var(--jk-text);
    margin: 0;
  }

  .jukir-directory-page .page-subtitle {
    font-size: 12.5px;
    color: var(--jk-muted);
    margin: 4px 0 0;
  }

  .jukir-directory-page .directory-body {
    padding: 22px 26px 28px;
  }

  /* --- Search Input Bar (#search_input & #search_button) --- */
  .jukir-directory-page .search-toolbar {
    background: var(--jk-surface-alt);
    border: 1px solid var(--jk-border);
    border-radius: 14px;
    padding: 14px 16px;
    margin-bottom: 18px;
  }

  .jukir-directory-page .search-input-group {
    display: flex;
    align-items: stretch;
    gap: 10px;
    width: 100%;
  }

  .jukir-directory-page .search-input-wrap {
    position: relative;
    flex-grow: 1;
  }

  .jukir-directory-page .search-input-icon {
    position: absolute;
    left: 16px;
    top: 50%;
    transform: translateY(-50%);
    color: var(--jk-muted);
    font-size: 18px;
    pointer-events: none;
  }

  .jukir-directory-page #search_input {
    height: 50px;
    padding-left: 44px;
    padding-right: 16px;
    border-radius: 12px !important;
    border: 1.5px solid var(--jk-border);
    background: var(--jk-surface);
    color: var(--jk-text);
    font-size: 15px;
    font-weight: 500;
    box-shadow: 0 1px 2px rgba(15, 23, 42, 0.02);
    transition: border-color 0.15s ease, box-shadow 0.15s ease;
  }

  .jukir-directory-page #search_input:focus {
    outline: none;
    border-color: var(--jk-primary);
    box-shadow: 0 0 0 4px rgba(37, 99, 235, 0.14);
  }

  .jukir-directory-page #search_button {
    height: 50px;
    padding: 0 24px;
    border-radius: 12px !important;
    background: var(--jk-primary);
    border: 1px solid var(--jk-primary);
    color: #ffffff;
    font-size: 14px;
    font-weight: 700;
    display: inline-flex;
    align-items: center;
    gap: 8px;
    box-shadow: 0 4px 12px rgba(37, 99, 235, 0.25);
    transition: all 0.15s ease;
  }

  .jukir-directory-page #search_button:hover {
    background: var(--jk-primary-hover);
    transform: translateY(-1px);
  }

  /* --- Filter Jalur Select (Ramah Orang Tua — Tinggi 54px, Teks Jelas) --- */
  .filter-jalur-select {
    width: 100%;
    height: 54px;
    padding: 0 44px 0 16px;
    font-size: 16px;
    font-weight: 700;
    color: var(--jk-text, #0f172a);
    background-color: var(--jk-surface, #ffffff);
    border: 1.5px solid var(--jk-border, #cbd5e1);
    border-radius: 12px;
    appearance: none;
    -webkit-appearance: none;
    -moz-appearance: none;
    background-image: url("data:image/svg+xml,%3Csvg fill='none' stroke='%232563eb' stroke-width='2.4' viewBox='0 0 24 24' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath stroke-linecap='round' stroke-linejoin='round' d='M19 9l-7 7-7-7'%3E%3C/path%3E%3C/svg%3E");
    background-repeat: no-repeat;
    background-position: right 16px center;
    background-size: 20px;
    cursor: pointer;
    box-shadow: 0 1px 2px rgba(15, 23, 42, 0.03);
    transition: all 0.2s ease;
  }

  .filter-jalur-select:focus {
    outline: none;
    border-color: #2563eb;
    box-shadow: 0 0 0 4px rgba(37, 99, 235, 0.16);
  }

  .filter-jalur-select:hover {
    border-color: #2563eb;
  }

  .filter-jalur-select option {
    font-size: 16px;
    padding: 12px;
  }

  /* --- Filter Radio Pills (#filterSetoran & .filter-radio) --- */
  .filter-box {
    padding: 10px 16px;
    height: 52px;
    border-radius: 12px;
    border: 1px solid var(--jk-border, #e2e8f0);
    background-color: var(--jk-surface, #ffffff);
    font-size: 0.85rem;
    font-weight: 600;
    color: var(--jk-text, #0f172a);
    cursor: pointer;
    transition: all 0.2s ease;
    user-select: none;
  }

  .filter-box:hover {
    background-color: var(--jk-surface-alt, #f1f5f9);
  }

  .filter-box.active {
    background-color: #2563eb;
    border-color: #2563eb;
    color: #ffffff;
  }

  .jukir-directory-page #filterSetoran .filter-radio,
  .filter-radio {
    cursor: pointer;
    border: 1.5px solid var(--jk-border, #e2e8f0) !important;
    border-radius: 12px !important;
    background: var(--jk-surface, #ffffff) !important;
    color: var(--jk-text, #334155) !important;
    font-size: 13px;
    font-weight: 700;
    padding: 12px 16px !important;
    margin: 0 !important;
    display: inline-flex !important;
    align-items: center;
    gap: 7px;
    user-select: none;
    box-shadow: 0 1px 2px rgba(15, 23, 42, 0.03) !important;
    transition: all 0.18s ease !important;
  }

  .jukir-directory-page #filterSetoran .filter-radio:hover,
  .filter-radio:hover {
    border-color: #93c5fd !important;
    background: var(--jk-surface-alt, #f8fafc) !important;
    color: #2563eb !important;
  }

  .jukir-directory-page #filterSetoran .filter-radio.active,
  .filter-radio.active {
    background: #2563eb !important;
    color: #ffffff !important;
    border-color: #2563eb !important;
    box-shadow: 0 6px 16px rgba(37, 99, 235, 0.25) !important;
  }

  #countBelumBayar {
    font-size: 11px;
    font-weight: 800;
    padding: 4px 7px;
    border-radius: 999px;
    box-shadow: 0 2px 6px rgba(220, 38, 38, 0.35);
  }

  /* --- Petugas Cards & Hover Styles (Preserved for daftar_petugas.js) --- */
  .custom-card-hover {
    transition: transform 0.25s ease, box-shadow 0.25s ease, background-color 0.25s ease;
  }

  .custom-card-hover:hover {
    transform: translateY(-5px);
    box-shadow: 0 14px 28px -6px rgba(15, 23, 42, 0.12) !important;
  }

  .modern-card {
    background: var(--jk-surface, #ffffff);
    border: 1px solid var(--jk-border, #e2e8f0) !important;
    border-radius: 16px !important;
    box-shadow: 0 4px 16px rgba(15, 23, 42, 0.04) !important;
    transition: all 0.22s ease;
  }

  .modern-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 14px 28px -4px rgba(15, 23, 42, 0.12) !important;
    border-color: #bfdbfe !important;
  }

  .photo-wrapper {
    display: flex;
    justify-content: center;
    margin-top: 18px;
  }

  .petugas-photo {
    width: 108px;
    height: 108px;
    object-fit: cover;
    border-radius: 50%;
    border: 4px solid #ffffff;
    box-shadow: 0 8px 20px rgba(15, 23, 42, 0.12);
    background: #f1f5f9;
  }

  .card-sm { border-radius: 14px !important; }
  .card-md { border-radius: 18px !important; }
  .card-lg { border-radius: 22px !important; }
  .card-xl { border-radius: 28px !important; }

  /* --- Kalender Tahunan / Modal Detail Setoran Grid (Preserved for AJAX modal) --- */
  .kalender-tahunan,
  .months-grid {
    display: grid;
    grid-template-columns: repeat(4, 1fr);
    gap: 16px;
  }

  @media (max-width: 1200px) {
    .kalender-tahunan,
    .months-grid {
      grid-template-columns: repeat(3, 1fr);
    }
  }

  @media (max-width: 768px) {
    .kalender-tahunan,
    .months-grid {
      grid-template-columns: repeat(2, 1fr);
    }
    .main-panel .content-wrapper {
      padding: 16px 12px !important;
    }
    .jukir-directory-page .directory-header,
    .jukir-directory-page .directory-body {
      padding: 16px;
    }
  }

  @media (max-width: 480px) {
    .kalender-tahunan,
    .months-grid {
      grid-template-columns: 1fr;
    }
  }

  .month-block {
    border: 1px solid var(--jk-border, #e2e8f0);
    border-radius: 12px;
    padding: 12px;
    background: var(--jk-surface, #ffffff);
    box-shadow: 0 1px 3px rgba(15, 23, 42, 0.03);
  }

  .month-title {
    font-weight: 800;
    font-size: 13px;
    color: var(--jk-text, #0f172a);
    margin-bottom: 10px;
    text-align: center;
    padding-bottom: 6px;
    border-bottom: 1px solid var(--jk-border, #f1f5f9);
  }

  .calendar-grid {
    display: grid;
    grid-template-columns: repeat(7, 1fr);
    gap: 4px;
  }

  .calendar-day {
    min-height: 36px;
    font-size: 11px;
    background: var(--jk-surface-alt, #f8fafc);
    border: 1px solid var(--jk-border, #e2e8f0);
    border-radius: 6px;
    text-align: center;
    padding-top: 4px;
    color: var(--jk-muted, #64748b);
  }

  .calendar-day.has-setoran {
    background: #eff6ff;
    border-color: #93c5fd;
  }

  .calendar-day.has-setoran .date {
    color: #1d4ed8;
    font-weight: 800;
  }

  /* --- Pagination (#pagination) --- */
  #pagination .page-item .page-link {
    border-radius: 10px !important;
    margin: 0 3px;
    border: 1px solid var(--jk-border, #e2e8f0);
    color: var(--jk-text, #334155);
    font-weight: 600;
    font-size: 13px;
    padding: 8px 14px;
    background: var(--jk-surface, #ffffff);
    transition: all 0.15s ease;
  }

  #pagination .page-item.active .page-link {
    background: #2563eb !important;
    border-color: #2563eb !important;
    color: #ffffff !important;
    box-shadow: 0 4px 10px rgba(37, 99, 235, 0.25);
  }

  /* --- Loading Progress Bar (#loadingMessage & #progressBar) --- */
  #loadingMessage {
    display: none;
    text-align: center;
    padding: 28px 24px;
    margin-top: 20px;
    border-radius: 16px;
    background: var(--jk-surface-alt, #f8fafc);
    border: 1px dashed var(--jk-border, #cbd5e1);
    font-size: 18px;
    font-weight: 800;
    color: var(--jk-text, #0f172a);
  }

  /* --- Modal Detail Setoran Jukir (#detailModal) --- */
  #detailModal .modal-content {
    border-radius: 18px;
    border: 1px solid var(--jk-border, #e2e8f0);
    box-shadow: 0 20px 45px -10px rgba(15, 23, 42, 0.2);
    overflow: hidden;
  }

  #detailModal .modal-header {
    background: var(--jk-surface-alt, #f8fafc);
    border-bottom: 1px solid var(--jk-border, #e2e8f0);
    padding: 18px 24px;
  }

  #detailModal .modal-title {
    font-weight: 800;
    font-size: 17px;
    color: var(--jk-text, #0f172a);
  }

  /* --- Footer --- */
  .footer {
    background: transparent !important;
    border-top: 1px solid var(--jk-border, #e2e8f0) !important;
    padding: 18px 28px !important;
    font-size: 12px;
  }
</style>

<!-- partial: main-panel starts -->
<div class="main-panel">
  <div class="content-wrapper jukir-directory-page">

    <!-- BREADCRUMB -->
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="<?= base_url('dashboard'); ?>">
            <i class="mdi mdi-home-outline me-1"></i>Dashboard
          </a>
        </li>
        <li class="breadcrumb-item active" aria-current="page">
          Daftar Juru Parkir
        </li>
      </ol>
    </nav>

    <!-- MAIN DIRECTORY CARD -->
    <div class="card directory-shell-card">
      <!-- Card Header -->
      <div class="directory-header">
        <div>
          <div class="eyebrow-badge">
            <span class="eyebrow-dot"></span>
            <span>ASPRI · Direktori Lapangan</span>
          </div>
          <h1 class="page-heading">
            Daftar Juru Parkir
            <!--(<?php echo $total_petugas; ?>)-->
          </h1>
          <p class="page-subtitle">
            Cari petugas, saring berdasarkan ruas jalur, dan pantau urutan capaian setoran maupun status pembayaran.
          </p>
        </div>
      </div>

      <!-- Card Body -->
      <div class="card-body directory-body">

        <!-- SEARCH BAR (#search_input & #search_button preserved) -->
        <div class="search-toolbar">
          <div class="input-group search-input-group">
            <div class="search-input-wrap">
              <i class="mdi mdi-magnify search-input-icon"></i>
              <input type="text" id="search_input" class="form-control" placeholder="Cari nama juru parkir, kode lokasi, atau ruas jalan...">
            </div>
            <div class="input-group-append">
              <button class="btn btn-primary" id="search_button" type="button">
                <i class="mdi mdi-magnify"></i>
                <span>Cari</span>
              </button>
            </div>
          </div>
        </div>

        <!-- FILTER BAR: FILTER JALUR + FILTER SETORAN -->
        <div class="row align-items-center g-3 mb-4">
          <!-- FILTER JALUR (#filter_jalur preserved) -->
          <div class="col-12 col-lg-4">
            <select id="filter_jalur" class="filter-jalur-select w-100">
              <option value="">Semua Jalur</option>
            </select>
          </div>

          <!-- FILTER SETORAN (#filterSetoran & radio inputs preserved) -->
          <div class="col-12 col-lg-8 d-flex justify-content-lg-end">
            <div class="d-flex flex-wrap gap-2" id="filterSetoran">
              <label class="card filter-radio active">
                <input type="radio" name="filter_setoran" value="default" checked hidden>
                <i class="mdi mdi-view-grid-outline"></i>
                <span>Default</span>
              </label>

              <label class="card filter-radio">
                <input type="radio" name="filter_setoran" value="terbanyak" hidden>
                <i class="mdi mdi-trending-up"></i>
                <span>Setoran Terbanyak</span>
              </label>

              <label class="card filter-radio">
                <input type="radio" name="filter_setoran" value="terkecil" hidden>
                <i class="mdi mdi-trending-down"></i>
                <span>Setoran Terkecil</span>
              </label>

              <!-- LABEL BELUM BAYAR + COUNTER (#countBelumBayar preserved) -->
              <label class="card filter-radio position-relative me-2">
                <input type="radio" name="filter_setoran" value="belum_bayar" hidden>
                <i class="mdi mdi-alert-circle-outline"></i>
                <span>Belum Bayar</span>
                <span class="badge bg-danger position-absolute top-0 start-100 translate-middle" id="countBelumBayar">0</span>
              </label>
            </div>
          </div>
        </div>

        <!--<div class="mt-4">
            <button class="btn btn-info filter-btn" data-filter="updated">Sudah diupdate ke Aspri</button>
            <button class="btn btn-success filter-btn" data-filter="with-photo">Sudah memiliki foto</button>
            <button class="btn btn-secondary filter-btn" data-filter="all">Semua</button>
        </div>-->

        <!-- DYNAMIC CARDS GRID (#petugas_setoran_cards preserved for daftar_petugas.js) -->
        <div id="petugas_setoran_cards" class="row row-cols-1 row-cols-md-2 row-cols-lg-4 g-4">
          <!-- Cards will be dynamically generated here by jQuery -->
        </div>

        <!-- PAGINATION (#pagination preserved) -->
        <nav class="mt-4 pt-2" aria-label="Navigasi halaman juru parkir">
          <ul class="pagination justify-content-center flex-wrap" id="pagination"></ul>
        </nav>

        <!-- LOADING MESSAGE WITH PROGRESS BAR (#loadingMessage & #progressBar preserved) -->
        <div id="loadingMessage">
          <div class="d-inline-flex align-items-center gap-2 mb-2">
            <div class="spinner-border text-primary spinner-border-sm" role="status"></div>
            <span>Data Sedang Diambil...</span>
          </div>
          <div class="progress mt-2 mx-auto" style="height: 24px; max-width: 480px; border-radius: 999px;">
            <div id="progressBar" class="progress-bar progress-bar-striped progress-bar-animated bg-primary fw-bold" role="progressbar"
                 style="width: 0%;" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100">
              0%
            </div>
          </div>
        </div>

      </div>
    </div>

  </div>
  <!-- content-wrapper ends -->

  <!-- FOOTER -->
  <footer class="footer">
    <div class="container-fluid d-flex flex-column flex-sm-row justify-content-between align-items-center gap-2">
      <span class="text-muted text-center text-sm-start">Copyright © 2026 <strong>ASPRI</strong></span>
      <span class="text-muted text-center text-sm-end">Aplikasi Sistem Pencatatan Retribusi Parkir (ASPRI) developed by <strong>DaNzDev.ID</strong></span>
    </div>
  </footer>
</div>
<!-- main-panel ends -->
</div>
<!-- page-body-wrapper ends -->
</div>
<!-- container-scroller ends -->

<!-- Global Loading Overlay (#loading preserved) -->
<div id="loading">Loading...</div>

<!-- Detail Setoran Jukir Modal (#detailModal & #modalDetailContent preserved) -->
<div class="modal fade" id="detailModal" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-xl modal-dialog-centered modal-dialog-scrollable">
    <div class="modal-content">

      <div class="modal-header">
        <h5 class="modal-title">
          <i class="mdi mdi-calendar-Account-outline text-primary me-2"></i>Detail Setoran Jukir
        </h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>

      <div class="modal-body" id="modalDetailContent">
        <div class="text-center py-5">Loading...</div>
      </div>

    </div>
  </div>
</div>

<!-- Bootstrap JS -->
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>
<!-- SweetAlert JavaScript -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10.16.6/dist/sweetalert2.min.js"></script>
<!--<script src="<?= base_url('assets/img/js/petugas.js'); ?>"></script>-->
<!-- plugins:js -->
<script src="/aspri/assets/img/js/daftar_petugas.js"></script>
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
</html>