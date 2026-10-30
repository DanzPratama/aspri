<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Parkir</title>
    <!-- Tailwind CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.2.19/tailwind.min.css" rel="stylesheet">
    <!-- Font Awesome CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet">
    <!-- SweetAlert -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <!-- Custom CSS -->
    <style>
        .navbar-custom {
            background-color: #1f2937;
            /* Tailwind Gray 900 */
        }

        .btn-scan {
            background-color: #10b981;
            /* Tailwind Green 500 */
        }

        .btn-input {
            background-color: #ef4444;
            /* Tailwind Red 500 */
        }

        .jumbotron {
            background-color: #1f2937;
            /* Tailwind Gray 900 */
            color: white;
            padding: 4rem 2rem;
            text-align: center;
        }

        .card-custom {
            margin-top: -50px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .bottom-nav {
            background-color: #1f2937;
            /* Tailwind Gray 900 */
            position: fixed;
            bottom: 0;
            left: 0;
            right: 0;
            display: flex;
            justify-content: space-around;
            padding: 1rem 0;
            box-shadow: 0 -2px 10px rgba(0, 0, 0, 0.1);
        }

        .bottom-nav a {
            color: white;
            text-align: center;
            flex-grow: 1;
            transition: all 0.3s ease;
        }

        .bottom-nav a:hover {
            color: #10b981;
            /* Tailwind Green 500 */
        }

        .bottom-nav a.active {
            color: #10b981;
            /* Tailwind Green 500 */
        }
        .footer-custom {
            background-color: #1f2937;
            /* Tailwind Gray 900 */
            color: white;
            padding: 2rem;
            text-align: center;
            position: relative;
            z-index: 40; /* Ensuring footer is above the bottom navigation */
        }
    </style>
</head>

<body class="bg-gray-100 min-h-screen flex flex-col">

    <header>
        <nav class="navbar navbar-custom fixed top-0 inset-x-0 z-50 p-4">
            <div class="container mx-auto flex justify-between items-center">
                <div class="flex items-center">
                    <img src="/aspri/assets/img/asri.png" alt="Logo" class="h-8 mr-2">
                </div>
            </div>
        </nav>
    </header>

    <main class="flex-grow">
        <div class="jumbotron">
            <h1 class="text-4xl font-bold">Kebijakan Privasi</h1>
        </div>

        <div class="container mx-auto p-4">
            <div class="max-w-4xl mx-auto">
                <div class="bg-white shadow-md rounded-lg p-6 card-custom">
                    <h2 class="text-2xl font-bold text-center mb-4">Kebijakan Privasi Aplikasi ASPRI</h2>
                    <p>Aplikasi ini hanya mencatat setoran dari tukang parkir dan tidak mengumpulkan data pribadi pengguna.</p>
                    <p>Aplikasi ini mengumpulkan data berikut:</p>
                    <ul class="list-disc list-inside">
                        <li>Jumlah setoran</li>
                        <li>Tanggal dan waktu setoran</li>
                        <li>Lokasi setoran (opsional)</li>
                    </ul>
                    <p>Aplikasi ini menggunakan data yang dikumpulkannya untuk tujuan berikut:</p>
                    <ul class="list-disc list-inside">
                        <li>Untuk mencatat setoran retribusi parkir</li>
                        <li>Untuk menghasilkan laporan pendapatan</li>
                        <li>Untuk melacak kinerja tukang parkir</li>
                    </ul>
                    <p>Kami tidak akan membagikan informasi Anda dengan pihak ketiga tanpa persetujuan Anda.</p>
                    <p>Anda dapat mengakses dan memperbarui informasi Anda kapan saja melalui pengaturan akun Anda.</p>
                    <p>Aplikasi ini tidak menggunakan cookie atau teknologi pelacakan lainnya.</p>
                    <p>Kami berkomitmen untuk melindungi privasi Anda. Kami telah menerapkan langkah-langkah pengamanan fisik, teknis, dan organisasi yang sesuai untuk melindungi informasi Anda dari akses, penggunaan, pengungkapan, pengubahan, atau perusakan yang tidak sah.</p>
                    <p>Kebijakan Privasi ini dapat diubah sewaktu-waktu. Kami akan memberi tahu Anda tentang perubahan apa pun dengan memposting versi Kebijakan Privasi yang diperbarui di aplikasi dan di situs web kami.</p>
                </div>
            </div>
        </div>
    </main>
     <!-- Footer -->
    <footer class="footer-custom">
        <p>&copy; 2024 ASPRI. All rights reserved.</p>
    </footer>
    <!-- Bottom Navigation -->
    <?php
    // Misalnya, di dalam file view dashboard.php
    $activePage = "home"; // Set default active page

    // Cek halaman aktif berdasarkan URL atau kondisi lainnya
    if (strpos(current_url(), '/aspri/jukir') !== false) {
        $activePage = "jukir";
    } elseif (strpos(current_url(), '/aspri/riwayat-transaksi') !== false) {
        $activePage = "riwayat-transaksi";
    } elseif (strpos(current_url(), '/aspri/laporan-transaksi') !== false) {
        $activePage = "laporan-transaksi";
    }
    ?>
    <nav class="bottom-nav">
        <a href="#home" class="flex flex-col items-center justify-center text-sm <?php echo ($activePage == 'home') ? 'active' : ''; ?>">
            <i class="fas fa-home text-xl"></i>
            <span class="block mt-1">Home</span>
        </a>
      
    </nav>

    <!-- Tailwind JS for Modal -->
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@2.8.0/dist/alpine.min.js"></script>
    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script>
        // Script untuk menentukan halaman aktif pada bottom navigation
        $(document).ready(function() {
            var url = window.location.href;
            var activePage = url;
            $('.bottom-nav a').each(function() {
                var linkPage = this.href;
                if (activePage == linkPage) {
                    $(this).addClass('active');
                }
            });
        });
    </script>
</body>

</html>
