<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="theme-color" content="#0b4f8a">
  <meta name="description" content="Sistem ASPRI sedang menjalani pemeliharaan untuk peningkatan layanan.">
  <title>ASPRI — Sedang Dalam Pemeliharaan</title>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
  <style>
    :root {
      color-scheme: light;
      --blue: #0b4f8a;
      --blue-deep: #083761;
      --green: #168653;
      --ink: #172b3b;
      --muted: #647789;
      --line: #e4edf3;
      --surface: #ffffff;
    }
    * { box-sizing: border-box; }
    html, body { min-height: 100%; }
    body {
      margin: 0;
      font-family: 'Poppins', Arial, sans-serif;
      color: var(--ink);
      background: #f3f8fb;
      min-height: 100vh;
      display: flex;
      flex-direction: column;
      overflow-x: hidden;
    }
    .topbar {
      height: 7px;
      background: linear-gradient(90deg, var(--blue) 0 68%, var(--green) 68% 100%);
    }
    .page {
      flex: 1;
      display: grid;
      place-items: center;
      padding: 36px 20px 28px;
      position: relative;
      isolation: isolate;
    }
    .page::before, .page::after {
      content: "";
      position: absolute;
      z-index: -1;
      border-radius: 50%;
      pointer-events: none;
    }
    .page::before {
      width: 390px; height: 390px;
      background: rgba(11, 79, 138, .055);
      top: -205px; right: -100px;
    }
    .page::after {
      width: 300px; height: 300px;
      background: rgba(22, 134, 83, .055);
      bottom: -160px; left: -105px;
    }
    .maintenance {
      width: min(100%, 510px);
      background: var(--surface);
      border: 1px solid #e5edf3;
      border-radius: 22px;
      box-shadow: 0 18px 55px rgba(24, 58, 83, .09);
      padding: 38px 38px 32px;
      text-align: center;
      position: relative;
      overflow: hidden;
      animation: enter .55s ease-out both;
    }
    .maintenance::before {
      content: "";
      position: absolute;
      top: 0; left: 0; right: 0;
      height: 5px;
      background: linear-gradient(90deg, var(--blue), #1c79b9 65%, var(--green));
    }
    .brand {
      display: inline-flex;
      align-items: center;
      gap: 10px;
      margin-bottom: 28px;
    }
    .brand-mark {
      width: 42px; height: 42px;
      border-radius: 13px;
      display: grid; place-items: center;
      color: white;
      background: linear-gradient(145deg, #1267a8, #083761);
      box-shadow: 0 7px 15px rgba(11, 79, 138, .18);
    }
    .brand-mark svg { width: 25px; height: 25px; }
    .brand-name { text-align: left; line-height: 1.2; }
    .brand-name strong { display: block; font-size: 19px; letter-spacing: 1.3px; color: var(--blue-deep); }
    .brand-name span { display: block; font-size: 10px; letter-spacing: 1.15px; color: #8293a0; margin-top: 4px; }
    .illustration {
      width: 100px; height: 100px;
      border-radius: 28px;
      margin: 0 auto 23px;
      display: grid; place-items: center;
      background: #edf6fc;
      color: var(--blue);
      position: relative;
    }
    .illustration::after {
      content: "";
      width: 13px; height: 13px;
      position: absolute;
      right: 3px; bottom: 5px;
      border-radius: 50%;
      background: var(--green);
      border: 4px solid white;
    }
    .illustration svg { width: 56px; height: 56px; }
    .status {
      display: inline-flex;
      align-items: center;
      gap: 8px;
      background: #eef8f2;
      color: #167447;
      border: 1px solid #d7efdf;
      border-radius: 999px;
      padding: 7px 13px;
      font-size: 11px;
      font-weight: 600;
      letter-spacing: .35px;
      text-transform: uppercase;
    }
    .status-dot {
      width: 7px; height: 7px; border-radius: 50%;
      background: #22a363;
      box-shadow: 0 0 0 4px rgba(34, 163, 99, .12);
    }
    h1 {
      font-size: clamp(24px, 5vw, 31px);
      line-height: 1.35;
      letter-spacing: -.8px;
      margin: 17px 0 13px;
      color: #123752;
    }
    .description {
      color: var(--muted);
      font-size: 13px;
      line-height: 1.9;
      max-width: 370px;
      margin: 0 auto;
    }
    .schedule {
      margin: 25px 0 0;
      padding: 16px;
      border: 1px solid var(--line);
      background: #f8fbfd;
      border-radius: 14px;
      display: flex;
      align-items: center;
      text-align: left;
      gap: 13px;
    }
    .calendar {
      flex: 0 0 43px;
      height: 43px;
      border-radius: 12px;
      background: #e7f2fb;
      color: var(--blue);
      display: grid;
      place-items: center;
    }
    .calendar svg { width: 22px; height: 22px; }
    .schedule-label { color: #7a8b98; font-size: 10px; margin-bottom: 3px; }
    .schedule strong { display: block; font-size: 13px; color: #203d51; font-weight: 600; }
    .thanks {
      margin: 24px 0 0;
      color: #81909b;
      font-size: 11px;
    }
    .footer {
      padding: 0 20px 23px;
      text-align: center;
      color: #8796a2;
      font-size: 10px;
      letter-spacing: .2px;
    }
    .footer strong { color: #587185; font-weight: 600; }
    @keyframes enter {
      from { opacity: 0; transform: translateY(12px); }
      to { opacity: 1; transform: translateY(0); }
    }
    @media (max-width: 480px) {
      .page { padding: 24px 15px; }
      .maintenance { padding: 30px 22px 26px; border-radius: 19px; }
      .brand { margin-bottom: 24px; }
      .illustration { width: 88px; height: 88px; border-radius: 25px; margin-bottom: 20px; }
      .illustration svg { width: 49px; height: 49px; }
      .description { font-size: 12px; }
      .schedule { padding: 13px; }
      .schedule strong { font-size: 12px; }
    }
    @media (prefers-reduced-motion: reduce) {
      *, *::before, *::after { animation-duration: .01ms !important; transition-duration: .01ms !important; }
    }
  </style>
</head>
<body>
  <div class="topbar" aria-hidden="true"></div>
  <main class="page">
    <section class="maintenance" aria-labelledby="maintenance-title">
      <div class="brand" aria-label="ASPRI">
        <div class="brand-mark" aria-hidden="true">
          <svg viewBox="0 0 24 24" fill="none">
            <path d="M4 17.5V6.5h3.2l4.8 6.2 4.8-6.2H20v11h-3V11l-5 6-5-6v6.5H4Z" fill="currentColor"/>
            <path d="M18.2 3.8h2.3v2.3h-2.3z" fill="#72D5A2"/>
          </svg>
        </div>
        <div class="brand-name">
          <strong>ASPRI</strong>
          <span>SISTEM INFORMASI PARKIR</span>
        </div>
      </div>

      <div class="illustration" aria-hidden="true">
        <svg viewBox="0 0 64 64" fill="none">
          <path d="M16 43.5V18a4 4 0 0 1 4-4h24a4 4 0 0 1 4 4v25.5" stroke="currentColor" stroke-width="3" stroke-linecap="round"/>
          <path d="M11 44h42l3 6H8l3-6Z" fill="currentColor" opacity=".14"/>
          <path d="M11 44h42l3 6H8l3-6Z" stroke="currentColor" stroke-width="3" stroke-linejoin="round"/>
          <path d="M25 25a7 7 0 1 1 14 0c0 4-7 11-7 11s-7-7-7-11Z" fill="#168653" fill-opacity=".17" stroke="#168653" stroke-width="2.5"/>
          <circle cx="32" cy="25" r="2.2" fill="#168653"/>
          <path d="M23 55h18" stroke="currentColor" stroke-width="3" stroke-linecap="round"/>
        </svg>
      </div>

      <div class="status"><span class="status-dot"></span> Pemeliharaan Sistem</div>
      <h1 id="maintenance-title">ASPRI Sedang Dalam Perbaikan</h1>
      <p class="description">
        Kami sedang melakukan pemeliharaan untuk meningkatkan kualitas dan keandalan layanan ASPRI.
        Sistem akan kembali beroperasi setelah proses perbaikan selesai.
      </p>


      <p class="thanks">Terima kasih atas kesabaran dan pengertian Anda.</p>
    </section>
  </main>
  <footer class="footer">© <span id="year"></span> <strong>ASPRI</strong> · Sistem Informasi Parkir</footer>
  <script>
    document.getElementById('year').textContent = new Date().getFullYear();
  </script>
</body>
</html>
