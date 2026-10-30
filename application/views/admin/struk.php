<?php
date_default_timezone_set('Asia/Jakarta');

$userAgent = strtolower($_SERVER['HTTP_USER_AGENT']);
$isAndroid = strpos($userAgent, 'android') !== false;

function translate_day($day) {
    $days = [
        'Sunday' => 'Minggu',
        'Monday' => 'Senin',
        'Tuesday' => 'Selasa',
        'Wednesday' => 'Rabu',
        'Thursday' => 'Kamis',
        'Friday' => 'Jumat',
        'Saturday' => 'Sabtu'
    ];
    return $days[$day] ?? $day;
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport"
      content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">

<title>TANDA BUKTI PENERIMAAN RETRIBUSI PARKIR</title>

<style>

/* ================= ANDROID (ASLI, TIDAK DIUBAH) ================= */
body.android {
    font-family: Arial, sans-serif;
    width: 100%;
    margin: auto;
    text-align: center;
    background-color: #222;
    color: #fff;
}

body.android .struk {
   border: 0px solid #000;
            padding: 5px;
            margin: 8px 0;
            background-color: #fff;
            color: #000;
            height: 60vh; /* Mengatur tinggi struk sesuai tinggi layar */
            display: flex;
            flex-direction: column;
            justify-content: space-between;
}
   android.struk, android .struk * { 
            visibility: visible;
        }
       android  .struk {
            position: absolute;
            left: 0;
            top: 0;
        }

body.android table {
    width: 100%;
    margin-top: 10px;
    font-size: 13px;
}

body.android th,
body.android td {
    padding: 5px;
}

/* ================= WINDOWS (LEBAR & RINCI) ================= */
body.windows {
    font-family: Arial, sans-serif;
    background: #f3f4f6;
    color: #111;
    padding: 40px;
}

body.windows .struk {
    background: #fff;
    color: #000;
    max-width: 900px;
    margin: auto;
    padding: 30px 34px;
    border-radius: 14px;
    box-shadow: 0 12px 30px rgba(0,0,0,.15);
}

body.windows h3 {
    font-size: 22px;
    margin-bottom: 4px;
}

body.windows .meta {
    display: flex;
    justify-content: space-between;
    font-size: 14px;
    margin-bottom: 18px;
}

body.windows table {
    width: 100%;
    border-collapse: collapse;
    font-size: 15px;
}

body.windows th,
body.windows td {
    padding: 10px 8px;
    border-bottom: 1px solid #e5e7eb;
}

body.windows .total h2 {
    font-size: 32px;
    margin: 12px 0;
}
/* ===== TANDA TANGAN WINDOWS ===== */
body.windows .ttd-area{
    display:flex;
    justify-content:flex-end;
    margin-top:35px;
}

body.windows .ttd-box{
    width:260px;
    text-align:center;
    position:relative;
}

body.windows .ttd-box .stempel{
    position:absolute;
    left:50%;
    top:45px;
    transform:translateX(-50%);
    width:120px;
    opacity:.85;
}

body.windows .ttd-space{
    height:110px;
}

body.windows .ttd-box .nama{
    border-top:1px solid #000;
    display:inline-block;
    padding-top:4px;
    min-width:180px;
    font-weight:bold;
}
body.windows .content-area{
    display:flex;
    gap:35px;
    align-items:flex-start;
}

body.windows .table-area{
    flex:1;
}

body.windows .stempel-area{
    width:240px;
    text-align:center;
    position:relative;
    min-height:320px;
    border:1px solid-black;
}

body.windows .stempel{
    width:150px;
    margin:30px auto 80px;
    display:block;
    opacity:.9;
}

body.windows .garis{
    border-top:1px solid #000;
    padding-top:6px;
    font-weight:bold;
}body.windows .content-area{
    display:flex;
    gap:35px;
    align-items:flex-start;
}

body.windows .table-area{
    flex:1;
}

body.windows .stempel-area{
    width:240px;
    text-align:center;
    position:relative;
    min-height:320px;
}

body.windows .stempel{
    width:150px;
    margin:30px auto 80px;
    display:block;
    opacity:.9;
}

body.windows .garis{
    border-top:1px solid #000;
    padding-top:6px;
    font-weight:bold;
}
/* ===== SHARED ===== */
.header {
    font-size: 13px;
    margin-bottom: 6px;
}

.total h2 {
    margin: 6px 0;
}

.footer-info {
    display: flex;
    align-items: center;
    margin-top: 18px;
}

.footer-info img {
    width: 60px;
    height: 50px;
    margin-right: 12px;
}

.action-btns {
    margin-top: 30px;
    display: flex;
    justify-content: center;
    gap: 14px;
}

.back-btn a,
.print-btn button {
    width: 180px;
    height: 52px;
    line-height: 52px;
    display: inline-block;
    text-align: center;
    text-decoration: none;
    color: #fff;
    border-radius: 6px;
    font-weight: bold;
}

.slide{
    margin-bottom:40px;
}

.slide:last-child{
    margin-bottom:0;
}

@media print{

    .action-btns{
        display:none !important;
    }

    .slide{
        display:block;
        break-after:page;
        page-break-after:always;
    }

    .slide:last-child{
        break-after:auto;
        page-break-after:auto;
    }

    .struk{
        box-shadow:none !important;
    }

}
.back-btn a { background: orange; }
.print-btn button { background: #4CAF50; border: none; }
</style>
</head>

<body class="<?= $isAndroid ? 'android' : 'windows' ?>">
    <body class="<?= $isAndroid ? 'android' : 'windows' ?>">

<?php if (!empty($detail)): ?>

<?php foreach($detail as $i => $d): ?>

<div class="slide">

<?php

$this->load->view('admin/struk_item', [

    'isAndroid'        => $isAndroid,
    'setoran'          => (int)$d->nominal,
    'target'           => $target,
    'target_tercapai'  => ((int)$d->nominal >= $target),
    'selisih'          => max(0, $target - (int)$d->nominal),
    'lokasi'           => $d->lokasi,
    'nama'             => $nama,
    'kolektor'         => $kolektor,
    'petugas_id'       => $petugas_id

]);

?>

</div>

<?php endforeach; ?>

<?php else: ?>

    <?php $this->load->view('admin/struk_item'); ?>

<?php endif; ?>

<div class="action-btns">
    <div class="back-btn">
        <a href="/aspri/dashboard">Kembali</a>
    </div>

    <div class="print-btn">
        <button onclick="window.print()">Cetak Struk</button>
    </div>
</div>

</body>