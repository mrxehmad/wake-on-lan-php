<?php

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $mac = $_POST['mac'];
    wakeOnLan($mac);
    header('Location: index.php');
    exit;
}

function wakeOnLan($mac)
{
    $macHex = str_replace(':', '', $mac);
    $magicPacket = str_repeat(chr(0xFF), 6) . str_repeat(pack('H*', $macHex), 16);

    $sock = socket_create(AF_INET, SOCK_DGRAM, SOL_UDP);
    socket_set_option($sock, SOL_SOCKET, SO_BROADCAST, 1);
    socket_sendto($sock, $magicPacket, strlen($magicPacket), 0, '255.255.255.255', 9);
    socket_close($sock);
}
