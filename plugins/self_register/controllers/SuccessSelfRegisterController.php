<?php

require_once __DIR__ . "/../trait/SelfRegisterTrait.php";

// Jika request berbentuk GET dan terdapat parameter member, maka tampilkan view index
if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['member'])) {

    // Decrypt data member dari parameter URL
    $member = decrypt($_GET['member']);
    $member = json_decode($member, true);

    // Ambil data member
    $memberId = $member['member_id'];
    $memberEmail = $member['member_email'];

    // Tampilkan view success
    require_once __DIR__ . '/../views/success.php';

    goto EXIT_ROUTE;
}

// Jika request berbentuk POST dan terdapat parameter token, maka kirim ulang email aktivasi
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['token'])) {
    // Decrypt token untuk mendapatkan memberId
    $memberId = decrypt($_POST['token']);

    // Kirim ulang email aktivasi
    sendMemberActivationEmail($memberId);

    exit;
}



// Jalur Keluar
EXIT_ROUTE:
