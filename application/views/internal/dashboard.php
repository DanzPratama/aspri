<?php
// Nilai default untuk menjaga dashboard tetap tampil saat data kosong.
$total_setoran_hari_ini = $total_setoran_hari_ini ?? 0;
$total_setoran_kemarin = $total_setoran_kemarin ?? 0;
$total_setoran_minggu = $total_setoran_minggu ?? 0;
$total_setoran_lastweek = $total_setoran_lastweek ?? 0;
$total_setoran_bulan_ini = $total_setoran_bulan_ini ?? 0;
$total_setoran_bulan_lalu = $total_setoran_bulan_lalu ?? 0;
$total_setoran_tahun_ini = $total_setoran_tahun_ini ?? 0;
$target_bulan = $target_bulan ?? 0;
$realisasi_tahunan = $realisasi_tahunan ?? 0;
$pendapatan = (isset($pendapatan) && is_array($pendapatan)) ? $pendapatan : [];
$target_tahunan = 2000600000;
$top_pendapatan = $pendapatan;
usort($top_pendapatan, function ($a, $b) {
    return (float)($b->total_stor ?? 0) <=> (float)($a->total_stor ?? 0);
});
$top_pendapatan = array_slice($top_pendapatan, 0, 5);
?>
<div class="main-panel aspri-appdashboard">
<style id="aspri-appdashboard-theme">
:root{--aspri-blue:#1769aa;--aspri-blue-dark:#123a5a;--aspri-green:#168653;--aspri-ink:#172b3b;--aspri-muted:#78899a;--aspri-line:#e6edf3;--aspri-bg:#f5f7fb;--aspri-card:#fff}
body{font-family:'Poppins','Ubuntu',Arial,sans-serif!important;background:var(--aspri-bg)!important;color:var(--aspri-ink)}
/* Shell: layout terinspirasi dashboard SaaS modern, tetap memakai navigasi CI3 yang ada. */
.navbar.default-layout-navbar{background:#fff!important;border-bottom:1px solid var(--aspri-line)!important;box-shadow:0 2px 12px rgba(22,49,75,.035)!important;height:68px;z-index:1000}
.navbar.default-layout-navbar .navbar-brand-wrapper{background:#fff!important;border-right:1px solid var(--aspri-line);width:244px;min-width:244px}
.navbar.default-layout-navbar .navbar-brand img{max-width:145px;height:auto;max-height:42px;object-fit:contain}
.navbar.default-layout-navbar .navbar-menu-wrapper{background:#fff!important;padding:0 24px}
.navbar.default-layout-navbar .navbar-toggler{color:#43566a!important}
.navbar.default-layout-navbar .nav-profile-text p{font-size:13px;font-weight:600;color:#20384d!important}
.sidebar.sidebar-offcanvas{background:#142b40!important;border-right:0!important;box-shadow:5px 0 22px rgba(15,39,60,.06);padding-top:14px}
.sidebar.sidebar-offcanvas .nav{padding:0 12px}
.sidebar.sidebar-offcanvas .nav-item.nav-profile{border-bottom:1px solid rgba(255,255,255,.1);margin-bottom:14px;padding-bottom:10px}
.sidebar.sidebar-offcanvas .nav-profile .nav-link{color:#fff!important;padding:12px 8px!important}
.sidebar.sidebar-offcanvas .nav-profile-text .font-weight-bold{color:#fff!important;font-size:13px}
.sidebar.sidebar-offcanvas .nav-profile-text .text-secondary{color:#a9bdce!important;font-size:11px}
.sidebar.sidebar-offcanvas .nav-profile-image img{border:2px solid rgba(255,255,255,.25)}
.sidebar.sidebar-offcanvas .menu-label{color:#8fa7bb!important;text-align:left!important;font-size:10px;letter-spacing:1.1px;text-transform:uppercase;padding:13px 12px 6px!important}
.sidebar.sidebar-offcanvas .nav-item .nav-link{display:flex;align-items:center;min-height:43px;margin:3px 0;padding:10px 12px!important;border-radius:9px;color:#c7d5e1!important;transition:background .18s ease,color .18s ease}
.sidebar.sidebar-offcanvas .nav-item .nav-link:hover{background:rgba(255,255,255,.075);color:#fff!important}
.sidebar.sidebar-offcanvas .nav-item .nav-link .menu-title{font-size:12px;font-weight:500}
.sidebar.sidebar-offcanvas .nav-item .nav-link .menu-icon{margin-left:auto;color:#91aac0!important;font-size:17px}
.sidebar.sidebar-offcanvas .nav-item .nav-link.active,.sidebar.sidebar-offcanvas .nav-item.active>.nav-link{background:#1769aa;color:#fff!important;box-shadow:0 5px 14px rgba(23,105,170,.22)}
.sidebar.sidebar-offcanvas .nav-item .nav-link.active .menu-icon{color:#fff!important}
.sidebar.sidebar-offcanvas .collapse .nav .nav-item .nav-link{padding-left:18px!important;background:transparent}
.page-body-wrapper{background:var(--aspri-bg)!important}
.main-panel.aspri-appdashboard{background:var(--aspri-bg)!important;min-height:calc(100vh - 68px)}
.aspri-appdashboard .content-wrapper{background:var(--aspri-bg)!important;padding:28px 30px 24px!important}
.aspri-appdashboard .app-heading{display:flex;align-items:flex-start;justify-content:space-between;gap:20px;margin:0 0 24px}
.aspri-appdashboard .eyebrow{display:flex;align-items:center;gap:8px;color:var(--aspri-blue);font-size:10px;font-weight:700;letter-spacing:1.35px;text-transform:uppercase;margin-bottom:7px}
.aspri-appdashboard .eyebrow:before{content:"";width:7px;height:7px;background:var(--aspri-green);border-radius:50%;box-shadow:0 0 0 4px rgba(22,134,83,.10)}
.aspri-appdashboard .app-heading h1{font-size:24px;line-height:1.3;letter-spacing:-.65px;font-weight:700;color:#1b3449;margin:0 0 7px}
.aspri-appdashboard .app-heading p{font-size:12px;line-height:1.7;color:var(--aspri-muted);margin:0;max-width:680px}
.aspri-appdashboard .heading-actions{display:flex;gap:9px;align-items:center;flex-wrap:wrap}
.aspri-appdashboard .btn-app{border:1px solid #dce6ee;background:#fff;color:#334d62;border-radius:9px;padding:10px 13px;font-size:11px;font-weight:600;display:inline-flex;align-items:center;gap:7px;white-space:nowrap;box-shadow:0 2px 4px rgba(18,45,67,.025)}
.aspri-appdashboard .btn-app-primary{background:var(--aspri-blue);border-color:var(--aspri-blue);color:#fff}
.aspri-appdashboard .btn-app:hover{filter:brightness(.97);text-decoration:none;color:inherit}
.aspri-appdashboard .btn-app-primary:hover{color:#fff}
.aspri-appdashboard .app-grid{display:grid;grid-template-columns:repeat(4,minmax(0,1fr));gap:16px;margin-bottom:22px}
.aspri-appdashboard .app-card{background:var(--aspri-card);border:1px solid var(--aspri-line);border-radius:14px;box-shadow:0 4px 16px rgba(23,48,70,.035);min-width:0}
.aspri-appdashboard .metric-card{padding:19px 20px 17px;position:relative;overflow:hidden;min-height:150px}
.aspri-appdashboard .metric-top{display:flex;justify-content:space-between;align-items:center;gap:12px}
.aspri-appdashboard .metric-label{font-size:11px;font-weight:500;color:#728497}
.aspri-appdashboard .metric-icon{width:37px;height:37px;display:grid;place-items:center;border-radius:11px;background:#eaf3fc;color:var(--aspri-blue);font-size:19px;flex-shrink:0}
.aspri-appdashboard .metric-icon.green{background:#eaf7f0;color:var(--aspri-green)}
.aspri-appdashboard .metric-icon.violet{background:#f1edff;color:#7856cb}
.aspri-appdashboard .metric-icon.amber{background:#fff5e7;color:#c98218}
.aspri-appdashboard .metric-value{font-size:clamp(20px,1.8vw,26px);font-weight:700;letter-spacing:-.7px;line-height:1.25;color:#1c354a;margin:18px 0 9px;overflow-wrap:anywhere}
.aspri-appdashboard .metric-foot{font-size:10px;color:#8998a6;display:flex;align-items:center;gap:5px;line-height:1.5}
.aspri-appdashboard .metric-foot strong{color:#50697d;font-weight:600}
.aspri-appdashboard .section-head{display:flex;justify-content:space-between;align-items:center;gap:12px;margin:0 0 13px}
.aspri-appdashboard .section-head h2{font-size:14px;font-weight:700;color:#213a4f;margin:0;letter-spacing:-.2px}
.aspri-appdashboard .section-head p{font-size:10px;color:#8a99a7;margin:4px 0 0}
.aspri-appdashboard .section-link{font-size:11px;font-weight:600;color:var(--aspri-blue);text-decoration:none}
.aspri-appdashboard .dashboard-columns{display:grid;grid-template-columns:minmax(0,1.7fr) minmax(280px,1fr);gap:17px;margin-bottom:20px}
.aspri-appdashboard .panel-card{padding:21px 22px;min-width:0}
.aspri-appdashboard .chart-panel{min-height:360px}
.aspri-appdashboard .chart-wrap{height:270px;position:relative;margin-top:10px}
.aspri-appdashboard .chart-wrap canvas{width:100%!important;height:100%!important}
.aspri-appdashboard .period-chip{border:1px solid var(--aspri-line);border-radius:7px;padding:6px 9px;color:#667c8e;font-size:10px;background:#fff}
.aspri-appdashboard .activity-list{list-style:none;margin:8px 0 0;padding:0}
.aspri-appdashboard .activity-list li{display:flex;gap:11px;padding:13px 0;border-bottom:1px solid #edf1f5}
.aspri-appdashboard .activity-list li:last-child{border-bottom:0;padding-bottom:2px}
.aspri-appdashboard .activity-dot{width:32px;height:32px;border-radius:10px;background:#edf5fc;color:var(--aspri-blue);display:grid;place-items:center;flex-shrink:0;font-size:15px}
.aspri-appdashboard .activity-dot.green{background:#eaf7f0;color:var(--aspri-green)}
.aspri-appdashboard .activity-dot.amber{background:#fff4e4;color:#bd7d20}
.aspri-appdashboard .activity-title{font-size:11px;font-weight:600;color:#334b5f;margin:1px 0 4px}
.aspri-appdashboard .activity-desc{font-size:10px;color:#8796a4;line-height:1.6}
.aspri-appdashboard .activity-time{font-size:9px;color:#9aa7b2;white-space:nowrap;margin-left:auto;padding-top:2px}
.aspri-appdashboard .bottom-grid{display:grid;grid-template-columns:minmax(0,1.4fr) minmax(260px,1fr);gap:17px;margin-bottom:20px}
.aspri-appdashboard .location-list{display:flex;flex-direction:column;gap:16px;margin-top:17px}
.aspri-appdashboard .location-row{display:grid;grid-template-columns:minmax(0,1fr) auto;gap:8px 12px;align-items:center}
.aspri-appdashboard .location-name{font-size:11px;font-weight:600;color:#334b5f;overflow:hidden;text-overflow:ellipsis;white-space:nowrap}
.aspri-appdashboard .location-value{font-size:11px;font-weight:700;color:#2b455b;white-space:nowrap}
.aspri-appdashboard .location-track{grid-column:1/-1;height:6px;background:#edf1f5;border-radius:99px;overflow:hidden}
.aspri-appdashboard .location-track span{display:block;height:100%;border-radius:99px;background:linear-gradient(90deg,#1769aa,#2f9b9a)}
.aspri-appdashboard .target-big{font-size:25px;font-weight:700;letter-spacing:-.7px;color:#1e394f;margin:14px 0 4px}
.aspri-appdashboard .target-sub{font-size:10px;color:#8594a2;line-height:1.7}
.aspri-appdashboard .target-progress{height:8px;background:#edf1f5;border-radius:99px;overflow:hidden;margin:18px 0 9px}
.aspri-appdashboard .target-progress span{height:100%;display:block;border-radius:99px;background:linear-gradient(90deg,#168653,#43b77e)}
.aspri-appdashboard .target-meta{display:flex;justify-content:space-between;gap:10px;font-size:10px;color:#8191a0}
.aspri-appdashboard .quick-actions{display:grid;grid-template-columns:repeat(4,minmax(0,1fr));gap:11px;margin-top:14px}
.aspri-appdashboard .quick-action{display:flex;align-items:center;gap:10px;padding:13px 12px;border:1px solid var(--aspri-line);border-radius:10px;background:#fff;text-decoration:none;min-width:0;transition:transform .18s ease,border-color .18s ease}
.aspri-appdashboard .quick-action:hover{transform:translateY(-2px);border-color:#c6d9e8;text-decoration:none}
.aspri-appdashboard .quick-action .qa-icon{width:34px;height:34px;display:grid;place-items:center;background:#edf5fc;color:var(--aspri-blue);border-radius:9px;font-size:17px;flex-shrink:0}
.aspri-appdashboard .quick-action strong{display:block;font-size:10px;color:#344d61;font-weight:600;line-height:1.4}
.aspri-appdashboard .quick-action small{display:block;font-size:9px;color:#91a0ad;margin-top:3px}
.aspri-appdashboard .table-wrap{overflow-x:auto;margin-top:8px}
.aspri-appdashboard .app-table{width:100%;border-collapse:collapse;min-width:480px}
.aspri-appdashboard .app-table th{padding:11px 10px;text-align:left;font-size:9px;text-transform:uppercase;letter-spacing:.7px;color:#8b9aa7;background:#f8fafc;border-bottom:1px solid var(--aspri-line);font-weight:700}
.aspri-appdashboard .app-table td{padding:13px 10px;font-size:10px;color:#526a7d;border-bottom:1px solid #edf1f5}
.aspri-appdashboard .app-table tbody tr:last-child td{border-bottom:0}
.aspri-appdashboard .table-rank{width:25px;height:25px;border-radius:8px;background:#edf5fc;color:var(--aspri-blue);display:inline-grid;place-items:center;font-weight:700;margin-right:8px}
.aspri-appdashboard .status-pill{display:inline-flex;align-items:center;gap:6px;padding:5px 8px;border-radius:99px;background:#eaf7f0;color:#168653;font-size:9px;font-weight:700}
.aspri-appdashboard .status-pill:before{content:"";width:5px;height:5px;background:#168653;border-radius:50%}
.aspri-appdashboard .app-footer{display:flex;justify-content:space-between;gap:12px;flex-wrap:wrap;border-top:1px solid #e5ebf1;padding:18px 2px 0;margin-top:25px;color:#94a1ad;font-size:10px}
.aspri-appdashboard .app-footer strong{color:#647a8d;font-weight:600}
.aspri-appdashboard .modal-content{border:1px solid var(--aspri-line);border-radius:14px;overflow:hidden}
.aspri-appdashboard .modal-header,.aspri-appdashboard .modal-footer{border-color:var(--aspri-line)}
.aspri-appdashboard .modal-title{font-size:15px;font-weight:700;color:#213a4f}
.aspri-appdashboard .road-detail-card{border:0;border-radius:11px;background:#1769aa;color:#fff}
.aspri-appdashboard .road-detail-card .card-body{padding:16px}
.aspri-appdashboard .road-detail-card h5{font-size:11px;line-height:1.5}
.aspri-appdashboard .road-detail-card h3{font-size:17px;font-weight:700}
@media(max-width:1199px){.aspri-appdashboard .app-grid{grid-template-columns:repeat(2,minmax(0,1fr))}.aspri-appdashboard .dashboard-columns{grid-template-columns:minmax(0,1.35fr) minmax(260px,1fr)}}
@media(max-width:991px){.navbar.default-layout-navbar .navbar-brand-wrapper{width:190px;min-width:190px}.aspri-appdashboard .content-wrapper{padding:23px 20px!important}.aspri-appdashboard .dashboard-columns,.aspri-appdashboard .bottom-grid{grid-template-columns:1fr}.aspri-appdashboard .chart-panel{min-height:330px}.aspri-appdashboard .quick-actions{grid-template-columns:repeat(2,minmax(0,1fr))}}
@media(max-width:575px){.navbar.default-layout-navbar{height:60px}.navbar.default-layout-navbar .navbar-brand-wrapper{width:145px;min-width:145px}.navbar.default-layout-navbar .navbar-brand img{max-width:112px}.navbar.default-layout-navbar .navbar-menu-wrapper{padding:0 8px}.aspri-appdashboard .content-wrapper{padding:20px 13px!important}.aspri-appdashboard .app-heading{display:block;margin-bottom:19px}.aspri-appdashboard .app-heading h1{font-size:21px}.aspri-appdashboard .heading-actions{margin-top:15px}.aspri-appdashboard .app-grid{gap:10px}.aspri-appdashboard .metric-card{padding:15px 13px;min-height:140px}.aspri-appdashboard .metric-icon{width:31px;height:31px;font-size:16px;border-radius:9px}.aspri-appdashboard .metric-label{font-size:10px}.aspri-appdashboard .metric-value{font-size:19px;margin:15px 0 8px}.aspri-appdashboard .metric-foot{font-size:9px}.aspri-appdashboard .panel-card{padding:16px 14px}.aspri-appdashboard .chart-wrap{height:230px}.aspri-appdashboard .quick-actions{gap:8px}.aspri-appdashboard .quick-action{padding:10px 9px;gap:8px}.aspri-appdashboard .quick-action .qa-icon{width:29px;height:29px}.aspri-appdashboard .section-head h2{font-size:13px}.aspri-appdashboard .activity-time{font-size:8px}.aspri-appdashboard .app-footer{font-size:9px}}
@media(prefers-reduced-motion:reduce){.aspri-appdashboard *{transition:none!important}}
</style>

<div class="content-wrapper">
  <header class="app-heading">
    <div>
      <div class="eyebrow">ASPRI · Command Center</div>
      <h1>Ringkasan Operasional</h1>
      <p>Pantau pendapatan retribusi parkir, capaian target, dan kontribusi ruas jalan dari satu dashboard.</p>
    </div>
    <div class="heading-actions">
      <span class="btn-app"><i class="mdi mdi-calendar-today"></i><?= date('d M Y') ?></span>
      <button type="button" class="btn-app btn-app-primary" onclick="window.location.reload()"><i class="mdi mdi-refresh"></i> Perbarui data</button>
    </div>
  </header>

  <section class="app-grid" aria-label="Ringkasan pendapatan">
    <article class="app-card metric-card">
      <div class="metric-top"><span class="metric-label">Pendapatan hari ini</span><span class="metric-icon"><i class="mdi mdi-chart-line"></i></span></div>
      <div class="metric-value" id="total_setoran_hari_ini">Rp <?= number_format((float)$total_setoran_hari_ini,0,',','.') ?></div>
      <div class="metric-foot"><i class="mdi mdi-swap-vertical"></i> Kemarin <strong id="total_setoran_kemarin">Rp <?= number_format((float)$total_setoran_kemarin,0,',','.') ?></strong></div>
    </article>
    <article class="app-card metric-card">
      <div class="metric-top"><span class="metric-label">Pendapatan minggu ini</span><span class="metric-icon green"><i class="mdi mdi-calendar-week"></i></span></div>
      <div class="metric-value" id="total_setoran_minggu">Rp <?= number_format((float)$total_setoran_minggu,0,',','.') ?></div>
      <div class="metric-foot"><i class="mdi mdi-calendar-arrow-left"></i> Minggu lalu <strong id="total_setoran_lastweek">Rp <?= number_format((float)$total_setoran_lastweek,0,',','.') ?></strong></div>
    </article>
    <article class="app-card metric-card">
      <div class="metric-top"><span class="metric-label">Pendapatan bulan ini</span><span class="metric-icon violet"><i class="mdi mdi-finance"></i></span></div>
      <div class="metric-value" id="total_setoran_bulan_ini">Rp <?= number_format((float)$total_setoran_bulan_ini,0,',','.') ?></div>
      <div class="metric-foot"><i class="mdi mdi-target"></i> Target bulanan <strong>Rp <?= number_format((float)$target_bulan,0,',','.') ?></strong></div>
    </article>
    <article class="app-card metric-card">
      <div class="metric-top"><span class="metric-label">Akumulasi tahun <?= date('Y') ?></span><span class="metric-icon amber"><i class="mdi mdi-chart-areaspline"></i></span></div>
      <div class="metric-value" id="total_setoran_tahun_ini">Rp <?= number_format((float)$total_setoran_tahun_ini,0,',','.') ?></div>
      <div class="metric-foot"><i class="mdi mdi-check-circle-outline"></i> Realisasi target <strong id="realisasi_tahunan"><?= round((float)$realisasi_tahunan,2) ?>%</strong></div>
    </article>
  </section>

  <section class="dashboard-columns">
    <article class="app-card panel-card chart-panel">
      <div class="section-head">
        <div><h2>Tren Pendapatan per Ruas Jalan</h2><p>Perbandingan nilai setoran berdasarkan data yang tersedia</p></div>
        <span class="period-chip"><i class="mdi mdi-pulse"></i> Data terkini</span>
      </div>
      <div class="chart-wrap"><canvas id="pendapatanChart" aria-label="Grafik pendapatan per ruas jalan"></canvas></div>
      <div style="display:flex;justify-content:space-between;gap:12px;align-items:center;margin-top:12px;flex-wrap:wrap">
        <span style="font-size:10px;color:#8b9aa7"><i class="mdi mdi-information-outline"></i> Nilai dalam rupiah</span>
        <button type="button" class="btn-app" data-bs-toggle="modal" data-bs-target="#pendapatanModal"><i class="mdi mdi-chart-box-outline"></i> Detail semua ruas</button>
      </div>
    </article>

    <article class="app-card panel-card">
      <div class="section-head"><div><h2>Ringkasan Sistem</h2><p>Ikhtisar data operasional ASPRI</p></div><span class="status-pill">Aktif</span></div>
      <ul class="activity-list">
        <li><span class="activity-dot"><i class="mdi mdi-account-group-outline"></i></span><div><div class="activity-title">Juru parkir terdaftar</div><div class="activity-desc">Jumlah data juru parkir pada ringkasan dashboard</div></div><span class="activity-time">456</span></li>
        <li><span class="activity-dot green"><i class="mdi mdi-account-cash-outline"></i></span><div><div class="activity-title">Kolektor terdata</div><div class="activity-desc">Petugas kolektor yang tercatat</div></div><span class="activity-time">23</span></li>
        <li><span class="activity-dot amber"><i class="mdi mdi-map-marker-radius-outline"></i></span><div><div class="activity-title">Ruas jalan terdata</div><div class="activity-desc">Lokasi pengelolaan parkir</div></div><span class="activity-time">43 ruas</span></li>
        <li><span class="activity-dot green"><i class="mdi mdi-sync"></i></span><div><div class="activity-title">Pembaruan dashboard</div><div class="activity-desc">Halaman diperbarui secara berkala</div></div><span class="activity-time">50 dtk</span></li>
      </ul>
    </article>
  </section>

  <section class="bottom-grid">
    <article class="app-card panel-card">
      <div class="section-head"><div><h2>Ruas Jalan dengan Pendapatan Tertinggi</h2><p>Urutan berdasarkan total setoran yang tersedia</p></div><a href="#pendapatanModal" class="section-link" data-bs-toggle="modal" data-bs-target="#pendapatanModal">Lihat semua <i class="mdi mdi-arrow-top-right"></i></a></div>
      <?php if (!empty($top_pendapatan)): ?>
        <?php $max_pendapatan = max(array_map(function($r){ return (float)($r->total_stor ?? 0); }, $top_pendapatan)); $max_pendapatan = $max_pendapatan > 0 ? $max_pendapatan : 1; ?>
        <div class="location-list">
          <?php foreach ($top_pendapatan as $i => $row): $nilai_ruas = (float)($row->total_stor ?? 0); $lebar_ruas = min(100, ($nilai_ruas / $max_pendapatan) * 100); ?>
            <div class="location-row"><span class="location-name"><span class="table-rank"><?= $i+1 ?></span><?= html_escape($row->nama ?? 'Ruas jalan') ?></span><span class="location-value">Rp <?= number_format($nilai_ruas,0,',','.') ?></span><div class="location-track"><span style="width:<?= $lebar_ruas ?>%"></span></div></div>
          <?php endforeach; ?>
        </div>
      <?php else: ?><p class="text-muted" style="font-size:12px">Belum ada data pendapatan ruas jalan.</p><?php endif; ?>
    </article>

    <article class="app-card panel-card">
      <div class="section-head"><div><h2>Realisasi Target Tahunan</h2><p>Target pendapatan tahun <?= date('Y') ?></p></div><span class="metric-icon green"><i class="mdi mdi-bullseye-arrow"></i></span></div>
      <div class="target-big"><?= number_format((float)$realisasi_tahunan,2,',','.') ?>%</div>
      <div class="target-sub">Total pendapatan tercatat <strong style="color:#435c70">Rp <?= number_format((float)$total_setoran_tahun_ini,0,',','.') ?></strong> dari target Rp <?= number_format((float)$target_tahunan,0,',','.') ?>.</div>
      <div class="target-progress"><span style="width:<?= min(100,max(0,(float)$realisasi_tahunan)) ?>%"></span></div>
      <div class="target-meta"><span>Realisasi</span><strong style="color:#168653"><?= number_format(min(100,max(0,(float)$realisasi_tahunan)),2,',','.') ?>%</strong></div>
      <div class="target-meta" style="margin-top:8px"><span>Sisa target</span><strong>Rp <?= number_format(max(0,$target_tahunan-(float)$total_setoran_tahun_ini),0,',','.') ?></strong></div>
    </article>
  </section>

  <section class="app-card panel-card">
    <div class="section-head"><div><h2>Akses Cepat</h2><p>Buka menu yang sering digunakan</p></div></div>
    <div class="quick-actions">
      <a class="quick-action" href="<?= base_url('petugas/non_admin') ?>"><span class="qa-icon"><i class="mdi mdi-account-hard-hat-outline"></i></span><span><strong>Data Juru Parkir</strong><small>Kelola petugas</small></span></a>
      <a class="quick-action" href="<?= base_url('internal/jukir_setoran') ?>"><span class="qa-icon"><i class="mdi mdi-cash-multiple"></i></span><span><strong>Data Setoran</strong><small>Periksa setoran</small></span></a>
      <a class="quick-action" href="<?= base_url('internal/kalender_setoran') ?>"><span class="qa-icon"><i class="mdi mdi-calendar-month-outline"></i></span><span><strong>Kalender Setoran</strong><small>Lihat jadwal</small></span></a>
      <button type="button" class="quick-action" style="text-align:left" data-bs-toggle="modal" data-bs-target="#pendapatanModal"><span class="qa-icon"><i class="mdi mdi-file-chart-outline"></i></span><span><strong>Rekap Pendapatan</strong><small>Detail per ruas</small></span></button>
    </div>
  </section>

  <footer class="app-footer"><span>© <?= date('Y') ?> <strong>ASPRI</strong> · Sistem Informasi Parkir</span><span>Developed by <strong>DaNzDev.ID</strong></span></footer>
</div>

<!-- Detail seluruh ruas jalan: tetap memakai data dari controller CI3. -->
<div class="modal fade" id="pendapatanModal" tabindex="-1" aria-labelledby="pendapatanModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl modal-dialog-scrollable"><div class="modal-content">
    <div class="modal-header"><div><h5 class="modal-title" id="pendapatanModalLabel">Detail Pendapatan per Ruas Jalan</h5><small class="text-muted">Urutan dari pendapatan terbesar ke terkecil</small></div><button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Tutup"></button></div>
    <div class="modal-body"><div class="row g-3">
      <?php if (!empty($top_pendapatan)): ?>
        <?php foreach ($top_pendapatan as $row): ?><div class="col-sm-6 col-lg-4"><div class="card road-detail-card h-100"><div class="card-body"><h5><?= html_escape($row->nama ?? 'Ruas jalan') ?></h5><h3 class="mb-0">Rp <?= number_format((float)($row->total_stor ?? 0),0,',','.') ?></h3></div></div></div><?php endforeach; ?>
      <?php else: ?><div class="col-12"><p class="text-muted mb-0">Belum ada data pendapatan.</p></div><?php endif; ?>
    </div></div>
    <div class="modal-footer"><button type="button" class="btn-app" data-bs-dismiss="modal">Tutup</button></div>
  </div></div>
</div>

<script>
(function(){
  var pendapatanData = <?= json_encode($pendapatan, JSON_HEX_TAG|JSON_HEX_APOS|JSON_HEX_QUOT|JSON_HEX_AMP) ?> || [];
  var labels = pendapatanData.map(function(row){ return row.nama || 'Ruas jalan'; });
  var values = pendapatanData.map(function(row){ return Number(row.total_stor || 0); });
  var canvas = document.getElementById('pendapatanChart');
  if (canvas && typeof Chart !== 'undefined') {
    var ctx = canvas.getContext('2d');
    var gradient = ctx.createLinearGradient(0, 0, 0, 280);
    gradient.addColorStop(0, 'rgba(23,105,170,.20)');
    gradient.addColorStop(1, 'rgba(23,105,170,.015)');
    new Chart(ctx, {
      type: 'line',
      data: { labels: labels, datasets: [{ label: 'Pendapatan', data: values, borderColor: '#1769aa', backgroundColor: gradient, borderWidth: 2.5, pointBackgroundColor: '#fff', pointBorderColor: '#1769aa', pointBorderWidth: 2, pointRadius: 3, pointHoverRadius: 5, fill: true, tension: .35 }] },
      options: {
        responsive: true, maintainAspectRatio: false,
        legend: { display: false },
        tooltips: { mode: 'index', intersect: false, callbacks: { label: function(item){ return 'Rp ' + Number(item.yLabel || 0).toLocaleString('id-ID'); } } },
        scales: {
          xAxes: [{ gridLines: { display: false, drawBorder: false }, ticks: { fontColor: '#8b9aa7', maxTicksLimit: 7, maxRotation: 0, minRotation: 0 } }],
          yAxes: [{ gridLines: { color: '#edf1f5', drawBorder: false, zeroLineColor: '#edf1f5' }, ticks: { beginAtZero: true, fontColor: '#8b9aa7', maxTicksLimit: 5, callback: function(value){ return 'Rp ' + Number(value).toLocaleString('id-ID'); } } }]
        },
        hover: { mode: 'nearest', intersect: false }
      }
    });
  }

  // Perbarui otomatis tiap 50 detik, tetapi hentikan saat modal detail dibuka.
  var reloadTimer = null;
  function startAutoReload(){ if(!reloadTimer) reloadTimer = window.setInterval(function(){ window.location.reload(); }, 50000); }
  function stopAutoReload(){ if(reloadTimer){ window.clearInterval(reloadTimer); reloadTimer = null; } }
  startAutoReload();
  var modal = document.getElementById('pendapatanModal');
  if(modal){
    modal.addEventListener('show.bs.modal', stopAutoReload);
    modal.addEventListener('hidden.bs.modal', startAutoReload);
  }
})();
</script>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10.16.6/dist/sweetalert2.min.js"></script>
<script src="/aspri/admins/vendors/js/vendor.bundle.base.js"></script>
<script src="/aspri/admins/vendors/chart.js/Chart.min.js"></script>
<script src="/aspri/admins/js/jquery.cookie.js" type="text/javascript"></script>
<script src="/aspri/admins/js/off-canvas.js"></script>
<script src="/aspri/admins/js/hoverable-collapse.js"></script>
<script src="/aspri/admins/js/misc.js"></script>
<script src="/aspri/admins/js/dashboard.js"></script>
<script src="/aspri/admins/js/todolist.js"></script>
</div>
</body>
</html>
