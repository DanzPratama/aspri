<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Daftar User ASPRI</title>
    <!-- Bootstrap CSS -->
  
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
     <!-- SweetAlert CSS -->
     <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@10.16.6/dist/sweetalert2.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    
</head>
<body>
       <!-- partial -->
        <div class="main-panel">
          <div class="content-wrapper">
            <div class="row">
              <div class="col grid-margin stretch-card">
                  <div class="card">
                      <div class="card-body">
                          <div class="input-group mb-3">
                              <input type="text" id="search_input" class="form-control" placeholder="Cari...">
                              <div class="input-group-append">
                                  <button class="btn btn-primary" id="search_button">Cari</button>
                              </div>
                          </div>
                          <a href="<?php echo base_url('petugas/add_user'); ?>"><button class="btn btn-primary mb-4">Tambah Petugas</button></a>
                          <div class="table-responsive shadow-effect">
                              <table class="table table-hover table-striped">
                                  <thead class="thead-dark">
                                      <tr>
                                          <th>NO</th>
                                          <th>Nama</th>
                                          <th>Username</th>
                                          <th>Jabatan</th>
                                          <th>Aksi</th>
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
          </div>
          
    </div>
          </footer>
          <!-- partial -->
        </div>
        <!-- main-panel ends -->
      </div>
      <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->      
    <!-- Bootstrap and SweetAlert JavaScript -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10.16.6/dist/sweetalert2.all.min.js"></script>

    <script>
        $(document).ready(function() {
            // Load initial data
            loadData();

            // Search functionality
            $('#search_button').click(function() {
                var searchQuery = $('#search_input').val();
                loadData(searchQuery);
            });

            // Add petugas form submission
            $('#addPetugasForm').submit(function(event) {
                event.preventDefault();
                var username = $('#username').val();
                var jabatan = $('#jabatan').val();
                
                $.ajax({
                    url: '<?php echo base_url('user/add_user'); ?>',
                    type: 'POST',
                    data: {username: username, jabatan: jabatan},
                    success: function(response) {
                        $('#addPetugasModal').modal('hide');
                        loadData(); // Reload data
                        Swal.fire('Berhasil!', 'Petugas berhasil ditambahkan.', 'success');
                    }
                });
            });

            // Load more functionality
            $('#load_more').click(function() {
                // Load more data here if pagination is needed
                loadData();
            });
        });

        function loadData(searchQuery = '') {
            $.ajax({
                url: '<?php echo base_url('petugas/get_users'); ?>',
                type: 'POST',
                data: {search: searchQuery},
                dataType: 'json',
                success: function(data) {
                    $('#petugas_table_body').empty();
                    $.each(data, function(index, item) {
                        var row = `<tr>
                            <td>${index + 1}</td>
                            <td>${item.nama}</td>
                            <td>${item.username}</td>
                            <td>${item.jabatan}</td>
                            <td>
                                <button class="btn btn-warning btn-sm edit-btn">Edit</button>
                                <button class="btn btn-danger btn-sm delete-btn">Hapus</button>
                            </td>
                        </tr>`;
                        $('#petugas_table_body').append(row);
                    });
                }
            });
        }
    </script>
      <!-- container-scroller -->
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
    <!-- endinject -->
    <!-- Custom js for this page -->
    <script src="/aspri/admins/js/dashboard.js"></script>
    <script src="/aspri/admins/js/todolist.js"></script>
    <!-- End custom js for this page -->
</body>
</html>
