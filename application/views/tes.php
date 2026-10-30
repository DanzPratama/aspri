<!DOCTYPE html>
<html>
<head>
    <title>Daftar Perangkat Bluetooth</title>
    <script>
        function getConnectedBluetoothDevices() {
            navigator.bluetooth.getDevices()
                .then(devices => {
                    devices.forEach(device => {
                        console.log('Device Name: ' + device.name);
                        console.log('Device ID: ' + device.id);
                        // Lakukan sesuatu dengan informasi perangkat, misalnya tampilkan di halaman
                        document.getElementById('deviceList').innerHTML += '<li>' + device.name + '</li>';
                    });
                })
                .catch(error => {
                    console.error('Error getting Bluetooth devices: ', error);
                });
        }
    </script>
</head>
<body>
    <h2>Daftar Perangkat Bluetooth Tersambung</h2>
    <button onclick="getConnectedBluetoothDevices()">Dapatkan Perangkat</button>
    <ul id="deviceList"></ul>
</body>
</html>
