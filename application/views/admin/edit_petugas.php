<body>

  <div class="main-panel">
    <div class="content-wrapper">

      <div class="card">
        <!-- HEADER -->
        <div class="card-body border-bottom">
          <h1 class="mb-0">Edit Petugas</h1>
        </div>

        <!-- FORM -->
        <div class="card-body">
          <form action="<?= site_url('petugas/update_petugas/' . $petugas['id']); ?>" method="post">

            <input type="hidden" name="petugasId" value="<?= $petugas['id']; ?>">

            <div class="form-group">
              <label for="editPetugasNo">No</label>
              <input type="text" class="form-control" id="editPetugasNo" name="no" value="<?= $petugas['no']; ?>" required>
            </div>

            <div class="form-group">
              <label for="editPetugasNama">Nama</label>
              <input type="text" class="form-control" id="editPetugasNama" name="nama" value="<?= $petugas['nama']; ?>" required>
            </div>

            <div class="form-group">
              <label for="editPetugasNoKTP">No KTP</label>
              <input type="text" class="form-control" id="editPetugasNoKTP" name="noktp" value="<?= $petugas['noktp']; ?>" required>
            </div>

            <div class="form-group">
              <label for="editPetugasLokasi">Lokasi</label>
              <input type="text" class="form-control" id="editPetugasLokasi" name="lokasi" value="<?= $petugas['lokasi']; ?>" required>
            </div>

            <div class="form-group">
              <label for="editPetugasArea">Area</label>
              <input type="text" class="form-control" id="editPetugasArea" name="area" value="<?= $petugas['area']; ?>">
            </div>

            <div class="form-group">
              <label for="editPetugasKesanggupan">Target (Per Tahun)</label>
              <div class="input-group">
                <div class="input-group-prepend">
                  <span class="input-group-text">Rp.</span>
                </div>
                <input type="text" class="form-control" id="editPetugasKesanggupan" name="kesanggupan" value="<?= $petugas['target']; ?>" required>
              </div>
            </div>

            <div class="form-group">
              <label for="editPetugasAktif">Aktif</label>
              <input type="text" class="form-control" id="editPetugasAktif" name="aktif" value="<?= $petugas['aktif']; ?>" required>
            </div>

            <div class="d-flex gap-2 mt-4">
              <button type="button" class="btn btn-secondary" onclick="history.back()">Kembali</button>
              <button type="submit" class="btn btn-primary">Simpan</button>
            </div>

          </form>
        </div>
      </div>

    </div>
  </div>

  <!-- JS -->
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10.16.6/dist/sweetalert2.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <script src="<?= base_url('assets/img/js/petugas.js'); ?>"></script>

  <script>
    $(document).ready(function () {

      function formatRupiah(angka) {
        var number_string = angka.replace(/[^,\d]/g, '').toString(),
            split  = number_string.split(','),
            sisa   = split[0].length % 3,
            rupiah = split[0].substr(0, sisa),
            ribuan = split[0].substr(sisa).match(/\d{3}/gi);

        if (ribuan) {
          separator = sisa ? '.' : '';
          rupiah += separator + ribuan.join('.');
        }

        return split[1] !== undefined ? rupiah + ',' + split[1] : rupiah;
      }

      const inputTarget = $('#editPetugasKesanggupan');

      if (inputTarget.val()) {
        inputTarget.val(formatRupiah(inputTarget.val()));
      }

      inputTarget.on('keyup', function () {
        $(this).val(formatRupiah($(this).val()));
      });

    });
  </script>

</body>
</html>
