
<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="theme-color" content="#0b4f8a">
<title>Login — ASPRI</title>

<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800&display=swap" rel="stylesheet">
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">

<style>
:root {
    --blue: #0b4f8a;
    --blue-dark: #083761;
    --green: #168653;
    --ink: #172b3b;
    --muted: #718096;
    --line: #e2ebf1;
    --surface: #ffffff;
}

* {
    box-sizing: border-box;
}

html, body {
    margin: 0;
    min-height: 100%;
}

body {
    min-height: 100vh;
    font-family: 'Poppins', sans-serif;
    color: var(--ink);
    background: #fff;
    -webkit-font-smoothing: antialiased;
}

button, input {
    font: inherit;
}

button, a {
    -webkit-tap-highlight-color: transparent;
}

/* =========================
   SPLIT SCREEN
========================= */

.login-layout {
    display: grid;
    grid-template-columns: minmax(0, 1.08fr) minmax(420px, .92fr);
    min-height: 100vh;
}

/* =========================
   LEFT PANEL
========================= */

.visual-panel {
    position: relative;
    display: flex;
    flex-direction: column;
    justify-content: space-between;
    min-height: 100vh;
    padding: 42px clamp(30px, 5vw, 76px) 30px;
    overflow: hidden;
    color: #fff;
    background: linear-gradient(145deg, #083761 0%, #0b4f8a 58%, #126c91 100%);
}

.visual-panel::before,
.visual-panel::after {
    content: "";
    position: absolute;
    border: 1px solid rgba(255,255,255,.09);
    border-radius: 50%;
    pointer-events: none;
}

.visual-panel::before {
    width: 560px;
    height: 560px;
    top: -300px;
    right: -220px;
}

.visual-panel::after {
    width: 440px;
    height: 440px;
    bottom: -260px;
    left: -220px;
}

.visual-content,
.visual-footer,
.brand {
    position: relative;
    z-index: 1;
}

.brand {
    display: inline-flex;
    align-items: center;
    gap: 11px;
    width: fit-content;
    color: white;
    text-decoration: none;
}

.brand-mark {
    display: grid;
    place-items: center;
    width: 43px;
    height: 43px;
    border-radius: 13px;
    background: rgba(255,255,255,.13);
    border: 1px solid rgba(255,255,255,.19);
    font-size: 22px;
}

.brand-name {
    font-size: 25px;
    font-weight: 800;
    letter-spacing: 2px;
    line-height: 1.2;
}

.brand-caption {
    margin-top: 3px;
    color: #c7deed;
    font-size: 10px;
    letter-spacing: 1.2px;
    text-transform: uppercase;
}

.visual-content {
    width: 100%;
    max-width: 600px;
    margin: 40px auto;
}

.eyebrow {
    display: inline-flex;
    align-items: center;
    gap: 9px;
    padding: 8px 12px;
    border: 1px solid rgba(255,255,255,.17);
    border-radius: 7px;
    background: rgba(255,255,255,.07);
    color: #d9edf8;
    font-size: 10px;
    font-weight: 600;
    letter-spacing: 1.3px;
    text-transform: uppercase;
}

.eyebrow span {
    width: 7px;
    height: 7px;
    border-radius: 50%;
    background: #5ce0a0;
    box-shadow: 0 0 10px rgba(92,224,160,.6);
}

.visual-content h1 {
    margin: 23px 0 14px;
    max-width: 520px;
    font-size: clamp(30px, 3.4vw, 48px);
    line-height: 1.23;
    letter-spacing: -1.8px;
    font-weight: 700;
}

.visual-content h1 em {
    color: #73e2b0;
    font-style: normal;
}

.visual-description {
    max-width: 440px;
    margin: 0;
    color: #c8dbea;
    font-size: 13px;
    line-height: 1.9;
}

/* Original inline SVG illustration */

.illustration {
    display: block;
    width: 100%;
    max-width: 510px;
    height: auto;
    margin: 25px auto 0;
    overflow: visible;
}

.visual-footer {
    display: flex;
    justify-content: space-between;
    align-items: center;
    gap: 15px;
    padding-top: 20px;
    border-top: 1px solid rgba(255,255,255,.14);
    color: #b8d1e1;
    font-size: 10px;
}

.footer-status {
    display: inline-flex;
    align-items: center;
    gap: 7px;
}

.footer-status i {
    color: #65e0a7;
    font-size: 9px;
}

/* =========================
   RIGHT PANEL
========================= */

.form-panel {
    display: flex;
    align-items: center;
    justify-content: center;
    min-width: 0;
    padding: 45px clamp(28px, 5vw, 80px);
    background: #fff;
}

.form-inner {
    width: 100%;
    max-width: 390px;
}

.mobile-brand {
    display: none;
}

.form-heading {
    margin-bottom: 32px;
}

.form-kicker {
    margin: 0 0 10px;
    color: var(--green);
    font-size: 10px;
    font-weight: 700;
    letter-spacing: 1.5px;
    text-transform: uppercase;
}

.form-heading h2 {
    margin: 0;
    color: var(--ink);
    font-size: clamp(27px, 2.5vw, 34px);
    font-weight: 700;
    letter-spacing: -1px;
    line-height: 1.35;
}

.form-heading p {
    margin: 11px 0 0;
    color: var(--muted);
    font-size: 12px;
    line-height: 1.8;
}

.alert-error {
    display: flex;
    align-items: flex-start;
    gap: 10px;
    margin-bottom: 23px;
    padding: 13px 14px;
    border: 1px solid #fecaca;
    border-radius: 10px;
    background: #fff7f7;
    color: #b42318;
    font-size: 12px;
    line-height: 1.7;
}

.alert-error i {
    margin-top: 3px;
}

.form-group {
    margin-bottom: 21px;
}

.form-group label {
    display: block;
    margin-bottom: 9px;
    color: #34495b;
    font-size: 11px;
    font-weight: 600;
}

.input-wrap {
    position: relative;
}

.input-icon {
    position: absolute;
    top: 50%;
    left: 15px;
    color: #8b9baa;
    font-size: 14px;
    transform: translateY(-50%);
    pointer-events: none;
    transition: color .2s;
}

.form-group input {
    width: 100%;
    height: 51px;
    padding: 0 45px 0 43px;
    border: 1px solid #dce5ed;
    border-radius: 10px;
    outline: none;
    background: #fbfdfe;
    color: var(--ink);
    font-size: 12px;
    transition: border-color .2s, box-shadow .2s, background .2s;
}

.form-group input::placeholder {
    color: #9aa9b6;
}

.form-group input:focus {
    border-color: var(--blue);
    background: #fff;
    box-shadow: 0 0 0 4px rgba(11,79,138,.075);
}

.input-wrap:focus-within .input-icon {
    color: var(--blue);
}

.toggle-password {
    position: absolute;
    top: 50%;
    right: 13px;
    display: grid;
    place-items: center;
    width: 29px;
    height: 29px;
    padding: 0;
    border: 0;
    border-radius: 7px;
    background: transparent;
    color: #8798a7;
    cursor: pointer;
    transform: translateY(-50%);
}

.toggle-password:hover {
    background: #edf4f9;
    color: var(--blue);
}

.btn-login {
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 10px;
    width: 100%;
    min-height: 51px;
    margin-top: 8px;
    padding: 14px 18px;
    border: 0;
    border-radius: 10px;
    background: var(--blue);
    color: white;
    font-size: 12px;
    font-weight: 600;
    cursor: pointer;
    box-shadow: 0 6px 15px rgba(11,79,138,.14);
    transition: background .2s, transform .2s, box-shadow .2s;
}

.btn-login:hover {
    background: var(--blue-dark);
    box-shadow: 0 9px 20px rgba(11,79,138,.2);
    transform: translateY(-1px);
}

.btn-login:disabled {
    cursor: wait;
    opacity: .8;
    transform: none;
}

.form-security {
    display: flex;
    justify-content: center;
    align-items: center;
    gap: 7px;
    margin-top: 23px;
    color: #8797a5;
    font-size: 10px;
}

.form-security i {
    color: var(--green);
}

.form-footer {
    margin-top: 45px;
    padding-top: 20px;
    border-top: 1px solid #edf1f4;
    color: #8a99a6;
    font-size: 10px;
    line-height: 1.8;
    text-align: center;
}

/* =========================
   INFO PANEL
========================= */

.info-btn {
    position: fixed;
    right: 20px;
    bottom: 20px;
    z-index: 20;
    display: grid;
    place-items: center;
    width: 42px;
    height: 42px;
    border: 0;
    border-radius: 12px;
    background: var(--green);
    color: white;
    cursor: pointer;
    box-shadow: 0 5px 16px rgba(22,134,83,.2);
    transition: background .2s;
}

.info-btn:hover {
    background: #106c43;
}

.info-box {
    position: fixed;
    right: 20px;
    bottom: 72px;
    z-index: 20;
    display: none;
    width: min(330px, calc(100vw - 30px));
    max-height: 70vh;
    overflow: auto;
    padding: 21px;
    border: 1px solid var(--line);
    border-radius: 14px;
    background: white;
    box-shadow: 0 15px 45px rgba(20,55,80,.16);
    color: #526577;
    font-size: 11px;
}

.info-box h3 {
    margin: 0 0 14px;
    color: var(--blue);
    font-size: 15px;
}

.info-box p {
    margin: 0;
    padding: 11px 0;
    border-top: 1px solid #edf1f4;
    line-height: 1.8;
}

.info-box b {
    color: var(--ink);
}

/* =========================
   LOADING
========================= */

.loading-screen {
    position: fixed;
    inset: 0;
    z-index: 9999;
    display: none;
    align-items: center;
    justify-content: center;
    padding: 20px;
    background: rgba(255,255,255,.88);
    backdrop-filter: blur(5px);
}

.loading-card {
    width: 190px;
    padding: 26px 20px;
    border: 1px solid var(--line);
    border-radius: 15px;
    background: white;
    text-align: center;
    box-shadow: 0 10px 35px rgba(20,55,80,.1);
}

.loader {
    width: 36px;
    height: 36px;
    margin: 0 auto 15px;
    border: 3px solid #e0eaf0;
    border-top-color: var(--blue);
    border-right-color: var(--green);
    border-radius: 50%;
    animation: spin .8s linear infinite;
}

.loading-text {
    color: #53697b;
    font-size: 11px;
    font-weight: 500;
}

@keyframes spin {
    to { transform: rotate(360deg); }
}

/* =========================
   RESPONSIVE
========================= */

@media (min-width: 1500px) {
    .login-layout {
        grid-template-columns: 1.12fr .88fr;
    }

    .visual-panel {
        padding-left: 8%;
        padding-right: 8%;
    }
}

@media (max-width: 1000px) {
    .login-layout {
        grid-template-columns: minmax(0, 1fr) minmax(360px, .95fr);
    }

    .visual-panel {
        padding: 32px 30px 25px;
    }

    .visual-content h1 {
        font-size: 34px;
    }

    .form-panel {
        padding: 35px 30px;
    }
}

@media (max-width: 760px) {
    .login-layout {
        display: block;
    }

    .visual-panel {
        display: none;
    }

    .form-panel {
        min-height: 100vh;
        padding: 36px 24px;
        align-items: center;
        background:
            radial-gradient(circle at 100% 0%, rgba(11,79,138,.055), transparent 260px),
            #fff;
    }

    .form-inner {
        max-width: 420px;
    }

    .mobile-brand {
        display: flex;
        align-items: center;
        gap: 10px;
        margin-bottom: 44px;
    }

    .mobile-brand .brand-mark {
        width: 41px;
        height: 41px;
        background: #edf5fb;
        border-color: #e0ebf3;
        color: var(--blue);
    }

    .mobile-brand .brand-name {
        color: var(--blue);
        font-size: 23px;
    }

    .mobile-brand .brand-caption {
        color: #7c8e9e;
    }

    .form-heading {
        margin-bottom: 29px;
    }

    .form-heading h2 {
        font-size: 29px;
    }

    .form-footer {
        margin-top: 34px;
    }

    .info-btn {
        right: 15px;
        bottom: 15px;
        width: 40px;
        height: 40px;
    }

    .info-box {
        right: 15px;
        bottom: 65px;
    }
}

@media (max-width: 380px) {
    .form-panel {
        padding: 28px 19px;
    }

    .mobile-brand {
        margin-bottom: 35px;
    }

    .form-heading h2 {
        font-size: 26px;
    }

    .form-security {
        font-size: 9px;
    }
}

@media (prefers-reduced-motion: reduce) {
    *, *::before, *::after {
        animation-duration: .01ms !important;
        transition-duration: .01ms !important;
    }
}
</style>
</head>

<body>

<div class="login-layout">

    <!-- LEFT: BRAND & SVG ILLUSTRATION -->
    <aside class="visual-panel">

        <a href="#" class="brand" aria-label="ASPRI">
            <!-- <div class="brand-mark">
                <i class="fa-solid fa-road"></i>
            </div> -->
            <div>
                <div class="brand-name"> <img src="/aspri/assets/img/asri.png" alt="Logo ASPRI" style="width:200px"></div>
                <div class="brand-caption">Apliaksi Sistem Pencatatan Retribusi Parkir</div>
            </div>
        </a>

        <div class="visual-content">

            <div class="eyebrow">
                <span></span>
                Sistem pelayanan digital
            </div>

            <h1>
                Kelola retribusi.<br>
                <em>Lebih mudah.</em><br>
                Lebih terukur.
            </h1>

            <p class="visual-description">
                Platform pencatatan retribusi parkir untuk mendukung
                administrasi, transparansi setoran, dan pengelolaan
                pendapatan parkir secara terintegrasi.
            </p>

            <!-- Original inline SVG illustration -->
            <svg class="illustration"
                 viewBox="0 0 520 310"
                 fill="none"
                 xmlns="http://www.w3.org/2000/svg"
                 role="img"
                 aria-label="Ilustrasi pengelolaan retribusi parkir">

                <defs>
                    <linearGradient id="roadGradient" x1="260" y1="160" x2="260" y2="300">
                        <stop stop-color="#D5E8F4"/>
                        <stop offset="1" stop-color="#85B8D2"/>
                    </linearGradient>
                    <linearGradient id="screenGradient" x1="310" y1="40" x2="430" y2="210">
                        <stop stop-color="#FFFFFF"/>
                        <stop offset="1" stop-color="#DCEBF5"/>
                    </linearGradient>
                    <linearGradient id="greenGradient" x1="100" y1="40" x2="180" y2="150">
                        <stop stop-color="#5DE0A4"/>
                        <stop offset="1" stop-color="#168653"/>
                    </linearGradient>
                </defs>

                <!-- Background shapes -->
                <circle cx="260" cy="150" r="123" fill="#FFFFFF" fill-opacity=".055"/>
                <circle cx="260" cy="150" r="99" stroke="#FFFFFF" stroke-opacity=".13" stroke-dasharray="5 8"/>

                <!-- Decorative buildings -->
                <path d="M28 180V113H83V180" fill="#FFFFFF" fill-opacity=".11"/>
                <path d="M37 125H46V135H37V125ZM54 125H63V135H54V125ZM37 143H46V153H37V143ZM54 143H63V153H54V143Z"
                      fill="#BBD9EA" fill-opacity=".7"/>
                <path d="M439 181V95H486V181" fill="#FFFFFF" fill-opacity=".12"/>
                <path d="M448 109H457V119H448V109ZM468 109H477V119H468V109ZM448 128H457V138H448V128ZM468 128H477V138H468V128Z"
                      fill="#BBD9EA" fill-opacity=".7"/>

                <!-- Ground -->
                <ellipse cx="260" cy="258" rx="216" ry="25" fill="#052E4E" fill-opacity=".2"/>

                <!-- Road -->
                <path d="M171 215L217 160H302L349 215L386 271H133L171 215Z"
                      fill="url(#roadGradient)" fill-opacity=".9"/>
                <path d="M259 177L260 192M252 205L249 218M239 235L233 251"
                      stroke="#FFFFFF" stroke-width="4" stroke-linecap="round"/>

                <!-- Parking sign -->
                <path d="M83 225V155" stroke="#B6D6E8" stroke-width="6" stroke-linecap="round"/>
                <rect x="51" y="113" width="64" height="53" rx="10" fill="#FFFFFF"/>
                <rect x="58" y="120" width="50" height="39" rx="6" fill="#0B4F8A"/>
                <path d="M75 151V128H87C93 128 97 132 97 139C97 145 93 149 87 149H75"
                      stroke="#FFFFFF" stroke-width="5" stroke-linejoin="round"/>

                <!-- Parking barrier -->
                <rect x="389" y="210" width="13" height="47" rx="5" fill="#E1EDF5"/>
                <rect x="361" y="196" width="85" height="13" rx="6.5"
                      transform="rotate(-12 361 196)" fill="#F5F9FC"/>
                <path d="M378 191L391 188M402 185L415 182M426 179L438 176"
                      stroke="#168653" stroke-width="6" stroke-linecap="round"/>

                <!-- Document card -->
                <g transform="rotate(-7 173 112)">
                    <rect x="111" y="45" width="122" height="155" rx="12"
                          fill="#042E4D" fill-opacity=".2"/>
                    <rect x="104" y="38" width="122" height="155" rx="12"
                          fill="url(#screenGradient)"/>
                    <rect x="119" y="53" width="33" height="33" rx="9"
                          fill="url(#greenGradient)"/>
                    <path d="M127 70L133 76L145 62"
                          stroke="#FFFFFF" stroke-width="3.5"
                          stroke-linecap="round" stroke-linejoin="round"/>
                    <rect x="119" y="98" width="84" height="6" rx="3" fill="#8BA8BC"/>
                    <rect x="119" y="112" width="66" height="5" rx="2.5" fill="#C3D6E3"/>
                    <rect x="119" y="124" width="75" height="5" rx="2.5" fill="#C3D6E3"/>
                    <rect x="119" y="145" width="84" height="31" rx="7" fill="#E3F5EB"/>
                    <path d="M129 161L137 167L149 153"
                          stroke="#168653" stroke-width="3"
                          stroke-linecap="round" stroke-linejoin="round"/>
                    <rect x="156" y="157" width="36" height="5" rx="2.5" fill="#168653"/>
                </g>

                <!-- Coins -->
                <ellipse cx="349" cy="239" rx="27" ry="9" fill="#D9A93D"/>
                <path d="M322 225V239C322 244 334 248 349 248C364 248 376 244 376 239V225"
                      fill="#E9BE55"/>
                <ellipse cx="349" cy="225" rx="27" ry="9" fill="#F8D879"/>
                <ellipse cx="349" cy="225" rx="16" ry="5" stroke="#D49D29" stroke-width="2"/>
                <path d="M349 218V232M344 221H352C357 221 357 226 352 226H346C341 226 342 231 347 231H355"
                      stroke="#AD7917" stroke-width="2" stroke-linecap="round"/>

                <!-- Small floating badge -->
                <rect x="343" y="67" width="79" height="43" rx="12"
                      fill="#FFFFFF" fill-opacity=".97"/>
                <circle cx="359" cy="88" r="8" fill="#DDF5E8"/>
                <path d="M355 88L358 91L363 85"
                      stroke="#168653" stroke-width="2"
                      stroke-linecap="round" stroke-linejoin="round"/>
                <rect x="373" y="82" width="37" height="5" rx="2.5" fill="#0B4F8A"/>
                <rect x="373" y="91" width="27" height="4" rx="2" fill="#B6C9D7"/>

                <!-- Sparkles -->
                <path d="M282 54V68M275 61H289"
                      stroke="#7DE5B5" stroke-width="2.5" stroke-linecap="round"/>
                <path d="M449 142V152M444 147H454"
                      stroke="#7DE5B5" stroke-width="2" stroke-linecap="round"/>
                <circle cx="87" cy="83" r="3" fill="#7DE5B5"/>
                <circle cx="312" cy="115" r="3" fill="#FFFFFF" fill-opacity=".7"/>
            </svg>

        </div>

        <div class="visual-footer">
            <span>ASPRI · UPTD Pengelolaan Parkir Dinas Perhubungan Kota Tasikmalaya</span>
            <span class="footer-status">
                <i class="fa-solid fa-circle"></i>
                Online Sistem
            </span>
        </div>

    </aside>

    <!-- RIGHT: LOGIN FORM -->
    <main class="form-panel">
        <div class="form-inner">

            <div class="mobile-brand">
                <div class="brand-mark">
                    <i class="fa-solid fa-road"></i>
                </div>
                <div>
                    <div class="brand-name">ASPRI</div>
                    <div class="brand-caption">Sistem Retribusi Parkir</div>
                </div>
            </div>

            <div class="form-heading">
                <p class="form-kicker">Selamat datang kembali</p>
                <h2>Masuk ke akun Anda.</h2>
                <p>
                    Gunakan NIP atau username dan password
                    untuk melanjutkan ke dashboard ASPRI.
                </p>
            </div>

            <?php if ($this->session->flashdata('error')): ?>
                <div class="alert-error" role="alert">
                    <i class="fa-solid fa-circle-exclamation"></i>
                    <div>
                        <?= $this->session->flashdata('error'); ?>
                    </div>
                </div>
            <?php endif; ?>

            <form action="proses" method="post" onsubmit="showLoading()">

                <div class="form-group">
                    <label for="username">NIP / Username</label>
                    <div class="input-wrap">
                        <i class="fa-regular fa-user input-icon"></i>
                        <input
                            type="text"
                            id="username"
                            name="username"
                            placeholder="Masukkan NIP atau username"
                            autocomplete="username"
                            required>
                    </div>
                </div>

                <div class="form-group">
                    <label for="password">Password</label>
                    <div class="input-wrap">
                        <i class="fa-solid fa-lock input-icon"></i>
                        <input
                            type="password"
                            id="password"
                            name="password"
                            placeholder="Masukkan password"
                            autocomplete="current-password"
                            required>
                        <button
                            type="button"
                            class="toggle-password"
                            id="togglePassword"
                            aria-label="Tampilkan password"
                            aria-pressed="false">
                            <i class="fa-regular fa-eye"></i>
                        </button>
                    </div>
                </div>

                <button type="submit" class="btn-login" id="loginButton">
                    <span>Masuk ke Dashboard</span>
                    <i class="fa-solid fa-arrow-right"></i>
                </button>

            </form>

            <div class="form-security">
                <i class="fa-solid fa-shield-halved"></i>
                Akses sistem untuk pengguna terdaftar
            </div>

            <div class="form-footer">
                © 2026 Developed by DaNZ Dev ID
                <br>
                ASPRI · Sistem Pencatatan Retribusi Parkir
            </div>

        </div>
    </main>

</div>

<!-- INFORMATION BUTTON -->
<button
    type="button"
    class="info-btn"
    id="infoButton"
    aria-label="Informasi pembuat"
    aria-expanded="false"
    aria-controls="infoBox">
    <i class="fa-solid fa-info"></i>
</button>

<div class="info-box" id="infoBox" aria-hidden="true">
    <h3>Tentang Pembuat</h3>

    <p>
        <b>Kepala Dinas:</b><br>
        H. Iwan Kurniawan
    </p>

    <p>
        <b>Penanggung Jawab:</b><br>
        DANDI MOHAMAD PRATANA, S.Kom<br>
        ADAM BAREN
    </p>

    <p>
        <b>Project Manager:</b><br>
        ERWIN RAMDANI, A.Md LLAJ, S.IP.
    </p>

    <p>
        <b>Programmer:</b><br>
        DANDI MOHAMAD PRATANA, S.Kom
    </p>

    <p>
        <b>Analisis:</b><br>
        Adam Baren | Zafriel | Hilda | Meita
    </p>
</div>

<!-- LOADING OVERLAY -->
<div id="loadingScreen" class="loading-screen" aria-live="polite">
    <div class="loading-card">
        <div class="loader"></div>
        <div class="loading-text">Sakedap nuju login...</div>
    </div>
</div>

<script>
(function () {
    const infoButton = document.getElementById('infoButton');
    const infoBox = document.getElementById('infoBox');
    const passwordInput = document.getElementById('password');
    const togglePassword = document.getElementById('togglePassword');
    const loginButton = document.getElementById('loginButton');
    const loginForm = document.querySelector('.form-inner form');

    infoButton.addEventListener('click', function () {
        const isOpen = infoBox.style.display === 'block';

        infoBox.style.display = isOpen ? 'none' : 'block';
        infoBox.setAttribute('aria-hidden', String(isOpen));
        infoButton.setAttribute('aria-expanded', String(!isOpen));
    });

    togglePassword.addEventListener('click', function () {
        const isPassword = passwordInput.type === 'password';

        passwordInput.type = isPassword ? 'text' : 'password';

        togglePassword.innerHTML = isPassword
            ? '<i class="fa-regular fa-eye-slash"></i>'
            : '<i class="fa-regular fa-eye"></i>';

        togglePassword.setAttribute(
            'aria-label',
            isPassword ? 'Sembunyikan password' : 'Tampilkan password'
        );

        togglePassword.setAttribute('aria-pressed', String(isPassword));
    });

    window.showLoading = function () {
        document.getElementById('loadingScreen').style.display = 'flex';

        if (loginButton) {
            loginButton.disabled = true;
            loginButton.innerHTML =
                '<i class="fa-solid fa-circle-notch fa-spin"></i>' +
                '<span>Memproses login...</span>';
        }
    };

    // Pulihkan tombol jika validasi browser menggagalkan submit.
    if (loginForm) {
        loginForm.addEventListener('invalid', function () {
            document.getElementById('loadingScreen').style.display = 'none';

            if (loginButton) {
                loginButton.disabled = false;
                loginButton.innerHTML =
                    '<span>Masuk ke Dashboard</span>' +
                    '<i class="fa-solid fa-arrow-right"></i>';
            }
        }, true);
    }

    // Tutup panel informasi ketika pengguna mengklik di luarnya.
    document.addEventListener('click', function (event) {
        if (
            infoBox.style.display === 'block' &&
            !infoBox.contains(event.target) &&
            !infoButton.contains(event.target)
        ) {
            infoBox.style.display = 'none';
            infoBox.setAttribute('aria-hidden', 'true');
            infoButton.setAttribute('aria-expanded', 'false');
        }
    });

    // Hindari overlay tertinggal jika halaman kembali dari browser cache.
    window.addEventListener('pageshow', function () {
        document.getElementById('loadingScreen').style.display = 'none';

        if (loginButton) {
            loginButton.disabled = false;
            loginButton.innerHTML =
                '<span>Masuk ke Dashboard</span>' +
                '<i class="fa-solid fa-arrow-right"></i>';
        }
    });
})();
</script>

</body>
</html>
