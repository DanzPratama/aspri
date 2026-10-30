
<body>
    <!-- partial -->
        <div class="main-panel">
          <!--<div class="content-wrapper">-->
            <div class="card">
            <div class='card-body'>
              <h1 class="mb-4">Petugas Data (<?php echo $total_petugas; ?>)</h1> 
              <div class="input-group mb-3">
                  <input type="text" id="search_input" class="form-control" placeholder="Cari...">
                  <div class="input-group-append">
                      <button class="btn btn-primary" id="search_button">Cari</button>
                  </div>
              </div>
              <button class="btn btn-primary mb-4" data-toggle="modal" data-target="#addPetugasModal">Tambah Petugas</button>
              <!--<div class="mt-4">-->
              <!--    <button class="btn btn-info filter-btn" data-filter="updated">Sudah diupdate ke Aspri</button>-->
              <!--    <button class="btn btn-success filter-btn" data-filter="with-photo">Sudah memiliki foto</button>-->
              <!--    <button class="btn btn-secondary filter-btn" data-filter="all">Semua</button>-->
              <!--</div>-->
              <div class="table-responsive shadow-effect">
                  <table class="table  table-striped">
                      <thead class="thead-dark">
                          <tr>
                              <th>NO</th>
                              <th>ID</th>
                              <th>Kode Petugas</th>
                              <th>Nama</th>
                          
                              <th>Lokasi</th>
                              <th>Area</th>
                              <th>Target Per Tahun</th>
                              <!-- Kolom baru untuk status Foto -->
                              <th>Aksi</th> <!-- Kolom baru untuk tombol Edit dan Hapus -->
                          </tr>
                      </thead>
                      <tbody id="petugas_table_body">
                          <!-- Data will be loaded here by jQuery -->
                      </tbody>
                  </table>
              </div>
              <button id="load_more" class="btn btn-primary">Load More</button>
          </div>
          </div>
    </div>
      </div>  
          <!-- partial -->
        </div>
        <!-- main-panel ends -->
      </div>
      <!-- page-body-wrapper ends -->
    </div>

    <!-- Add Petugas Modal -->
    <div class="modal fade" id="addPetugasModal" tabindex="-1" role="dialog" aria-labelledby="addPetugasModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addPetugasModalLabel">Tambah Petugas</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="addPetugasForm">
                        <div class="form-group">
                            <label for="petugasNo">No</label>
                            <input type="text" class="form-control" id="petugasNo" name="no" required>
                        </div>
                        <div class="form-group">
                            <label for="petugasNama">Nama</label>
                            <input type="text" class="form-control" id="petugasNama" name="nama" required>
                        </div>
                        <div class="form-group">
                            <label for="petugasNama">No KTP</label>
                            <input type="text" class="form-control" id="petugasNama" name="noktp" required>
                        </div>
                        <div class="form-group">
                            <label for="petugasLokasi">Lokasi</label>
                            <select class="form-select w-100" id="petugasLokasi" name="lokasi" required>
                                <option value="">-- Pilih Lokasi --</option>
                                <?php foreach ($lokasi as $l): ?>
                                    <option value="<?= $l['no'] ?>"><?= $l['nama'] ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="petugasArea">Area</label>
                            <input type="text" class="form-control" id="petugasArea" name="area" required>
                        </div>
                        <div class="form-group">
                            <label for="petugasKesanggupan">Target (PerTahun)</label>
                            <input type="text" class="form-control" id="petugasKesanggupan" name="kesanggupan" required>
                        </div>
                        <div class="form-group">
                            <label for="petugasAlasan">Alasan</label>
                            <input type="text" class="form-control" id="petugasAlasan" name="alasan" required>
                        </div>
                        <div class="form-group">
                            <label for="petugasAktif">Aktif</label>
                            <input type="text" class="form-control" id="petugasAktif" name="aktif" value="1" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
   <!-- Edit Petugas Modal -->

    <!-- Modal HTML -->

    <!-- Bootstrap JS -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>
    <!-- SweetAlert JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10.16.6/dist/sweetalert2.min.js"></script>
    <script src="<?= base_url('assets/img/js/petugas.js'); ?>"></script>
        <!-- plugins:js -->
    <script src="/aspri/admins/vendors/js/vendor.bundle.base.js"></script>
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
    </body>
    </html>