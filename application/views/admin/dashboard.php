
<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="shortcut icon" href="/assets/img/favicon.png" />
<title>ASPRI Dashboard</title>

<!-- Tailwind -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.2.19/tailwind.min.css" rel="stylesheet">
    <!-- End layout styles -->
    <link rel="shortcut icon" href="/aspri/asstes/img/favicon.png" />
<!-- Icons -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
<link rel="manifest" href="/aspri/manifest.json">


<style>
:root {
  --aspri-blue: #155eef;
  --aspri-blue-dark: #1248b5;
  --aspri-green: #168653;
  --aspri-ink: #172b3b;
  --aspri-muted: #718096;
  --aspri-line: #e5edf3;
  --aspri-surface: #ffffff;
  --aspri-bg: #f4f7fb;
}

/* ===== HOME VIEW ASPRI ===== */
.aspri-home {
    max-width: 1120px;
    padding-top: 28px !important;
    padding-bottom: 30px !important;
}

.aspri-home .aspri-welcome-card {
    display: flex;
    align-items: center;
    justify-content: space-between;
    gap: 20px;
    position: relative;
    overflow: hidden;
    padding: 28px 30px;
    margin-bottom: 28px;
    border-radius: 18px;
    color: #fff;
    background: linear-gradient(115deg, #102b46, #1557a0);
    box-shadow: 0 10px 26px rgba(16, 61, 110, .12);
}

.aspri-home .aspri-welcome-card::after {
    content: "";
    position: absolute;
    width: 200px;
    height: 200px;
    right: 60px;
    top: -115px;
    border: 1px solid rgba(255,255,255,.14);
    border-radius: 50%;
    box-shadow: 0 0 0 30px rgba(255,255,255,.035),
                0 0 0 60px rgba(255,255,255,.025);
}

.aspri-home .aspri-welcome-copy {
    position: relative;
    z-index: 1;
}

.aspri-home .aspri-welcome-label {
    color: #b8d6ff;
    font-size: 9px;
    font-weight: 700;
    letter-spacing: 1.5px;
}

.aspri-home .aspri-welcome-copy > p {
    margin: 12px 0 3px;
    color: #d0e0f2;
    font-size: 12px;
}

.aspri-home .aspri-welcome-copy h1 {
    margin: 0;
    color: #fff !important;
    font-size: clamp(22px, 3vw, 29px) !important;
    font-weight: 700;
    letter-spacing: -.7px;
}

.aspri-home .aspri-welcome-caption {
    margin-top: 12px;
    color: #d0e0f2;
    font-size: 10px;
}

.aspri-home .aspri-welcome-caption i {
    margin-right: 5px;
    color: #74e1a5;
}

.aspri-home .aspri-welcome-symbol {
    z-index: 1;
    display: flex;
    align-items: center;
    justify-content: center;
    width: 72px;
    height: 72px;
    flex-shrink: 0;
    border: 1px solid rgba(255,255,255,.18);
    border-radius: 20px;
    background: rgba(255,255,255,.1);
    color: #fff;
    font-size: 28px;
}

.aspri-home .aspri-section-head {
    display: flex;
    align-items: center;
    justify-content: space-between;
    gap: 12px;
    margin-bottom: 14px;
}

.aspri-home .aspri-section-head h2 {
    margin: 0 0 5px;
    color: #20384f;
    font-size: 15px;
    font-weight: 700;
}

.aspri-home .aspri-section-head p {
    margin: 0;
    color: #8997a7;
    font-size: 11px;
}

.aspri-home .aspri-today-badge {
    display: inline-flex;
    align-items: center;
    gap: 7px;
    padding: 8px 11px;
    border: 1px solid #e5edf3;
    border-radius: 9px;
    background: #fff;
    color: #52687d;
    font-size: 10px;
    white-space: nowrap;
}

.aspri-home .aspri-stats-grid {
    display: grid;
    grid-template-columns: repeat(2, minmax(0, 1fr));
    gap: 15px;
    margin-bottom: 28px;
}

.aspri-home .aspri-stat-card {
    display: flex;
    flex-direction: column;
    align-items: stretch;
    min-width: 0;
    padding: 20px;
    border: 1px solid #e4ebf2;
    border-radius: 15px;
    background: #fff;
    color: #20384f;
    text-align: left;
    box-shadow: 0 3px 13px rgba(16,43,70,.025);
    transition: border-color .2s, box-shadow .2s;
}

.aspri-home button.aspri-stat-card {
    font-family: inherit;
    cursor: pointer;
}

.aspri-home .aspri-stat-card:hover {
    border-color: #cbdcf1;
    box-shadow: 0 8px 20px rgba(16,43,70,.06);
}

.aspri-home .aspri-stat-heading {
    display: flex;
    align-items: center;
    justify-content: space-between;
    margin-bottom: 17px;
}

.aspri-home .aspri-stat-icon {
    display: flex;
    align-items: center;
    justify-content: center;
    width: 42px;
    height: 42px;
    border-radius: 12px;
    background: #eaf1ff;
    color: #155eef;
    font-size: 16px;
}

.aspri-home .aspri-stat-green .aspri-stat-icon {
    background: #e5f7ec;
    color: #168653;
}

.aspri-home .aspri-stat-arrow {
    color: #9aa8b7;
    font-size: 11px;
}

.aspri-home .aspri-stat-tag {
    padding: 6px 9px;
    border-radius: 7px;
    background: #e5f7ec;
    color: #168653;
    font-size: 9px;
    font-weight: 700;
}

.aspri-home .aspri-stat-label {
    margin-bottom: 8px;
    color: #8493a4;
    font-size: 9px;
    font-weight: 700;
    letter-spacing: .65px;
}

.aspri-home .aspri-stat-number {
    color: #142f4a;
    font-size: clamp(20px, 2.5vw, 27px);
    font-weight: 700;
    letter-spacing: -.6px;
    overflow-wrap: anywhere;
}

.aspri-home .aspri-stat-currency {
    font-size: clamp(16px, 2vw, 23px);
}

.aspri-home .aspri-stat-footer {
    display: flex;
    align-items: center;
    gap: 7px;
    margin-top: 12px;
    color: #8a98a8;
    font-size: 10px;
}

.aspri-home .aspri-stat-blue .aspri-stat-footer {
    color: #155eef;
}

.btn-input-registrasi {
    display: flex;
    align-items: center;
    justify-content: space-between;
    gap: 12px;
    width: 100%;
    min-height: 64px;
    padding: 18px 22px;
    background: #1677ff;
    color: #fff !important;
    border-radius: 16px;
    font-size: 16px;
    font-weight: 700;
    text-decoration: none !important;
    box-shadow: 0 8px 20px rgba(22, 119, 255, .22);
    transition: background .2s ease, transform .2s ease;
}

.btn-input-registrasi:hover {
    background: #0865e8;
    transform: translateY(-1px);
}

.btn-input-registrasi i:first-child {
    font-size: 22px;
}

.btn-input-registrasi span {
    flex: 1;
    text-align: left;
}

.aspri-home .aspri-recent-card {
    overflow: hidden;
    margin-bottom: 28px;
    border: 1px solid #e4ebf2;
    border-radius: 15px;
    background: #fff;
    box-shadow: 0 3px 13px rgba(16,43,70,.025);
}

.aspri-home .aspri-recent-header {
    display: flex;
    align-items: center;
    justify-content: space-between;
    gap: 12px;
    padding: 19px 21px;
    border-bottom: 1px solid #edf1f5;
}

.aspri-home .aspri-recent-title {
    display: flex;
    align-items: center;
    gap: 11px;
}

.aspri-home .aspri-recent-title-icon {
    display: flex;
    align-items: center;
    justify-content: center;
    width: 38px;
    height: 38px;
    border-radius: 11px;
    background: #f0f5fb;
    color: #426785;
}

.aspri-home .aspri-recent-title h2 {
    margin: 0 0 5px;
    color: #20384f;
    font-size: 13px;
    font-weight: 700;
}

.aspri-home .aspri-recent-title p {
    margin: 0;
    color: #8a98a8;
    font-size: 10px;
}

.aspri-home .aspri-see-all {
    display: inline-flex;
    align-items: center;
    gap: 7px;
    padding: 9px 11px;
    border: 0;
    border-radius: 8px;
    background: #e8f7ee;
    color: #168653;
    font-size: 10px;
    font-weight: 700;
    cursor: pointer;
}

.aspri-home .aspri-recent-row {
    display: flex;
    align-items: center;
    gap: 12px;
    padding: 16px 21px;
    border-bottom: 1px solid #f0f3f6;
}

.aspri-home .aspri-recent-row:last-child {
    border-bottom: 0;
}

.aspri-home .aspri-recent-avatar {
    display: flex;
    align-items: center;
    justify-content: center;
    width: 39px;
    height: 39px;
    flex-shrink: 0;
    border-radius: 11px;
    background: #f1f6fb;
    color: #4e7393;
}

.aspri-home .aspri-recent-info {
    display: flex;
    flex: 1;
    flex-direction: column;
    min-width: 0;
    gap: 5px;
}

.aspri-home .aspri-recent-info strong {
    color: #2c4358;
    font-size: 11px;
    font-weight: 700;
}

.aspri-home .aspri-recent-info span,
.aspri-home .aspri-recent-info small {
    color: #8997a7;
    font-size: 10px;
    overflow-wrap: anywhere;
}

.aspri-home .aspri-recent-info span i {
    margin-right: 4px;
}

.aspri-home .aspri-recent-amount {
    display: flex;
    flex-direction: column;
    align-items: flex-end;
    gap: 5px;
    flex-shrink: 0;
}

.aspri-home .aspri-recent-amount strong {
    color: #168653;
    font-size: 11px;
    font-weight: 700;
}

.aspri-home .aspri-recent-amount span {
    color: #9aa7b4;
    font-size: 9px;
}

.aspri-home .aspri-recent-empty {
    display: flex;
    flex-direction: column;
    align-items: center;
    padding: 30px 15px;
    text-align: center;
}

.aspri-home .aspri-recent-empty > span {
    margin-bottom: 10px;
    color: #91a0af;
    font-size: 24px;
}

.aspri-home .aspri-recent-empty strong {
    color: #40576b;
    font-size: 12px;
}

.aspri-home .aspri-recent-empty p {
    margin-top: 5px;
    color: #98a5b2;
    font-size: 10px;
}

.aspri-home .aspri-action-head {
    margin-bottom: 13px;
}

.aspri-home .aspri-action-list {
    display: grid;
    grid-template-columns: repeat(2, minmax(0, 1fr));
    gap: 11px;
    margin-bottom: 25px;
}

.aspri-home .aspri-action-item {
    display: flex;
    align-items: center;
    gap: 12px;
    min-width: 0;
    padding: 15px;
    border: 1px solid #e4ebf2;
    border-radius: 13px;
    background: #fff;
    text-align: left;
    text-decoration: none;
    cursor: pointer;
    font-family: inherit;
    transition: border-color .2s, box-shadow .2s;
}

.aspri-home .aspri-action-item:hover {
    border-color: #cbdcf1;
    box-shadow: 0 5px 15px rgba(16,43,70,.045);
}

.aspri-home .aspri-action-icon {
    display: flex;
    align-items: center;
    justify-content: center;
    width: 39px;
    height: 39px;
    flex-shrink: 0;
    border-radius: 11px;
}

.aspri-home .aspri-action-red {
    background: #fff0ed;
    color: #d95743;
}

.aspri-home .aspri-action-blue {
    background: #eaf1ff;
    color: #155eef;
}

.aspri-home .aspri-action-orange {
    background: #fff3e5;
    color: #c47b22;
}

.aspri-home .aspri-action-green {
    background: #e5f7ec;
    color: #168653;
}

.aspri-home .aspri-action-copy {
    display: flex;
    flex: 1;
    flex-direction: column;
    min-width: 0;
    gap: 5px;
}

.aspri-home .aspri-action-copy strong {
    color: #2b4359;
    font-size: 10px;
    font-weight: 700;
}

.aspri-home .aspri-action-copy small {
    color: #8b99a8;
    font-size: 9px;
    line-height: 1.6;
}

.aspri-home .aspri-action-chevron {
    color: #a4b0bc;
    font-size: 10px;
}

@media (max-width: 767px) {
    .aspri-home {
        padding: 20px 15px 24px !important;
    }

    .aspri-home .aspri-welcome-card {
        padding: 22px 18px;
        border-radius: 15px;
    }

    .aspri-home .aspri-welcome-symbol {
        width: 48px;
        height: 48px;
        border-radius: 13px;
        font-size: 20px;
    }

    .aspri-home .aspri-welcome-copy h1 {
        font-size: 20px !important;
        overflow-wrap: anywhere;
    }

    .aspri-home .aspri-stats-grid {
        gap: 10px;
    }

    .aspri-home .aspri-stat-card {
        padding: 14px 11px;
    }

    .aspri-home .aspri-stat-number {
        font-size: 18px;
    }

    .aspri-home .aspri-stat-currency {
        font-size: 14px;
    }

    .aspri-home .aspri-recent-header {
        padding: 15px 12px;
    }

    .aspri-home .aspri-recent-row {
        gap: 9px;
        padding: 14px 11px;
    }

    .aspri-home .aspri-recent-avatar {
        width: 33px;
        height: 33px;
    }

    .aspri-home .aspri-recent-amount strong {
        font-size: 10px;
    }

    .aspri-home .aspri-action-list {
        grid-template-columns: 1fr;
        gap: 9px;
    }

    .aspri-home .aspri-action-item {
        padding: 13px;
    }
}


* { -webkit-tap-highlight-color: transparent; }
html { scroll-behavior: smooth; }
body {
  margin: 0;
  background: var(--aspri-bg);
  color: var(--aspri-ink);
  font-family: 'Poppins', system-ui, -apple-system, BlinkMacSystemFont, "Segoe UI", sans-serif;
  font-size: 14px;
  -webkit-font-smoothing: antialiased;
}
body.pb-20 { padding-bottom: 28px; }
header.bg-black {
  position: sticky;
  top: 0;
  background: rgba(255,255,255,.94) !important;
  border-bottom: 1px solid var(--aspri-line);
  box-shadow: 0 4px 18px rgba(24, 55, 85, .045);
  backdrop-filter: blur(14px);
  -webkit-backdrop-filter: blur(14px);
}
header .container { min-height: 38px; }
header img { width: auto; max-width: 132px; object-fit: contain; }
header a[href*="logout"] {
  display: inline-flex;
  align-items: center;
  gap: 7px;
  padding: 9px 13px;
  color: #c24141 !important;
  background: #fff1f1;
  border-radius: 10px;
  font-size: 12px !important;
  font-weight: 600;
  text-decoration: none;
}
header a[href*="logout"]::before { content: '\f2f5'; font-family: 'Font Awesome 6 Free'; font-weight: 900; }
.container { max-width: 1080px; }
body > .container { padding-top: 24px !important; }
.card {
  background: var(--aspri-surface);
  border: 1px solid var(--aspri-line);
  border-radius: 17px;
  padding: 19px;
  box-shadow: 0 3px 12px rgba(24, 55, 85, .035);
  transition: border-color .2s ease, box-shadow .2s ease, transform .2s ease;
}
.card:hover { transform: translateY(-1px); border-color: #d5e2ed; box-shadow: 0 7px 20px rgba(24,55,85,.065); }
/* Greeting */
.card.text-center { position: relative; overflow: hidden; text-align: left; padding: 21px 23px; }
.card.text-center::after {
  content: ''; position: absolute; right: -28px; top: -50px; width: 150px; height: 150px;
  border-radius: 50%; background: linear-gradient(135deg, rgba(21,94,239,.09), rgba(22,134,83,.07));
}
.card.text-center p { color: var(--aspri-muted) !important; font-size: 12px !important; margin-bottom: 5px; }
.card.text-center h1 { position: relative; z-index: 1; font-size: 21px !important; letter-spacing: -.45px; color: var(--aspri-ink) !important; }
/* Statistic cards */
.grid.grid-cols-2 { gap: 12px !important; }
.grid.grid-cols-2 .card { min-width: 0; padding: 17px 15px; gap: 10px; }
.grid.grid-cols-2 .card p:first-child { color: #8090a0 !important; font-size: 10px !important; line-height: 1.5; font-weight: 600; letter-spacing: .45px; }
.grid.grid-cols-2 .card p.text-xl { margin-top: 5px; color: var(--aspri-ink) !important; font-size: clamp(17px, 2.5vw, 23px) !important; line-height: 1.35; letter-spacing: -.5px; overflow-wrap: anywhere; }
.grid.grid-cols-2 .card a { color: inherit; text-decoration: none; }
.grid.grid-cols-2 .card .h-12 { width: 42px; height: 42px; flex: 0 0 42px; border-radius: 13px !important; }
.grid.grid-cols-2 .card .bg-emerald-100 { background: #e6f7ee !important; color: var(--aspri-green) !important; }
.grid.grid-cols-2 .card .bg-blue-100 { background: #eaf1ff !important; color: var(--aspri-blue) !important; }
/* Latest transactions */
.card.mb-6 h2 { font-size: 15px !important; letter-spacing: -.2px; }
.card.mb-6 > .flex a { font-size: 12px !important; text-decoration: none; }
.card.mb-6 .space-y-3 > div { border-color: #edf1f5 !important; gap: 12px; padding-top: 2px; }
.card.mb-6 .space-y-3 > div p:first-child { font-size: 12px !important; color: #26394a !important; }
.card.mb-6 .space-y-3 > div p.text-xs { margin-top: 4px; color: #8996a5 !important; font-size: 10px !important; line-height: 1.6; }
.card.mb-6 .space-y-3 > div p.text-emerald-600 { color: var(--aspri-green) !important; font-size: 12px !important; white-space: nowrap; }
/* Main actions */
body > .container .space-y-4 > a { display: block; text-decoration: none; }
body > .container .space-y-4 button {
  min-height: 48px; border-radius: 12px !important; font-family: inherit; font-size: 13px !important;
  font-weight: 600 !important; letter-spacing: .05px; box-shadow: none !important; transition: transform .18s ease, background .18s ease, box-shadow .18s ease;
}
body > .container .space-y-4 button:hover { transform: translateY(-1px); box-shadow: 0 6px 15px rgba(21,94,239,.12) !important; }
#btnOpenScan button { background: var(--aspri-blue) !important; }
#btnOpenScan button:hover { background: var(--aspri-blue-dark) !important; }
body > .container .space-y-4 a[href="/aspri/internal"] button { background: var(--aspri-green) !important; }
body > .container .space-y-4 a[href="/aspri/internal"] button:hover { background: #116b42 !important; }
/* Bottom sheets and detail panels: keep existing IDs/transitions for JS */
#sheetOverlay, #resultBackdrop, #detailBackdrop { background: rgba(15, 28, 43, .48) !important; backdrop-filter: blur(3px); }
#sheetPanel, #resultPanel, #detailPanel {
  background: #fff !important; border: 1px solid rgba(229,237,243,.9); border-radius: 22px 22px 0 0 !important;
  box-shadow: 0 -12px 45px rgba(17, 39, 61, .14) !important;
}
#sheetPanel { padding: 23px !important; }
#sheetPanel h2, #resultPanel h2, #detailPanel h2 { color: var(--aspri-ink) !important; font-size: 16px !important; letter-spacing: -.25px; }
#sheetPanel > p { color: #718096 !important; font-size: 12px !important; line-height: 1.7; }
#inputNama { min-height: 48px; border-color: #dce5ed !important; border-radius: 12px !important; font-family: inherit; font-size: 13px !important; background: #fbfcfe; }
#inputNama:focus { border-color: var(--aspri-blue) !important; box-shadow: 0 0 0 3px rgba(21,94,239,.10) !important; }
#btnCariJukir, #btnCloseScan2 { min-height: 46px; border-radius: 11px !important; font-family: inherit; font-size: 13px !important; }
#btnCariJukir { background: var(--aspri-blue) !important; }
#btnCloseScan2 { background: #f4f7fa !important; border-color: #e1e8ef !important; }
#btnCloseScan, #btnCloseResult, #detailPanel button[onclick="closeDetailJukir()"] { width: 34px; height: 34px; display: inline-flex; align-items: center; justify-content: center; border-radius: 10px; background: #f3f6f9; color: #536577 !important; }
#resultPanel { max-height: 82vh; padding: 22px !important; }
#detailPanel { border-radius: 18px !important; padding: 22px !important; }
#detailContent { scrollbar-width: thin; scrollbar-color: #cbd5e1 transparent; }
.jukir-list { max-height: 55vh; overflow-y: auto; display: flex; flex-direction: column; gap: 10px; padding-right: 4px; }
.jukir-card { background: #fff !important; border: 1px solid var(--aspri-line) !important; border-left: 3px solid var(--aspri-green) !important; border-radius: 13px !important; padding: 15px !important; box-shadow: 0 2px 8px rgba(24,55,85,.035) !important; }
.jukir-name { font-size: 14px; font-weight: 700; color: var(--aspri-ink); }
.jukir-area { margin-top: 4px; font-size: 12px; line-height: 1.6; color: var(--aspri-muted); }
.jukir-btn { display: block; width: 100%; margin-top: 12px; padding: 12px 14px; border-radius: 10px; background: var(--aspri-blue) !important; color: #fff !important; text-align: center; text-decoration: none; font-size: 12px; font-weight: 600; }
.jukir-btn:hover { background: var(--aspri-blue-dark) !important; }
.detail-scroll { max-height: 55vh; overflow-y: auto; padding-right: 4px; }
.loader { width: 38px; height: 38px; border: 3px solid #e5edf3; border-top-color: var(--aspri-blue); border-radius: 50%; animation: spin .8s linear infinite; }
@keyframes spin { to { transform: rotate(360deg); } }
#loadingScreen { background: rgba(247,250,252,.88) !important; backdrop-filter: blur(4px); }
#loadingScreen p { font-family: 'Poppins', sans-serif; font-size: 12px !important; color: #64748b !important; }
/* Responsive desktop sidebar + mobile bottom navigation */
.app-sidebar { display:none; }
@media (min-width: 1024px) {
  body { padding-bottom: 28px !important; }
  header.bg-black { z-index: 60; }
  header .container { max-width: none; padding-left: 280px !important; padding-right: 34px !important; }
  .app-sidebar {
    display:flex;
    flex-direction:column;
    position:fixed;
    z-index:55;
    top:0;
    bottom:0;
    left:0;
    width:246px;
    padding:92px 16px 22px;
    background:#fff;
    border-right:1px solid var(--aspri-line);
    box-shadow:4px 0 20px rgba(24,55,85,.025);
  }
  .sidebar-brand { position:absolute; top:20px; left:24px; display:flex; align-items:center; height:34px; }
  .sidebar-brand img { width:auto; max-width:125px; height:32px; object-fit:contain; }
  .sidebar-label { margin:0 10px 12px; color:#91a0ae; font-size:10px; font-weight:700; letter-spacing:1px; text-transform:uppercase; }
  .sidebar-nav-item { display:flex; align-items:center; gap:13px; width:100%; min-height:46px; padding:0 13px; margin-bottom:5px; border:0; border-radius:11px; background:transparent; color:#6b7d8f; font:500 12px 'Poppins',sans-serif; text-align:left; cursor:pointer; transition:background .18s ease,color .18s ease; }
  .sidebar-nav-item i { width:19px; text-align:center; font-size:15px; }
  .sidebar-nav-item:hover { background:#f3f7fb; color:var(--aspri-blue); }
  .sidebar-nav-item.active { background:#eaf6ef; color:var(--aspri-green); font-weight:700; }
  .sidebar-bottom { margin-top:auto; padding:14px 10px 0; border-top:1px solid var(--aspri-line); color:#92a0ad; font-size:10px; line-height:1.7; }
  #homeView, #transactionView { width:auto; max-width:1200px; margin-left:246px; padding:30px 34px 24px !important; }
  body > .container { padding-top:30px !important; }
  .app-bottom-nav { display:none !important; }
  .card.text-center { margin-bottom:18px; }
  #detailPanel { max-width:1100px; }
}
@media (min-width: 768px) and (max-width: 1023px) {
  #homeView, #transactionView { max-width:900px; }
}

/* Small-screen polish */
@media (max-width: 480px) {
  header .container { padding-left: 17px !important; padding-right: 17px !important; }
  header img { max-width: 118px; }
  body > .container { padding: 18px 15px 20px !important; }
  .card { padding: 16px; border-radius: 15px; }
  .card.text-center { padding: 19px; }
  .grid.grid-cols-2 .card { padding: 14px 12px; }
  .grid.grid-cols-2 .card .h-12 { width: 36px; height: 36px; flex-basis: 36px; }
  .card.mb-6 { padding: 17px 15px; }
  #sheetPanel { padding: 21px 18px calc(24px + env(safe-area-inset-bottom)) !important; }
  #resultPanel { padding: 20px 17px calc(24px + env(safe-area-inset-bottom)) !important; }
  #detailPanel { width: 96vw !important; padding: 17px !important; }
}
@media (min-width: 768px) {
  body > .container { padding-top: 30px !important; }
  .card.text-center { margin-bottom: 18px; }
  .grid.grid-cols-2 { grid-template-columns: repeat(2, minmax(0, 1fr)); }
}
@media (prefers-reduced-motion: reduce) {
  *, *::before, *::after { scroll-behavior: auto !important; transition-duration: .01ms !important; animation-duration: .01ms !important; }
}

/* Seamless single-page navigation + transaction view */
.app-view[hidden] { display: none !important; }
.stat-link { display:block; width:100%; background:transparent; border:0; padding:0; cursor:pointer; }
.view-transactions-btn { border:0; background:transparent; cursor:pointer; }
.transaction-shell { margin-bottom: 20px; }
.transaction-icon { width:42px;height:42px;display:flex;align-items:center;justify-content:center;border-radius:13px;background:#eaf1ff;color:var(--aspri-blue);font-size:17px;flex-shrink:0; }
.transaction-table-wrap { width:100%; overflow-x:auto; border:1px solid var(--aspri-line); border-radius:12px; -webkit-overflow-scrolling:touch; }
.transaction-table { border-collapse:separate; border-spacing:0; white-space:nowrap; }
.transaction-table thead { background:#f2f7fb; }
.transaction-table th { padding:14px 15px; border-bottom:1px solid var(--aspri-line); color:#64778a; font-size:10px; letter-spacing:.45px; text-transform:uppercase; text-align:center; font-weight:700; }
.transaction-table td { padding:13px 15px; border-bottom:1px solid #edf2f6; color:#405466; font-size:12px; text-align:center; vertical-align:middle; }
.transaction-table tbody tr:last-child td { border-bottom:0; }
.transaction-table tbody tr:hover { background:#f8fbfd; }
.transaction-table td:nth-child(3) { color:var(--aspri-ink); font-weight:600; }
.transaction-table td:nth-child(4) { color:var(--aspri-green); font-weight:700; }
.btn-cetak { display:inline-flex; align-items:center; justify-content:center; gap:7px; padding:9px 12px; color:#fff!important; background:var(--aspri-blue); border-radius:9px; font-size:11px; font-weight:600; text-decoration:none; }
.btn-cetak:hover { background:var(--aspri-blue-dark); }
.transaction-empty { padding:28px 12px!important; color:var(--aspri-muted)!important; white-space:normal; }
#pagination-links { display:flex; flex-wrap:wrap; align-items:center; justify-content:center; gap:5px; font-size:12px; }
#pagination-links a,#pagination-links strong,#pagination-links span { display:inline-flex; align-items:center; justify-content:center; min-width:34px; min-height:34px; padding:7px 11px; border:1px solid var(--aspri-line); border-radius:9px; background:#fff; color:#536a7e; }
#pagination-links strong { background:var(--aspri-blue); border-color:var(--aspri-blue); color:#fff; }
.app-bottom-nav { position:fixed; left:0;right:0;bottom:0;z-index:45;display:flex;justify-content:center;gap:0;padding:9px 0 max(8px,env(safe-area-inset-bottom));background:rgba(255,255,255,.96);border-top:1px solid var(--aspri-line);box-shadow:0 -5px 20px rgba(20,55,80,.045);backdrop-filter:blur(12px); }
.app-nav-item { flex:1;max-width:180px;display:flex;flex-direction:column;align-items:center;justify-content:center;gap:5px;border:0;background:transparent;color:#8a9aaa;font-family:inherit;font-size:10px;font-weight:500;cursor:pointer; }
.app-nav-item i { font-size:18px; }
.app-nav-item.active { color:var(--aspri-green);font-weight:700; }
body { padding-bottom:88px!important; }
@media(max-width:480px) { #transactionView { padding:18px 12px 20px!important; } .transaction-shell { padding:16px 12px!important; } .transaction-table th,.transaction-table td { padding:12px 11px; } }


/* STS integrated view */
#stsView .sts-shell { padding:22px; }
#stsView .sts-content { min-width:0; }
#stsView .sts-content h1 { display:none; }
#stsView .sts-content .mb-3.d-flex { display:flex; flex-wrap:wrap; gap:10px; align-items:center; }
#stsView .sts-content .btn { border:0; border-radius:10px; padding:10px 14px; font-family:inherit; font-size:12px; font-weight:600; }
#stsView .sts-content .btn-danger { background:#dc4c4c; color:#fff; }
#stsView .sts-content .btn-primary { background:var(--aspri-blue); color:#fff; }
#stsView .sts-content .btn-warning { background:#f4b740; color:#26394a; }
#stsView .sts-content .btn-success { background:var(--aspri-green); color:#fff; }
#stsView .sts-content input, #stsView .sts-content select { min-height:42px; border:1px solid #dce5ed; border-radius:9px; padding:8px 11px; font:12px 'Poppins',sans-serif; }
#stsView .sts-content .table-responsive { overflow-x:auto; border:1px solid var(--aspri-line); border-radius:12px; }
#stsView .sts-content table { width:100%; border-collapse:collapse; white-space:nowrap; }
#stsView .sts-content th { background:#f2f7fb; color:#64778a; font-size:10px; text-transform:uppercase; padding:12px; }
#stsView .sts-content td { color:#405466; font-size:12px; padding:12px; border-bottom:1px solid #edf2f6; }
#stsView .sts-content .table-striped tbody tr:nth-of-type(odd) { background:#f9fbfd; }
#modalPilihSetoran, #modalTambahManual { z-index:1100; }
#modalPilihSetoran .modal-content, #modalTambahManual .modal-content { border:0; border-radius:16px; overflow:hidden; }
#modalPilihSetoran .modal-header { background:var(--aspri-blue)!important; }
#modalPilihSetoran .modal-title, #modalTambahManual .modal-title { font-size:15px; font-weight:700; }
@media(max-width:600px){ #stsView { padding:18px 12px 20px!important; } #stsView .sts-shell { padding:16px 12px!important; } #stsView .sts-content .mb-3.d-flex { align-items:stretch; } #stsView .sts-content .mb-3.d-flex > button { flex:1; } }

.transaction-shell {
    background: #fff;
    border: 1px solid #e9edf3;
    border-radius: 20px;
    padding: 20px;
    box-shadow: 0 4px 18px rgba(15, 23, 42, 0.04);
}

.transaction-icon {
    width: 42px;
    height: 42px;
    display: flex;
    align-items: center;
    justify-content: center;
    flex-shrink: 0;
    border-radius: 13px;
    background: #eff6ff;
    color: #1677ff;
    font-size: 17px;
}

.transaction-table-wrap {
    width: 100%;
    overflow-x: auto;
}

.transaction-table {
    border-collapse: separate;
    border-spacing: 0;
}

.transaction-table th {
    padding: 13px 12px;
    background: #f8fafc;
    color: #64748b;
    font-size: 11px;
    font-weight: 700;
    text-align: left;
    white-space: nowrap;
}

.transaction-table td {
    padding: 15px 12px;
    border-bottom: 1px solid #edf0f4;
    color: #334155;
    font-size: 13px;
    vertical-align: middle;
}

.transaction-empty {
    padding: 32px 12px !important;
    color: #94a3b8 !important;
    text-align: center;
}

/* Mobile: ubah setiap baris menjadi kartu */
@media (max-width: 767px) {
    #transactionView {
        padding-left: 14px;
        padding-right: 14px;
        padding-top: 20px;
    }

    .transaction-shell {
        padding: 16px;
        border-radius: 18px;
    }

    .transaction-table-wrap {
        overflow: visible;
    }

    .transaction-table,
    .transaction-table tbody {
        display: block;
        width: 100%;
    }

    .transaction-table thead {
        display: none;
    }

    .transaction-table tbody tr {
        display: grid;
        grid-template-columns: 1fr auto;
        gap: 10px 12px;
        width: 100%;
        margin-bottom: 12px;
        padding: 15px;
        background: #fff;
        border: 1px solid #e8edf4;
        border-radius: 15px;
        box-shadow: 0 2px 7px rgba(15, 23, 42, 0.025);
    }

    .transaction-table tbody td {
        display: block;
        min-width: 0;
        padding: 0;
        border: 0;
        font-size: 12px;
        overflow-wrap: anywhere;
    }

    /* Nomor transaksi */
    .transaction-table tbody td:nth-child(1) {
        grid-column: 1;
        grid-row: 1;
        color: #94a3b8;
        font-size: 11px;
        font-weight: 600;
    }

    /* Total setoran */
    .transaction-table tbody td:nth-child(4) {
        grid-column: 2;
        grid-row: 1 / span 2;
        align-self: center;
        color: #15803d;
        font-size: 14px;
        font-weight: 800;
        text-align: right;
    }

    /* Nama juru parkir */
    .transaction-table tbody td:nth-child(3) {
        grid-column: 1;
        grid-row: 2;
        color: #0f172a;
        font-size: 14px;
        font-weight: 700;
    }

    /* Tanggal dan jam */
    .transaction-table tbody td:nth-child(2) {
        grid-column: 1;
        grid-row: 3;
        color: #64748b;
        font-size: 11px;
    }

    /* Tombol aksi */
    .transaction-table tbody td:nth-child(5) {
        grid-column: 1 / -1;
        grid-row: 4;
        display: flex;
        align-items: center;
        flex-wrap: wrap;
        gap: 8px;
        padding-top: 11px;
        margin-top: 2px;
        border-top: 1px solid #f1f5f9;
    }

    .transaction-table tbody td:nth-child(5) a,
    .transaction-table tbody td:nth-child(5) button {
        min-height: 36px;
    }

    /* Status memuat atau data kosong */
    .transaction-table tbody tr:has(.transaction-empty) {
        display: block;
        padding: 24px 12px;
        text-align: center;
    }

    .transaction-table tbody .transaction-empty {
        display: block;
        width: 100%;
        text-align: center;
    }

    #pagination-links {
        overflow-x: auto;
        padding-bottom: 4px;
    }

    #pagination-links a,
    #pagination-links button,
    #pagination-links span {
        white-space: nowrap;
    }
}

@media (max-width: 767px) {
    /* Semua isi card transaksi rata tengah */
    .transaction-table tbody tr:not(:has(.transaction-empty)) {
        text-align: center;
        justify-items: center;
    }

    .transaction-table tbody td:nth-child(1) {
        grid-column: 1 / -1;
        grid-row: 1;
        width: 100%;
        text-align: center;
    }

    .transaction-table tbody td:nth-child(2) {
        grid-column: 1 / -1;
        grid-row: 3;
        width: 100%;
        text-align: center;
    }

    .transaction-table tbody td:nth-child(3) {
        grid-column: 1 / -1;
        grid-row: 2;
        width: 100%;
        text-align: center;
    }

    .transaction-table tbody td:nth-child(4) {
        grid-column: 1 / -1;
        grid-row: 4;
        width: 100%;
        text-align: center;
        margin-top: 2px;
    }

    /* Area aksi dan tombol cetak full width */
    .transaction-table tbody td:nth-child(5) {
        grid-column: 1 / -1;
        grid-row: 5;
        display: flex;
        flex-direction: column;
        align-items: stretch;
        width: 100%;
        text-align: center;
    }

    .transaction-table tbody td:nth-child(5) a,
    .transaction-table tbody td:nth-child(5) button {
        display: flex;
        align-items: center;
        justify-content: center;
        width: 100%;
        min-height: 44px;
        box-sizing: border-box;
        border-radius: 10px;
    }
}

.transaction-search {
    display: flex;
    align-items: center;
    gap: 10px;
    width: 100%;
    min-height: 46px;
    margin-bottom: 16px;
    padding: 0 14px;
    background: #f8fafc;
    border: 1px solid #e2e8f0;
    border-radius: 12px;
    color: #94a3b8;
    box-sizing: border-box;
}

.transaction-search:focus-within {
    background: #fff;
    border-color: #1677ff;
    box-shadow: 0 0 0 3px rgba(22, 119, 255, .09);
}

.transaction-search > i {
    flex-shrink: 0;
}

.transaction-search input {
    width: 100%;
    min-width: 0;
    height: 44px;
    padding: 0;
    border: 0;
    outline: none;
    background: transparent;
    color: #0f172a;
    font-size: 13px;
}

.transaction-search input::placeholder {
    color: #94a3b8;
}

#clearTransactionSearch {
    display: none;
    flex-shrink: 0;
    padding: 6px;
    border: 0;
    background: transparent;
    color: #64748b;
    cursor: pointer;
}

@media (max-width: 767px) {
    .transaction-search {
        margin-bottom: 14px;
    }
}
.transaction-delete-btn {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    gap: 7px;
    padding: 9px 14px;
    background: #dc2626;
    color: #ffffff;
    border: 1px solid #dc2626;
    border-radius: 10px;
    font-size: 13px;
    font-weight: 600;
    cursor: pointer;
    transition: background .2s ease, transform .2s ease;
    white-space: nowrap;
}

.transaction-delete-btn:hover {
    background: #b91c1c;
    border-color: #b91c1c;
}

.transaction-delete-btn:active {
    transform: scale(.97);
}

.transaction-delete-btn i {
    color: #ffffff;
}

@media (max-width: 480px) {
    .transaction-delete-btn {
        padding: 8px 10px;
        font-size: 12px;
    }
}
.transaction-actions {
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 6px;
    flex-wrap: wrap;
}

.btn-hapus-transaksi {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    gap: 5px;
    padding: 7px 10px;
    border: 1px solid #dc2626;
    border-radius: 8px;
    background: #dc2626;
    color: #fff;
    font-size: 11px;
    font-weight: 600;
    cursor: pointer;
    white-space: nowrap;
}

.btn-hapus-transaksi:hover {
    background: #b91c1c;
    border-color: #b91c1c;
}

.btn-hapus-transaksi i {
    color: #fff;
}

@media (max-width: 480px) {
    .transaction-actions {
        flex-direction: column;
        gap: 5px;
    }

    .transaction-actions .btn-cetak,
    .transaction-actions .btn-hapus-transaksi {
        width: 100%;
        box-sizing: border-box;
    }
}
</style>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="pb-20">

<!-- TOP HEADER -->
<header class="bg-black shadow-sm top-0 inset-x-0 z-50 py-4">
  <div class="container mx-auto px-5 flex justify-between items-center">
      <div class="flex items-center gap-2">
          <img src="/aspri/assets/img/asri.png" class="h-8">
        
      </div>
      <a href="<?php echo base_url('Welcome/logout'); ?>" class="text-red-500 text-sm">
          Logout
      </a>
  </div>
</header>

<!-- Desktop sidebar; on mobile the bottom navigation remains visible -->
<aside class="app-sidebar" aria-label="Navigasi utama desktop">
  <div class="sidebar-brand">
    <img src="/aspri/assets/img/asri.png" alt="Logo ASPRI">
  </div>
  <p class="sidebar-label">Menu utama</p>
  <button type="button" class="sidebar-nav-item active" data-view="home"><i class="fas fa-home"></i><span>Dashboard</span></button>

  <button type="button" class="sidebar-nav-item" data-view="search"><i class="fas fa-search"></i><span>Cari Juru Parkir</span></button>
  <button type="button" class="sidebar-nav-item" data-view="transactions"><i class="fas fa-receipt"></i><span>Transaksi</span></button>
  <button type="button" class="sidebar-nav-item" data-view="sts"><i class="fas fa-file-invoice-dollar"></i><span>Surat Tanda Setor</span></button>
  <a href="./internal" target="_blank" class="sidebar-nav-item" 
   style="color: #dc2626;">
    <i class="fas fa-gauge-high" style="color: #dc2626;"></i>
    <span style="color: #dc2626;">Dashboard Internal</span>
</a>
  <div class="sidebar-bottom">ASPRI<br>Administrasi Parkir</div>
</aside>

<!-- MAIN CONTENT -->

<section id="homeView" class="container mx-auto px-5 pt-10 app-view aspri-home">

    <!-- GREETING -->
    <div class="aspri-welcome-card">
        <div class="aspri-welcome-copy">
            <span class="aspri-welcome-label">DASHBOARD KOLEKTOR</span>
            <p>Selamat bertugas,</p>
            <h1><?= html_escape($this->session->userdata('nama')); ?> <span>👋</span></h1>
            <div class="aspri-welcome-caption">
                <i class="fas fa-circle-check"></i>
                Semoga aktivitas hari ini berjalan lancar.
            </div>
        </div>
        <div class="aspri-welcome-symbol">
            <i class="fas fa-chart-simple"></i>
        </div>
    </div>

    <!-- STATISTIK -->
    <div class="aspri-section-head">
        <div>
            <h2>Ringkasan Hari Ini</h2>
            <p>Pantau transaksi dan pendapatanmu.</p>
        </div>
        <span class="aspri-today-badge">
            <i class="far fa-calendar"></i>
            <?= date('d M Y'); ?>
        </span>
    </div>

    <div class="aspri-stats-grid">

        <button type="button"
                class="aspri-stat-card aspri-stat-blue"
                data-view="transactions">
            <div class="aspri-stat-heading">
                <span class="aspri-stat-icon">
                    <i class="fas fa-receipt"></i>
                </span>
                <i class="fas fa-arrow-up-right-from-square aspri-stat-arrow"></i>
            </div>
            <span class="aspri-stat-label">TRANSAKSI HARI INI</span>
            <strong class="aspri-stat-number">
                <?= number_format($total_transaksi_hari_ini ?? 0); ?>
            </strong>
            <span class="aspri-stat-footer">
                Lihat transaksi <i class="fas fa-arrow-right"></i>
            </span>
        </button>

        <div class="aspri-stat-card aspri-stat-green">
            <div class="aspri-stat-heading">
                <span class="aspri-stat-icon">
                    <i class="fas fa-wallet"></i>
                </span>
                <span class="aspri-stat-tag">PENDAPATAN</span>
            </div>
            <span class="aspri-stat-label">PENDAPATAN HARI INI</span>
            <strong class="aspri-stat-number aspri-stat-currency">
                Rp <?= number_format($total_pendapatan_hari_ini ?? 0, 0, ',', '.'); ?>
            </strong>
            <span class="aspri-stat-footer">Total pendapatan tercatat</span>
        </div>

    </div>

    <!-- TRANSAKSI TERBARU -->
    <div class="aspri-recent-card">

        <div class="aspri-recent-header">
            <div class="aspri-recent-title">
                <span class="aspri-recent-title-icon">
                    <i class="fas fa-clock-rotate-left"></i>
                </span>
                <div>
                    <h2>Transaksi Terakhir</h2>
                    <p>Aktivitas setoran terbaru</p>
                </div>
            </div>

            <button type="button"
                    data-view="transactions"
                    class="view-transactions-btn aspri-see-all">
                Lihat semua <i class="fas fa-arrow-right"></i>
            </button>
        </div>

        <?php if (!empty($transaksi_terbaru)): ?>
            <div class="aspri-recent-list">
                <?php foreach ($transaksi_terbaru as $t): ?>
                    <div class="aspri-recent-row">

                        <div class="aspri-recent-avatar">
                            <i class="fas fa-building-columns"></i>
                        </div>

                        <div class="aspri-recent-info">
                            <strong><?= html_escape($t->nama_petugas); ?></strong>
                            <span>
                                <i class="fas fa-location-dot"></i>
                                <?= html_escape($t->lokasi); ?>
                            </span>
                            <small>
                                <?= date('d M Y · H:i', strtotime($t->waktu_setor)); ?>
                            </small>
                        </div>

                        <div class="aspri-recent-amount">
                            <strong>
                                Rp <?= number_format((float) str_replace('.', '', $t->total_stor), 0, ',', '.'); ?>
                            </strong>
                            <span>Setoran</span>
                        </div>

                    </div>
                <?php endforeach; ?>
            </div>
        <?php else: ?>
            <div class="aspri-recent-empty">
                <span><i class="fas fa-inbox"></i></span>
                <strong>Belum ada transaksi</strong>
                <p>Data setoran terbaru akan muncul di sini.</p>
            </div>
        <?php endif; ?>

    </div>

    <!-- AKSI UTAMA -->
 <a href="#" id="btnOpenScan" class="btn-input-registrasi">
    <i class="fas fa-plus-circle"></i>
    <span>Input Registrasi Parkir</span>
    <i class="fas fa-arrow-right"></i>
</a>
    

</section>


<!-- TRANSACTION VIEW: loaded without navigating away -->

<section id="transactionView" class="container mx-auto px-5 pt-6 md:pt-10 app-view" hidden>
  <div class="card transaction-shell">

    <div class="flex items-center justify-between mb-5">
      <div>
        <h2 class="text-base md:text-lg font-bold text-gray-900">
          Riwayat Transaksi
        </h2>
        <p class="text-xs text-gray-500 mt-1">
          Daftar setoran dan bukti transaksi parkir.
        </p>
      </div>

      <div class="flex items-center gap-3">
     

        <div class="transaction-icon">
          <i class="fas fa-receipt"></i>
        </div>
      </div>
    </div>

    <div class="transaction-search">
      <i class="fas fa-search"></i>
      <input
        type="search"
        id="transactionSearch"
        placeholder="Cari nama, tanggal, atau nominal..."
        autocomplete="off"
      >
      <button
        type="button"
        id="clearTransactionSearch"
        aria-label="Hapus pencarian"
      >
        <i class="fas fa-times"></i>
      </button>
    </div>

    <div class="transaction-table-wrap">
      <table class="transaction-table w-full">
        <thead>
          <tr>
            <th>NO</th>
            <th>Tgl/Jam</th>
            <th>Juru Parkir</th>
            <th>Total</th>
            <th>Aksi</th>
          </tr>
        </thead>

        <tbody id="petugas_table_body">
          <tr>
            <td colspan="5" class="transaction-empty">
              Memuat transaksi...
            </td>
          </tr>
        </tbody>
      </table>
    </div>

    <div id="pagination-links" class="my-4"></div>

  </div>
</section>


<!-- STS VIEW: terintegrasi di dashboard, tidak berpindah halaman -->
<section id="stsView" class="container mx-auto px-5 pt-10 app-view" hidden>
  <div class="card transaction-shell sts-shell">
    <div class="flex items-center justify-between mb-5">
      <div><h2 class="text-base font-bold text-gray-900">Surat Tanda Setor Bank</h2><p class="text-xs text-gray-500 mt-1">Kelola setoran, STS manual, dan rekap harian.</p></div>
      <div class="transaction-icon"><i class="fas fa-file-invoice-dollar"></i></div>
    </div>
    <div class="sts-content">

        <div class="mb-3 d-flex justify-content-between">
          <button type="button" class="btn btn-danger" id="btnBukaPilihSetoran">Pilih Setoran</button>
          
                 <button type="button" class="btn btn-primary" id="btnBukaTambahManual">
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
    <tbody id="sts_table_body">
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
</section>
<!-- Modal Pilih Setoran -->
<div class="modal fade" id="modalPilihSetoran" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-scrollable">
        <div class="modal-content">

            <div class="modal-header bg-primary text-white">
                <h5 class="modal-title">
                    <i class="fas fa-hand-pointer mr-2"></i>
                    Pilih Setoran
                </h5>

                <button type="button"
                        class="btn-close btn-close-white"
                        data-bs-dismiss="modal"
                        aria-label="Tutup"></button>
            </div>

            <div class="modal-body">

                <div class="table-responsive">
                    <table class="table table-striped table-hover align-middle mb-0"
                           id="tabelSetoran">

                        <thead>
                            <tr>
                                <th>Waktu Setor</th>
                                <th>Kode Petugas</th>
                                <th>Nama Petugas</th>
                                <th>Lokasi</th>
                                <th>Jumlah</th>
                                <th width="100">Aksi</th>
                            </tr>
                        </thead>

                        <tbody>
                            <tr>
                                <td colspan="6" class="text-center text-muted">
                                    Memuat data...
                                </td>
                            </tr>
                        </tbody>

                    </table>
                </div>

            </div>

            <div class="modal-footer">
                <button type="button"
                        class="btn btn-secondary"
                        data-bs-dismiss="modal">
                    Tutup
                </button>
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
          <button type="button" class="btn-close js-tutup-modal-sts" aria-label="Tutup"></button>
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
          <button class="btn btn-secondary js-tutup-modal-sts" type="button">Batal</button>
          <button class="btn btn-primary" type="submit">Simpan</button>
        </div>
      </form>
    </div>
  </div>
</div>

<!-- Bottom navigation shared by dashboard and transaction view -->
<nav class="app-bottom-nav" aria-label="Navigasi utama">
  <button type="button" class="app-nav-item active" data-view="home"><i class="fas fa-home"></i><span>Home</span></button>
  <button type="button" class="app-nav-item" data-view="search"><i class="fas fa-search"></i><span>Cari Jukir</span></button>
  <button type="button" class="app-nav-item" data-view="transactions"><i class="fas fa-receipt"></i><span>Transaksi</span></button>
  <button type="button" class="app-nav-item" data-view="sts"><i class="fas fa-file-invoice-dollar"></i><span>STS</span></button>
</nav>

<!-- BOTTOM SHEET: FORM CARI JUKIR -->
<div id="scanSheet" class="fixed inset-0 z-40 flex items-end justify-center pointer-events-none hidden">
    <!-- Overlay -->
    <div id="sheetOverlay"
         class="absolute inset-0 bg-black bg-opacity-40 opacity-0 transition-opacity duration-300 pointer-events-none">
    </div>

    <!-- Panel -->
    <div id="sheetPanel"
         class="w-full max-w-md bg-white rounded-t-2xl shadow-2xl transform translate-y-full transition-transform duration-300 p-7 pb-10 pointer-events-auto mb-5">

        <div class="flex items-center justify-between mb-5">
            <h2 class="text-xl font-bold text-gray-900">
                Cari Juru Parkir
            </h2>
            <button type="button" id="btnCloseScan" class="text-gray-500 hover:text-gray-700 text-2xl leading-none">
                <i class="fas fa-times"></i>
            </button>
        </div>

        <p class="text-base text-gray-600 mb-4">
            Masukkan nama Jukir untuk mencari data setoran / transaksi.
        </p>

        <!-- Flashdata error -->
        <?php if ($this->session->flashdata('jukir_not_found')): ?>
            <div class="mb-4 text-base bg-red-100 text-red-700 px-4 py-3 rounded-lg">
                <?php echo $this->session->flashdata('jukir_not_found'); ?>
            </div>
        <?php endif; ?>

      <form id="formCariJukir" class="space-y-4">

    <div>
        <input type="text"
               id="inputNama"
               name="nama"
               class="block w-full border border-gray-300 rounded-xl px-4 py-3.5 text-base
                      focus:outline-none focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500"
               placeholder="Masukkan nama Jukir">
    </div>

    <div class="flex gap-3">
        <!-- ⛔ BUKAN submit -->
        <button type="button"
                id="btnCariJukir"
                class="w-1/2 bg-blue-600 hover:bg-blue-700 text-white
                       text-base font-semibold py-3.5 rounded-xl">
            Cari
        </button>

        <button type="button"
                id="btnCloseScan2"
                class="w-1/2 border border-gray-300 bg-gray-100 hover:bg-gray-200
                       text-gray-800 text-base font-semibold py-3.5 rounded-xl">
            Kembali
        </button>
    </div>
</form>


        <div id="error-message"
             class="mt-4 text-base text-red-600 hidden">
        </div>

    </div> <!-- /sheetPanel -->
</div> <!-- /scanSheet -->

<!-- 🔥 OVERLAY HASIL PENCARIAN (TARUH DI SINI) -->
<div id="resultOverlay"
     class="fixed inset-0 z-50 hidden flex items-end justify-center pointer-events-none">


  <!-- backdrop (klik nutup) -->
<div
  id="resultBackdrop"
  class="absolute inset-0 bg-black bg-opacity-40 opacity-0 transition-opacity duration-300 pointer-events-none"
  onclick="closeResult()">
</div>


  <!-- content -->
<div
  id="resultPanel"
  class="relative bg-white w-full max-w-md rounded-t-2xl shadow-2xl
         transform translate-y-full transition-transform duration-300
         p-6 pb-10 z-10 pointer-events-auto mb-20 max-h-[80vh] overflow-auto">


    <div class="flex justify-between items-center mb-4">
      <h2 class="text-xl font-bold text-gray-900">
        Hasil Pencarian Jukir
      </h2>

      <!-- ❌ tombol close -->
      <button
        type="button"
        id="btnCloseResult"
        onclick="closeResult()"
        class="text-gray-500 text-2xl leading-none relative z-20">
        &times;
      </button>
    </div>

    <div id="resultContent"></div>

  </div>
</div>

<!-- 🔥 OVERLAY DETAIL JUKIR -->
<div id="detailOverlay"
     class="fixed inset-0 z-50 hidden flex items-end justify-center pointer-events-none">

  <!-- backdrop -->
  <div id="detailBackdrop"
       class="absolute inset-0 bg-black bg-opacity-40 opacity-0 transition-opacity duration-300 pointer-events-none"
       onclick="closeDetailJukir()"></div>

  <!-- panel -->
<div id="detailPanel"
class="relative
bg-white
w-[95vw]
max-w-6xl
rounded-xl
shadow-2xl
transform translate-y-full
transition-transform duration-300
p-6
z-10
pointer-events-auto
max-h-[90vh]
overflow-hidden">

    <!-- header -->
    <div class="flex items-center justify-between mb-4">
      <h2 class="text-lg font-bold text-gray-900">
        Detail Juru Parkir
      </h2>
      <button onclick="closeDetailJukir()"
              class="text-gray-500 text-2xl leading-none">
        &times;
      </button>
    </div>

<div id="detailContent"
class="overflow-y-auto h-[78vh]">
</div>

  </div>
</div>

<!-- Loading Overlay -->
<div id="loadingScreen" style="
  position: fixed;
  inset: 0;
  background: rgba(255,255,255,.85);
  display: none;
  align-items: center;
  justify-content: center;
  z-index: 9999;
">
  <div style="text-align:center">
    <div class="loader"></div>
    <p style="margin-top:14px;font-size:14px;color:#5f6368">
      Sakedap Loading...
    </p>
  </div>
</div>
<!-- Library jQuery harus lebih dahulu -->
<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>

<!-- Script dashboard -->
<script src="/aspri/assets/img/js/dashboard_kolektor.js"></script>

<!-- Script inline yang menggunakan $ -->
<script>
$(document).ready(function() {
    // Kode yang sudah ada tetap di sini.
});

(function () {
    const searchInput = document.getElementById('transactionSearch');
    const clearButton = document.getElementById('clearTransactionSearch');
    const tableBody = document.getElementById('petugas_table_body');

    if (!searchInput || !clearButton || !tableBody) return;

    function filterTransactions() {
        const keyword = searchInput.value.trim().toLowerCase();
        const rows = tableBody.querySelectorAll('tr');

        clearButton.style.display = keyword ? 'inline-flex' : 'none';

        rows.forEach(function (row) {
            // Abaikan baris loading atau pesan kosong
            if (row.querySelector('.transaction-empty')) {
                row.style.display = '';
                return;
            }

            const text = (row.innerText || row.textContent || '').toLowerCase();
            row.style.display = text.includes(keyword) ? '' : 'none';
        });
    }

    searchInput.addEventListener('input', filterTransactions);

    clearButton.addEventListener('click', function () {
        searchInput.value = '';
        filterTransactions();
        searchInput.focus();
    });

    // Data transaksi mungkin dimuat ulang melalui AJAX
    const observer = new MutationObserver(function () {
        filterTransactions();
    });

    observer.observe(tableBody, {
        childList: true,
        subtree: true
    });
})();

</script>
<!-- /resultOverlay -->
 <script>
  window.namaKolektor = "<?= $this->session->userdata('nama'); ?>";
</script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10.15.5/dist/sweetalert2.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>


<script>
(function () {
  var homeView = document.getElementById('homeView');
  var transactionView = document.getElementById('transactionView');
  var loadedTransactions = false;
  var currentTransactionPage = 0;

  function setView(view) {
    if (view === 'search') {
      var opener = document.getElementById('btnOpenScan');
      if (opener) opener.click();
      return;
    }
    var showTransactions = view === 'transactions';
    var showSTS = view === 'sts';
    var stsView = document.getElementById('stsView');
    homeView.hidden = view !== 'home';
    transactionView.hidden = !showTransactions;
    if (stsView) stsView.hidden = !showSTS;
    document.querySelectorAll('.app-nav-item, .sidebar-nav-item').forEach(function (item) {
      item.classList.toggle('active', item.getAttribute('data-view') === view);
    });
    if (showTransactions && !loadedTransactions) {
      loadSetoran(0);
    }
    if (showSTS && typeof window.loadDashboardSTS === 'function') {
      window.loadDashboardSTS();
    }
    window.scrollTo({ top: 0, behavior: 'smooth' });
  }

  document.addEventListener('click', function (event) {
    var trigger = event.target.closest('[data-view]');
    if (!trigger) return;
    event.preventDefault();
    setView(trigger.getAttribute('data-view'));
  });

  function loadSetoran(page) {
    currentTransactionPage = page;
    var tbody = document.getElementById('petugas_table_body');
    tbody.innerHTML = '<tr><td colspan="5" class="transaction-empty">Memuat transaksi...</td></tr>';
    $.ajax({
      url: "<?php echo site_url('transaksi'); ?>/" + page,
      type: 'GET',
      dataType: 'json',
      success: function (response) {
        var rows = '';
       if (response.setoran && response.setoran.length) {
    response.setoran.forEach(function (setoran, index) {
        var amount = new Intl.NumberFormat('id-ID').format(setoran.total_stor);

        rows += '<tr>' +
            '<td>' + (Number(page) + index + 1) + '</td>' +
            '<td>' + escapeHtml(setoran.waktu_setor) + '</td>' +
            '<td>' + escapeHtml(setoran.nama_petugas) + '</td>' +
            '<td>Rp ' + amount + '</td>' +
  '<td>' +
    '<div class="transaction-actions">' +
        '<a class="btn-cetak" href="./print/' +
            encodeURIComponent(setoran.notransaksi) +
            '" onclick="showLoading()">' +
            '<i class="fas fa-print"></i> CETAK' +
        '</a>' +

        '<button type="button" class="btn-hapus-transaksi" ' +
            'data-notransaksi="' + escapeHtml(setoran.notransaksi) + '" ' +
            'onclick="hapusTransaksi(this)">' +
            '<i class="fas fa-trash-alt"></i> HAPUS' +
        '</button>' +
    '</div>' +
'</td>' +
        '</tr>';
    });

        } else {
          rows = '<tr><td colspan="5" class="transaction-empty"><i class="fas fa-inbox mr-2"></i>Tidak ada data transaksi ditemukan</td></tr>';
        }
        tbody.innerHTML = rows;
        $('#pagination-links').html(response.pagination || '');
        loadedTransactions = true;
      },
      error: function () {
        tbody.innerHTML = '<tr><td colspan="5" class="transaction-empty">Gagal memuat transaksi. Silakan coba lagi.</td></tr>';
        loadedTransactions = false;
      }
    });
  }

  function escapeHtml(value) {
    return String(value == null ? '' : value).replace(/[&<>"']/g, function (char) {
      return {'&':'&amp;','<':'&lt;','>':'&gt;','"':'&quot;',"'":'&#039;'}[char];
    });
  }

  document.getElementById('pagination-links').addEventListener('click', function (event) {
    var link = event.target.closest('a');
    if (!link) return;
    event.preventDefault();
    var parts = link.getAttribute('href').split('/');
    var page = parts[parts.length - 1];
    if (page !== '') loadSetoran(page);
  });

  window.showLoading = function () {
    var screen = document.getElementById('loadingScreen');
    if (screen) screen.style.display = 'flex';
  };
})();
</script>


<!-- Bootstrap JS untuk modal STS; jQuery sudah dimuat oleh dashboard -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script>
// Kontrol modal STS secara eksplisit agar tidak bentrok dengan data API Bootstrap lain.
(function () {
  function getStsModal(id) {
    var el = document.getElementById(id);
    if (!el || !window.bootstrap || !window.bootstrap.Modal) return null;
    return window.bootstrap.Modal.getOrCreateInstance(el, {
      backdrop: true,
      keyboard: true,
      focus: true
    });
  }
  document.addEventListener('click', function (event) {
    var openPick = event.target.closest('#btnBukaPilihSetoran');
    var openManual = event.target.closest('#btnBukaTambahManual');
    var close = event.target.closest('.js-tutup-modal-sts');
    if (openPick) {
      event.preventDefault();
      var pickModal = getStsModal('modalPilihSetoran');
      if (pickModal) pickModal.show();
    }
    if (openManual) {
      event.preventDefault();
      var manualModal = getStsModal('modalTambahManual');
      if (manualModal) manualModal.show();
    }
    if (close) {
      event.preventDefault();
      var modalEl = close.closest('.modal');
      if (modalEl) {
        var modalInstance = getStsModal(modalEl.id);
        if (modalInstance) modalInstance.hide();
      }
    }
  });
  window.closeStsModal = function (id) {
    var modalInstance = getStsModal(id);
    if (modalInstance) modalInstance.hide();
  };
})();
</script>
<script>
$(function () {

 window.loadSTS = function loadSTS(tanggal = null) {
  $.getJSON(
    '<?= site_url("Sts/get_sts_by_date") ?>',
    { tanggal: tanggal },
    function (data) {

      const tbody = $('#sts_table_body');
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
window.loadDashboardSTS = function () {
  if (typeof window.loadSTS === 'function') window.loadSTS($('#filter_tanggal').val() || null);
};
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
        window.closeStsModal('modalTambahManual');
        window.loadSTS($('#filter_tanggal').val()); // reload sesuai tanggal aktif
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
  const rows = document.querySelectorAll('#sts_table_body tr');
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
  const rows = document.querySelectorAll('#sts_table_body tr');
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
   <tr style="height:25px;">
  ${
    index === 0
      ? `<td rowspan="${totalBarisData}" style="font-weight:bold;vertical-align:middle;"></td>`
      : ''
  }

  <td>${item.no_urut}</td>
  <td>${item.nama}</td>
 <td style="
  height:25px;
  max-height:25px;
  white-space:nowrap;
  overflow:hidden;
  text-overflow:ellipsis;
">${item.lokasi}</td>
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
  const rows = document.querySelectorAll('#sts_table_body tr');
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
  document.querySelectorAll('#sts_table_body tr').forEach(tr => {
    const tdJumlah = tr.querySelectorAll('td')[5]; // kolom ke-6 = Jumlah
    if (tdJumlah) {
      total += parseRupiahToNumber(tdJumlah.innerText);
    }
  });
  document.getElementById('grand_total').innerText = formatRupiahID(total);
}

// ===== Re-number urutan NO agar rapi setelah tambah/hapus =====
function renumberRows() {
  const rows = document.querySelectorAll('#sts_table_body tr');
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
  const tbody = document.querySelector('#sts_table_body');
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
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

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

<script>
function hapusTransaksi(button) {
    const noTransaksi = button.dataset.notransaksi;

    if (!noTransaksi) {
        alert('Nomor transaksi tidak ditemukan.');
        return;
    }

    if (!confirm(
        'Yakin ingin menghapus transaksi ' + noTransaksi + '?\n\n' +
        'Data transaksi yang dihapus tidak dapat dipulihkan.'
    )) {
        return;
    }

    const tombolAwal = button.innerHTML;
    button.disabled = true;
    button.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Menghapus...';

    $.ajax({
        url: '<?= site_url("petugas/hapus_transaksi"); ?>',
        type: 'POST',
        dataType: 'json',
        data: {
            notransaksi: noTransaksi,
            '<?= $this->security->get_csrf_token_name(); ?>':
                '<?= $this->security->get_csrf_hash(); ?>'
        },
      success: function(response) {
    if (response.success) {
        alert(response.message || 'Transaksi berhasil dihapus.');

        // Tetap berada di section Riwayat Transaksi
        const transactionView = document.getElementById('transactionView');

        if (transactionView) {
            transactionView.hidden = false;
        }

        // Muat ulang data transaksi saja, tanpa reload halaman
        if (typeof loadTransactions === 'function') {
            loadTransactions();
        } else if (typeof loadRiwayatTransaksi === 'function') {
            loadRiwayatTransaksi();
        } else {
            // Alternatif: hapus baris transaksi langsung dari tampilan
            const row = button.closest('tr');
            if (row) row.remove();
        }
    } else {
        alert(response.message || 'Transaksi gagal dihapus.');
        button.disabled = false;
        button.innerHTML = tombolAwal;
    }
},
        error: function(xhr) {
            let pesan = 'Terjadi kesalahan saat menghapus transaksi.';

            if (xhr.responseJSON && xhr.responseJSON.message) {
                pesan = xhr.responseJSON.message;
            }

            alert(pesan);
            button.disabled = false;
            button.innerHTML = tombolAwal;
        }
    });
}
</script>



</body>
</html>
