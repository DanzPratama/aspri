
<body>
    <!-- partial -->
        <div class="main-panel">
          <div class="content-wrapper">
            <div class="card">
            <div class='card-body'>
              <h1 class="mb-4">Daftar Setoran Petugas</h1> 
<!--              <div class="input-group mb-3">-->
<!--                  <input type="text" id="search_input" class="form-control" placeholder="Cari...">-->
<!--                  <div class="input-group-append">-->
<!--                      <button class="btn btn-primary" id="search_button">Cari</button>-->
<!--                  </div>-->
<!--              </div>-->
<!--     <div class="filters">-->
<!--    <label>Urutkan Berdasarkan:</label>-->
<!--    <select class="form-control" id="filter_sort">-->
<!--        <option value="">--Pilih Filter--</option>-->
<!--        <option value="target_besar">Target Paling Besar</option>-->
<!--        <option value="target_kecil">Target Paling Kecil</option>-->
<!--        <option value="pencapaian_tinggi">Pencapaian Tertinggi</option>-->
<!--        <option value="pencapaian_rendah">Pencapaian Terendah</option>-->
<!--    </select>-->
<!--    <button id="apply_sort" class="btn btn-primary">Apply Filter</button>-->
<!--</div>-->

              <div class="table-responsive shadow-effect">
                  <table class="table  table-striped">
                      <thead class="thead-dark">
                          <tr>
                              <th>NO</th>
                              <th>Kode Petugas</th>
                              <th>Nama</th>
                              <th>Lokasi</th>
                              <th>Target Per Tahun</th>
                              <th>Target Per Bulan</th>
                              <th>Total Setoran Masuk</th>
                              <th>% dari Target</th>
                              <!-- Kolom baru untuk status Foto -->
                              <!--<th>Aksi</th> <!-- Kolom baru untuk tombol Edit dan Hapus -->
                          </tr>
                      </thead>
                      <tbody id="petugas_setoran_body">
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