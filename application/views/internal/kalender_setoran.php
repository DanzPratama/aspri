
    <style>
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
        --ad-sidebar-width: 265px;
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

      * {
        box-sizing: border-box;
      }

      body {
        font-family: 'Inter', 'Poppins', -apple-system, BlinkMacSystemFont, sans-serif;
        background-color: var(--ad-bg);
        color: var(--ad-text);
        margin: 0;
        overflow-x: hidden;
      }

      /* Navbar & Clean Light Sidebar */
      .navbar.default-layout-navbar {
        height: var(--ad-navbar-height);
        background: var(--ad-surface);
        border-bottom: 1px solid var(--ad-border);
        z-index: 1030;
      }
      .navbar-brand-wrapper {
        width: var(--ad-sidebar-width);
        height: var(--ad-navbar-height);
        background: var(--ad-surface);
        border-right: 1px solid var(--ad-border);
        padding: 0 1.25rem;
        flex-shrink: 0;
      }
      .navbar-menu-wrapper {
        height: var(--ad-navbar-height);
        padding: 0 1.5rem;
        flex-grow: 1;
      }
      .navbar-toggler-btn {
        width: 38px;
        height: 38px;
        border-radius: 10px;
        border: 1px solid var(--ad-border);
        background: var(--ad-surface);
        color: var(--ad-text);
        display: inline-flex;
        align-items: center;
        justify-content: center;
        cursor: pointer;
      }
      .ad-header-badge {
        display: inline-flex;
        align-items: center;
        gap: 0.5rem;
        padding: 0.35rem 0.85rem;
        border-radius: 9999px;
        background: var(--ad-surface-alt);
        border: 1px solid var(--ad-border);
        font-size: 0.76rem;
        font-weight: 600;
        color: var(--ad-text-muted);
      }
      .ad-header-badge .pulse-dot {
        width: 8px;
        height: 8px;
        border-radius: 50%;
        background: #10b981;
        box-shadow: 0 0 0 3px rgba(16, 185, 129, 0.2);
      }

      .page-body-wrapper {
        padding-top: var(--ad-navbar-height);
        display: flex;
        min-height: 100vh;
      }

      .sidebar {
        width: var(--ad-sidebar-width);
        background: var(--ad-surface);
        border-right: 1px solid var(--ad-border);
        padding: 0.85rem 0.75rem 1.5rem 0.75rem;
        flex-shrink: 0;
      }

      .sidebar .nav-profile-card {
        margin-bottom: 0.75rem;
        padding: 0.75rem;
        border-radius: 12px;
        background: var(--ad-surface-alt);
        border: 1px solid var(--ad-border);
        display: flex;
        align-items: center;
        gap: 0.75rem;
      }

      .sidebar .menu-label {
        color: #94a3b8;
        font-size: 0.68rem;
        font-weight: 700;
        text-transform: uppercase;
        letter-spacing: 0.08em;
        padding: 0.9rem 0.75rem 0.35rem 0.75rem;
        list-style: none;
      }
      .sidebar .menu-label i {
        font-style: normal;
      }

      .sidebar .nav-item {
        list-style: none;
        margin: 2px 0;
      }
      .sidebar .nav-link {
        display: flex;
        align-items: center;
        justify-content: space-between;
        padding: 0.65rem 0.85rem;
        border-radius: 10px;
        color: #475569;
        font-size: 0.86rem;
        font-weight: 500;
        text-decoration: none;
        cursor: pointer;
      }
      body.aspri-dark .sidebar .nav-link {
        color: #cbd5e1;
      }
      .sidebar .nav-link:hover {
        background: var(--ad-surface-alt);
        color: var(--ad-primary);
      }
      .sidebar .nav-link.active {
        background: var(--ad-primary);
        color: #ffffff !important;
        box-shadow: 0 4px 12px rgba(37, 99, 235, 0.25);
      }
      .sidebar .sub-menu {
        padding: 0.25rem 0 0.35rem 1rem;
        margin: 0.2rem 0 0.2rem 0.75rem;
        border-left: 2px solid var(--ad-border);
        list-style: none;
      }
      .sidebar .sub-menu .nav-link {
        padding: 0.45rem 0.75rem;
        font-size: 0.81rem;
      }
      .sidebar .sub-menu .nav-link.active-sub {
        background: var(--ad-primary-soft);
        color: var(--ad-primary) !important;
        font-weight: 700;
      }

      .main-panel {
        flex-grow: 1;
        min-width: 0;
      }

      /* ==========================================================================
         KALENDER SETORAN STYLES (Identical to kalender_setoran_redesigned.php)
         ========================================================================== */
      .main-panel .content-wrapper {
        background: var(--ad-bg, #f8fafc) !important;
        padding: 28px 28px !important;
      }

      .calendar-page {
        --cal-primary: #2563eb;
        --cal-primary-hover: #1d4ed8;
        --cal-primary-soft: rgba(37, 99, 235, 0.1);
        --cal-green: #10b981;
        --cal-green-dark: #059669;
        --cal-green-soft: #ecfdf5;
        --cal-green-border: #a7f3d0;
        --cal-surface: #ffffff;
        --cal-surface-alt: #f8fafc;
        --cal-text: #0f172a;
        --cal-muted: #64748b;
        --cal-border: #e2e8f0;
        color: var(--cal-text);
        font-family: 'Inter', 'Poppins', -apple-system, BlinkMacSystemFont, sans-serif;
      }

      body.aspri-dark .calendar-page {
        --cal-surface: #111827;
        --cal-surface-alt: #1e293b;
        --cal-text: #f8fafc;
        --cal-muted: #94a3b8;
        --cal-border: #1f2937;
        --cal-green-soft: rgba(16, 185, 129, 0.14);
        --cal-green-border: rgba(16, 185, 129, 0.35);
      }

      .calendar-page .breadcrumb {
        background: transparent;
        padding: 0;
        margin-bottom: 1.25rem;
        font-size: 0.78rem;
        font-weight: 600;
        display: flex;
        align-items: center;
        gap: 0.35rem;
      }
      .calendar-page .breadcrumb a {
        color: var(--cal-primary);
        text-decoration: none;
      }

      .calendar-page .cal-kpi-grid {
        display: grid;
        grid-template-columns: repeat(4, minmax(0, 1fr));
        gap: 16px;
        margin-bottom: 20px;
      }
      .calendar-page .cal-kpi-card {
        background: var(--cal-surface);
        border: 1px solid var(--cal-border);
        border-radius: 14px;
        padding: 18px 20px;
        box-shadow: 0 1px 3px rgba(15, 23, 42, 0.03), 0 4px 14px rgba(15, 23, 42, 0.03);
        display: flex;
        align-items: flex-start;
        justify-content: space-between;
        gap: 12px;
        transition: transform 0.18s ease, box-shadow 0.18s ease;
      }
      .calendar-page .cal-kpi-card:hover {
        transform: translateY(-2px);
        box-shadow: 0 10px 24px -6px rgba(15, 23, 42, 0.08);
      }
      .calendar-page .cal-kpi-label {
        font-size: 11px;
        font-weight: 700;
        text-transform: uppercase;
        letter-spacing: 0.06em;
        color: var(--cal-muted);
        margin-bottom: 6px;
      }
      .calendar-page .cal-kpi-val {
        font-size: 1.25rem;
        font-weight: 800;
        letter-spacing: -0.02em;
        color: var(--cal-text);
        line-height: 1.2;
      }
      .calendar-page .cal-kpi-sub {
        font-size: 11px;
        color: var(--cal-muted);
        margin-top: 4px;
        font-weight: 500;
      }
      .calendar-page .cal-kpi-icon {
        width: 40px;
        height: 40px;
        border-radius: 11px;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        font-size: 19px;
        flex-shrink: 0;
      }

      .calendar-page .calendar-card {
        background: var(--cal-surface);
        border: 1px solid var(--cal-border);
        border-radius: 16px;
        box-shadow: 0 4px 24px -4px rgba(15, 23, 42, 0.05);
        overflow: hidden;
      }
      .calendar-page .calendar-header {
        display: flex;
        align-items: center;
        justify-content: space-between;
        flex-wrap: wrap;
        gap: 16px;
        padding: 22px 26px;
        border-bottom: 1px solid var(--cal-border);
        background: linear-gradient(90deg, rgba(37, 99, 235, 0.04) 0%, transparent 100%);
      }
      .calendar-page .eyebrow {
        display: inline-flex;
        align-items: center;
        gap: 6px;
        padding: 4px 10px;
        border-radius: 999px;
        background: var(--cal-primary-soft);
        color: var(--cal-primary);
        text-transform: uppercase;
        letter-spacing: 0.08em;
        font-size: 10px;
        font-weight: 800;
        margin-bottom: 8px;
      }
      .calendar-page .eyebrow-dot {
        width: 6px;
        height: 6px;
        border-radius: 50%;
        background: var(--cal-primary);
      }
      .calendar-page .page-title {
        font-size: 22px;
        line-height: 1.25;
        font-weight: 800;
        letter-spacing: -0.02em;
        margin: 0;
        color: var(--cal-text);
      }
      .calendar-page .page-description {
        color: var(--cal-muted);
        font-size: 12.5px;
        margin: 4px 0 0;
      }
      .calendar-page .calendar-content {
        padding: 22px 26px 26px;
      }

      .calendar-page .calendar-nav {
        display: flex;
        align-items: center;
        justify-content: space-between;
        flex-wrap: wrap;
        gap: 12px;
        margin-bottom: 18px;
        padding: 10px 14px;
        background: var(--cal-surface-alt);
        border: 1px solid var(--cal-border);
        border-radius: 12px;
      }
      .calendar-page .month-label-wrap {
        display: flex;
        align-items: center;
        gap: 10px;
      }
      .calendar-page .month-label {
        font-size: 17px;
        font-weight: 800;
        margin: 0;
        color: var(--cal-text);
      }
      .calendar-page .nav-month-btn {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        gap: 6px;
        border: 1px solid var(--cal-border);
        border-radius: 9px;
        background: var(--cal-surface);
        color: var(--cal-text);
        padding: 8px 14px;
        font-size: 12px;
        font-weight: 600;
        cursor: pointer;
        transition: all 0.15s ease;
      }
      .calendar-page .nav-month-btn:hover {
        background: var(--cal-primary);
        border-color: var(--cal-primary);
        color: #ffffff;
      }
      .calendar-page .nav-today-btn {
        display: inline-flex;
        align-items: center;
        gap: 5px;
        border: 1px solid rgba(37, 99, 235, 0.25);
        border-radius: 9px;
        background: var(--cal-primary-soft);
        color: var(--cal-primary);
        padding: 8px 12px;
        font-size: 12px;
        font-weight: 700;
        cursor: pointer;
        transition: all 0.15s ease;
      }
      .calendar-page .nav-today-btn:hover {
        background: var(--cal-primary);
        color: #ffffff;
      }

      .calendar-page .calendar-scroll {
        width: 100%;
        overflow-x: auto;
        border: 1px solid var(--cal-border);
        border-radius: 14px;
        background: var(--cal-surface);
      }
      .calendar-page table.calendar {
        width: 100%;
        min-width: 640px;
        table-layout: fixed;
        border-collapse: separate;
        border-spacing: 0;
        margin: 0;
      }
      .calendar-page .calendar th {
        background: var(--cal-surface-alt);
        color: var(--cal-muted);
        font-size: 11px;
        font-weight: 800;
        letter-spacing: 0.06em;
        text-transform: uppercase;
        text-align: center;
        padding: 13px 8px;
        border: 0;
        border-bottom: 1px solid var(--cal-border);
        border-right: 1px solid var(--cal-border);
      }
      .calendar-page .calendar th:first-child {
        color: #ef4444;
      }
      .calendar-page .calendar td {
        height: 112px;
        vertical-align: top;
        text-align: left;
        padding: 10px;
        border: 0;
        border-right: 1px solid var(--cal-border);
        border-bottom: 1px solid var(--cal-border);
        background: var(--cal-surface);
        transition: all 0.16s ease;
      }
      .calendar-page .calendar td:last-child,
      .calendar-page .calendar th:last-child {
        border-right: 0;
      }
      .calendar-page .calendar tbody tr:last-child td {
        border-bottom: 0;
      }
      .calendar-page .calendar td.empty-day {
        background: rgba(148, 163, 184, 0.04);
      }

      .calendar-page .day-header-row {
        display: flex;
        align-items: center;
        justify-content: space-between;
        width: 100%;
      }
      .calendar-page .day-number {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        width: 28px;
        height: 28px;
        border-radius: 8px;
        color: var(--cal-text);
        font-size: 12px;
        font-weight: 700;
      }
      .calendar-page .calendar td.is-today {
        box-shadow: inset 0 0 0 2px var(--cal-primary);
      }
      .calendar-page .calendar td.is-today .day-number {
        background: var(--cal-primary);
        color: #ffffff;
      }
      .calendar-page .today-tag {
        font-size: 9px;
        font-weight: 800;
        text-transform: uppercase;
        padding: 2px 6px;
        border-radius: 999px;
        background: var(--cal-primary-soft);
        color: var(--cal-primary);
      }

      .calendar-page .calendar td.has-setoran {
        background: var(--cal-green-soft);
      }
      .calendar-page .calendar td.has-setoran:hover {
        background: #d1fae5;
        transform: translateY(-1px);
        box-shadow: 0 6px 16px rgba(16, 185, 129, 0.12);
      }
      body.aspri-dark .calendar-page .calendar td.has-setoran:hover {
        background: rgba(16, 185, 129, 0.24);
      }
      .calendar-page .calendar .has-setoran a {
        display: flex;
        flex-direction: column;
        justify-content: space-between;
        align-items: flex-start;
        gap: 8px;
        width: 100%;
        height: 100%;
        color: inherit;
        text-decoration: none;
      }
      .calendar-page .has-setoran .day-number {
        background: var(--cal-green-dark);
        color: #ffffff;
      }
      .calendar-page .deposit-badge-wrap {
        width: 100%;
        margin-top: auto;
        padding: 5px 8px;
        border-radius: 8px;
        background: rgba(255, 255, 255, 0.85);
        border: 1px solid var(--cal-green-border);
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 4px;
      }
      body.aspri-dark .calendar-page .deposit-badge-wrap {
        background: rgba(17, 24, 39, 0.75);
      }
      .calendar-page .deposit-amount {
        color: #047857;
        font-size: 11px;
        font-weight: 800;
      }
      body.aspri-dark .calendar-page .deposit-amount {
        color: #6ee7b7;
      }
      .calendar-page .deposit-arrow {
        font-size: 11px;
        color: #059669;
      }

      .calendar-page .calendar-legend {
        display: flex;
        align-items: center;
        justify-content: space-between;
        flex-wrap: wrap;
        gap: 12px;
        margin-top: 16px;
        padding-top: 14px;
        border-top: 1px dashed var(--cal-border);
        font-size: 11.5px;
        color: var(--cal-muted);
      }
      .calendar-page .legend-items {
        display: flex;
        align-items: center;
        flex-wrap: wrap;
        gap: 16px;
      }
      .calendar-page .legend-item {
        display: inline-flex;
        align-items: center;
        gap: 7px;
      }
      .calendar-page .legend-dot {
        width: 10px;
        height: 10px;
        border-radius: 3px;
        background: var(--cal-green-dark);
      }
      .calendar-page .legend-dot-today {
        width: 10px;
        height: 10px;
        border-radius: 3px;
        border: 2px solid var(--cal-primary);
      }

      .calendar-page .total-card {
        display: flex;
        align-items: center;
        justify-content: space-between;
        flex-wrap: wrap;
        gap: 16px;
        margin-top: 20px;
        padding: 22px 24px;
        border: 1px solid var(--cal-green-border);
        border-radius: 14px;
        background: linear-gradient(110deg, var(--cal-green-soft) 0%, var(--cal-surface) 100%);
      }
      .calendar-page .total-label {
        color: #047857;
        font-size: 12px;
        font-weight: 700;
        text-transform: uppercase;
        letter-spacing: 0.05em;
        margin-bottom: 4px;
      }
      body.aspri-dark .calendar-page .total-label {
        color: #6ee7b7;
      }
      .calendar-page .total-value {
        color: #065f46;
        font-size: clamp(22px, 3vw, 28px);
        font-weight: 800;
      }
      body.aspri-dark .calendar-page .total-value {
        color: #ecfdf5;
      }
      .calendar-page .total-icon {
        display: flex;
        align-items: center;
        justify-content: center;
        width: 52px;
        height: 52px;
        border-radius: 14px;
        background: #10b981;
        color: #ffffff;
        font-size: 24px;
      }

      pre.php-code-box {
        background: #0f172a;
        color: #e2e8f0;
        border-radius: 0.75rem;
        padding: 1.25rem;
        font-size: 0.78rem;
        line-height: 1.55;
        max-height: 520px;
        overflow: auto;
      }

      @media (max-width: 991px) {
        .sidebar { display: none; }
        .calendar-page .cal-kpi-grid { grid-template-columns: repeat(2, 1fr); }
      }
    </style>
  </head>

  <body>
    <div id="content" class="container-scroller">

      <!-- TOP NAVBAR -->
      <nav class="navbar default-layout-navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
        <div class="navbar-brand-wrapper d-flex align-items-center justify-content-between">
          <a class="navbar-brand d-flex align-items-center gap-2 text-decoration-none" href="#content">
            <div class="d-flex align-items-center justify-content-center rounded-3 bg-primary text-white fw-bold" style="width:34px;height:34px;">
              <i class="mdi mdi-parking fs-5"></i>
            </div>
            <span class="fw-extrabold text-dark" style="font-size:1.05rem;letter-spacing:-0.02em;color:var(--ad-text) !important;">ASPRI</span>
          </a>
        </div>

        <div class="navbar-menu-wrapper d-flex align-items-center justify-content-between">
          <div class="d-flex align-items-center gap-2">
            <div class="ad-header-badge">
              <span class="pulse-dot"></span>
              <span>Rekap Pendapatan Struk / Kalender Setoran</span>
            </div>
          </div>

          <div class="d-flex align-items-center gap-2">
            <button type="button" onclick="openKalenderPhpModal()" class="btn btn-primary btn-sm rounded-3 px-3 py-1.5 fw-semibold d-flex align-items-center gap-1" style="font-size:0.78rem;">
              <i class="mdi mdi-code-tags"></i>
              <span>Lihat / Salin Kode PHP Kalender</span>
            </button>

            <button type="button" onclick="toggleAspriTheme()" class="navbar-toggler-btn" title="Mode Gelap / Terang">
              <i id="aspriThemeIcon" class="mdi mdi-weather-night fs-5"></i>
            </button>
          </div>
        </div>
      </nav>

      <!-- PAGE BODY -->
      <div class="page-body-wrapper">

    
        <!-- MAIN PANEL: REDESIGNED KALENDER SETORAN -->
        <div class="main-panel">
          <div class="content-wrapper calendar-page">

            <nav aria-label="breadcrumb">
              <ol class="breadcrumb">
                <li class="breadcrumb-item">
                  <a href="#content"><i class="mdi mdi-home-outline me-1"></i>Dashboard</a>
                </li>
                <li class="breadcrumb-item">Rekap Pendapatan Struk</li>
                <li class="breadcrumb-item active" aria-current="page">Kalender Setoran</li>
              </ol>
            </nav>

            <!-- Dynamic Monthly KPI Summary Strip -->
            <div class="cal-kpi-grid">
              <div class="cal-kpi-card">
                <div>
                  <div class="cal-kpi-label">Total Setoran Bulan Ini</div>
                  <div id="kpiMonthTotal" class="cal-kpi-val">Rp 0</div>
                  <div id="kpiMonthNameSub" class="cal-kpi-sub">Akumulasi bulan berjalan</div>
                </div>
                <div class="cal-kpi-icon" style="background: rgba(16, 185, 129, 0.12); color: #059669;">
                  <i class="mdi mdi-cash-multiple"></i>
                </div>
              </div>

              <div class="cal-kpi-card">
                <div>
                  <div class="cal-kpi-label">Hari Aktif Setoran</div>
                  <div id="kpiActiveDays" class="cal-kpi-val">0 Hari</div>
                  <div id="kpiActiveRatioSub" class="cal-kpi-sub">Dari total hari kalender</div>
                </div>
                <div class="cal-kpi-icon" style="background: rgba(37, 99, 235, 0.12); color: #2563eb;">
                  <i class="mdi mdi-calendar-check"></i>
                </div>
              </div>

              <div class="cal-kpi-card">
                <div>
                  <div class="cal-kpi-label">Rata-rata Setoran / Hari</div>
                  <div id="kpiAvgDaily" class="cal-kpi-val">Rp 0</div>
                  <div class="cal-kpi-sub">Rata-rata pada hari aktif</div>
                </div>
                <div class="cal-kpi-icon" style="background: rgba(139, 92, 246, 0.12); color: #7c3aed;">
                  <i class="mdi mdi-chart-line"></i>
                </div>
              </div>

              <div class="cal-kpi-card">
                <div>
                  <div class="cal-kpi-label">Setoran Tertinggi</div>
                  <div id="kpiMaxDaily" class="cal-kpi-val">Rp 0</div>
                  <div id="kpiMaxDateSub" class="cal-kpi-sub">Belum ada setoran</div>
                </div>
                <div class="cal-kpi-icon" style="background: rgba(245, 158, 11, 0.14); color: #d97706;">
                  <i class="mdi mdi-trophy-outline"></i>
                </div>
              </div>
            </div>

            <!-- Main Calendar Card -->
            <section class="calendar-card">
              <header class="calendar-header">
                <div>
                  <div class="eyebrow">
                    <span class="eyebrow-dot"></span>
                    <span>ASPRI · Operasional Bendahara</span>
                  </div>
                  <h1 class="page-title">Kalender Setoran Harian</h1>
                  <p class="page-description">
                    Pantau realisasi dan periksa rincian setoran retribusi parkir harian berdasarkan tanggal.
                  </p>
                </div>

                <div class="d-flex align-items-center gap-2">
                  <button type="button" id="jumpTodayBtn" class="nav-today-btn" title="Kembali ke Bulan Ini">
                    <i class="mdi mdi-calendar-today"></i>
                    <span>Bulan Ini</span>
                  </button>
                </div>
              </header>

              <div class="calendar-content">
                <div class="calendar-nav">
                  <button type="button" id="prevMonth" class="nav-month-btn">
                    <i class="bi bi-chevron-left"></i>
                    <span>Sebelumnya</span>
                  </button>

                  <div class="month-label-wrap">
                    <i class="mdi mdi-calendar-month text-primary fs-5"></i>
                    <h2 id="currentMonth" class="month-label"></h2>
                  </div>

                  <button type="button" id="nextMonth" class="nav-month-btn">
                    <span>Berikutnya</span>
                    <i class="bi bi-chevron-right"></i>
                  </button>
                </div>

                <div class="calendar-scroll">
                  <table class="calendar" aria-label="Kalender setoran bulanan">
                    <thead>
                      <tr>
                        <th scope="col">Min</th>
                        <th scope="col">Sen</th>
                        <th scope="col">Sel</th>
                        <th scope="col">Rab</th>
                        <th scope="col">Kam</th>
                        <th scope="col">Jum</th>
                        <th scope="col">Sab</th>
                      </tr>
                    </thead>
                    <tbody id="calendar-body"></tbody>
                  </table>
                </div>

                <div class="calendar-legend">
                  <div class="legend-items">
                    <span class="legend-item">
                      <span class="legend-dot"></span>
                      <span>Tanggal dengan setoran masuk (klik untuk detail harian)</span>
                    </span>
                    <span class="legend-item">
                      <span class="legend-dot-today"></span>
                      <span>Tanggal hari ini</span>
                    </span>
                  </div>
                  <span class="fw-semibold">Klik nominal hijau untuk membuka rincian per juru parkir</span>
                </div>

                <div id="totalDeposit" aria-live="polite"></div>
              </div>
            </section>

            <footer class="mt-4 d-flex justify-content-between flex-wrap gap-2 text-muted" style="font-size:11.5px">
              <span>© 2026 ASPRI · Sistem Informasi Parkir</span>
              <span>Developed by <strong>DaNzDev.ID</strong></span>
            </footer>

          </div>
        </div>
      </div>
    </div>

    <!-- MODAL KODE PHP KALENDER SETORAN -->
    <div class="modal fade" id="kalenderPhpModal" tabindex="-1" aria-hidden="true">
      <div class="modal-dialog modal-xl modal-dialog-centered">
        <div class="modal-content rounded-4 border-0 shadow-lg" style="background:var(--ad-surface);color:var(--ad-text);">
          <div class="modal-header border-bottom" style="border-color:var(--ad-border) !important;">
            <div>
              <h6 class="modal-title fw-bold mb-0">Kode View PHP Kalender Setoran (Siap Copy-Paste)</h6>
              <small class="text-muted" style="font-size:0.75rem;">100% mempertahankan variabel <code>$setoran_data</code>, link <code>base_url('pendapatan_harian')</code>, dan logika kalender asli Anda.</small>
            </div>
            <div class="d-flex align-items-center gap-2">
              <button type="button" onclick="copyKalenderPhpCode()" class="btn btn-primary btn-sm rounded-3 fw-semibold px-3">
                <i class="mdi mdi-content-copy me-1"></i> Salin Kode View
              </button>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
          </div>
          <div class="modal-body p-3">
            <pre id="rawKalenderPhpBox" class="php-code-box mb-0"></pre>
          </div>
        </div>
      </div>
    </div>

    <script>
      function toggleAspriTheme() {
        document.body.classList.toggle('aspri-dark');
        var isDark = document.body.classList.contains('aspri-dark');
        var icon = document.getElementById('aspriThemeIcon');
        if (icon) {
          icon.className = isDark ? 'mdi mdi-weather-sunny text-warning fs-5' : 'mdi mdi-weather-night fs-5';
        }
      }

      var rawKalenderPhp = decodeURIComponent(escape(window.atob('PHN0eWxlPgogICAgLyogPT09PT09PT09PT09PT09PT09PT09PT09PT09PT09PT09PT09PT09PT09PT09PT09PT09PT09PT09PT09PT09PT09PT09PT09PT0KICAgICAgIEFQUERBU0hCT0FSRCBSRURFU0lHTiDigJQgS0FMRU5ERVIgU0VUT1JBTiAoQVNQUkkpCiAgICAgICAxMDAlIFByZXNlcnZlcyBDSTMgVmFyaWFibGVzICgkc2V0b3Jhbl9kYXRhKSwgUm91dGVzLCBJRHMsICYgRnVuY3Rpb25zCiAgICAgICA9PT09PT09PT09PT09PT09PT09PT09PT09PT09PT09PT09PT09PT09PT09PT09PT09PT09PT09PT09PT09PT09PT09PT09PT09PSAqLwogICAgLm1haW4tcGFuZWwgLmNvbnRlbnQtd3JhcHBlciB7CiAgICAgICAgYmFja2dyb3VuZDogdmFyKC0tYWQtYmcsICNmOGZhZmMpICFpbXBvcnRhbnQ7CiAgICAgICAgcGFkZGluZzogMjhweCAyOHB4ICFpbXBvcnRhbnQ7CiAgICB9CgogICAgLmNhbGVuZGFyLXBhZ2UgewogICAgICAgIC0tY2FsLXByaW1hcnk6ICMyNTYzZWI7CiAgICAgICAgLS1jYWwtcHJpbWFyeS1ob3ZlcjogIzFkNGVkODsKICAgICAgICAtLWNhbC1wcmltYXJ5LXNvZnQ6IHJnYmEoMzcsIDk5LCAyMzUsIDAuMSk7CiAgICAgICAgLS1jYWwtZ3JlZW46ICMxMGI5ODE7CiAgICAgICAgLS1jYWwtZ3JlZW4tZGFyazogIzA1OTY2OTsKICAgICAgICAtLWNhbC1ncmVlbi1zb2Z0OiAjZWNmZGY1OwogICAgICAgIC0tY2FsLWdyZWVuLWJvcmRlcjogI2E3ZjNkMDsKICAgICAgICAtLWNhbC1zdXJmYWNlOiAjZmZmZmZmOwogICAgICAgIC0tY2FsLXN1cmZhY2UtYWx0OiAjZjhmYWZjOwogICAgICAgIC0tY2FsLXRleHQ6ICMwZjE3MmE7CiAgICAgICAgLS1jYWwtbXV0ZWQ6ICM2NDc0OGI7CiAgICAgICAgLS1jYWwtYm9yZGVyOiAjZTJlOGYwOwogICAgICAgIGNvbG9yOiB2YXIoLS1jYWwtdGV4dCk7CiAgICAgICAgZm9udC1mYW1pbHk6ICdJbnRlcicsICdQb3BwaW5zJywgLWFwcGxlLXN5c3RlbSwgQmxpbmtNYWNTeXN0ZW1Gb250LCBzYW5zLXNlcmlmOwogICAgfQoKICAgIGJvZHkuYXNwcmktZGFyayAuY2FsZW5kYXItcGFnZSwKICAgIGh0bWwuZGFyayAuY2FsZW5kYXItcGFnZSB7CiAgICAgICAgLS1jYWwtc3VyZmFjZTogIzExMTgyNzsKICAgICAgICAtLWNhbC1zdXJmYWNlLWFsdDogIzFlMjkzYjsKICAgICAgICAtLWNhbC10ZXh0OiAjZjhmYWZjOwogICAgICAgIC0tY2FsLW11dGVkOiAjOTRhM2I4OwogICAgICAgIC0tY2FsLWJvcmRlcjogIzFmMjkzNzsKICAgICAgICAtLWNhbC1ncmVlbi1zb2Z0OiByZ2JhKDE2LCAxODUsIDEyOSwgMC4xNCk7CiAgICAgICAgLS1jYWwtZ3JlZW4tYm9yZGVyOiByZ2JhKDE2LCAxODUsIDEyOSwgMC4zNSk7CiAgICB9CgogICAgLyogLS0tIEJyZWFkY3J1bWIgLS0tICovCiAgICAuY2FsZW5kYXItcGFnZSAuYnJlYWRjcnVtYiB7CiAgICAgICAgYmFja2dyb3VuZDogdHJhbnNwYXJlbnQ7CiAgICAgICAgcGFkZGluZzogMDsKICAgICAgICBtYXJnaW4tYm90dG9tOiAxLjI1cmVtOwogICAgICAgIGZvbnQtc2l6ZTogMC43OHJlbTsKICAgICAgICBmb250LXdlaWdodDogNjAwOwogICAgICAgIGRpc3BsYXk6IGZsZXg7CiAgICAgICAgYWxpZ24taXRlbXM6IGNlbnRlcjsKICAgICAgICBnYXA6IDAuMzVyZW07CiAgICB9CgogICAgLmNhbGVuZGFyLXBhZ2UgLmJyZWFkY3J1bWItaXRlbSArIC5icmVhZGNydW1iLWl0ZW06OmJlZm9yZSB7CiAgICAgICAgY29udGVudDogIi8iOwogICAgICAgIGNvbG9yOiB2YXIoLS1jYWwtbXV0ZWQpOwogICAgICAgIHBhZGRpbmctcmlnaHQ6IDAuMzVyZW07CiAgICB9CgogICAgLmNhbGVuZGFyLXBhZ2UgLmJyZWFkY3J1bWIgYSB7CiAgICAgICAgY29sb3I6IHZhcigtLWNhbC1wcmltYXJ5KTsKICAgICAgICB0ZXh0LWRlY29yYXRpb246IG5vbmU7CiAgICAgICAgdHJhbnNpdGlvbjogY29sb3IgMC4xNXMgZWFzZTsKICAgIH0KCiAgICAuY2FsZW5kYXItcGFnZSAuYnJlYWRjcnVtYiBhOmhvdmVyIHsKICAgICAgICBjb2xvcjogdmFyKC0tY2FsLXByaW1hcnktaG92ZXIpOwogICAgICAgIHRleHQtZGVjb3JhdGlvbjogdW5kZXJsaW5lOwogICAgfQoKICAgIC5jYWxlbmRhci1wYWdlIC5icmVhZGNydW1iLWl0ZW0uYWN0aXZlIHsKICAgICAgICBjb2xvcjogdmFyKC0tY2FsLW11dGVkKTsKICAgICAgICBmb250LXdlaWdodDogNTAwOwogICAgfQoKICAgIC8qIC0tLSBUb3AgTW9udGhseSBLUEkgU3VtbWFyeSBTdHJpcCAtLS0gKi8KICAgIC5jYWxlbmRhci1wYWdlIC5jYWwta3BpLWdyaWQgewogICAgICAgIGRpc3BsYXk6IGdyaWQ7CiAgICAgICAgZ3JpZC10ZW1wbGF0ZS1jb2x1bW5zOiByZXBlYXQoNCwgbWlubWF4KDAsIDFmcikpOwogICAgICAgIGdhcDogMTZweDsKICAgICAgICBtYXJnaW4tYm90dG9tOiAyMHB4OwogICAgfQoKICAgIC5jYWxlbmRhci1wYWdlIC5jYWwta3BpLWNhcmQgewogICAgICAgIGJhY2tncm91bmQ6IHZhcigtLWNhbC1zdXJmYWNlKTsKICAgICAgICBib3JkZXI6IDFweCBzb2xpZCB2YXIoLS1jYWwtYm9yZGVyKTsKICAgICAgICBib3JkZXItcmFkaXVzOiAxNHB4OwogICAgICAgIHBhZGRpbmc6IDE4cHggMjBweDsKICAgICAgICBib3gtc2hhZG93OiAwIDFweCAzcHggcmdiYSgxNSwgMjMsIDQyLCAwLjAzKSwgMCA0cHggMTRweCByZ2JhKDE1LCAyMywgNDIsIDAuMDMpOwogICAgICAgIGRpc3BsYXk6IGZsZXg7CiAgICAgICAgYWxpZ24taXRlbXM6IGZsZXgtc3RhcnQ7CiAgICAgICAganVzdGlmeS1jb250ZW50OiBzcGFjZS1iZXR3ZWVuOwogICAgICAgIGdhcDogMTJweDsKICAgICAgICB0cmFuc2l0aW9uOiB0cmFuc2Zvcm0gMC4xOHMgZWFzZSwgYm94LXNoYWRvdyAwLjE4cyBlYXNlOwogICAgfQoKICAgIC5jYWxlbmRhci1wYWdlIC5jYWwta3BpLWNhcmQ6aG92ZXIgewogICAgICAgIHRyYW5zZm9ybTogdHJhbnNsYXRlWSgtMnB4KTsKICAgICAgICBib3gtc2hhZG93OiAwIDEwcHggMjRweCAtNnB4IHJnYmEoMTUsIDIzLCA0MiwgMC4wOCk7CiAgICB9CgogICAgLmNhbGVuZGFyLXBhZ2UgLmNhbC1rcGktbGFiZWwgewogICAgICAgIGZvbnQtc2l6ZTogMTFweDsKICAgICAgICBmb250LXdlaWdodDogNzAwOwogICAgICAgIHRleHQtdHJhbnNmb3JtOiB1cHBlcmNhc2U7CiAgICAgICAgbGV0dGVyLXNwYWNpbmc6IDAuMDZlbTsKICAgICAgICBjb2xvcjogdmFyKC0tY2FsLW11dGVkKTsKICAgICAgICBtYXJnaW4tYm90dG9tOiA2cHg7CiAgICB9CgogICAgLmNhbGVuZGFyLXBhZ2UgLmNhbC1rcGktdmFsIHsKICAgICAgICBmb250LXNpemU6IDEuMjVyZW07CiAgICAgICAgZm9udC13ZWlnaHQ6IDgwMDsKICAgICAgICBsZXR0ZXItc3BhY2luZzogLTAuMDJlbTsKICAgICAgICBjb2xvcjogdmFyKC0tY2FsLXRleHQpOwogICAgICAgIGxpbmUtaGVpZ2h0OiAxLjI7CiAgICB9CgogICAgLmNhbGVuZGFyLXBhZ2UgLmNhbC1rcGktc3ViIHsKICAgICAgICBmb250LXNpemU6IDExcHg7CiAgICAgICAgY29sb3I6IHZhcigtLWNhbC1tdXRlZCk7CiAgICAgICAgbWFyZ2luLXRvcDogNHB4OwogICAgICAgIGZvbnQtd2VpZ2h0OiA1MDA7CiAgICB9CgogICAgLmNhbGVuZGFyLXBhZ2UgLmNhbC1rcGktaWNvbiB7CiAgICAgICAgd2lkdGg6IDQwcHg7CiAgICAgICAgaGVpZ2h0OiA0MHB4OwogICAgICAgIGJvcmRlci1yYWRpdXM6IDExcHg7CiAgICAgICAgZGlzcGxheTogaW5saW5lLWZsZXg7CiAgICAgICAgYWxpZ24taXRlbXM6IGNlbnRlcjsKICAgICAgICBqdXN0aWZ5LWNvbnRlbnQ6IGNlbnRlcjsKICAgICAgICBmb250LXNpemU6IDE5cHg7CiAgICAgICAgZmxleC1zaHJpbms6IDA7CiAgICB9CgogICAgLyogLS0tIE1haW4gQ2FsZW5kYXIgQ2FyZCAtLS0gKi8KICAgIC5jYWxlbmRhci1wYWdlIC5jYWxlbmRhci1jYXJkIHsKICAgICAgICBiYWNrZ3JvdW5kOiB2YXIoLS1jYWwtc3VyZmFjZSk7CiAgICAgICAgYm9yZGVyOiAxcHggc29saWQgdmFyKC0tY2FsLWJvcmRlcik7CiAgICAgICAgYm9yZGVyLXJhZGl1czogMTZweDsKICAgICAgICBib3gtc2hhZG93OiAwIDRweCAyNHB4IC00cHggcmdiYSgxNSwgMjMsIDQyLCAwLjA1KTsKICAgICAgICBvdmVyZmxvdzogaGlkZGVuOwogICAgfQoKICAgIC5jYWxlbmRhci1wYWdlIC5jYWxlbmRhci1oZWFkZXIgewogICAgICAgIGRpc3BsYXk6IGZsZXg7CiAgICAgICAgYWxpZ24taXRlbXM6IGNlbnRlcjsKICAgICAgICBqdXN0aWZ5LWNvbnRlbnQ6IHNwYWNlLWJldHdlZW47CiAgICAgICAgZmxleC13cmFwOiB3cmFwOwogICAgICAgIGdhcDogMTZweDsKICAgICAgICBwYWRkaW5nOiAyMnB4IDI2cHg7CiAgICAgICAgYm9yZGVyLWJvdHRvbTogMXB4IHNvbGlkIHZhcigtLWNhbC1ib3JkZXIpOwogICAgICAgIGJhY2tncm91bmQ6IGxpbmVhci1ncmFkaWVudCg5MGRlZywgcmdiYSgzNywgOTksIDIzNSwgMC4wNCkgMCUsIHRyYW5zcGFyZW50IDEwMCUpOwogICAgfQoKICAgIC5jYWxlbmRhci1wYWdlIC5leWVicm93IHsKICAgICAgICBkaXNwbGF5OiBpbmxpbmUtZmxleDsKICAgICAgICBhbGlnbi1pdGVtczogY2VudGVyOwogICAgICAgIGdhcDogNnB4OwogICAgICAgIHBhZGRpbmc6IDRweCAxMHB4OwogICAgICAgIGJvcmRlci1yYWRpdXM6IDk5OXB4OwogICAgICAgIGJhY2tncm91bmQ6IHZhcigtLWNhbC1wcmltYXJ5LXNvZnQpOwogICAgICAgIGNvbG9yOiB2YXIoLS1jYWwtcHJpbWFyeSk7CiAgICAgICAgdGV4dC10cmFuc2Zvcm06IHVwcGVyY2FzZTsKICAgICAgICBsZXR0ZXItc3BhY2luZzogMC4wOGVtOwogICAgICAgIGZvbnQtc2l6ZTogMTBweDsKICAgICAgICBmb250LXdlaWdodDogODAwOwogICAgICAgIG1hcmdpbi1ib3R0b206IDhweDsKICAgIH0KCiAgICAuY2FsZW5kYXItcGFnZSAuZXllYnJvdy1kb3QgewogICAgICAgIHdpZHRoOiA2cHg7CiAgICAgICAgaGVpZ2h0OiA2cHg7CiAgICAgICAgYm9yZGVyLXJhZGl1czogNTAlOwogICAgICAgIGJhY2tncm91bmQ6IHZhcigtLWNhbC1wcmltYXJ5KTsKICAgIH0KCiAgICAuY2FsZW5kYXItcGFnZSAucGFnZS10aXRsZSB7CiAgICAgICAgZm9udC1zaXplOiAyMnB4OwogICAgICAgIGxpbmUtaGVpZ2h0OiAxLjI1OwogICAgICAgIGZvbnQtd2VpZ2h0OiA4MDA7CiAgICAgICAgbGV0dGVyLXNwYWNpbmc6IC0wLjAyZW07CiAgICAgICAgbWFyZ2luOiAwOwogICAgICAgIGNvbG9yOiB2YXIoLS1jYWwtdGV4dCk7CiAgICB9CgogICAgLmNhbGVuZGFyLXBhZ2UgLnBhZ2UtZGVzY3JpcHRpb24gewogICAgICAgIGNvbG9yOiB2YXIoLS1jYWwtbXV0ZWQpOwogICAgICAgIGZvbnQtc2l6ZTogMTIuNXB4OwogICAgICAgIG1hcmdpbjogNHB4IDAgMDsKICAgIH0KCiAgICAuY2FsZW5kYXItcGFnZSAuY2FsZW5kYXItY29udGVudCB7CiAgICAgICAgcGFkZGluZzogMjJweCAyNnB4IDI2cHg7CiAgICB9CgogICAgLyogLS0tIENhbGVuZGFyIE5hdmlnYXRpb24gQmFyIC0tLSAqLwogICAgLmNhbGVuZGFyLXBhZ2UgLmNhbGVuZGFyLW5hdiB7CiAgICAgICAgZGlzcGxheTogZmxleDsKICAgICAgICBhbGlnbi1pdGVtczogY2VudGVyOwogICAgICAgIGp1c3RpZnktY29udGVudDogc3BhY2UtYmV0d2VlbjsKICAgICAgICBmbGV4LXdyYXA6IHdyYXA7CiAgICAgICAgZ2FwOiAxMnB4OwogICAgICAgIG1hcmdpbi1ib3R0b206IDE4cHg7CiAgICAgICAgcGFkZGluZzogMTBweCAxNHB4OwogICAgICAgIGJhY2tncm91bmQ6IHZhcigtLWNhbC1zdXJmYWNlLWFsdCk7CiAgICAgICAgYm9yZGVyOiAxcHggc29saWQgdmFyKC0tY2FsLWJvcmRlcik7CiAgICAgICAgYm9yZGVyLXJhZGl1czogMTJweDsKICAgIH0KCiAgICAuY2FsZW5kYXItcGFnZSAubW9udGgtbGFiZWwtd3JhcCB7CiAgICAgICAgZGlzcGxheTogZmxleDsKICAgICAgICBhbGlnbi1pdGVtczogY2VudGVyOwogICAgICAgIGdhcDogMTBweDsKICAgIH0KCiAgICAuY2FsZW5kYXItcGFnZSAubW9udGgtbGFiZWwgewogICAgICAgIGZvbnQtc2l6ZTogMTdweDsKICAgICAgICBmb250LXdlaWdodDogODAwOwogICAgICAgIGxldHRlci1zcGFjaW5nOiAtMC4wMWVtOwogICAgICAgIHRleHQtYWxpZ246IGNlbnRlcjsKICAgICAgICBtYXJnaW46IDA7CiAgICAgICAgY29sb3I6IHZhcigtLWNhbC10ZXh0KTsKICAgIH0KCiAgICAuY2FsZW5kYXItcGFnZSAubmF2LWJ0bi1ncm91cCB7CiAgICAgICAgZGlzcGxheTogZmxleDsKICAgICAgICBhbGlnbi1pdGVtczogY2VudGVyOwogICAgICAgIGdhcDogOHB4OwogICAgfQoKICAgIC5jYWxlbmRhci1wYWdlIC5uYXYtbW9udGgtYnRuIHsKICAgICAgICBkaXNwbGF5OiBpbmxpbmUtZmxleDsKICAgICAgICBhbGlnbi1pdGVtczogY2VudGVyOwogICAgICAgIGp1c3RpZnktY29udGVudDogY2VudGVyOwogICAgICAgIGdhcDogNnB4OwogICAgICAgIGJvcmRlcjogMXB4IHNvbGlkIHZhcigtLWNhbC1ib3JkZXIpOwogICAgICAgIGJvcmRlci1yYWRpdXM6IDlweDsKICAgICAgICBiYWNrZ3JvdW5kOiB2YXIoLS1jYWwtc3VyZmFjZSk7CiAgICAgICAgY29sb3I6IHZhcigtLWNhbC10ZXh0KTsKICAgICAgICBwYWRkaW5nOiA4cHggMTRweDsKICAgICAgICBmb250LXNpemU6IDEycHg7CiAgICAgICAgZm9udC13ZWlnaHQ6IDYwMDsKICAgICAgICBjdXJzb3I6IHBvaW50ZXI7CiAgICAgICAgdHJhbnNpdGlvbjogYWxsIDAuMTVzIGVhc2U7CiAgICAgICAgYm94LXNoYWRvdzogMCAxcHggMnB4IHJnYmEoMTUsIDIzLCA0MiwgMC4wMyk7CiAgICB9CgogICAgLmNhbGVuZGFyLXBhZ2UgLm5hdi1tb250aC1idG46aG92ZXIgewogICAgICAgIGJhY2tncm91bmQ6IHZhcigtLWNhbC1wcmltYXJ5KTsKICAgICAgICBib3JkZXItY29sb3I6IHZhcigtLWNhbC1wcmltYXJ5KTsKICAgICAgICBjb2xvcjogI2ZmZmZmZjsKICAgICAgICBib3gtc2hhZG93OiAwIDRweCAxMHB4IHJnYmEoMzcsIDk5LCAyMzUsIDAuMjIpOwogICAgfQoKICAgIC5jYWxlbmRhci1wYWdlIC5uYXYtdG9kYXktYnRuIHsKICAgICAgICBkaXNwbGF5OiBpbmxpbmUtZmxleDsKICAgICAgICBhbGlnbi1pdGVtczogY2VudGVyOwogICAgICAgIGdhcDogNXB4OwogICAgICAgIGJvcmRlcjogMXB4IHNvbGlkIHJnYmEoMzcsIDk5LCAyMzUsIDAuMjUpOwogICAgICAgIGJvcmRlci1yYWRpdXM6IDlweDsKICAgICAgICBiYWNrZ3JvdW5kOiB2YXIoLS1jYWwtcHJpbWFyeS1zb2Z0KTsKICAgICAgICBjb2xvcjogdmFyKC0tY2FsLXByaW1hcnkpOwogICAgICAgIHBhZGRpbmc6IDhweCAxMnB4OwogICAgICAgIGZvbnQtc2l6ZTogMTJweDsKICAgICAgICBmb250LXdlaWdodDogNzAwOwogICAgICAgIGN1cnNvcjogcG9pbnRlcjsKICAgICAgICB0cmFuc2l0aW9uOiBhbGwgMC4xNXMgZWFzZTsKICAgIH0KCiAgICAuY2FsZW5kYXItcGFnZSAubmF2LXRvZGF5LWJ0bjpob3ZlciB7CiAgICAgICAgYmFja2dyb3VuZDogdmFyKC0tY2FsLXByaW1hcnkpOwogICAgICAgIGNvbG9yOiAjZmZmZmZmOwogICAgfQoKICAgIC8qIC0tLSBDYWxlbmRhciBUYWJsZSBHcmlkIC0tLSAqLwogICAgLmNhbGVuZGFyLXBhZ2UgLmNhbGVuZGFyLXNjcm9sbCB7CiAgICAgICAgd2lkdGg6IDEwMCU7CiAgICAgICAgb3ZlcmZsb3cteDogYXV0bzsKICAgICAgICBib3JkZXI6IDFweCBzb2xpZCB2YXIoLS1jYWwtYm9yZGVyKTsKICAgICAgICBib3JkZXItcmFkaXVzOiAxNHB4OwogICAgICAgIGJhY2tncm91bmQ6IHZhcigtLWNhbC1zdXJmYWNlKTsKICAgIH0KCiAgICAuY2FsZW5kYXItcGFnZSB0YWJsZS5jYWxlbmRhciB7CiAgICAgICAgd2lkdGg6IDEwMCU7CiAgICAgICAgbWluLXdpZHRoOiA2NDBweDsKICAgICAgICB0YWJsZS1sYXlvdXQ6IGZpeGVkOwogICAgICAgIGJvcmRlci1jb2xsYXBzZTogc2VwYXJhdGU7CiAgICAgICAgYm9yZGVyLXNwYWNpbmc6IDA7CiAgICAgICAgbWFyZ2luOiAwOwogICAgfQoKICAgIC5jYWxlbmRhci1wYWdlIC5jYWxlbmRhciB0aCB7CiAgICAgICAgYmFja2dyb3VuZDogdmFyKC0tY2FsLXN1cmZhY2UtYWx0KTsKICAgICAgICBjb2xvcjogdmFyKC0tY2FsLW11dGVkKTsKICAgICAgICBmb250LXNpemU6IDExcHg7CiAgICAgICAgZm9udC13ZWlnaHQ6IDgwMDsKICAgICAgICBsZXR0ZXItc3BhY2luZzogMC4wNmVtOwogICAgICAgIHRleHQtdHJhbnNmb3JtOiB1cHBlcmNhc2U7CiAgICAgICAgdGV4dC1hbGlnbjogY2VudGVyOwogICAgICAgIHBhZGRpbmc6IDEzcHggOHB4OwogICAgICAgIGJvcmRlcjogMDsKICAgICAgICBib3JkZXItYm90dG9tOiAxcHggc29saWQgdmFyKC0tY2FsLWJvcmRlcik7CiAgICAgICAgYm9yZGVyLXJpZ2h0OiAxcHggc29saWQgdmFyKC0tY2FsLWJvcmRlcik7CiAgICB9CgogICAgLmNhbGVuZGFyLXBhZ2UgLmNhbGVuZGFyIHRoOmZpcnN0LWNoaWxkIHsKICAgICAgICBjb2xvcjogI2VmNDQ0NDsKICAgIH0KCiAgICAuY2FsZW5kYXItcGFnZSAuY2FsZW5kYXIgdGQgewogICAgICAgIGhlaWdodDogMTEycHg7CiAgICAgICAgdmVydGljYWwtYWxpZ246IHRvcDsKICAgICAgICB0ZXh0LWFsaWduOiBsZWZ0OwogICAgICAgIHBhZGRpbmc6IDEwcHg7CiAgICAgICAgYm9yZGVyOiAwOwogICAgICAgIGJvcmRlci1yaWdodDogMXB4IHNvbGlkIHZhcigtLWNhbC1ib3JkZXIpOwogICAgICAgIGJvcmRlci1ib3R0b206IDFweCBzb2xpZCB2YXIoLS1jYWwtYm9yZGVyKTsKICAgICAgICBiYWNrZ3JvdW5kOiB2YXIoLS1jYWwtc3VyZmFjZSk7CiAgICAgICAgdHJhbnNpdGlvbjogYWxsIDAuMTZzIGVhc2U7CiAgICAgICAgcG9zaXRpb246IHJlbGF0aXZlOwogICAgfQoKICAgIC5jYWxlbmRhci1wYWdlIC5jYWxlbmRhciB0ZDpsYXN0LWNoaWxkLAogICAgLmNhbGVuZGFyLXBhZ2UgLmNhbGVuZGFyIHRoOmxhc3QtY2hpbGQgewogICAgICAgIGJvcmRlci1yaWdodDogMDsKICAgIH0KCiAgICAuY2FsZW5kYXItcGFnZSAuY2FsZW5kYXIgdGJvZHkgdHI6bGFzdC1jaGlsZCB0ZCB7CiAgICAgICAgYm9yZGVyLWJvdHRvbTogMDsKICAgIH0KCiAgICAuY2FsZW5kYXItcGFnZSAuY2FsZW5kYXIgdGQuZW1wdHktZGF5IHsKICAgICAgICBiYWNrZ3JvdW5kOiByZ2JhKDE0OCwgMTYzLCAxODQsIDAuMDQpOwogICAgICAgIGNvbG9yOiB2YXIoLS1jYWwtbXV0ZWQpOwogICAgfQoKICAgIC8qIERhdGUgTnVtYmVyIFBpbGwgKi8KICAgIC5jYWxlbmRhci1wYWdlIC5kYXktaGVhZGVyLXJvdyB7CiAgICAgICAgZGlzcGxheTogZmxleDsKICAgICAgICBhbGlnbi1pdGVtczogY2VudGVyOwogICAgICAgIGp1c3RpZnktY29udGVudDogc3BhY2UtYmV0d2VlbjsKICAgICAgICB3aWR0aDogMTAwJTsKICAgIH0KCiAgICAuY2FsZW5kYXItcGFnZSAuZGF5LW51bWJlciB7CiAgICAgICAgZGlzcGxheTogaW5saW5lLWZsZXg7CiAgICAgICAgYWxpZ24taXRlbXM6IGNlbnRlcjsKICAgICAgICBqdXN0aWZ5LWNvbnRlbnQ6IGNlbnRlcjsKICAgICAgICB3aWR0aDogMjhweDsKICAgICAgICBoZWlnaHQ6IDI4cHg7CiAgICAgICAgYm9yZGVyLXJhZGl1czogOHB4OwogICAgICAgIGNvbG9yOiB2YXIoLS1jYWwtdGV4dCk7CiAgICAgICAgZm9udC1zaXplOiAxMnB4OwogICAgICAgIGZvbnQtd2VpZ2h0OiA3MDA7CiAgICAgICAgdHJhbnNpdGlvbjogdHJhbnNmb3JtIDAuMTVzIGVhc2U7CiAgICB9CgogICAgLyogVG9kYXkgSGlnaGxpZ2h0ICovCiAgICAuY2FsZW5kYXItcGFnZSAuY2FsZW5kYXIgdGQuaXMtdG9kYXkgewogICAgICAgIGJveC1zaGFkb3c6IGluc2V0IDAgMCAwIDJweCB2YXIoLS1jYWwtcHJpbWFyeSk7CiAgICB9CgogICAgLmNhbGVuZGFyLXBhZ2UgLmNhbGVuZGFyIHRkLmlzLXRvZGF5IC5kYXktbnVtYmVyIHsKICAgICAgICBiYWNrZ3JvdW5kOiB2YXIoLS1jYWwtcHJpbWFyeSk7CiAgICAgICAgY29sb3I6ICNmZmZmZmY7CiAgICB9CgogICAgLmNhbGVuZGFyLXBhZ2UgLnRvZGF5LXRhZyB7CiAgICAgICAgZm9udC1zaXplOiA5cHg7CiAgICAgICAgZm9udC13ZWlnaHQ6IDgwMDsKICAgICAgICB0ZXh0LXRyYW5zZm9ybTogdXBwZXJjYXNlOwogICAgICAgIGxldHRlci1zcGFjaW5nOiAwLjA0ZW07CiAgICAgICAgcGFkZGluZzogMnB4IDZweDsKICAgICAgICBib3JkZXItcmFkaXVzOiA5OTlweDsKICAgICAgICBiYWNrZ3JvdW5kOiB2YXIoLS1jYWwtcHJpbWFyeS1zb2Z0KTsKICAgICAgICBjb2xvcjogdmFyKC0tY2FsLXByaW1hcnkpOwogICAgfQoKICAgIC8qIENlbGwgd2l0aCBTZXRvcmFuICguaGFzLXNldG9yYW4pICovCiAgICAuY2FsZW5kYXItcGFnZSAuY2FsZW5kYXIgdGQuaGFzLXNldG9yYW4gewogICAgICAgIGJhY2tncm91bmQ6IHZhcigtLWNhbC1ncmVlbi1zb2Z0KTsKICAgIH0KCiAgICAuY2FsZW5kYXItcGFnZSAuY2FsZW5kYXIgdGQuaGFzLXNldG9yYW46aG92ZXIgewogICAgICAgIGJhY2tncm91bmQ6ICNkMWZhZTU7CiAgICAgICAgdHJhbnNmb3JtOiB0cmFuc2xhdGVZKC0xcHgpOwogICAgICAgIHotaW5kZXg6IDI7CiAgICAgICAgYm94LXNoYWRvdzogMCA2cHggMTZweCByZ2JhKDE2LCAxODUsIDEyOSwgMC4xMik7CiAgICB9CgogICAgYm9keS5hc3ByaS1kYXJrIC5jYWxlbmRhci1wYWdlIC5jYWxlbmRhciB0ZC5oYXMtc2V0b3Jhbjpob3ZlciwKICAgIGh0bWwuZGFyayAuY2FsZW5kYXItcGFnZSAuY2FsZW5kYXIgdGQuaGFzLXNldG9yYW46aG92ZXIgewogICAgICAgIGJhY2tncm91bmQ6IHJnYmEoMTYsIDE4NSwgMTI5LCAwLjI0KTsKICAgIH0KCiAgICAuY2FsZW5kYXItcGFnZSAuY2FsZW5kYXIgLmhhcy1zZXRvcmFuIGEgewogICAgICAgIGRpc3BsYXk6IGZsZXg7CiAgICAgICAgZmxleC1kaXJlY3Rpb246IGNvbHVtbjsKICAgICAgICBqdXN0aWZ5LWNvbnRlbnQ6IHNwYWNlLWJldHdlZW47CiAgICAgICAgYWxpZ24taXRlbXM6IGZsZXgtc3RhcnQ7CiAgICAgICAgZ2FwOiA4cHg7CiAgICAgICAgd2lkdGg6IDEwMCU7CiAgICAgICAgaGVpZ2h0OiAxMDAlOwogICAgICAgIGNvbG9yOiBpbmhlcml0OwogICAgICAgIHRleHQtZGVjb3JhdGlvbjogbm9uZTsKICAgIH0KCiAgICAuY2FsZW5kYXItcGFnZSAuaGFzLXNldG9yYW4gLmRheS1udW1iZXIgewogICAgICAgIGJhY2tncm91bmQ6IHZhcigtLWNhbC1ncmVlbi1kYXJrKTsKICAgICAgICBjb2xvcjogI2ZmZmZmZjsKICAgICAgICBib3gtc2hhZG93OiAwIDJweCA2cHggcmdiYSg1LCAxNTAsIDEwNSwgMC4yOCk7CiAgICB9CgogICAgLmNhbGVuZGFyLXBhZ2UgLmRlcG9zaXQtYmFkZ2Utd3JhcCB7CiAgICAgICAgd2lkdGg6IDEwMCU7CiAgICAgICAgbWFyZ2luLXRvcDogYXV0bzsKICAgICAgICBwYWRkaW5nOiA1cHggOHB4OwogICAgICAgIGJvcmRlci1yYWRpdXM6IDhweDsKICAgICAgICBiYWNrZ3JvdW5kOiByZ2JhKDI1NSwgMjU1LCAyNTUsIDAuODUpOwogICAgICAgIGJvcmRlcjogMXB4IHNvbGlkIHZhcigtLWNhbC1ncmVlbi1ib3JkZXIpOwogICAgICAgIGRpc3BsYXk6IGZsZXg7CiAgICAgICAgYWxpZ24taXRlbXM6IGNlbnRlcjsKICAgICAgICBqdXN0aWZ5LWNvbnRlbnQ6IHNwYWNlLWJldHdlZW47CiAgICAgICAgZ2FwOiA0cHg7CiAgICB9CgogICAgYm9keS5hc3ByaS1kYXJrIC5jYWxlbmRhci1wYWdlIC5kZXBvc2l0LWJhZGdlLXdyYXAsCiAgICBodG1sLmRhcmsgLmNhbGVuZGFyLXBhZ2UgLmRlcG9zaXQtYmFkZ2Utd3JhcCB7CiAgICAgICAgYmFja2dyb3VuZDogcmdiYSgxNywgMjQsIDM5LCAwLjc1KTsKICAgIH0KCiAgICAuY2FsZW5kYXItcGFnZSAuZGVwb3NpdC1hbW91bnQgewogICAgICAgIGRpc3BsYXk6IGlubGluZS1ibG9jazsKICAgICAgICBjb2xvcjogIzA0Nzg1NzsKICAgICAgICBmb250LXNpemU6IDExcHg7CiAgICAgICAgbGluZS1oZWlnaHQ6IDEuMzsKICAgICAgICBmb250LXdlaWdodDogODAwOwogICAgICAgIG92ZXJmbG93LXdyYXA6IGFueXdoZXJlOwogICAgfQoKICAgIGJvZHkuYXNwcmktZGFyayAuY2FsZW5kYXItcGFnZSAuZGVwb3NpdC1hbW91bnQsCiAgICBodG1sLmRhcmsgLmNhbGVuZGFyLXBhZ2UgLmRlcG9zaXQtYW1vdW50IHsKICAgICAgICBjb2xvcjogIzZlZTdiNzsKICAgIH0KCiAgICAuY2FsZW5kYXItcGFnZSAuZGVwb3NpdC1hcnJvdyB7CiAgICAgICAgZm9udC1zaXplOiAxMXB4OwogICAgICAgIGNvbG9yOiAjMDU5NjY5OwogICAgICAgIG9wYWNpdHk6IDAuNzU7CiAgICB9CgogICAgLyogLS0tIExlZ2VuZCBCYXIgLS0tICovCiAgICAuY2FsZW5kYXItcGFnZSAuY2FsZW5kYXItbGVnZW5kIHsKICAgICAgICBkaXNwbGF5OiBmbGV4OwogICAgICAgIGFsaWduLWl0ZW1zOiBjZW50ZXI7CiAgICAgICAganVzdGlmeS1jb250ZW50OiBzcGFjZS1iZXR3ZWVuOwogICAgICAgIGZsZXgtd3JhcDogd3JhcDsKICAgICAgICBnYXA6IDEycHg7CiAgICAgICAgbWFyZ2luLXRvcDogMTZweDsKICAgICAgICBwYWRkaW5nLXRvcDogMTRweDsKICAgICAgICBib3JkZXItdG9wOiAxcHggZGFzaGVkIHZhcigtLWNhbC1ib3JkZXIpOwogICAgICAgIGZvbnQtc2l6ZTogMTEuNXB4OwogICAgICAgIGNvbG9yOiB2YXIoLS1jYWwtbXV0ZWQpOwogICAgfQoKICAgIC5jYWxlbmRhci1wYWdlIC5sZWdlbmQtaXRlbXMgewogICAgICAgIGRpc3BsYXk6IGZsZXg7CiAgICAgICAgYWxpZ24taXRlbXM6IGNlbnRlcjsKICAgICAgICBmbGV4LXdyYXA6IHdyYXA7CiAgICAgICAgZ2FwOiAxNnB4OwogICAgfQoKICAgIC5jYWxlbmRhci1wYWdlIC5sZWdlbmQtaXRlbSB7CiAgICAgICAgZGlzcGxheTogaW5saW5lLWZsZXg7CiAgICAgICAgYWxpZ24taXRlbXM6IGNlbnRlcjsKICAgICAgICBnYXA6IDdweDsKICAgICAgICBmb250LXdlaWdodDogNTAwOwogICAgfQoKICAgIC5jYWxlbmRhci1wYWdlIC5sZWdlbmQtZG90IHsKICAgICAgICB3aWR0aDogMTBweDsKICAgICAgICBoZWlnaHQ6IDEwcHg7CiAgICAgICAgYm9yZGVyLXJhZGl1czogM3B4OwogICAgICAgIGJhY2tncm91bmQ6IHZhcigtLWNhbC1ncmVlbi1kYXJrKTsKICAgIH0KCiAgICAuY2FsZW5kYXItcGFnZSAubGVnZW5kLWRvdC10b2RheSB7CiAgICAgICAgd2lkdGg6IDEwcHg7CiAgICAgICAgaGVpZ2h0OiAxMHB4OwogICAgICAgIGJvcmRlci1yYWRpdXM6IDNweDsKICAgICAgICBib3JkZXI6IDJweCBzb2xpZCB2YXIoLS1jYWwtcHJpbWFyeSk7CiAgICAgICAgYmFja2dyb3VuZDogdHJhbnNwYXJlbnQ7CiAgICB9CgogICAgLyogLS0tIEJvdHRvbSBUb3RhbCBTZXRvcmFuIEJhbm5lciAoI3RvdGFsRGVwb3NpdCkgLS0tICovCiAgICAuY2FsZW5kYXItcGFnZSAudG90YWwtY2FyZCB7CiAgICAgICAgZGlzcGxheTogZmxleDsKICAgICAgICBhbGlnbi1pdGVtczogY2VudGVyOwogICAgICAgIGp1c3RpZnktY29udGVudDogc3BhY2UtYmV0d2VlbjsKICAgICAgICBmbGV4LXdyYXA6IHdyYXA7CiAgICAgICAgZ2FwOiAxNnB4OwogICAgICAgIG1hcmdpbi10b3A6IDIwcHg7CiAgICAgICAgcGFkZGluZzogMjJweCAyNHB4OwogICAgICAgIGJvcmRlcjogMXB4IHNvbGlkIHZhcigtLWNhbC1ncmVlbi1ib3JkZXIpOwogICAgICAgIGJvcmRlci1yYWRpdXM6IDE0cHg7CiAgICAgICAgYmFja2dyb3VuZDogbGluZWFyLWdyYWRpZW50KDExMGRlZywgdmFyKC0tY2FsLWdyZWVuLXNvZnQpIDAlLCB2YXIoLS1jYWwtc3VyZmFjZSkgMTAwJSk7CiAgICAgICAgYm94LXNoYWRvdzogMCA0cHggMTZweCByZ2JhKDE2LCAxODUsIDEyOSwgMC4wNik7CiAgICB9CgogICAgLmNhbGVuZGFyLXBhZ2UgLnRvdGFsLWxhYmVsIHsKICAgICAgICBjb2xvcjogIzA0Nzg1NzsKICAgICAgICBmb250LXNpemU6IDEycHg7CiAgICAgICAgZm9udC13ZWlnaHQ6IDcwMDsKICAgICAgICB0ZXh0LXRyYW5zZm9ybTogdXBwZXJjYXNlOwogICAgICAgIGxldHRlci1zcGFjaW5nOiAwLjA1ZW07CiAgICAgICAgbWFyZ2luLWJvdHRvbTogNHB4OwogICAgfQoKICAgIGJvZHkuYXNwcmktZGFyayAuY2FsZW5kYXItcGFnZSAudG90YWwtbGFiZWwsCiAgICBodG1sLmRhcmsgLmNhbGVuZGFyLXBhZ2UgLnRvdGFsLWxhYmVsIHsKICAgICAgICBjb2xvcjogIzZlZTdiNzsKICAgIH0KCiAgICAuY2FsZW5kYXItcGFnZSAudG90YWwtdmFsdWUgewogICAgICAgIGNvbG9yOiAjMDY1ZjQ2OwogICAgICAgIGZvbnQtc2l6ZTogY2xhbXAoMjJweCwgM3Z3LCAyOHB4KTsKICAgICAgICBmb250LXdlaWdodDogODAwOwogICAgICAgIGxldHRlci1zcGFjaW5nOiAtMC4wMmVtOwogICAgICAgIG92ZXJmbG93LXdyYXA6IGFueXdoZXJlOwogICAgfQoKICAgIGJvZHkuYXNwcmktZGFyayAuY2FsZW5kYXItcGFnZSAudG90YWwtdmFsdWUsCiAgICBodG1sLmRhcmsgLmNhbGVuZGFyLXBhZ2UgLnRvdGFsLXZhbHVlIHsKICAgICAgICBjb2xvcjogI2VjZmRmNTsKICAgIH0KCiAgICAuY2FsZW5kYXItcGFnZSAudG90YWwtaWNvbiB7CiAgICAgICAgZGlzcGxheTogZmxleDsKICAgICAgICBhbGlnbi1pdGVtczogY2VudGVyOwogICAgICAgIGp1c3RpZnktY29udGVudDogY2VudGVyOwogICAgICAgIGZsZXgtc2hyaW5rOiAwOwogICAgICAgIHdpZHRoOiA1MnB4OwogICAgICAgIGhlaWdodDogNTJweDsKICAgICAgICBib3JkZXItcmFkaXVzOiAxNHB4OwogICAgICAgIGJhY2tncm91bmQ6ICMxMGI5ODE7CiAgICAgICAgY29sb3I6ICNmZmZmZmY7CiAgICAgICAgZm9udC1zaXplOiAyNHB4OwogICAgICAgIGJveC1zaGFkb3c6IDAgNnB4IDE2cHggcmdiYSgxNiwgMTg1LCAxMjksIDAuMyk7CiAgICB9CgogICAgLyogLS0tIFJlc3BvbnNpdmUgQWRqdXN0bWVudHMgLS0tICovCiAgICBAbWVkaWEgKG1heC13aWR0aDogOTkxcHgpIHsKICAgICAgICAuY2FsZW5kYXItcGFnZSAuY2FsLWtwaS1ncmlkIHsKICAgICAgICAgICAgZ3JpZC10ZW1wbGF0ZS1jb2x1bW5zOiByZXBlYXQoMiwgbWlubWF4KDAsIDFmcikpOwogICAgICAgIH0KICAgIH0KCiAgICBAbWVkaWEgKG1heC13aWR0aDogNzY3cHgpIHsKICAgICAgICAubWFpbi1wYW5lbCAuY29udGVudC13cmFwcGVyIHsKICAgICAgICAgICAgcGFkZGluZzogMTZweCAxMnB4ICFpbXBvcnRhbnQ7CiAgICAgICAgfQogICAgICAgIC5jYWxlbmRhci1wYWdlIC5jYWwta3BpLWdyaWQgewogICAgICAgICAgICBncmlkLXRlbXBsYXRlLWNvbHVtbnM6IDFmcjsKICAgICAgICAgICAgZ2FwOiAxMHB4OwogICAgICAgIH0KICAgICAgICAuY2FsZW5kYXItcGFnZSAuY2FsZW5kYXItaGVhZGVyIHsKICAgICAgICAgICAgcGFkZGluZzogMThweCAxNnB4OwogICAgICAgIH0KICAgICAgICAuY2FsZW5kYXItcGFnZSAuY2FsZW5kYXItY29udGVudCB7CiAgICAgICAgICAgIHBhZGRpbmc6IDE2cHggMTJweCAxOHB4OwogICAgICAgIH0KICAgICAgICAuY2FsZW5kYXItcGFnZSAucGFnZS10aXRsZSB7CiAgICAgICAgICAgIGZvbnQtc2l6ZTogMTlweDsKICAgICAgICB9CiAgICAgICAgLmNhbGVuZGFyLXBhZ2UgLm1vbnRoLWxhYmVsIHsKICAgICAgICAgICAgZm9udC1zaXplOiAxNXB4OwogICAgICAgIH0KICAgICAgICAuY2FsZW5kYXItcGFnZSAubmF2LW1vbnRoLWJ0biwKICAgICAgICAuY2FsZW5kYXItcGFnZSAubmF2LXRvZGF5LWJ0biB7CiAgICAgICAgICAgIHBhZGRpbmc6IDdweCAxMHB4OwogICAgICAgICAgICBmb250LXNpemU6IDExcHg7CiAgICAgICAgfQogICAgICAgIC5jYWxlbmRhci1wYWdlIC5jYWxlbmRhciB0ZCB7CiAgICAgICAgICAgIGhlaWdodDogOTJweDsKICAgICAgICAgICAgcGFkZGluZzogNnB4OwogICAgICAgIH0KICAgICAgICAuY2FsZW5kYXItcGFnZSAuZGVwb3NpdC1hbW91bnQgewogICAgICAgICAgICBmb250LXNpemU6IDkuNXB4OwogICAgICAgIH0KICAgICAgICAuY2FsZW5kYXItcGFnZSAudG90YWwtY2FyZCB7CiAgICAgICAgICAgIHBhZGRpbmc6IDE4cHggMTZweDsKICAgICAgICB9CiAgICB9Cjwvc3R5bGU+Cgo8ZGl2IGNsYXNzPSJtYWluLXBhbmVsIj4KICAgIDxkaXYgY2xhc3M9ImNvbnRlbnQtd3JhcHBlciBjYWxlbmRhci1wYWdlIj4KCiAgICAgICAgPCEtLSBCcmVhZGNydW1iIE5hdmlnYXRpb24gLS0+CiAgICAgICAgPG5hdiBhcmlhLWxhYmVsPSJicmVhZGNydW1iIj4KICAgICAgICAgICAgPG9sIGNsYXNzPSJicmVhZGNydW1iIj4KICAgICAgICAgICAgICAgIDxsaSBjbGFzcz0iYnJlYWRjcnVtYi1pdGVtIj4KICAgICAgICAgICAgICAgICAgICA8YSBocmVmPSI8Pz0gYmFzZV91cmwoJ2Rhc2hib2FyZCcpOyA/PiI+CiAgICAgICAgICAgICAgICAgICAgICAgIDxpIGNsYXNzPSJtZGkgbWRpLWhvbWUtb3V0bGluZSBtZS0xIj48L2k+RGFzaGJvYXJkCiAgICAgICAgICAgICAgICAgICAgPC9hPgogICAgICAgICAgICAgICAgPC9saT4KICAgICAgICAgICAgICAgIDxsaSBjbGFzcz0iYnJlYWRjcnVtYi1pdGVtIj5SZWthcCBQZW5kYXBhdGFuIFN0cnVrPC9saT4KICAgICAgICAgICAgICAgIDxsaSBjbGFzcz0iYnJlYWRjcnVtYi1pdGVtIGFjdGl2ZSIgYXJpYS1jdXJyZW50PSJwYWdlIj4KICAgICAgICAgICAgICAgICAgICBLYWxlbmRlciBTZXRvcmFuCiAgICAgICAgICAgICAgICA8L2xpPgogICAgICAgICAgICA8L29sPgogICAgICAgIDwvbmF2PgoKICAgICAgICA8IS0tIER5bmFtaWMgTW9udGhseSBLUEkgU3VtbWFyeSBTdHJpcCAoQXV0by1jb21wdXRlZCBmcm9tICRzZXRvcmFuX2RhdGEpIC0tPgogICAgICAgIDxkaXYgY2xhc3M9ImNhbC1rcGktZ3JpZCI+CiAgICAgICAgICAgIDxkaXYgY2xhc3M9ImNhbC1rcGktY2FyZCI+CiAgICAgICAgICAgICAgICA8ZGl2PgogICAgICAgICAgICAgICAgICAgIDxkaXYgY2xhc3M9ImNhbC1rcGktbGFiZWwiPlRvdGFsIFNldG9yYW4gQnVsYW4gSW5pPC9kaXY+CiAgICAgICAgICAgICAgICAgICAgPGRpdiBpZD0ia3BpTW9udGhUb3RhbCIgY2xhc3M9ImNhbC1rcGktdmFsIj5ScCAwPC9kaXY+CiAgICAgICAgICAgICAgICAgICAgPGRpdiBpZD0ia3BpTW9udGhOYW1lU3ViIiBjbGFzcz0iY2FsLWtwaS1zdWIiPkFrdW11bGFzaSBidWxhbiBiZXJqYWxhbjwvZGl2PgogICAgICAgICAgICAgICAgPC9kaXY+CiAgICAgICAgICAgICAgICA8ZGl2IGNsYXNzPSJjYWwta3BpLWljb24iIHN0eWxlPSJiYWNrZ3JvdW5kOiByZ2JhKDE2LCAxODUsIDEyOSwgMC4xMik7IGNvbG9yOiAjMDU5NjY5OyI+CiAgICAgICAgICAgICAgICAgICAgPGkgY2xhc3M9Im1kaSBtZGktY2FzaC1tdWx0aXBsZSI+PC9pPgogICAgICAgICAgICAgICAgPC9kaXY+CiAgICAgICAgICAgIDwvZGl2PgoKICAgICAgICAgICAgPGRpdiBjbGFzcz0iY2FsLWtwaS1jYXJkIj4KICAgICAgICAgICAgICAgIDxkaXY+CiAgICAgICAgICAgICAgICAgICAgPGRpdiBjbGFzcz0iY2FsLWtwaS1sYWJlbCI+SGFyaSBBa3RpZiBTZXRvcmFuPC9kaXY+CiAgICAgICAgICAgICAgICAgICAgPGRpdiBpZD0ia3BpQWN0aXZlRGF5cyIgY2xhc3M9ImNhbC1rcGktdmFsIj4wIEhhcmk8L2Rpdj4KICAgICAgICAgICAgICAgICAgICA8ZGl2IGlkPSJrcGlBY3RpdmVSYXRpb1N1YiIgY2xhc3M9ImNhbC1rcGktc3ViIj5EYXJpIHRvdGFsIGhhcmkga2FsZW5kZXI8L2Rpdj4KICAgICAgICAgICAgICAgIDwvZGl2PgogICAgICAgICAgICAgICAgPGRpdiBjbGFzcz0iY2FsLWtwaS1pY29uIiBzdHlsZT0iYmFja2dyb3VuZDogcmdiYSgzNywgOTksIDIzNSwgMC4xMik7IGNvbG9yOiAjMjU2M2ViOyI+CiAgICAgICAgICAgICAgICAgICAgPGkgY2xhc3M9Im1kaSBtZGktY2FsZW5kYXItY2hlY2siPjwvaT4KICAgICAgICAgICAgICAgIDwvZGl2PgogICAgICAgICAgICA8L2Rpdj4KCiAgICAgICAgICAgIDxkaXYgY2xhc3M9ImNhbC1rcGktY2FyZCI+CiAgICAgICAgICAgICAgICA8ZGl2PgogICAgICAgICAgICAgICAgICAgIDxkaXYgY2xhc3M9ImNhbC1rcGktbGFiZWwiPlJhdGEtcmF0YSBTZXRvcmFuIC8gSGFyaTwvZGl2PgogICAgICAgICAgICAgICAgICAgIDxkaXYgaWQ9ImtwaUF2Z0RhaWx5IiBjbGFzcz0iY2FsLWtwaS12YWwiPlJwIDA8L2Rpdj4KICAgICAgICAgICAgICAgICAgICA8ZGl2IGNsYXNzPSJjYWwta3BpLXN1YiI+UmF0YS1yYXRhIHBhZGEgaGFyaSBha3RpZjwvZGl2PgogICAgICAgICAgICAgICAgPC9kaXY+CiAgICAgICAgICAgICAgICA8ZGl2IGNsYXNzPSJjYWwta3BpLWljb24iIHN0eWxlPSJiYWNrZ3JvdW5kOiByZ2JhKDEzOSwgOTIsIDI0NiwgMC4xMik7IGNvbG9yOiAjN2MzYWVkOyI+CiAgICAgICAgICAgICAgICAgICAgPGkgY2xhc3M9Im1kaSBtZGktY2hhcnQtbGluZSI+PC9pPgogICAgICAgICAgICAgICAgPC9kaXY+CiAgICAgICAgICAgIDwvZGl2PgoKICAgICAgICAgICAgPGRpdiBjbGFzcz0iY2FsLWtwaS1jYXJkIj4KICAgICAgICAgICAgICAgIDxkaXY+CiAgICAgICAgICAgICAgICAgICAgPGRpdiBjbGFzcz0iY2FsLWtwaS1sYWJlbCI+U2V0b3JhbiBUZXJ0aW5nZ2k8L2Rpdj4KICAgICAgICAgICAgICAgICAgICA8ZGl2IGlkPSJrcGlNYXhEYWlseSIgY2xhc3M9ImNhbC1rcGktdmFsIj5ScCAwPC9kaXY+CiAgICAgICAgICAgICAgICAgICAgPGRpdiBpZD0ia3BpTWF4RGF0ZVN1YiIgY2xhc3M9ImNhbC1rcGktc3ViIj5CZWx1bSBhZGEgc2V0b3JhbjwvZGl2PgogICAgICAgICAgICAgICAgPC9kaXY+CiAgICAgICAgICAgICAgICA8ZGl2IGNsYXNzPSJjYWwta3BpLWljb24iIHN0eWxlPSJiYWNrZ3JvdW5kOiByZ2JhKDI0NSwgMTU4LCAxMSwgMC4xNCk7IGNvbG9yOiAjZDk3NzA2OyI+CiAgICAgICAgICAgICAgICAgICAgPGkgY2xhc3M9Im1kaSBtZGktdHJvcGh5LW91dGxpbmUiPjwvaT4KICAgICAgICAgICAgICAgIDwvZGl2PgogICAgICAgICAgICA8L2Rpdj4KICAgICAgICA8L2Rpdj4KCiAgICAgICAgPCEtLSBNYWluIENhbGVuZGFyIFNlY3Rpb24gLS0+CiAgICAgICAgPHNlY3Rpb24gY2xhc3M9ImNhbGVuZGFyLWNhcmQiPgogICAgICAgICAgICA8aGVhZGVyIGNsYXNzPSJjYWxlbmRhci1oZWFkZXIiPgogICAgICAgICAgICAgICAgPGRpdj4KICAgICAgICAgICAgICAgICAgICA8ZGl2IGNsYXNzPSJleWVicm93Ij4KICAgICAgICAgICAgICAgICAgICAgICAgPHNwYW4gY2xhc3M9ImV5ZWJyb3ctZG90Ij48L3NwYW4+CiAgICAgICAgICAgICAgICAgICAgICAgIDxzcGFuPkFTUFJJIMK3IE9wZXJhc2lvbmFsIEJlbmRhaGFyYTwvc3Bhbj4KICAgICAgICAgICAgICAgICAgICA8L2Rpdj4KICAgICAgICAgICAgICAgICAgICA8aDEgY2xhc3M9InBhZ2UtdGl0bGUiPkthbGVuZGVyIFNldG9yYW4gSGFyaWFuPC9oMT4KICAgICAgICAgICAgICAgICAgICA8cCBjbGFzcz0icGFnZS1kZXNjcmlwdGlvbiI+CiAgICAgICAgICAgICAgICAgICAgICAgIFBhbnRhdSByZWFsaXNhc2kgZGFuIHBlcmlrc2EgcmluY2lhbiBzZXRvcmFuIHJldHJpYnVzaSBwYXJraXIgaGFyaWFuIGJlcmRhc2Fya2FuIHRhbmdnYWwuCiAgICAgICAgICAgICAgICAgICAgPC9wPgogICAgICAgICAgICAgICAgPC9kaXY+CgogICAgICAgICAgICAgICAgPGRpdiBjbGFzcz0iZC1mbGV4IGFsaWduLWl0ZW1zLWNlbnRlciBnYXAtMiI+CiAgICAgICAgICAgICAgICAgICAgPGJ1dHRvbiB0eXBlPSJidXR0b24iIGlkPSJqdW1wVG9kYXlCdG4iIGNsYXNzPSJuYXYtdG9kYXktYnRuIiB0aXRsZT0iS2VtYmFsaSBrZSBCdWxhbiBJbmkiPgogICAgICAgICAgICAgICAgICAgICAgICA8aSBjbGFzcz0ibWRpIG1kaS1jYWxlbmRhci10b2RheSI+PC9pPgogICAgICAgICAgICAgICAgICAgICAgICA8c3Bhbj5CdWxhbiBJbmk8L3NwYW4+CiAgICAgICAgICAgICAgICAgICAgPC9idXR0b24+CiAgICAgICAgICAgICAgICA8L2Rpdj4KICAgICAgICAgICAgPC9oZWFkZXI+CgogICAgICAgICAgICA8ZGl2IGNsYXNzPSJjYWxlbmRhci1jb250ZW50Ij4KICAgICAgICAgICAgICAgIDwhLS0gTW9udGggTmF2aWdhdGlvbiBDb250cm9scyAtLT4KICAgICAgICAgICAgICAgIDxkaXYgY2xhc3M9ImNhbGVuZGFyLW5hdiI+CiAgICAgICAgICAgICAgICAgICAgPGJ1dHRvbiB0eXBlPSJidXR0b24iIGlkPSJwcmV2TW9udGgiIGNsYXNzPSJuYXYtbW9udGgtYnRuIj4KICAgICAgICAgICAgICAgICAgICAgICAgPGkgY2xhc3M9Im1kaSBtZGktY2hldnJvbi1sZWZ0IGJpIGJpLWNoZXZyb24tbGVmdCI+PC9pPgogICAgICAgICAgICAgICAgICAgICAgICA8c3Bhbj5TZWJlbHVtbnlhPC9zcGFuPgogICAgICAgICAgICAgICAgICAgIDwvYnV0dG9uPgoKICAgICAgICAgICAgICAgICAgICA8ZGl2IGNsYXNzPSJtb250aC1sYWJlbC13cmFwIj4KICAgICAgICAgICAgICAgICAgICAgICAgPGkgY2xhc3M9Im1kaSBtZGktY2FsZW5kYXItbW9udGggdGV4dC1wcmltYXJ5IGZzLTUiPjwvaT4KICAgICAgICAgICAgICAgICAgICAgICAgPGgyIGlkPSJjdXJyZW50TW9udGgiIGNsYXNzPSJtb250aC1sYWJlbCI+PC9oMj4KICAgICAgICAgICAgICAgICAgICA8L2Rpdj4KCiAgICAgICAgICAgICAgICAgICAgPGJ1dHRvbiB0eXBlPSJidXR0b24iIGlkPSJuZXh0TW9udGgiIGNsYXNzPSJuYXYtbW9udGgtYnRuIj4KICAgICAgICAgICAgICAgICAgICAgICAgPHNwYW4+QmVyaWt1dG55YTwvc3Bhbj4KICAgICAgICAgICAgICAgICAgICAgICAgPGkgY2xhc3M9Im1kaSBtZGktY2hldnJvbi1yaWdodCBiaSBiaS1jaGV2cm9uLXJpZ2h0Ij48L2k+CiAgICAgICAgICAgICAgICAgICAgPC9idXR0b24+CiAgICAgICAgICAgICAgICA8L2Rpdj4KCiAgICAgICAgICAgICAgICA8IS0tIENhbGVuZGFyIE1hdHJpeCAtLT4KICAgICAgICAgICAgICAgIDxkaXYgY2xhc3M9ImNhbGVuZGFyLXNjcm9sbCI+CiAgICAgICAgICAgICAgICAgICAgPHRhYmxlIGNsYXNzPSJjYWxlbmRhciIgYXJpYS1sYWJlbD0iS2FsZW5kZXIgc2V0b3JhbiBidWxhbmFuIj4KICAgICAgICAgICAgICAgICAgICAgICAgPHRoZWFkPgogICAgICAgICAgICAgICAgICAgICAgICAgICAgPHRyPgogICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgIDx0aCBzY29wZT0iY29sIj5NaW48L3RoPgogICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgIDx0aCBzY29wZT0iY29sIj5TZW48L3RoPgogICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgIDx0aCBzY29wZT0iY29sIj5TZWw8L3RoPgogICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgIDx0aCBzY29wZT0iY29sIj5SYWI8L3RoPgogICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgIDx0aCBzY29wZT0iY29sIj5LYW08L3RoPgogICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgIDx0aCBzY29wZT0iY29sIj5KdW08L3RoPgogICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgIDx0aCBzY29wZT0iY29sIj5TYWI8L3RoPgogICAgICAgICAgICAgICAgICAgICAgICAgICAgPC90cj4KICAgICAgICAgICAgICAgICAgICAgICAgPC90aGVhZD4KICAgICAgICAgICAgICAgICAgICAgICAgPHRib2R5IGlkPSJjYWxlbmRhci1ib2R5Ij48L3Rib2R5PgogICAgICAgICAgICAgICAgICAgIDwvdGFibGU+CiAgICAgICAgICAgICAgICA8L2Rpdj4KCiAgICAgICAgICAgICAgICA8IS0tIExlZ2VuZCAmIEhlbHBlciBOb3RlIC0tPgogICAgICAgICAgICAgICAgPGRpdiBjbGFzcz0iY2FsZW5kYXItbGVnZW5kIj4KICAgICAgICAgICAgICAgICAgICA8ZGl2IGNsYXNzPSJsZWdlbmQtaXRlbXMiPgogICAgICAgICAgICAgICAgICAgICAgICA8c3BhbiBjbGFzcz0ibGVnZW5kLWl0ZW0iPgogICAgICAgICAgICAgICAgICAgICAgICAgICAgPHNwYW4gY2xhc3M9ImxlZ2VuZC1kb3QiPjwvc3Bhbj4KICAgICAgICAgICAgICAgICAgICAgICAgICAgIDxzcGFuPlRhbmdnYWwgZGVuZ2FuIHNldG9yYW4gbWFzdWsgKGtsaWsgdW50dWsgZGV0YWlsIGhhcmlhbik8L3NwYW4+CiAgICAgICAgICAgICAgICAgICAgICAgIDwvc3Bhbj4KICAgICAgICAgICAgICAgICAgICAgICAgPHNwYW4gY2xhc3M9ImxlZ2VuZC1pdGVtIj4KICAgICAgICAgICAgICAgICAgICAgICAgICAgIDxzcGFuIGNsYXNzPSJsZWdlbmQtZG90LXRvZGF5Ij48L3NwYW4+CiAgICAgICAgICAgICAgICAgICAgICAgICAgICA8c3Bhbj5UYW5nZ2FsIGhhcmkgaW5pPC9zcGFuPgogICAgICAgICAgICAgICAgICAgICAgICA8L3NwYW4+CiAgICAgICAgICAgICAgICAgICAgPC9kaXY+CiAgICAgICAgICAgICAgICAgICAgPHNwYW4gY2xhc3M9ImZ3LXNlbWlib2xkIj5LbGlrIG5vbWluYWwgaGlqYXUgdW50dWsgbWVtYnVrYSByaW5jaWFuIHBlciBqdXJ1IHBhcmtpcjwvc3Bhbj4KICAgICAgICAgICAgICAgIDwvZGl2PgoKICAgICAgICAgICAgICAgIDwhLS0gUHJlc2VydmVkIFRvdGFsIERlcG9zaXQgQ29udGFpbmVyIC0tPgogICAgICAgICAgICAgICAgPGRpdiBpZD0idG90YWxEZXBvc2l0IiBhcmlhLWxpdmU9InBvbGl0ZSI+PC9kaXY+CiAgICAgICAgICAgIDwvZGl2PgogICAgICAgIDwvc2VjdGlvbj4KCiAgICAgICAgPGZvb3RlciBjbGFzcz0ibXQtNCBkLWZsZXgganVzdGlmeS1jb250ZW50LWJldHdlZW4gZmxleC13cmFwIGdhcC0yIHRleHQtbXV0ZWQiIHN0eWxlPSJmb250LXNpemU6MTEuNXB4Ij4KICAgICAgICAgICAgPHNwYW4+wqkgPD89IGRhdGUoJ1knKSA/PiBBU1BSSSDCtyBTaXN0ZW0gSW5mb3JtYXNpIFBhcmtpcjwvc3Bhbj4KICAgICAgICAgICAgPHNwYW4+RGV2ZWxvcGVkIGJ5IDxzdHJvbmc+RGFOekRldi5JRDwvc3Ryb25nPjwvc3Bhbj4KICAgICAgICA8L2Zvb3Rlcj4KCiAgICA8L2Rpdj4KPC9kaXY+Cgo8c2NyaXB0PgooZnVuY3Rpb24gKCkgewogICAgJ3VzZSBzdHJpY3QnOwoKICAgIC8vIERhdGEgYWdyZWdhdCBzZXRvcmFuIHlhbmcgZGlraXJpbSBvbGVoIGNvbnRyb2xsZXIgQ0kzIChEaXBlcnRhaGFua2FuIDEwMCUpLgogICAgY29uc3Qgc2V0b3JhbkRhdGEgPSA8Pz0gJHNldG9yYW5fZGF0YSA/OiAne30nOyA/PjsKCiAgICBjb25zdCBjYWxlbmRhckJvZHkgPSBkb2N1bWVudC5nZXRFbGVtZW50QnlJZCgnY2FsZW5kYXItYm9keScpOwogICAgY29uc3QgY3VycmVudE1vbnRoTGFiZWwgPSBkb2N1bWVudC5nZXRFbGVtZW50QnlJZCgnY3VycmVudE1vbnRoJyk7CiAgICBjb25zdCB0b3RhbERlcG9zaXRFbGVtZW50ID0gZG9jdW1lbnQuZ2V0RWxlbWVudEJ5SWQoJ3RvdGFsRGVwb3NpdCcpOwoKICAgIC8vIEVsZW1lbiBLUEkgdGFtYmFoYW4KICAgIGNvbnN0IGtwaU1vbnRoVG90YWwgPSBkb2N1bWVudC5nZXRFbGVtZW50QnlJZCgna3BpTW9udGhUb3RhbCcpOwogICAgY29uc3Qga3BpTW9udGhOYW1lU3ViID0gZG9jdW1lbnQuZ2V0RWxlbWVudEJ5SWQoJ2twaU1vbnRoTmFtZVN1YicpOwogICAgY29uc3Qga3BpQWN0aXZlRGF5cyA9IGRvY3VtZW50LmdldEVsZW1lbnRCeUlkKCdrcGlBY3RpdmVEYXlzJyk7CiAgICBjb25zdCBrcGlBY3RpdmVSYXRpb1N1YiA9IGRvY3VtZW50LmdldEVsZW1lbnRCeUlkKCdrcGlBY3RpdmVSYXRpb1N1YicpOwogICAgY29uc3Qga3BpQXZnRGFpbHkgPSBkb2N1bWVudC5nZXRFbGVtZW50QnlJZCgna3BpQXZnRGFpbHknKTsKICAgIGNvbnN0IGtwaU1heERhaWx5ID0gZG9jdW1lbnQuZ2V0RWxlbWVudEJ5SWQoJ2twaU1heERhaWx5Jyk7CiAgICBjb25zdCBrcGlNYXhEYXRlU3ViID0gZG9jdW1lbnQuZ2V0RWxlbWVudEJ5SWQoJ2twaU1heERhdGVTdWInKTsKCiAgICBpZiAoIWNhbGVuZGFyQm9keSB8fCAhY3VycmVudE1vbnRoTGFiZWwgfHwgIXRvdGFsRGVwb3NpdEVsZW1lbnQpIHsKICAgICAgICByZXR1cm47CiAgICB9CgogICAgY29uc3QgbW9udGhOYW1lcyA9IFsKICAgICAgICAnSmFudWFyaScsICdGZWJydWFyaScsICdNYXJldCcsICdBcHJpbCcsCiAgICAgICAgJ01laScsICdKdW5pJywgJ0p1bGknLCAnQWd1c3R1cycsCiAgICAgICAgJ1NlcHRlbWJlcicsICdPa3RvYmVyJywgJ05vdmVtYmVyJywgJ0Rlc2VtYmVyJwogICAgXTsKCiAgICBjb25zdCBmb3JtYXRSdXBpYWggPSBmdW5jdGlvbiAodmFsdWUpIHsKICAgICAgICByZXR1cm4gbmV3IEludGwuTnVtYmVyRm9ybWF0KCdpZC1JRCcsIHsKICAgICAgICAgICAgbWF4aW11bUZyYWN0aW9uRGlnaXRzOiAwCiAgICAgICAgfSkuZm9ybWF0KHZhbHVlKTsKICAgIH07CgogICAgY29uc3QgdG9kYXlPYmogPSBuZXcgRGF0ZSgpOwogICAgY29uc3QgdG9kYXlZZWFyID0gdG9kYXlPYmouZ2V0RnVsbFllYXIoKTsKICAgIGNvbnN0IHRvZGF5TW9udGggPSB0b2RheU9iai5nZXRNb250aCgpOwogICAgY29uc3QgdG9kYXlEYXRlID0gdG9kYXlPYmouZ2V0RGF0ZSgpOwoKICAgIGxldCBjdXJyZW50TW9udGggPSB0b2RheU1vbnRoOwogICAgbGV0IGN1cnJlbnRZZWFyID0gdG9kYXlZZWFyOwoKICAgIGZ1bmN0aW9uIGdlbmVyYXRlQ2FsZW5kYXIobW9udGgsIHllYXIpIHsKICAgICAgICBjYWxlbmRhckJvZHkuaW5uZXJIVE1MID0gJyc7CgogICAgICAgIGNvbnN0IGZpcnN0RGF5ID0gbmV3IERhdGUoeWVhciwgbW9udGgsIDEpLmdldERheSgpOwogICAgICAgIGNvbnN0IGRheXNJbk1vbnRoID0gbmV3IERhdGUoeWVhciwgbW9udGggKyAxLCAwKS5nZXREYXRlKCk7CgogICAgICAgIGxldCBkYXRlID0gMTsKICAgICAgICBsZXQgdG90YWxTZXRvcmFuID0gMDsKICAgICAgICBsZXQgYWN0aXZlRGF5c0NvdW50ID0gMDsKICAgICAgICBsZXQgbWF4U2V0b3JhbiA9IDA7CiAgICAgICAgbGV0IG1heFNldG9yYW5EYXRlU3RyID0gJyc7CgogICAgICAgIGZvciAobGV0IGkgPSAwOyBpIDwgNjsgaSsrKSB7CiAgICAgICAgICAgIGNvbnN0IHJvdyA9IGRvY3VtZW50LmNyZWF0ZUVsZW1lbnQoJ3RyJyk7CgogICAgICAgICAgICBmb3IgKGxldCBqID0gMDsgaiA8IDc7IGorKykgewogICAgICAgICAgICAgICAgY29uc3QgY2VsbCA9IGRvY3VtZW50LmNyZWF0ZUVsZW1lbnQoJ3RkJyk7CgogICAgICAgICAgICAgICAgaWYgKChpID09PSAwICYmIGogPCBmaXJzdERheSkgfHwgZGF0ZSA+IGRheXNJbk1vbnRoKSB7CiAgICAgICAgICAgICAgICAgICAgY2VsbC5jbGFzc0xpc3QuYWRkKCdlbXB0eS1kYXknKTsKICAgICAgICAgICAgICAgICAgICByb3cuYXBwZW5kQ2hpbGQoY2VsbCk7CiAgICAgICAgICAgICAgICAgICAgY29udGludWU7CiAgICAgICAgICAgICAgICB9CgogICAgICAgICAgICAgICAgY29uc3QgY3VycmVudERhdGUgPSBbCiAgICAgICAgICAgICAgICAgICAgeWVhciwKICAgICAgICAgICAgICAgICAgICBTdHJpbmcobW9udGggKyAxKS5wYWRTdGFydCgyLCAnMCcpLAogICAgICAgICAgICAgICAgICAgIFN0cmluZyhkYXRlKS5wYWRTdGFydCgyLCAnMCcpCiAgICAgICAgICAgICAgICBdLmpvaW4oJy0nKTsKCiAgICAgICAgICAgICAgICBjb25zdCBpc1RvZGF5ID0gKHllYXIgPT09IHRvZGF5WWVhciAmJiBtb250aCA9PT0gdG9kYXlNb250aCAmJiBkYXRlID09PSB0b2RheURhdGUpOwogICAgICAgICAgICAgICAgaWYgKGlzVG9kYXkpIHsKICAgICAgICAgICAgICAgICAgICBjZWxsLmNsYXNzTGlzdC5hZGQoJ2lzLXRvZGF5Jyk7CiAgICAgICAgICAgICAgICB9CgogICAgICAgICAgICAgICAgY29uc3QgYW1vdW50ID0gTnVtYmVyKHNldG9yYW5EYXRhW2N1cnJlbnREYXRlXSB8fCAwKTsKCiAgICAgICAgICAgICAgICBjb25zdCB0b3BSb3cgPSBkb2N1bWVudC5jcmVhdGVFbGVtZW50KCdkaXYnKTsKICAgICAgICAgICAgICAgIHRvcFJvdy5jbGFzc05hbWUgPSAnZGF5LWhlYWRlci1yb3cnOwoKICAgICAgICAgICAgICAgIGNvbnN0IGRheU51bWJlciA9IGRvY3VtZW50LmNyZWF0ZUVsZW1lbnQoJ3NwYW4nKTsKICAgICAgICAgICAgICAgIGRheU51bWJlci5jbGFzc05hbWUgPSAnZGF5LW51bWJlcic7CiAgICAgICAgICAgICAgICBkYXlOdW1iZXIudGV4dENvbnRlbnQgPSBkYXRlOwogICAgICAgICAgICAgICAgdG9wUm93LmFwcGVuZENoaWxkKGRheU51bWJlcik7CgogICAgICAgICAgICAgICAgaWYgKGlzVG9kYXkpIHsKICAgICAgICAgICAgICAgICAgICBjb25zdCB0b2RheVRhZyA9IGRvY3VtZW50LmNyZWF0ZUVsZW1lbnQoJ3NwYW4nKTsKICAgICAgICAgICAgICAgICAgICB0b2RheVRhZy5jbGFzc05hbWUgPSAndG9kYXktdGFnJzsKICAgICAgICAgICAgICAgICAgICB0b2RheVRhZy50ZXh0Q29udGVudCA9ICdIYXJpIEluaSc7CiAgICAgICAgICAgICAgICAgICAgdG9wUm93LmFwcGVuZENoaWxkKHRvZGF5VGFnKTsKICAgICAgICAgICAgICAgIH0KCiAgICAgICAgICAgICAgICBpZiAoYW1vdW50ICE9PSAwKSB7CiAgICAgICAgICAgICAgICAgICAgY2VsbC5jbGFzc0xpc3QuYWRkKCdoYXMtc2V0b3JhbicpOwogICAgICAgICAgICAgICAgICAgIHRvdGFsU2V0b3JhbiArPSBhbW91bnQ7CiAgICAgICAgICAgICAgICAgICAgYWN0aXZlRGF5c0NvdW50Kys7CgogICAgICAgICAgICAgICAgICAgIGlmIChhbW91bnQgPiBtYXhTZXRvcmFuKSB7CiAgICAgICAgICAgICAgICAgICAgICAgIG1heFNldG9yYW4gPSBhbW91bnQ7CiAgICAgICAgICAgICAgICAgICAgICAgIG1heFNldG9yYW5EYXRlU3RyID0gZGF0ZSArICcgJyArIG1vbnRoTmFtZXNbbW9udGhdICsgJyAnICsgeWVhcjsKICAgICAgICAgICAgICAgICAgICB9CgogICAgICAgICAgICAgICAgICAgIGNvbnN0IGxpbmsgPSBkb2N1bWVudC5jcmVhdGVFbGVtZW50KCdhJyk7CiAgICAgICAgICAgICAgICAgICAgbGluay5ocmVmID0gJzw/PSBiYXNlX3VybCgncGVuZGFwYXRhbl9oYXJpYW4nKTsgPz4/dGFuZ2dhbD0nCiAgICAgICAgICAgICAgICAgICAgICAgICsgZW5jb2RlVVJJQ29tcG9uZW50KGN1cnJlbnREYXRlKTsKICAgICAgICAgICAgICAgICAgICBsaW5rLnNldEF0dHJpYnV0ZSgKICAgICAgICAgICAgICAgICAgICAgICAgJ2FyaWEtbGFiZWwnLAogICAgICAgICAgICAgICAgICAgICAgICAnTGloYXQgc2V0b3JhbiB0YW5nZ2FsICcgKyBkYXRlICsgJyBzZWJlc2FyIFJwICcgKwogICAgICAgICAgICAgICAgICAgICAgICBmb3JtYXRSdXBpYWgoYW1vdW50KQogICAgICAgICAgICAgICAgICAgICk7CgogICAgICAgICAgICAgICAgICAgIGNvbnN0IGJhZGdlV3JhcCA9IGRvY3VtZW50LmNyZWF0ZUVsZW1lbnQoJ2RpdicpOwogICAgICAgICAgICAgICAgICAgIGJhZGdlV3JhcC5jbGFzc05hbWUgPSAnZGVwb3NpdC1iYWRnZS13cmFwJzsKCiAgICAgICAgICAgICAgICAgICAgY29uc3QgYW1vdW50TGFiZWwgPSBkb2N1bWVudC5jcmVhdGVFbGVtZW50KCdzcGFuJyk7CiAgICAgICAgICAgICAgICAgICAgYW1vdW50TGFiZWwuY2xhc3NOYW1lID0gJ2RlcG9zaXQtYW1vdW50JzsKICAgICAgICAgICAgICAgICAgICBhbW91bnRMYWJlbC50ZXh0Q29udGVudCA9ICdScCAnICsgZm9ybWF0UnVwaWFoKGFtb3VudCk7CgogICAgICAgICAgICAgICAgICAgIGNvbnN0IGFycm93SWNvbiA9IGRvY3VtZW50LmNyZWF0ZUVsZW1lbnQoJ2knKTsKICAgICAgICAgICAgICAgICAgICBhcnJvd0ljb24uY2xhc3NOYW1lID0gJ21kaSBtZGktYXJyb3ctdG9wLXJpZ2h0IGRlcG9zaXQtYXJyb3cnOwoKICAgICAgICAgICAgICAgICAgICBiYWRnZVdyYXAuYXBwZW5kQ2hpbGQoYW1vdW50TGFiZWwpOwogICAgICAgICAgICAgICAgICAgIGJhZGdlV3JhcC5hcHBlbmRDaGlsZChhcnJvd0ljb24pOwoKICAgICAgICAgICAgICAgICAgICBsaW5rLmFwcGVuZENoaWxkKHRvcFJvdyk7CiAgICAgICAgICAgICAgICAgICAgbGluay5hcHBlbmRDaGlsZChiYWRnZVdyYXApOwogICAgICAgICAgICAgICAgICAgIGNlbGwuYXBwZW5kQ2hpbGQobGluayk7CiAgICAgICAgICAgICAgICAgICAgY2VsbC50aXRsZSA9ICdLbGlrIHVudHVrIG1lbGloYXQgZGV0YWlsIHNldG9yYW4gdGFuZ2dhbCAnICsgZGF0ZSArICcgJyArIG1vbnRoTmFtZXNbbW9udGhdOwogICAgICAgICAgICAgICAgfSBlbHNlIHsKICAgICAgICAgICAgICAgICAgICBjZWxsLmFwcGVuZENoaWxkKHRvcFJvdyk7CiAgICAgICAgICAgICAgICB9CgogICAgICAgICAgICAgICAgcm93LmFwcGVuZENoaWxkKGNlbGwpOwogICAgICAgICAgICAgICAgZGF0ZSsrOwogICAgICAgICAgICB9CgogICAgICAgICAgICBjYWxlbmRhckJvZHkuYXBwZW5kQ2hpbGQocm93KTsKCiAgICAgICAgICAgIGlmIChkYXRlID4gZGF5c0luTW9udGgpIHsKICAgICAgICAgICAgICAgIGJyZWFrOwogICAgICAgICAgICB9CiAgICAgICAgfQoKICAgICAgICAvLyBVcGRhdGUgQm90dG9tIFRvdGFsIEJhbm5lciAoUHJlc2VydmVkIHN0cnVjdHVyZSkKICAgICAgICB0b3RhbERlcG9zaXRFbGVtZW50LmlubmVySFRNTCA9ICcnOwoKICAgICAgICBjb25zdCB0b3RhbENhcmQgPSBkb2N1bWVudC5jcmVhdGVFbGVtZW50KCdkaXYnKTsKICAgICAgICB0b3RhbENhcmQuY2xhc3NOYW1lID0gJ3RvdGFsLWNhcmQnOwoKICAgICAgICBjb25zdCB0b3RhbFRleHQgPSBkb2N1bWVudC5jcmVhdGVFbGVtZW50KCdkaXYnKTsKICAgICAgICBjb25zdCB0b3RhbExhYmVsID0gZG9jdW1lbnQuY3JlYXRlRWxlbWVudCgnZGl2Jyk7CiAgICAgICAgdG90YWxMYWJlbC5jbGFzc05hbWUgPSAndG90YWwtbGFiZWwnOwogICAgICAgIHRvdGFsTGFiZWwudGV4dENvbnRlbnQgPSAnVG90YWwgU2V0b3JhbiBCdWxhbiAnICsgbW9udGhOYW1lc1ttb250aF0gKyAnICcgKyB5ZWFyOwoKICAgICAgICBjb25zdCB0b3RhbFZhbHVlID0gZG9jdW1lbnQuY3JlYXRlRWxlbWVudCgnZGl2Jyk7CiAgICAgICAgdG90YWxWYWx1ZS5jbGFzc05hbWUgPSAndG90YWwtdmFsdWUnOwogICAgICAgIHRvdGFsVmFsdWUudGV4dENvbnRlbnQgPSAnUnAgJyArIGZvcm1hdFJ1cGlhaCh0b3RhbFNldG9yYW4pOwoKICAgICAgICB0b3RhbFRleHQuYXBwZW5kQ2hpbGQodG90YWxMYWJlbCk7CiAgICAgICAgdG90YWxUZXh0LmFwcGVuZENoaWxkKHRvdGFsVmFsdWUpOwoKICAgICAgICBjb25zdCBpY29uID0gZG9jdW1lbnQuY3JlYXRlRWxlbWVudCgnZGl2Jyk7CiAgICAgICAgaWNvbi5jbGFzc05hbWUgPSAndG90YWwtaWNvbic7CiAgICAgICAgaWNvbi5pbm5lckhUTUwgPSAnPGkgY2xhc3M9Im1kaSBtZGktd2FsbGV0LW91dGxpbmUgYmkgYmktd2FsbGV0MiIgYXJpYS1oaWRkZW49InRydWUiPjwvaT4nOwoKICAgICAgICB0b3RhbENhcmQuYXBwZW5kQ2hpbGQodG90YWxUZXh0KTsKICAgICAgICB0b3RhbENhcmQuYXBwZW5kQ2hpbGQoaWNvbik7CiAgICAgICAgdG90YWxEZXBvc2l0RWxlbWVudC5hcHBlbmRDaGlsZCh0b3RhbENhcmQpOwoKICAgICAgICAvLyBVcGRhdGUgVG9wIEtQSSBTdW1tYXJ5IENhcmRzCiAgICAgICAgaWYgKGtwaU1vbnRoVG90YWwpIGtwaU1vbnRoVG90YWwudGV4dENvbnRlbnQgPSAnUnAgJyArIGZvcm1hdFJ1cGlhaCh0b3RhbFNldG9yYW4pOwogICAgICAgIGlmIChrcGlNb250aE5hbWVTdWIpIGtwaU1vbnRoTmFtZVN1Yi50ZXh0Q29udGVudCA9ICdQZXJpb2RlICcgKyBtb250aE5hbWVzW21vbnRoXSArICcgJyArIHllYXI7CiAgICAgICAgaWYgKGtwaUFjdGl2ZURheXMpIGtwaUFjdGl2ZURheXMudGV4dENvbnRlbnQgPSBhY3RpdmVEYXlzQ291bnQgKyAnIEhhcmknOwogICAgICAgIGlmIChrcGlBY3RpdmVSYXRpb1N1YikgewogICAgICAgICAgICBjb25zdCBwY3QgPSBkYXlzSW5Nb250aCA+IDAgPyBNYXRoLnJvdW5kKChhY3RpdmVEYXlzQ291bnQgLyBkYXlzSW5Nb250aCkgKiAxMDApIDogMDsKICAgICAgICAgICAga3BpQWN0aXZlUmF0aW9TdWIudGV4dENvbnRlbnQgPSBwY3QgKyAnJSBkYXJpICcgKyBkYXlzSW5Nb250aCArICcgaGFyaSBrYWxlbmRlcic7CiAgICAgICAgfQogICAgICAgIGlmIChrcGlBdmdEYWlseSkgewogICAgICAgICAgICBjb25zdCBhdmcgPSBhY3RpdmVEYXlzQ291bnQgPiAwID8gTWF0aC5yb3VuZCh0b3RhbFNldG9yYW4gLyBhY3RpdmVEYXlzQ291bnQpIDogMDsKICAgICAgICAgICAga3BpQXZnRGFpbHkudGV4dENvbnRlbnQgPSAnUnAgJyArIGZvcm1hdFJ1cGlhaChhdmcpOwogICAgICAgIH0KICAgICAgICBpZiAoa3BpTWF4RGFpbHkpIGtwaU1heERhaWx5LnRleHRDb250ZW50ID0gJ1JwICcgKyBmb3JtYXRSdXBpYWgobWF4U2V0b3Jhbik7CiAgICAgICAgaWYgKGtwaU1heERhdGVTdWIpIHsKICAgICAgICAgICAga3BpTWF4RGF0ZVN1Yi50ZXh0Q29udGVudCA9IG1heFNldG9yYW4gPiAwID8gJ1BhZGEgJyArIG1heFNldG9yYW5EYXRlU3RyIDogJ0JlbHVtIGFkYSBzZXRvcmFuIGRpIGJ1bGFuIGluaSc7CiAgICAgICAgfQogICAgfQoKICAgIGZ1bmN0aW9uIHVwZGF0ZU1vbnRoRGlzcGxheSgpIHsKICAgICAgICBjdXJyZW50TW9udGhMYWJlbC50ZXh0Q29udGVudCA9CiAgICAgICAgICAgIG1vbnRoTmFtZXNbY3VycmVudE1vbnRoXSArICcgJyArIGN1cnJlbnRZZWFyOwogICAgfQoKICAgIGRvY3VtZW50LmdldEVsZW1lbnRCeUlkKCdwcmV2TW9udGgnKS5hZGRFdmVudExpc3RlbmVyKCdjbGljaycsIGZ1bmN0aW9uICgpIHsKICAgICAgICBjdXJyZW50TW9udGgtLTsKCiAgICAgICAgaWYgKGN1cnJlbnRNb250aCA8IDApIHsKICAgICAgICAgICAgY3VycmVudE1vbnRoID0gMTE7CiAgICAgICAgICAgIGN1cnJlbnRZZWFyLS07CiAgICAgICAgfQoKICAgICAgICB1cGRhdGVNb250aERpc3BsYXkoKTsKICAgICAgICBnZW5lcmF0ZUNhbGVuZGFyKGN1cnJlbnRNb250aCwgY3VycmVudFllYXIpOwogICAgfSk7CgogICAgZG9jdW1lbnQuZ2V0RWxlbWVudEJ5SWQoJ25leHRNb250aCcpLmFkZEV2ZW50TGlzdGVuZXIoJ2NsaWNrJywgZnVuY3Rpb24gKCkgewogICAgICAgIGN1cnJlbnRNb250aCsrOwoKICAgICAgICBpZiAoY3VycmVudE1vbnRoID4gMTEpIHsKICAgICAgICAgICAgY3VycmVudE1vbnRoID0gMDsKICAgICAgICAgICAgY3VycmVudFllYXIrKzsKICAgICAgICB9CgogICAgICAgIHVwZGF0ZU1vbnRoRGlzcGxheSgpOwogICAgICAgIGdlbmVyYXRlQ2FsZW5kYXIoY3VycmVudE1vbnRoLCBjdXJyZW50WWVhcik7CiAgICB9KTsKCiAgICBjb25zdCBqdW1wVG9kYXlCdG4gPSBkb2N1bWVudC5nZXRFbGVtZW50QnlJZCgnanVtcFRvZGF5QnRuJyk7CiAgICBpZiAoanVtcFRvZGF5QnRuKSB7CiAgICAgICAganVtcFRvZGF5QnRuLmFkZEV2ZW50TGlzdGVuZXIoJ2NsaWNrJywgZnVuY3Rpb24gKCkgewogICAgICAgICAgICBjdXJyZW50TW9udGggPSB0b2RheU1vbnRoOwogICAgICAgICAgICBjdXJyZW50WWVhciA9IHRvZGF5WWVhcjsKICAgICAgICAgICAgdXBkYXRlTW9udGhEaXNwbGF5KCk7CiAgICAgICAgICAgIGdlbmVyYXRlQ2FsZW5kYXIoY3VycmVudE1vbnRoLCBjdXJyZW50WWVhcik7CiAgICAgICAgfSk7CiAgICB9CgogICAgdXBkYXRlTW9udGhEaXNwbGF5KCk7CiAgICBnZW5lcmF0ZUNhbGVuZGFyKGN1cnJlbnRNb250aCwgY3VycmVudFllYXIpOwp9KSgpOwo8L3NjcmlwdD4K')));
      function openKalenderPhpModal() {
        var box = document.getElementById('rawKalenderPhpBox');
        if (box) box.textContent = rawKalenderPhp;
        bootstrap.Modal.getOrCreateInstance(document.getElementById('kalenderPhpModal')).show();
      }

      function copyKalenderPhpCode() {
        var textarea = document.createElement('textarea');
        textarea.value = rawKalenderPhp;
        document.body.appendChild(textarea);
        textarea.select();
        document.execCommand('copy');
        document.body.removeChild(textarea);
        Swal.fire({
          title: 'Kode Kalender Setoran Disalin!',
          text: 'Silakan tempel langsung ke file view kalender_setoran.php Anda.',
          icon: 'success',
          timer: 2000,
          showConfirmButton: false
        });
      }

      (function () {
        'use strict';

        // Sample realistic $setoran_data for interactive preview in October & September 2026
        const setoranData = {
          "2026-10-01": 14250000,
          "2026-10-02": 15800000,
          "2026-10-03": 18900000,
          "2026-10-05": 16400000,
          "2026-10-06": 15100000,
          "2026-10-07": 17250000,
          "2026-10-08": 16800000,
          "2026-10-09": 18200000,
          "2026-10-10": 21450000,
          "2026-10-12": 15900000,
          "2026-10-13": 16300000,
          "2026-10-14": 17100000,
          "2026-10-15": 16750000,
          "2026-10-16": 19200000,
          "2026-10-17": 22100000,
          "2026-10-19": 16500000,
          "2026-10-20": 17800000,
          "2026-10-21": 18400000,
          "2026-10-22": 19650000,
          "2026-10-23": 300000,
          "2026-09-25": 17400000,
          "2026-09-26": 19800000,
          "2026-09-28": 16200000,
          "2026-09-29": 18100000,
          "2026-09-30": 20500000
        };

        const calendarBody = document.getElementById('calendar-body');
        const currentMonthLabel = document.getElementById('currentMonth');
        const totalDepositElement = document.getElementById('totalDeposit');

        const kpiMonthTotal = document.getElementById('kpiMonthTotal');
        const kpiMonthNameSub = document.getElementById('kpiMonthNameSub');
        const kpiActiveDays = document.getElementById('kpiActiveDays');
        const kpiActiveRatioSub = document.getElementById('kpiActiveRatioSub');
        const kpiAvgDaily = document.getElementById('kpiAvgDaily');
        const kpiMaxDaily = document.getElementById('kpiMaxDaily');
        const kpiMaxDateSub = document.getElementById('kpiMaxDateSub');

        if (!calendarBody || !currentMonthLabel || !totalDepositElement) {
          return;
        }

        const monthNames = [
          'Januari', 'Februari', 'Maret', 'April',
          'Mei', 'Juni', 'Juli', 'Agustus',
          'September', 'Oktober', 'November', 'Desember'
        ];

        const formatRupiah = function (value) {
          return new Intl.NumberFormat('id-ID', {
            maximumFractionDigits: 0
          }).format(value);
        };

        const todayYear = 2026;
        const todayMonth = 9; // Oktober (0-indexed)
        const todayDate = 23;

        let currentMonth = todayMonth;
        let currentYear = todayYear;

        function generateCalendar(month, year) {
          calendarBody.innerHTML = '';

          const firstDay = new Date(year, month, 1).getDay();
          const daysInMonth = new Date(year, month + 1, 0).getDate();

          let date = 1;
          let totalSetoran = 0;
          let activeDaysCount = 0;
          let maxSetoran = 0;
          let maxSetoranDateStr = '';

          for (let i = 0; i < 6; i++) {
            const row = document.createElement('tr');

            for (let j = 0; j < 7; j++) {
              const cell = document.createElement('td');

              if ((i === 0 && j < firstDay) || date > daysInMonth) {
                cell.classList.add('empty-day');
                row.appendChild(cell);
                continue;
              }

              const currentDate = [
                year,
                String(month + 1).padStart(2, '0'),
                String(date).padStart(2, '0')
              ].join('-');

              const isToday = (year === todayYear && month === todayMonth && date === todayDate);
              if (isToday) {
                cell.classList.add('is-today');
              }

              const amount = Number(setoranData[currentDate] || 0);

              const topRow = document.createElement('div');
              topRow.className = 'day-header-row';

              const dayNumber = document.createElement('span');
              dayNumber.className = 'day-number';
              dayNumber.textContent = date;
              topRow.appendChild(dayNumber);

              if (isToday) {
                const todayTag = document.createElement('span');
                todayTag.className = 'today-tag';
                todayTag.textContent = 'Hari Ini';
                topRow.appendChild(todayTag);
              }

              if (amount !== 0) {
                cell.classList.add('has-setoran');
                totalSetoran += amount;
                activeDaysCount++;

                if (amount > maxSetoran) {
                  maxSetoran = amount;
                  maxSetoranDateStr = date + ' ' + monthNames[month] + ' ' + year;
                }

                const link = document.createElement('a');
                link.href = '#content';
                link.addEventListener('click', function(e) {
                  e.preventDefault();
                  Swal.fire({
                    title: 'Setoran Tanggal ' + date + ' ' + monthNames[month] + ' ' + year,
                    html: 'Mengarahkan ke:<br><code>base_url("pendapatan_harian")?tanggal=' + currentDate + '</code><br><br><strong class="text-success fs-5">Rp ' + formatRupiah(amount) + '</strong>',
                    icon: 'info',
                    confirmButtonText: 'Tutup'
                  });
                });

                const badgeWrap = document.createElement('div');
                badgeWrap.className = 'deposit-badge-wrap';

                const amountLabel = document.createElement('span');
                amountLabel.className = 'deposit-amount';
                amountLabel.textContent = 'Rp ' + formatRupiah(amount);

                const arrowIcon = document.createElement('i');
                arrowIcon.className = 'mdi mdi-arrow-top-right deposit-arrow';

                badgeWrap.appendChild(amountLabel);
                badgeWrap.appendChild(arrowIcon);

                link.appendChild(topRow);
                link.appendChild(badgeWrap);
                cell.appendChild(link);
              } else {
                cell.appendChild(topRow);
              }

              row.appendChild(cell);
              date++;
            }

            calendarBody.appendChild(row);

            if (date > daysInMonth) {
              break;
            }
          }

          totalDepositElement.innerHTML = '';

          const totalCard = document.createElement('div');
          totalCard.className = 'total-card';

          const totalText = document.createElement('div');
          const totalLabel = document.createElement('div');
          totalLabel.className = 'total-label';
          totalLabel.textContent = 'Total Setoran Bulan ' + monthNames[month] + ' ' + year;

          const totalValue = document.createElement('div');
          totalValue.className = 'total-value';
          totalValue.textContent = 'Rp ' + formatRupiah(totalSetoran);

          totalText.appendChild(totalLabel);
          totalText.appendChild(totalValue);

          const icon = document.createElement('div');
          icon.className = 'total-icon';
          icon.innerHTML = '<i class="bi bi-wallet2" aria-hidden="true"></i>';

          totalCard.appendChild(totalText);
          totalCard.appendChild(icon);
          totalDepositElement.appendChild(totalCard);

          if (kpiMonthTotal) kpiMonthTotal.textContent = 'Rp ' + formatRupiah(totalSetoran);
          if (kpiMonthNameSub) kpiMonthNameSub.textContent = 'Periode ' + monthNames[month] + ' ' + year;
          if (kpiActiveDays) kpiActiveDays.textContent = activeDaysCount + ' Hari';
          if (kpiActiveRatioSub) {
            const pct = daysInMonth > 0 ? Math.round((activeDaysCount / daysInMonth) * 100) : 0;
            kpiActiveRatioSub.textContent = pct + '% dari ' + daysInMonth + ' hari kalender';
          }
          if (kpiAvgDaily) {
            const avg = activeDaysCount > 0 ? Math.round(totalSetoran / activeDaysCount) : 0;
            kpiAvgDaily.textContent = 'Rp ' + formatRupiah(avg);
          }
          if (kpiMaxDaily) kpiMaxDaily.textContent = 'Rp ' + formatRupiah(maxSetoran);
          if (kpiMaxDateSub) {
            kpiMaxDateSub.textContent = maxSetoran > 0 ? 'Pada ' + maxSetoranDateStr : 'Belum ada setoran di bulan ini';
          }
        }

        function updateMonthDisplay() {
          currentMonthLabel.textContent = monthNames[currentMonth] + ' ' + currentYear;
        }

        document.getElementById('prevMonth').addEventListener('click', function () {
          currentMonth--;
          if (currentMonth < 0) {
            currentMonth = 11;
            currentYear--;
          }
          updateMonthDisplay();
          generateCalendar(currentMonth, currentYear);
        });

        document.getElementById('nextMonth').addEventListener('click', function () {
          currentMonth++;
          if (currentMonth > 11) {
            currentMonth = 0;
            currentYear++;
          }
          updateMonthDisplay();
          generateCalendar(currentMonth, currentYear);
        });

        document.getElementById('jumpTodayBtn').addEventListener('click', function () {
          currentMonth = todayMonth;
          currentYear = todayYear;
          updateMonthDisplay();
          generateCalendar(currentMonth, currentYear);
        });

        updateMonthDisplay();
        generateCalendar(currentMonth, currentYear);
      })();
    </script>
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
  </body>
</html>