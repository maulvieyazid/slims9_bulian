<?php

if (!function_exists('generateSelfRegisterMemberId')) {
    /**
     * Fungsi untuk menghasilkan member_id untuk pendaftaran mandiri
     *
     * @return string
     */
    function generateSelfRegisterMemberId(): string
    {
        // Prefix untuk member_id pendaftaran mandiri
        $prefix = 'PUS';

        // Ambil timestamp detik saat ini
        $time = time();

        // Tambahkan 3 digit acak
        $rand = random_int(100, 999);

        // Gabungkan dan ambil 6 digit terakhir
        $unique = substr($time . $rand, -6);

        // Hasil akhir: PREFIX-###### (contoh: PUS-483912)
        return sprintf('%s-%s', $prefix, $unique);
    }
}

if (!function_exists('sendMemberActivationEmail')) {
    /**
     * Fungsi untuk mengirim email aktivasi ke member baru
     *
     * @param string $memberId
     * @return void
     */
    function sendMemberActivationEmail(string $memberId): void
    {
        // Select email dan nama member berdasarkan memberId
        $pdo = \SLiMS\DB::getInstance();
        $stmt = $pdo->prepare("SELECT member_email, member_name FROM MEMBER WHERE member_id = :member_id");
        $stmt->execute([':member_id' => $memberId]);
        $member = $stmt->fetch(PDO::FETCH_OBJ);

        if ($member) {
            $email = $member->member_email;
            $name = $member->member_name;

            // Template email aktivasi member
            require_once __DIR__ . '/../mail/MemberActivationMail.php';
            $mailTemplate = new MemberActivationMail($memberId);

            // Kirim email aktivasi member
            \SLiMS\Mail::to($email, $name)
                ->subject('Aktivasi Akun Member Pustara')
                ->loadTemplate($mailTemplate)
                ->send();
        }
    }
}
