<!-- application/views/user_device_view.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Informasi Perangkat</title>
    <style>
             body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
            text-align: center;
            padding: 50px;
        }
        .container {
            max-width: 600px;
            margin: auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }
        h1 {
            color: #e74c3c;
        }
        p {
            font-size: 18px;
            color: #555;
        }
        .button {
            display: inline-block;
            padding: 10px 20px;
            margin-top: 20px;
            background-color: #3498db;
            color: #fff;
            text-decoration: none;
            border-radius: 4px;
            transition: background-color 0.3s;
        }
        .button:hover {
            background-color: #2980b9;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Cuma bisa diakses pake Android, nih</h1>
        <h3>Demi keamanan, Pastikan perangkat yang digunakan untuk akses halaman ini adalah andorid ya</h3>
        <p>Perangkat yang Anda gunakan:</p>
        <p><strong><?php echo $user_agent; ?></strong></p>
        <a href="<?php echo base_url('welcome'); ?>" class="button">Kembali ke Halaman Login</a>
    </div>
</body>
</html>
