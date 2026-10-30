<style>
.select2-container .select2-selection--single {
    height: calc(2.25rem + 2px) !important; /* Samakan tinggi dengan form-select */
    padding: 0.375rem 0.75rem !important; /* Sesuaikan padding */
    font-size: 1rem;
    border: 1px solid #ced4da !important; /* Samakan border */
    border-radius: 0.375rem !important; /* Samakan border-radius */
}

.select2-container--default .select2-selection--single .select2-selection__rendered {
    line-height: 1.5 !important;
    padding-left: 0 !important; /* Samakan padding kiri */
}

.select2-container--default .select2-selection--single .select2-selection__arrow {
    height: 100% !important;
    top: 50% !important;
    transform: translateY(-50%) !important; /* Biar icon dropdown sejajar */
}

</style>
<div class="main-panel">
    <div class="content-wrapper">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title text-center">SURAT PERINTAH TUGAS</h4>
                <form method="post" action="<?= site_url('SuratKeluar/save'); ?>">
                   <div class="row">
    <div class="col-md-6">
        <div class="mb-3">
            <label class="form-label">Nomor Surat</label>
            <input type="text" class="form-control" name="nomor_surat" placeholder="Isi nomor surat">
        </div>
         <div class="mb-3">
            <label class="form-label">Nama Juru Parkir</label>
            <select class="form-control select2 w-100" id="namaJukir" name="nama" required>
                <option value="">-- Pilih jukir --</option>
                <?php foreach ($jukir as $a): ?>
                    <option value="<?= $a['nama'] ?>"><?= $a['nama'] ?></option>
                <?php endforeach; ?>
            </select>
        </div>
        <div class="mb-3">
            <label class="form-label">Tempat/Tgl. Lahir</label>
            <input type="text" class="form-control" name="ttl">
        </div>
    </div>
    <div class="col-md-6">
       
        <div class="mb-3">
            <label class="form-label">Alamat</label>
            <input type="text" class="form-control" name="alamat">
        </div>
        <div class="mb-3">
            <label class="form-label">Lokasi</label>
            <select class="form-control select2 w-100" id="petugasLokasi" name="lokasi" required>
                <option value="">-- Pilih Lokasi --</option>
                <?php foreach ($lokasi as $l): ?>
                    <option value="<?= $l['nama'] ?>"><?= $l['nama'] ?></option>
                <?php endforeach; ?>
            </select>
        </div>
       
        <div class="mb-3" id="areaField" style="display: none;">
    <label class="form-label">Area</label>
    <input type="text" class="form-control" name="area">
</div>

    </div>
</div>
<div class="text-center mt-4">
    <button type="submit" class="btn btn-primary">Buat Surat Tugas Jukir</button>
</div>

                </form>
            </div>
        </div>
    </div>
</div>

<script>
$(document).ready(function() {
    $('.select2').select2({
        width: '100%'
    });

    // Event listener saat lokasi dipilih
    $('#petugasLokasi').change(function() {
        var lokasiTerpilih = $(this).val(); // Ambil nilai lokasi
        if (lokasiTerpilih) {
            $('#areaField').slideDown(); // Tampilkan form "Area"
        } else {
            $('#areaField').slideUp(); // Sembunyikan jika tidak ada lokasi yang dipilih
        }
    });
});
</script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
document.addEventListener("DOMContentLoaded", function() {
    document.querySelector("form").addEventListener("submit", function(event) {
        event.preventDefault(); // Mencegah submit langsung

        Swal.fire({
            title: "Konfirmasi",
            text: "Pastikan semua data sudah benar. Lanjutkan?",
            icon: "warning",
            showCancelButton: true,
            confirmButtonText: "Ya, Simpan",
            cancelButtonText: "Cek Lagi"
        }).then((result) => {
            if (result.isConfirmed) {
                event.target.submit(); // Lanjutkan submit jika dikonfirmasi
            }
        });
    });
});
</script>

     <!-- Bootstrap JS -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>
    <!-- SweetAlert JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10.16.6/dist/sweetalert2.min.js"></script>
  
        <!-- plugins:js -->
    <!--<script src="/aspri/admins/vendors/js/vendor.bundle.base.js"></script>-->
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <script src="/aspri/admins/vendors/chart.js/Chart.min.js"></script>
    <script src="/aspri/admins/js/jquery.cookie.js" type="text/javascript"></script>
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="/aspri/admins/js/off-canvas.js"></script>
    <script src="/aspri/admins/js/hoverable-collapse.js"></script>
    <script src="/aspri/admins/js/misc.js"></script>
      <!-- Custom js for this page -->
    <script src="/aspri/admins/js/dashboard.js"></script>
    <script src="/aspri/admins/js/todolist.js"></script>
