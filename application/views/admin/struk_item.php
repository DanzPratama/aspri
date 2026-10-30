<div class="struk">

    <h3>TANDA BUKTI PENERIMAAN<br>RETRIBUSI PARKIR</h3>

    <div class="<?= !$isAndroid ? 'content-area' : '' ?>">

        <div class="table-area">

            <table>

                <tr>
                    <th colspan="2">Telah diterima uang sebesar :</th>
                </tr>

                <tr align="center">
                    <td colspan="2" class="total">
                        <h1>
                            Rp <?= number_format((int)$setoran,0,',','.') ?>
                        </h1>
                    </td>
                </tr>

                <tr align="left">
                    <th>Terbilang</th>
                    <td><?= ucwords(terbilang((int)$setoran)) ?> rupiah</td>
                </tr>

                <!--<tr align="left">-->
                <!--    <th>Target</th>-->
                <!--    <td>-->
                <!--        Rp <?= number_format((int)$target,0,',','.') ?>-->
                <!--    </td>-->
                <!--</tr>-->

                <tr align="left">
                    <th>Lokasi</th>
                    <td><?= $lokasi ?></td>
                </tr>

                <tr align="left">
                    <th>Penyetor</th>
                    <td><?= $nama ?></td>
                </tr>

                <tr align="left">
                    <th>Penerima</th>
                    <td><?= $kolektor ?></td>
                </tr>

            </table>

        </div>

        <?php if(!$isAndroid): ?>

        <div class="stempel-area">

            <div style="text-align:center;margin-bottom:50px;">

                <div>
                    Yang Menerima,<br>
                    Dengan Stempel Basah
                </div>

                <div style="height:100px;"></div>

                <div class="garis">
                    <?= strtoupper($kolektor) ?>
                </div>

            </div>

            <div style="text-align:center;">

                <div>
                    Yang Menyetorkan
                </div>

                <div style="height:100px;"></div>

                <div class="garis">
                    ...........................
                </div>

            </div>

        </div>

        <?php endif; ?>

    </div>

    <?php if ($petugas_id > 1000 && $target > 0): ?>

        <?php if ($target_tercapai): ?>

            <div style="
                margin-top:10px;
                padding:8px;
                border:1px dashed #000;
                text-align:center;
                font-size:12px;
                font-weight:bold;">

                TARGET SETORAN TELAH TERCAPAI

            </div>

        <?php else: ?>

            <!--<div style="-->
            <!--    margin-top:10px;-->
            <!--    padding:8px;-->
            <!--    border:1px dashed #000;-->
            <!--    text-align:center;-->
            <!--    font-size:12px;">-->

            <!--    <b>TARGET SETORAN BELUM TERCAPAI</b><br>-->

            <!--    Kekurangan :-->

            <!--    <b>-->
            <!--        Rp <?= number_format($selisih,0,',','.') ?>-->
            <!--    </b>-->

            <!--</div>-->

        <?php endif; ?>

    <?php endif; ?>

    <div class="footer-info">

        <img src="/aspri/assets/img/dishub.png">

        <div>

            <b>
                Dinas Perhubungan<br>
                Kota Tasikmalaya
            </b>

            <div style="font-size:10px">

                <i>
                    Bukti Pembayaran Ini adalah alat bukti setoran retribusi yang sah
                </i>

            </div>

        </div>

    </div>

</div>