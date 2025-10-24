<?php

use Volnix\CSRF\CSRF;
use \SLiMS\DB;

// be sure that this file not accessed directly
if (!defined('INDEX_AUTH') || INDEX_AUTH != 1) {
    die("can not access this file directly");
}

// Masukkan trait yang dibutuhkan
require_once __DIR__ . "/../trait/SelfRegisterTrait.php";

// Jika request berbentuk GET, maka tampilkan view index
if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    require_once __DIR__ . '/../views/index.php';
    goto EXIT_ROUTE;
}

// Jika request berbentuk POST, maka proses pendaftaran
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    // Validasi CSRF token
    if (!CSRF::validate($_POST)) {
        session_unset();
        redirect()->withMessage('csrf_failed', __('Invalid login form!'))->back();
    }

    // Insert ke tabel member
    $pdo = DB::getInstance();
    $stmt = $pdo->prepare("INSERT IGNORE INTO MEMBER (
                                member_id,
                                member_name,
                                gender,
                                member_type_id,
                                member_email,
                                inst_name,
                                member_phone,
                                member_since_date,
                                register_date,
                                expire_date,
                                is_pending,
                                mpasswd,
                                input_date,
                                last_update
                            )
                            VALUES (
                                :member_id,
                                :member_name,
                                :gender,
                                :member_type_id,
                                :member_email,
                                :inst_name,
                                :member_phone,
                                :member_since_date,
                                :register_date,
                                :expire_date,
                                :is_pending,
                                :mpasswd,
                                :input_date,
                                :last_update
                            )
    ");

    $memberId = generateSelfRegisterMemberId();

    $field = [
        ':member_id'         => $memberId,
        ':member_name'       => $_POST['member_name'],
        ':gender'            => $_POST['gender'],
        ':member_type_id'    => 1,
        ':member_email'      => $_POST['member_email'],
        ':inst_name'         => $_POST['inst_name'],
        ':member_phone'      => $_POST['member_phone'],
        ':member_since_date' => date('Y-m-d H:i:s'),
        ':register_date'     => date('Y-m-d H:i:s'),
        ':expire_date'       => date('Y-m-d H:i:s', strtotime('+1 year')),
        ':is_pending'        => 1,
        ':mpasswd'           => password_hash($_POST['mpasswd'], PASSWORD_BCRYPT),
        ':input_date'        => date('Y-m-d H:i:s'),
        ':last_update'       => date('Y-m-d H:i:s')
    ];

    $stmt->execute($field);

    // Kirim email aktivasi ke member baru
    sendMemberActivationEmail($memberId);

    // Enkripsi data member untuk dikirim ke halaman sukses
    $dataMember = json_encode([
        'member_id'    => $memberId,
        'member_email' => $_POST['member_email'],
    ]);
    $member = encrypt($dataMember);

    // Arahkan user ke halaman sukses
    redirect("?p=success_self_register&member=$member");
}



// Jalur Keluar
EXIT_ROUTE:
