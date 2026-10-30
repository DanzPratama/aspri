<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Tambah User ASPRI</title>
  
</head>
<body>
    
        <!-- partial -->
        <div class="main-panel">
          <div class="content-wrapper">
            <div class="page-header">
              <h3 class="page-title">
                <span class="page-title-icon bg-gradient-primary text-white me-2">
                  <i class="mdi mdi-home"></i>
                </span> Tambah Pengguna Aspri Baru
              </h3>
              <nav aria-label="breadcrumb">
                <ul class="breadcrumb">
                  <li class="breadcrumb-item active" aria-current="page">
                    <span></span>Overview <i class="mdi mdi-alert-circle-outline icon-sm text-primary align-middle"></i>
                  </li>
                </ul>
              </nav>
            </div>
     <!-- partial -->
        <div class="main-panel">
          <div class="content-wrapper">
            <div class="container">
                <div class="row">
              <div class="col grid-margin stretch-card">
                  <div class="card">
                  <div class="card-body">
              <!--<h2 class="mb-4">Tambah User ASPRI Baru</h2>-->
              <form action="save_user" method="post">
                  <div class="form-group">
                      <label for="username">Username:</label>
                      <input type="text" class="form-control" id="username" name="username" required>
                  </div>
                  <div class="form-group">
                      <label for="password">Password:</label>
                      <input type="password" class="form-control" id="password" name="password" required>
                  </div>
                  <div class="form-group">
                      <label for="nama">Nama:</label>
                      <input type="text" class="form-control" id="nama" name="nama" required>
                  </div>
                  <div class="form-group">
                      <label for="jabatan">Jabatan:</label>
                      <select class="form-control" id="jabatan" name="jabatan" required>
                          <option value="Admin">Admin</option>
                           <option value="Bendahara">Kepala UPTD Parkir</option>
                           <option value="Bendahara">Kasubag TU UPTD Parkir</option>
                          <option value="Superadmin">Superadmin</option>
                          <option value="Kolektor">Kolektor</option>
                          <option value="Bendahara">Bendahara Pembantu Penerimaan</option>
                          <option value="Bendahara">Bendahara Penerimaan</option>
                          <option value="Bendahara">Kasubag PEP dan Keuangan</option>
                  
                      </select>
                  </div>
                  
                  <button type="submit" class="btn btn-primary">Simpan</button>
                  <a href="<?php echo site_url('Petugas/list_user'); ?>" class="btn btn-secondary">Kembali</a>
              </form>
          </div> 
          </div>
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

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
