<!DOCTYPE html>
<html lang="id">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Dashboard Internal Aspri</title>

    <!-- plugins:css -->
    <link rel="stylesheet" href="/aspri/admins/vendors/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="/aspri/admins/vendors/css/vendor.bundle.base.css">
    <!-- endinject -->

    <!-- Fonts: Inter & Poppins -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">

    <!-- Plugin CSS & JS -->
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@10.16.6/dist/sweetalert2.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <!-- Layout styles -->
    <link rel="stylesheet" href="/aspri/admins/css/style.css">
    <link rel="stylesheet" href="/aspri/admins/css/aspri-modern.css?v=20261023">

    <!-- Favicons & Mobile Theme -->
    <link rel="shortcut icon" href="/aspri/assets/img/favicon.png" />
    <link rel="icon" type="image/png" sizes="192x192" href="/aspri/assets/img/favicon.png">
    <link rel="icon" type="image/png" sizes="512x512" href="/aspri/assets/img/favicon.png">
    <meta name="theme-color" content="#0b4f8a">
    <meta name="apple-mobile-web-app-status-bar-style" content="default">

    <style>
      /* ==========================================================================
         APPDASHBOARD CLEAN LIGHT THEME OVERRIDE FOR ASPRI
         Mengatasi konflik dengan aspri-modern.css & PurpleAdmin bawaan
         ========================================================================== */
      :root {
        --ad-bg: #f8fafc;
        --ad-surface: #ffffff;
        --ad-surface-alt: #f1f5f9;
        --ad-border: #e2e8f0;
        --ad-text: #0f172a;
        --ad-text-muted: #64748b;
        --ad-primary: #2563eb;
        --ad-primary-hover: #1d4ed8;
        --ad-primary-soft: #eff6ff;
        --ad-navbar-height: 68px;
      }

      body.aspri-dark {
        --ad-bg: #0b0f19;
        --ad-surface: #111827;
        --ad-surface-alt: #1e293b;
        --ad-border: #1f2937;
        --ad-text: #f8fafc;
        --ad-text-muted: #94a3b8;
        --ad-primary: #3b82f6;
        --ad-primary-soft: rgba(59, 130, 246, 0.16);
      }

      body {
        font-family: 'Inter', 'Poppins', -apple-system, BlinkMacSystemFont, sans-serif !important;
        background-color: var(--ad-bg) !important;
        color: var(--ad-text) !important;
      }

      .content-wrapper {
        background: var(--ad-bg) !important;
      }

      /* --- Animated Numbers & Loading Screen (100% Dipertahankan) --- */
      .animated-number {
        display: inline-block;
        opacity: 0;
        transform: translateY(20px);
        transition: all 0.5s ease-out;
      }
      .animated-number.visible {
        opacity: 1;
        transform: translateY(0);
      }

      #loading {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: rgba(15, 23, 42, 0.65);
        backdrop-filter: blur(4px);
        display: flex;
        justify-content: center;
        align-items: center;
        font-size: 18px;
        font-weight: 600;
        font-family: 'Inter', sans-serif;
        color: #fff;
        z-index: 9999;
      }

      #content {
        display: none;
      }

      .dark-svg {
        filter: brightness(0.5);
        opacity: 0.8;
      }

      /* --- Modern Card (Dipertahankan) --- */
      .modern-card {
        border-radius: 1rem;
        border: 1px solid var(--ad-border);
        background: var(--ad-surface);
        box-shadow: 0 10px 30px rgba(15, 23, 42, 0.06);
      }
      .modern-card .stat-title {
        font-size: 0.82rem;
        text-transform: uppercase;
        letter-spacing: 0.08em;
        color: var(--ad-text-muted);
        margin-bottom: 0.25rem;
      }
      .modern-card .stat-label {
        font-size: 0.95rem;
        font-weight: 600;
        color: var(--ad-text);
      }
      .modern-card .stat-value {
        font-size: 1.8rem;
        font-weight: 700;
        color: var(--ad-text);
      }
      .modern-card .stat-sub {
        font-size: 0.8rem;
        color: var(--ad-text-muted);
      }
      .stat-icon-pill {
        width: 38px;
        height: 38px;
        border-radius: 10px;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        background: var(--ad-primary-soft);
        color: var(--ad-primary);
        font-size: 18px;
      }
      .page-title-icon-modern {
        width: 40px;
        height: 40px;
        border-radius: 10px;
        background: var(--ad-primary);
        display: inline-flex;
        align-items: center;
        justify-content: center;
        color: #fff;
      }

      /* ==========================================================================
         1. TOP NAVBAR — Seragam Putih Bersih (Logo ASPRI menyatu sempurna)
         ========================================================================== */
      html body .navbar.default-layout-navbar,
      html body .navbar-modern {
        height: var(--ad-navbar-height) !important;
        background: var(--ad-surface) !important;
        border-bottom: 1px solid var(--ad-border) !important;
        box-shadow: 0 1px 3px rgba(15, 23, 42, 0.04) !important;
      }

      html body .navbar.default-layout-navbar .navbar-brand-wrapper {
        background: var(--ad-surface) !important;
        border-right: 1px solid var(--ad-border) !important;
        border-bottom: none !important;
        height: var(--ad-navbar-height) !important;
        padding: 0 1.25rem !important;
      }

      html body .navbar.default-layout-navbar .navbar-brand-wrapper .navbar-brand img {
        height: 36px !important;
        width: auto !important;
        max-width: 165px !important;
        object-fit: contain !important;
      }

      html body .navbar.default-layout-navbar .navbar-menu-wrapper {
        background: var(--ad-surface) !important;
        color: var(--ad-text) !important;
        height: var(--ad-navbar-height) !important;
        padding: 0 1.5rem !important;
      }

      html body .navbar.default-layout-navbar .navbar-toggler:not(.navbar-toggler-right) {
        width: 38px !important;
        height: 38px !important;
        border-radius: 10px !important;
        border: 1px solid var(--ad-border) !important;
        background: var(--ad-surface) !important;
        color: var(--ad-text) !important;
        display: inline-flex !important;
        align-items: center !important;
        justify-content: center !important;
        padding: 0 !important;
        box-shadow: none !important;
      }

      html body .navbar.default-layout-navbar .navbar-toggler:hover {
        background: var(--ad-surface-alt) !important;
        color: var(--ad-primary) !important;
      }

      /* Badge Status di sebelah tombol burger */
      .ad-header-badge {
        display: inline-flex;
        align-items: center;
        gap: 0.5rem;
        padding: 0.35rem 0.85rem;
        border-radius: 9999px;
        background: var(--ad-surface-alt);
        border: 1px solid var(--ad-border);
        font-size: 0.78rem;
        font-weight: 600;
        color: var(--ad-text-muted);
        margin-left: 0.75rem;
      }
      .ad-header-badge .pulse-dot {
        width: 8px;
        height: 8px;
        border-radius: 50%;
        background: #10b981;
        box-shadow: 0 0 0 3px rgba(16, 185, 129, 0.2);
      }

      /* Profile Dropdown di Navbar Kanan */
      html body .navbar.default-layout-navbar .navbar-nav .nav-item.nav-profile .nav-link {
        display: inline-flex !important;
        align-items: center !important;
        gap: 0.65rem !important;
        padding: 0.35rem 0.75rem 0.35rem 0.45rem !important;
        border-radius: 10px !important;
        border: 1px solid var(--ad-border) !important;
        background: var(--ad-surface) !important;
      }
      html body .navbar.default-layout-navbar .nav-profile-img {
        width: 32px !important;
        height: 32px !important;
      }
      html body .navbar.default-layout-navbar .nav-profile-img img {
        width: 32px !important;
        height: 32px !important;
        border-radius: 8px !important;
        object-fit: cover !important;
      }
      html body .navbar.default-layout-navbar .nav-profile-text p {
        font-size: 0.82rem !important;
        font-weight: 700 !important;
        color: var(--ad-text) !important;
        margin: 0 !important;
      }

      /* ==========================================================================
         2. SIDEBAR (#sidebar) — Clean AppDashboard Light Surface (Anti-Bentrok!)
         ========================================================================== */
      html body .sidebar,
      html body #sidebar.sidebar,
      html body .sidebar-offcanvas,
      html body .sidebar-modern {
        background: var(--ad-surface) !important;
        border-right: 1px solid var(--ad-border) !important;
        padding-top: 0.85rem !important;
        box-shadow: none !important;
      }

      html body #sidebar.sidebar .nav {
        padding: 0 0.75rem 1.5rem 0.75rem !important;
      }

      /* Kartu Profil di Sidebar */
      html body #sidebar.sidebar .nav .nav-item.nav-profile {
        margin: 0 0 0.75rem 0 !important;
        border-radius: 12px !important;
        background: var(--ad-surface-alt) !important;
        border: 1px solid var(--ad-border) !important;
        padding: 0 !important;
      }

      html body #sidebar.sidebar .nav .nav-item.nav-profile .nav-link {
        padding: 0.75rem 0.85rem !important;
        display: flex !important;
        align-items: center !important;
        gap: 0.75rem !important;
        background: transparent !important;
        border: none !important;
        box-shadow: none !important;
      }

      html body #sidebar.sidebar .nav .nav-item.nav-profile .nav-profile-image {
        width: 40px !important;
        height: 40px !important;
        flex-shrink: 0 !important;
      }

      html body #sidebar.sidebar .nav .nav-item.nav-profile .nav-profile-image img {
        width: 40px !important;
        height: 40px !important;
        border-radius: 10px !important;
        object-fit: cover !important;
        border: 1px solid var(--ad-border) !important;
      }

      html body #sidebar.sidebar .nav .nav-item.nav-profile .nav-profile-text span.font-weight-bold {
        color: var(--ad-text) !important;
        font-size: 0.85rem !important;
        font-weight: 700 !important;
        margin-bottom: 2px !important;
      }

      html body #sidebar.sidebar .nav .nav-item.nav-profile .nav-profile-text span.text-secondary {
        color: var(--ad-primary) !important;
        font-size: 0.72rem !important;
        font-weight: 600 !important;
      }

      /* Label Kategori Menu (MENU INTERNAL, MENU BENDAHARA) */
      html body #sidebar.sidebar .nav .nav-item.menu-label,
      html body .menu-label {
        background: transparent !important;
        border: none !important;
        color: #94a3b8 !important;
        font-size: 0.68rem !important;
        font-weight: 700 !important;
        text-transform: uppercase !important;
        letter-spacing: 0.08em !important;
        text-align: left !important;
        padding: 0.9rem 0.75rem 0.35rem 0.75rem !important;
        margin: 0 !important;
      }
      html body #sidebar.sidebar .nav .nav-item.menu-label i {
        font-style: normal !important;
      }

      /* Item Navigasi Sidebar (Menghapus border putih aneh dari aspri-modern.css) */
      html body #sidebar.sidebar .nav .nav-item {
        padding: 0 !important;
        margin: 2px 0 !important;
      }

      html body #sidebar.sidebar .nav .nav-item .nav-link {
        display: flex !important;
        align-items: center !important;
        justify-content: space-between !important;
        padding: 0.65rem 0.85rem !important;
        margin: 0 !important;
        border-radius: 10px !important;
        border: 1px solid transparent !important;
        outline: none !important;
        background: transparent !important;
        color: #475569 !important;
        font-size: 0.86rem !important;
        font-weight: 500 !important;
        box-shadow: none !important;
        transition: all 0.15s ease !important;
      }

      body.aspri-dark #sidebar.sidebar .nav .nav-item .nav-link {
        color: #cbd5e1 !important;
      }

      html body #sidebar.sidebar .nav .nav-item .nav-link .menu-title {
        color: inherit !important;
        font-size: 0.86rem !important;
        font-weight: 500 !important;
        line-height: 1.3 !important;
      }

      /* Ikon Menu (Menggunakan ikon MDI standar agar semua muncul di versi lama & baru) */
      html body #sidebar.sidebar .nav .nav-item .nav-link i.menu-icon {
        font-size: 1.15rem !important;
        color: #64748b !important;
        margin-left: auto !important;
        margin-right: 0 !important;
        opacity: 1 !important;
      }

      /* Hover State */
      html body #sidebar.sidebar .nav .nav-item .nav-link:hover {
        background: var(--ad-surface-alt) !important;
        color: var(--ad-primary) !important;
        border-color: transparent !important;
      }
      html body #sidebar.sidebar .nav .nav-item .nav-link:hover i.menu-icon,
      html body #sidebar.sidebar .nav .nav-item .nav-link:hover i.menu-arrow {
        color: var(--ad-primary) !important;
      }

      /* Active State — Tanpa Border Putih Kaku, Murni AppDashboard Soft Blue / Solid Blue */
      html body #sidebar.sidebar .nav .nav-item.active > .nav-link,
      html body #sidebar.sidebar .nav .nav-item .nav-link.active {
        background: var(--ad-primary) !important;
        color: #ffffff !important;
        border: 1px solid var(--ad-primary) !important;
        box-shadow: 0 4px 12px rgba(37, 99, 235, 0.25) !important;
      }

      html body #sidebar.sidebar .nav .nav-item.active > .nav-link .menu-title,
      html body #sidebar.sidebar .nav .nav-item .nav-link.active .menu-title,
      html body #sidebar.sidebar .nav .nav-item.active > .nav-link i.menu-icon,
      html body #sidebar.sidebar .nav .nav-item .nav-link.active i.menu-icon,
      html body #sidebar.sidebar .nav .nav-item.active > .nav-link i.menu-arrow {
        color: #ffffff !important;
        font-weight: 600 !important;
      }

      /* Saat Collapse Terbuka */
      html body #sidebar.sidebar .nav .nav-item .nav-link[aria-expanded="true"]:not(.active) {
        background: var(--ad-primary-soft) !important;
        color: var(--ad-primary) !important;
        border-color: transparent !important;
      }
      html body #sidebar.sidebar .nav .nav-item .nav-link[aria-expanded="true"]:not(.active) .menu-title,
      html body #sidebar.sidebar .nav .nav-item .nav-link[aria-expanded="true"]:not(.active) i.menu-icon,
      html body #sidebar.sidebar .nav .nav-item .nav-link[aria-expanded="true"]:not(.active) i.menu-arrow {
        color: var(--ad-primary) !important;
        font-weight: 600 !important;
      }

      /* Panah Collapse */
      html body #sidebar.sidebar .menu-arrow {
        margin-left: auto !important;
        margin-right: 0.4rem !important;
        color: #94a3b8 !important;
        transition: transform 0.2s ease !important;
      }
      html body #sidebar.sidebar .nav-link[aria-expanded="true"] .menu-arrow {
        transform: rotate(90deg) !important;
      }

      /* Sub-menu (#general-pages) */
      html body #sidebar.sidebar .nav .sub-menu {
        background: transparent !important;
        padding: 0.25rem 0 0.35rem 1rem !important;
        margin: 0.2rem 0 0.2rem 0.75rem !important;
        border-left: 2px solid var(--ad-border) !important;
      }

      html body #sidebar.sidebar .nav .sub-menu .nav-item .nav-link {
        padding: 0.45rem 0.75rem !important;
        font-size: 0.81rem !important;
        color: var(--ad-text-muted) !important;
        border-radius: 8px !important;
        border: none !important;
        box-shadow: none !important;
      }

      html body #sidebar.sidebar .nav .sub-menu .nav-item .nav-link::before {
        display: none !important;
      }

      html body #sidebar.sidebar .nav .sub-menu .nav-item .nav-link:hover,
      html body #sidebar.sidebar .nav .sub-menu .nav-item .nav-link.active {
        background: var(--ad-primary-soft) !important;
        color: var(--ad-primary) !important;
        font-weight: 600 !important;
      }
    </style>
  </head>

  <body>
    <div class="container-scroller">

      <!-- partial:partials/_navbar.html -->
      <nav class="navbar default-layout-navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
        <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
          <a class="navbar-brand" href="<?php echo base_url('internal'); ?>">
            <img src="/aspri/assets/img/aspri_white.png" alt="logo" />
          </a>
        </div>

        <div class="navbar-menu-wrapper d-flex align-items-stretch justify-content-between flex-grow-1">
          <div class="d-flex align-items-center">
            <button class="navbar-toggler align-self-center" type="button" data-toggle="minimize">
              <span class="mdi mdi-menu"></span>
            </button>
            <div class="ad-header-badge d-none d-md-inline-flex">
              <span class="pulse-dot"></span>
              <span>Dashboard Internal Aspri</span>
            </div>
          </div>

          <ul class="navbar-nav navbar-nav-right d-flex align-items-center">
            <!-- Tombol Mode Gelap / Terang -->
            <li class="nav-item me-2">
              <button type="button" onclick="toggleAspriTheme()" class="navbar-toggler" title="Mode Gelap / Terang">
                <i id="aspriThemeIcon" class="mdi mdi-weather-night"></i>
              </button>
            </li>

            <!-- Profile Dropdown -->
            <li class="nav-item nav-profile dropdown">
              <a class="nav-link dropdown-toggle" id="profileDropdown" href="#" data-bs-toggle="dropdown" aria-expanded="false">
                <div class="nav-profile-img">
                  <img src="/aspri/assets/img/dishub.png" alt="image">
                  <span class="availability-status online"></span>
                </div>
                <div class="nav-profile-text">
                  <p class="mb-1 text-black"><?php echo $this->session->userdata('nama') ? $this->session->userdata('nama') : 'Admin'; ?></p>
                </div>
              </a>
              <div class="dropdown-menu navbar-dropdown dropdown-menu-end" aria-labelledby="profileDropdown">
                <a class="dropdown-item" href="/aspri/dashboard">
                  <i class="mdi mdi-view-dashboard me-2 text-primary"></i> Dashboard Kolektor
                </a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="/aspri/Welcome/logout">
                  <i class="mdi mdi-logout me-2 text-danger"></i> Signout
                </a>
              </div>
            </li>
          </ul>

          <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
            <span class="mdi mdi-menu"></span>
          </button>
        </div>
      </nav>
      <!-- partial -->

      <div class="container-fluid page-body-wrapper">
        <!-- partial:partials/_sidebar.html -->
        <nav class="sidebar sidebar-offcanvas" id="sidebar">
          <ul class="nav">
            <li class="nav-item nav-profile">
              <a href="#" class="nav-link">
                <div class="nav-profile-image">
                  <img src="/aspri/assets/img/dishub.png" alt="profile">
                  <span class="login-status online"></span>
                </div>
                <div class="nav-profile-text d-flex flex-column">
                  <span class="font-weight-bold mb-1"><?php echo $this->session->userdata('nama'); ?></span>
                  <span class="text-secondary text-small"><?php echo $this->session->userdata('jabatan'); ?></span>
                </div>
                <i class="mdi mdi-bookmark-check text-primary nav-profile-badge ms-auto"></i>
              </a>
            </li>

            <li class="nav-item menu-label"><i>Menu Internal</i></li>

            <li class="nav-item">
              <a class="nav-link" href="<?php echo base_url('internal'); ?>">
                <span class="menu-title">Dashboard</span>
                <i class="mdi mdi-home menu-icon"></i>
              </a>
            </li>

            <!-- <li class="nav-item">
              <a class="nav-link" href="pages/charts/chartjs.html">
                <span class="menu-title">Kolektor Lapangan</span>
                <i class="mdi mdi-chart-bar menu-icon"></i>
              </a>
            </li> -->

            <li class="nav-item">
              <a class="nav-link" href="<?php echo base_url('petugas/non_admin'); ?>">
                <span class="menu-title">Juru Parkir</span>
                <i class="mdi mdi-contacts menu-icon"></i>
              </a>
            </li>

            <!-- <li class="nav-item">
              <a class="nav-link" href="<?php echo base_url('SuratKeluar'); ?>">
                <span class="menu-title">Pembuatan Surat Tugas</span>
                <i class="mdi mdi-star menu-icon"></i>
              </a>
            </li> -->
            <!-- <li class="nav-item">
              <a class="nav-link" href="<?php echo base_url('Sts'); ?>">
                <span class="menu-title">Pembuatan Setoran Bank</span>
                <i class="mdi mdi-file-document-edit menu-icon"></i>
              </a>
            </li> -->

            <li class="nav-item menu-label"><i>Menu Bendahara</i></li>

            <li class="nav-item">
              <a class="nav-link" data-bs-toggle="collapse" href="#general-pages" aria-expanded="false" aria-controls="general-pages">
                <span class="menu-title">Rekap Pendapatan Struk</span>
                <i class="menu-arrow"></i>
                <i class="mdi mdi-medical-bag menu-icon"></i>
              </a>
              <div class="collapse" id="general-pages">
                <ul class="nav flex-column sub-menu">
                  <li class="nav-item">
                    <a class="nav-link" href="<?php echo base_url('/kalender_setoran');?>"> Kalender Setoran </a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="<?php echo base_url('/pendapatan_harian');?>?tanggal=<?php echo date('Y-m-d'); ?>"> Setoran Harian </a>
                  </li>
                  <?php if ($this->session->userdata('jabatan') == 'Superadmin') : ?>
                  <li class="nav-item">
                    <a class="nav-link" href="<?php echo base_url('/Jukir/Setoran');?>"> Rekapan Setoran Bulanan </a>
                  </li>
                  <?php endif; ?>
                </ul>
              </div>
            </li>

            <?php if ($this->session->userdata('jabatan') == 'Superadmin') : ?>
            <li class="nav-item">
              <a class="nav-link" href="<?php echo base_url('kolektor'); ?>">
                <span class="menu-title">Data Juru Parkir</span>
                <i class="mdi mdi-contacts menu-icon"></i>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="<?php echo base_url('petugas/list_user'); ?>">
                <span class="menu-title">Data Pengguna Aplikasi</span>
                <i class="mdi mdi-format-list-bulleted menu-icon"></i>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">
                <span class="menu-title">Data Lokasi</span>
                <i class="mdi mdi-map-marker menu-icon"></i>
              </a>
            </li>
            <?php endif; ?>
          </ul>
        </nav>

        <script>
          function showAlert() {
            Swal.fire({
              title: 'Halaman The Best Kolektor akan segera hadir!',
              icon: 'info',
              confirmButtonText: 'OK'
            });
          }

          window.onload = function() {
            var loadingEl = document.getElementById('loading');
            var contentEl = document.getElementById('content');
            if (loadingEl) loadingEl.style.display = 'none';
            if (contentEl) contentEl.style.display = 'block';
          };

          $(document).on('click', '.btn-detail', function () {
            let id = $(this).data('id');

            $('#detailModal').modal('show');
            $('#modalDetailContent').html('<div class="text-center py-5">Loading...</div>');

            $.get('<?= base_url("jukir/harian_ajax") ?>/' + id, function (res) {
              $('#modalDetailContent').html(res);
            });
          });

          function toggleAspriTheme() {
            document.body.classList.toggle('aspri-dark');
            var isDark = document.body.classList.contains('aspri-dark');
            var icon = document.getElementById('aspriThemeIcon');
            if (icon) {
              icon.className = isDark ? 'mdi mdi-weather-sunny text-warning' : 'mdi mdi-weather-night';
            }
            try {
              localStorage.setItem('aspri_theme', isDark ? 'dark' : 'light');
            } catch (e) {}
          }

          (function() {
            try {
              if (localStorage.getItem('aspri_theme') === 'dark') {
                document.body.classList.add('aspri-dark');
                var icon = document.getElementById('aspriThemeIcon');
                if (icon) icon.className = 'mdi mdi-weather-sunny text-warning';
              }
            } catch (e) {}
          })();
        </script>