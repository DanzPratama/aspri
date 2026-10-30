<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Pilih Login</title>
  <!-- Bootstrap CSS -->
  <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
  <!-- Font Awesome CSS -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet">
  <!-- Custom CSS -->
  <style>
    body {
      font-size: 1.2em; /* Ukuran font yang agak besar */
      background-color: #f0f8ff; /* Warna biru muda */
    }
    .login-container {
      margin-top: 100px;
    }
    .card {
      cursor: pointer;
    }
    .card:hover {
      transform: scale(1.05);
      transition: transform 0.3s ease-in-out;
    }
    .card-body {
      padding: 20px;
    }
  </style>
  
</head>
<body>
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-lg-6 col-md-8 col-sm-10 col-xs-12 login-container"> <!-- Mengatur lebar kolom sesuai perangkat -->
        <h2 class="text-center mb-4">Pilih Login</h2>
        <div class="row">
          <div class="col-lg-6 col-md-6 mb-4 col-6">
            <div class="card text-center" onclick="location.href='Welcome/login';">
              <div class="card-body">
                <i class="fas fa-users fa-5x mb-3 text-primary"></i>
                <h5 class="card-title">Kolektor</h5>
              </div>
            </div>
          </div>
          <div class="col-lg-6 col-md-6 mb-4 col-6">
            <div class="card text-center" onclick="location.href='Welcome/login_web';">
              <div class="card-body">
                <i class="fas fa-user fa-5x mb-3 text-primary"></i>
                <h5 class="card-title">Non-Kolektor</h5>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Bootstrap JS (Optional jika diperlukan) -->
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
