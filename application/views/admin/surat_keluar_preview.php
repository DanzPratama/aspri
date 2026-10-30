<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Surat</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css">
    <script src="<?= base_url('/assets/html-docx-js-master/dist/html-docx.js'); ?>"></script>
    <style>
        body {
            font-family: 'Bookman Old Style', serif;
            font-size: 13px;
            margin: 0;
            background: #f8f9fa;
        }

        .a4-paper {
            width: 21cm;
            min-height: 33cm;
            padding: 2cm;
            background: white;
            margin: auto;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .floating-btn {
            position: fixed;
            bottom: 20px;
            padding: 15px 25px;
            font-size: 18px;
            transition: all 0.3s ease-in-out;
            z-index: 1000;
        }

        .print-btn {
            right: 20px;
        }

        .back-btn {
            left: 20px;
        }

        .floating-btn:active {
            padding: 10px 18px;
            font-size: 14px;
        }

        .footer-print {
            position: fixed;
            bottom: 10px;
            left: 10px;
            font-size: 12px;
            color: black;
            font-style: italic;
        }

        @media print {
            .footer-print {
                display: block;
            }

            .floating-btn {
                display: none;
            }

            body {
                background: white;
            }

            @page {
                margin: 0;
                size: F4;
            }
        }

        /* Add specific styling for table cells to ensure proper alignment */
        td {
            padding: 5px 10px;
        }
    </style>
</head>
<body>
    <div class="a4-paper">
        <div class="text-center mb-2" style="font-family: Arial, sans-serif;">
            <table class="w-100">
                <tr>
                    <td style="width: 15%; text-align: center;">
                        <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/1/1e/Logo_Kota_Tasikmalaya.png/601px-Logo_Kota_Tasikmalaya.png" alt="Logo Dishub" style="width: 100px; margin-top: 10px;">
                    </td>
                    <td style="width: 70%; text-align: center;">
                        <h5 style="margin: 0;">PEMERINTAH KOTA TASIKMALAYA</h5>
                        <h3 style="margin: 0;"><strong>DINAS PERHUBUNGAN</strong></h3>
                        <p style="margin: 0; font-size: 12px;">Jl. Ir. H. Djuanda No. 191 Telp. (0265) 325187 - 342428 Fax. (0265) 325187</p>
                    </td>
                    <td style="width: 15%;"></td>
                </tr>
            </table>
            <hr style="border: 2px solid black; height: 5px; background-color: black; opacity: 1; margin-top: 5px;">
        </div>

        <h6 class="text-center">SURAT PERINTAH TUGAS</h6>
        <p align="center"><strong>Nomor:</strong> 500.11.33.1/<?= $content['nomor_surat']; ?>/Dishub-UPTD Parkir/2025</p>

        <p>Yang bertanda tangan di bawah ini:</p>
        <table class="table table-borderless">
            <tr><td width="200px"><strong>Nama</strong></td> <td width="10px">:</td><td><strong> Drs. H. ASEP MAMAN PERMANA, M.Si.<strong></td></tr>
            <tr><td><strong>Jabatan</strong></td> <td width="10px">:</td><td> Kepala Dinas Perhubungan Kota Tasikmalaya</td></tr>
        </table>

        <center>MENUGASKAN KEPADA:</center>

        <table class="table table-borderless">
            <tr>
                <td width="200px"><strong>Nama</strong></td>
                <td width="10px">:</td>
                <td><strong><?= $content['nama']; ?></strong></td>
            </tr>
            <tr>
                <td><strong>Tempat/Tgl. Lahir</strong></td>
                <td>:</td>
                <td><?= $content['ttl']; ?></td>
            </tr>
            <tr>
                <td><strong>Alamat</strong></td>
                <td>:</td>
                <td><?= $content['alamat']; ?></td>
            </tr>
        </table>

        <p>Untuk:</p>
        <ol align="justify">
            <li>Melaksanakan segala tugas dan kewajiban selaku petugas parkir sebagaimana diatur dalam peraturan yang berlaku.</li>
            <li>Selama melaksanakan tugas wajib menggunakan pakaian petugas parkir dan/atau atribut pendukung lainnya.</li>
            <li>Menjunjung tinggi kehormatan, berperilaku jujur, tertib, sopan, cermat, disiplin, dan penuh tanggung jawab.</li>
            <li>Melaksanakan tugas selaku petugas parkir tepi jalan umum di lokasi <strong><?= $content['lokasi']; ?> (<?= $content['area']; ?>)</strong> dari 2 Januari 2025 sampai 31 Desember 2025.</li>
            <li>Apabila terdapat kekeliruan dalam Surat Perintah Tugas ini, maka akan diadakan perubahan sebagaimana mestinya.</li>
        </ol>
        <p>Demikian Surat Perintah Tugas ini diberikan kepada yang bersangkutan, untuk dilaksanakan sebagaimana mestinya dengan penuh tanggung jawab.</p>

        <div class="text-end" style="text-align: right;">
            <div style="display: inline-block; text-align: center; margin: 0; padding: 0; line-height: 1.3;">
                <p style="margin-bottom: 15px;">Dikeluarkan di Tasikmalaya, <br />pada tanggal 2 Januari 2025</p>
                <p style="margin-bottom: 60px">KEPALA DINAS PERHUBUNGAN</p>
                <p style="margin-bottom: 5px;"><strong>Drs. H. ASEP MAMAN PERMANA, M.Si.</strong></p>
                <p style="margin-bottom: 3px;">Pembina Utama Muda, IV/c</p>
                <p style="margin-bottom: 0;">NIP. 19660916 198803 1 004</p>
            </div>
        </div>

        <button class="btn btn-primary floating-btn print-btn" onclick="printSurat()">🖨️ Print Surat</button>
        <button class="btn btn-info floating-btn" onclick="downloadDocx()">📥 Download DOCX</button>
        <button class="btn btn-secondary floating-btn back-btn" onclick="goBack()">↩️ Kembali</button>

        <script>
            function printSurat() {
                document.querySelector('.print-btn').style.padding = '10px 18px';
                document.querySelector('.print-btn').style.fontSize = '14px';
                setTimeout(() => {
                    window.print();
                }, 300);
            }

            function goBack() {
                window.history.back();
            }

            function downloadDocx() {
                const content = document.querySelector('.a4-paper').innerHTML;
                const converted = htmlDocx.asBlob(content);
                const link = document.createElement('a');
                link.href = URL.createObjectURL(converted);
                link.download = 'surat_perintah_tugas.docx';
                link.click();
            }
        </script>

        <footer class="footer-print">
            Powered By, <strong>ASPRI</strong>
        </footer>
    </div>
</body>
</html>
