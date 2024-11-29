<?php

if (isset($_POST['addDevice'])) {
    $filePath = 'resources.json';

    $devices = json_decode(file_get_contents($filePath), true) ?? [];

    $newDevice = [
        'name' => $_POST['name'],  // Device name
        'mac' => $_POST['mac'],   // MAC address
        'ip' => $_POST['ip'],     // IP address
    ];

    $devices[] = $newDevice;

    file_put_contents($filePath, json_encode($devices, JSON_PRETTY_PRINT));

    header('Location: index.php');
    exit;
}

function isOnline($ip)
{
    $os = PHP_OS_FAMILY;

    if ($os === 'Windows') {
        $pingResult = exec("ping -n 1 -w 1000 $ip", $output, $status);
    } else {
        $pingResult = exec("ping -c 1 -W 1 $ip", $output, $status);
    }

    return strpos(implode("\n", $output), 'TTL') !== false;
}
