<?php
include 'functions.php';

// Load devices data
$devices = json_decode(file_get_contents('resources.json'), true) ?? [];

// Check online status for each device
foreach ($devices as $key => $device) {
    $devices[$key]['online'] = isOnline($device['ip']);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Device Manager</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h1>Device Manager</h1>
        <button id="addDeviceButton" class="add-button">+ Add Device</button>

<!-- Add Device Modal -->
<div id="addDeviceModal" class="modal hidden">
    <div class="modal-content">
        <span class="close-button">&times;</span>
        <h2>Add Device</h2>
        <form id="addDeviceForm" action="functions.php" method="post">
            <label for="name">Device Name:</label>
            <input type="text" id="name" name="name" required>
            <label for="mac">MAC Address:</label>
            <input type="text" id="mac" name="mac" required>
            <label for="ip">IP Address:</label>
            <input type="text" id="ip" name="ip" required>
            <button type="submit" name="addDevice">Add</button>
        </form>
    </div>
</div>

        <!-- Device List -->
        <table class="device-table">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>MAC Address</th>
                    <th>IP Address</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($devices as $device): ?>
                <tr>
                    <td><?= htmlspecialchars($device['name']) ?></td>
                    <td><?= htmlspecialchars($device['mac']) ?></td>
                    <td><?= htmlspecialchars($device['ip']) ?></td>
                    <td class="<?= $device['online'] ? 'online' : 'offline' ?>">
                        <?= $device['online'] ? 'Online' : 'Offline' ?>
                    </td>
                    <td>
                        <form action="wol.php" method="post">
                            <input type="hidden" name="mac" value="<?= htmlspecialchars($device['mac']) ?>">
                            <input type="hidden" name="ip" value="<?= htmlspecialchars($device['ip']) ?>">
                            <button type="submit">Wake</button>
                        </form>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <script src="script.js"></script>
</body>
</html>
