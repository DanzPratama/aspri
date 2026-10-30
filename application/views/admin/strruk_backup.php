<?php 
date_default_timezone_set('Asia/Jakarta');
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TANDA BUKTI PENERIMAAN RETRIBUSI PARKIR</title>
    <style>
    @media print {
        body * { 
            visibility: hidden;
        }
        .struk, .struk * { 
            visibility: visible;
        }
        .struk {
            position: absolute;
            left: 0;
            top: 0;
        }
    }
        body {
            font-family: Arial, sans-serif;
            width: 100%;
            margin: auto;
            text-align: center;
            background-color: #222;
            color: #fff;
        }
        .struk {
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
        .header, .footer {
            display: flex;
            justify-content: space-between;
            align-items: center;
            flex-direction: row;
            padding: 0 10px;
            font-size: 13px;
        }
        .total {
            font-size: 1.5em;
            font-weight: bold;
            margin: 10px 0;
        }
        .center {
            text-align: center;
        }
        table {
            width: 100%;
            margin-top: 10px;
        }
        th, td {
            padding: 5px;
        }
        .action-btns {
            margin-top: 20px;
            display: flex;
            justify-content: center;
            gap: 10px;
        }
       .back-btn a, .print-btn button {
            display: inline-block;
            width: 170px; /* Set a fixed width */
            height: 50px; /* Set a fixed height */
            line-height: 50px; /* Vertically center text */
            color: #fff;
            text-align: center;
            text-decoration: none;
            border-radius: 5px;
            cursor: pointer;
        }
        .back-btn a {
            background-color: orange;
        }
        .print-btn button {
            background-color: #4CAF50;
            border: none;
        }
    </style>
    
</head>
<?php
function translate_day($day) {
    $days = array(
        'Sunday' => 'Minggu',
        'Monday' => 'Senin',
        'Tuesday' => 'Selasa',
        'Wednesday' => 'Rabu',
        'Thursday' => 'Kamis',
        'Friday' => 'Jumat',
        'Saturday' => 'Sabtu'
    );
    return isset($days[$day]) ? $days[$day] : $day;
}
?>
<body>
    <div class="struk">
        <h3>TANDA BUKTI PENERIMAAN<br /> RETRIBUSI PARKIR</h3>
        <div>#<?php echo $notransaksi; ?></div>
        <div class="header">
            <div>
                <?php 
                    $day = date('l'); // Get the day in English
                    echo translate_day($day) . ', ' . date('d F Y, H:i') . ' WIB'; 
                ?>
            </div>
        </div>
        <table>
            <tr>
                <th colspan="2">Telah diterima uang sebesar :</th>
            </tr>
            <tr>
                <td colspan="2" class="total"><h2><?php echo 'Rp. ' . number_format((int)$setoran, 0, ',', '.'); ?></h2></td>
            </tr>
            <tr align="left">
                <th>Terbilang:</th>
                <td><div style="font-size:12px"><?php echo ucwords(terbilang((int)$setoran)) . ' rupiah'; ?></div></td>
            </tr>
            <tr align="left">
                <th>Lokasi:</th>
                <td><div style="font-size:12px"><?php echo $lokasi; ?></div></td>
            </tr>
            <!--<tr align="left">-->
            <!--    <th>Bulan Setoran:</th>-->
            <!--    <td><div style="font-size:12px">Tes</div></td>-->
            <!--</tr>-->
            <tr align="left">
                <th>Penyetor:</th>
                <td><?php echo $nama; ?></td>
            </tr>
            <tr align="left">
                <th>Penerima:</th>
                <td><?php echo $kolektor; ?></td>
            </tr>
        </table>
        <br />
        <div style="display: flex; align-items: center;">
    <img src="/aspri/assets/img/dishub.png" alt="Icon" style="width: 60px; height: 50px; margin-right: 10px;">
    <div>
        <b>Dinas Perhubungan<br /> Kota Tasikmalaya</b>
        <div style="font-size: 10px;"><i>Sebagai alat bukti setoran retribusi yang sah</i></div>
    </div>
</div>

    </div>
    <div class="action-btns">
        <div class="back-btn">
            <a href="/aspri/dashboard">Kembali</a>
        </div>
        <div class="print-btn">
            <button onclick="window.print();">Cetak Struk</button>
        </div>
    </div>
    <script>


</body>
</html>
