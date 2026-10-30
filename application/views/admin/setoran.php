```html
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="theme-color" content="#ffffff">
  <title>Transaksi ASPRI</title>

  <link href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.2.19/tailwind.min.css" rel="stylesheet">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>

  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">

  <style>
    :root {
      --aspri-blue: #0b4f8a;
      --aspri-blue-dark: #083761;
      --aspri-green: #168653;
      --aspri-bg: #f3f8fb;
      --aspri-border: #e2ebf1;
      --aspri-text: #172b3b;
      --aspri-muted: #718096;
    }

    * {
      box-sizing: border-box;
    }

    body {
      margin: 0;
      background: var(--aspri-bg);
      color: var(--aspri-text);
      font-family: 'Poppins', sans-serif;
      font-size: 13px;
      -webkit-font-smoothing: antialiased;
    }

    a {
      text-decoration: none;
    }

    .navbar-custom {
      background: rgba(255,255,255,.96);
      border-bottom: 1px solid var(--aspri-border);
      box-shadow: 0 3px 15px rgba(20,55,80,.035);
      backdrop-filter: blur(12px);
    }

    .navbar-inner {
      max-width: 1100px;
      margin: 0 auto;
      min-height: 62px;
      display: flex;
      align-items: center;
      justify-content: space-between;
    }

    .brand-logo {
      display: block;
      width: auto;
      height: 34px;
      object-fit: contain;
    }

    .logout-btn {
      display: inline-flex;
      align-items: center;
      gap: 7px;
      color: #dc4c4c;
      background: #fff5f5;
      padding: 9px 13px;
      border-radius: 10px;
      font-size: 12px;
      font-weight: 600;
      transition: .2s ease;
    }

    .logout-btn:hover {
      background: #fee2e2;
      color: #b91c1c;
    }

    main {
      padding-top: 62px;
      padding-bottom: 100px;
    }

    .page-heading {
      padding: 30px 20px 72px;
      color: white;
      background: linear-gradient(120deg, #083761, #0b4f8a);
      position: relative;
      overflow: hidden;
    }

    .page-heading::after {
      content: "";
      position: absolute;
      width: 230px;
      height: 230px;
      right: -65px;
      top: -125px;
      border: 35px solid rgba(255,255,255,.055);
      border-radius: 50%;
      pointer-events: none;
    }

    .heading-inner {
      position: relative;
      z-index: 1;
      max-width: 900px;
      margin: 0 auto;
    }

    .heading-label {
      color: #c4d9ed;
      font-size: 11px;
      font-weight: 500;
      letter-spacing: 1.5px;
      text-transform: uppercase;
      margin-bottom: 7px;
    }

    .heading-title {
      margin: 0;
      font-size: 23px;
      line-height: 1.4;
      font-weight: 700;
      letter-spacing: -.5px;
    }

    .heading-subtitle {
      margin-top: 7px;
      font-size: 12px;
      color: #d6e6f5;
    }

    .content-wrap {
      max-width: 1000px;
      margin: -48px auto 0;
      padding: 0 20px;
      position: relative;
      z-index: 2;
    }

    .card-custom {
      background: white;
      border: 1px solid var(--aspri-border);
      border-radius: 17px;
      padding: 22px;
      box-shadow: 0 8px 28px rgba(20,55,80,.055);
    }

    .section-heading {
      display: flex;
      align-items: center;
      justify-content: space-between;
      gap: 12px;
      margin-bottom: 18px;
    }

    .section-title {
      font-size: 15px;
      font-weight: 700;
      color: var(--aspri-text);
    }

    .section-caption {
      color: var(--aspri-muted);
      font-size: 11px;
      margin-top: 4px;
    }

    .section-icon {
      width: 42px;
      height: 42px;
      display: flex;
      align-items: center;
      justify-content: center;
      background: #eaf3fb;
      color: var(--aspri-blue);
      border-radius: 12px;
      flex-shrink: 0;
      font-size: 17px;
    }

    .table-responsive {
      overflow-x: auto;
      width: 100%;
      border: 1px solid var(--aspri-border);
      border-radius: 12px;
      -webkit-overflow-scrolling: touch;
    }

    .transaction-table {
      width: 100%;
      border-collapse: separate;
      border-spacing: 0;
      white-space: nowrap;
    }

    .transaction-table thead {
      background: #f2f7fb;
    }

    .transaction-table th {
      color: #536a7e;
      font-size: 10px;
      text-transform: uppercase;
      letter-spacing: .5px;
      font-weight: 700;
      padding: 15px 16px;
      border-bottom: 1px solid var(--aspri-border);
      text-align: center;
    }

    .transaction-table td {
      padding: 14px 16px;
      border-bottom: 1px solid #edf2f6;
      font-size: 12px;
      color: #405466;
      vertical-align: middle;
    }

    .transaction-table tbody tr {
      transition: background .18s ease;
    }

    .transaction-table tbody tr:hover {
      background: #f7fbfe;
    }

    .transaction-table tbody tr:last-child td {
      border-bottom: 0;
    }

    .transaction-table td:nth-child(3) {
      color: var(--aspri-text);
      font-weight: 600;
    }

    .transaction-table td:nth-child(4) {
      color: var(--aspri-green);
      font-weight: 700;
    }

    .btn-cetak {
      display: inline-flex;
      align-items: center;
      justify-content: center;
      gap: 7px;
      padding: 9px 13px;
      color: white;
      background: var(--aspri-blue);
      border-radius: 9px;
      font-size: 11px;
      font-weight: 600;
      transition: .2s ease;
    }

    .btn-cetak:hover {
      background: var(--aspri-blue-dark);
      color: white;
      transform: translateY(-1px);
    }

    #pagination-links {
      display: flex;
      flex-wrap: wrap;
      align-items: center;
      justify-content: center;
      gap: 5px;
      margin-top: 20px;
      font-size: 12px;
    }

    #pagination-links a,
    #pagination-links strong,
    #pagination-links span {
      display: inline-flex;
      align-items: center;
      justify-content: center;
      min-width: 34px;
      min-height: 34px;
      padding: 7px 11px;
      border: 1px solid var(--aspri-border);
      border-radius: 9px;
      background: white;
      color: #536a7e;
    }

    #pagination-links a:hover {
      color: var(--aspri-blue);
      border-color: #a8c9e4;
      background: #f2f8fd;
    }

    #pagination-links strong {
      background: var(--aspri-blue);
      border-color: var(--aspri-blue);
      color: white;
    }

    .empty-state {
      padding: 28px 12px !important;
      text-align: center;
      color: var(--aspri-muted) !important;
      white-space: normal;
    }

    .empty-state i {
      display: block;
      margin-bottom: 10px;
      font-size: 25px;
      color: #a9bac9;
    }

    .bottom-nav {
      position: fixed;
      bottom: 0;
      left: 0;
      right: 0;
      z-index: 50;
      display: flex;
      justify-content: center;
      background: rgba(255,255,255,.97);
      border-top: 1px solid var(--aspri-border);
      box-shadow: 0 -5px 20px rgba(20,55,80,.045);
      padding: 9px 0 max(8px, env(safe-area-inset-bottom));
      backdrop-filter: blur(12px);
    }

    .bottom-nav a {
      flex: 1;
      max-width: 180px;
      display: flex;
      flex-direction: column;
      align-items: center;
      justify-content: center;
      gap: 5px;
      color: #8a9aaa;
      font-size: 10px;
      font-weight: 500;
      transition: color .2s ease;
    }

    .bottom-nav a i {
      font-size: 18px;
    }

    .bottom-nav a.active {
      color: var(--aspri-green);
      font-weight: 700;
    }

    .bottom-nav a:hover {
      color: var(--aspri-blue);
    }

    .loading-overlay {
      position: fixed;
      inset: 0;
      background: rgba(245,249,252,.82);
      backdrop-filter: blur(4px);
      color: var(--aspri-blue);
      display: none;
      align-items: center;
      justify-content: center;
      z-index: 9999;
    }

    .loading-box {
      min-width: 125px;
      padding: 22px;
      text-align: center;
      background: white;
      border: 1px solid var(--aspri-border);
      border-radius: 16px;
      box-shadow: 0 10px 35px rgba(20,55,80,.1);
    }

    .loading-spinner {
      width: 32px;
      height: 32px;
      margin: 0 auto 12px;
      border: 3px solid #dce8f1;
      border-top-color: var(--aspri-green);
      border-radius: 50%;
      animation: spin .8s linear infinite;
    }

    .loading-text {
      color: #52697d;
      font-size: 11px;
      font-weight: 600;
    }

    @keyframes spin {
      to { transform: rotate(360deg); }
    }

    @media (min-width: 768px) {
      .page-heading {
        padding-top: 38px;
        padding-bottom: 82px;
      }

      .heading-title {
        font-size: 27px;
      }

      .content-wrap {
        padding-left: 24px;
        padding-right: 24px;
      }

      .card-custom {
        padding: 26px;
      }
    }

    @media (max-width: 520px) {
      .navbar-inner {
        min-height: 58px;
      }

      main {
        padding-top: 58px;
      }

      .brand-logo {
        height: 30px;
      }

      .page-heading {
        padding: 25px 18px 68px;
      }

      .heading-title {
        font-size: 20px;
      }

      .content-wrap {
        padding: 0 12px;
        margin-top: -43px;
      }

      .card-custom {
        padding: 15px 12px;
        border-radius: 14px;
      }

      .section-heading {
        margin-bottom: 14px;
      }

      .section-title {
        font-size: 14px;
      }

      .transaction-table th {
        padding: 13px 12px;
        font-size: 9px;
      }

      .transaction-table td {
        padding: 12px;
        font-size: 11px;
      }

      .btn-cetak {
        padding: 9px 11px;
      }

      #pagination-links {
        gap: 4px;
      }
    }

    @media (prefers-reduced-motion: reduce) {
      *,
      *::before,
      *::after {
        animation-duration: .01ms !important;
        transition-duration: .01ms !important;
      }
    }
  </style>
</head>

<body class="min-h-screen">

  <header>
    <nav class="navbar-custom fixed top-0 inset-x-0 z-50 px-4">
      <div class="navbar-inner">
        <img src="/aspri/assets/img/asri.png" alt="Logo ASPRI" class="brand-logo">

        <a class="logout-btn" href="<?php echo base_url('Welcome/logout'); ?>">
          <i class="fas fa-sign-out-alt"></i>
          Logout
        </a>
      </div>
    </nav>
  </header>

  <main>
    <section class="page-heading">
      <div class="heading-inner">
        <p class="heading-label">ASPRI · Administrasi Parkir</p>
        <h1 class="heading-title">
          Transaksi <?php echo $this->session->userdata('nama'); ?>
        </h1>
        <p class="heading-subtitle">
          Riwayat setoran dan bukti transaksi parkir.
        </p>
      </div>
    </section>

    <div class="content-wrap">
      <section class="card-custom">

        <div class="section-heading">
          <div>
            <h2 class="section-title">Riwayat Transaksi</h2>
            <p class="section-caption">Daftar setoran yang tercatat di sistem ASPRI.</p>
          </div>

          <div class="section-icon">
            <i class="fas fa-receipt"></i>
          </div>
        </div>

        <div class="table-responsive">
          <table class="transaction-table">
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
              <!-- Data dimuat melalui jQuery -->
            </tbody>
          </table>
        </div>

        <div id="pagination-links"></div>

      </section>
    </div>

    <div style="padding-bottom: 30px"></div>

    <div id="loadingOverlay" class="loading-overlay">
      <div class="loading-box">
        <div class="loading-spinner"></div>
        <div class="loading-text">Memproses cetak...</div>
      </div>
    </div>
  </main>

  <nav class="bottom-nav">
    <a href="/aspri/" class="active">
      <i class="fas fa-home"></i>
      <span>Home</span>
    </a>

    <a href="/aspri/jukir">
      <i class="fas fa-search"></i>
      <span>Cari Jukir</span>
    </a>

    <a href="#" class="active">
      <i class="fas fa-receipt"></i>
      <span>Transaksi</span>
    </a>
  </nav>

  <script>
    function showLoading() {
      document.getElementById('loadingOverlay').style.display = 'flex';
    }

    window.addEventListener('load', function() {
      document.getElementById('loadingOverlay').style.display = 'none';
    });

    $(document).ready(function() {
      function loadSetoran(page = 0) {
        $.ajax({
          url: "<?php echo site_url('transaksi'); ?>/" + page,
          type: "GET",
          dataType: "json",
          success: function(response) {
            $('#petugas_table_body').empty();

            if (response.setoran.length > 0) {
              response.setoran.forEach(function(setoran, index) {
                $('#petugas_table_body').append(`
                  <tr>
                    <td class="text-center">${page + index + 1}</td>
                    <td class="text-center">${setoran.waktu_setor}</td>
                    <td class="text-center">${setoran.nama_petugas}</td>
                    <td class="text-center">Rp ${new Intl.NumberFormat('id-ID').format(setoran.total_stor)}</td>
                    <td class="text-center">
                      <a href="https://parkir.tasikmalayakota.go.id/aspri/print/${setoran.notransaksi}"
                         class="btn-cetak"
                         onclick="showLoading()">
                        <i class="fas fa-print"></i>
                        CETAK
                      </a>
                    </td>
                  </tr>
                `);
              });
            } else {
              $('#petugas_table_body').html(`
                <tr>
                  <td colspan="5" class="empty-state">
                    <i class="fas fa-inbox"></i>
                    Tidak ada data transaksi ditemukan
                  </td>
                </tr>
              `);
            }

            $('#pagination-links').html(response.pagination);

            $('#pagination-links a').on('click', function(e) {
              e.preventDefault();
              var page = $(this).attr('href').split('/').pop();
              loadSetoran(page);
            });
          }
        });
      }

      loadSetoran();
    });
  </script>

</body>
</html>
```