<?php
// be sure that this file not accessed directly
if (!defined('INDEX_AUTH') || INDEX_AUTH != 1) {
    die("can not access this file directly");
}
?>

<div id="app">
    <h2 class="text-center">Verifikasi Email Anda</h2>
    <p class="text-center text-muted">Link aktivasi telah dikirim ke email Anda</p>

    <div class="email-info">
        <p class="mb-0">
            <i class="fas fa-info-circle"></i>
            Kami telah mengirimkan email ke <strong id="userEmail"><?= $memberEmail ?></strong>
        </p>
    </div>

    <div class="alert alert-info alert-custom" role="alert">
        <i class="fas fa-lightbulb"></i>
        <strong>Petunjuk:</strong> Silakan cek inbox atau folder spam Anda, lalu klik link aktivasi untuk mengaktifkan akun member Anda.
    </div>

    <div class="text-center mt-4">
        <p class="mb-2">Tidak menerima email?</p>
        <button id="resendBtn" class="btn btn-primary resend-btn">
            <i class="fas fa-paper-plane"></i> Kirim Ulang Email
        </button>
        <p class="timer-text" id="timerText"></p>
    </div>

    <div id="successAlert" class="alert alert-success alert-custom mt-3" role="alert" style="display: none;">
        <i class="fas fa-check-circle"></i> Email aktivasi berhasil dikirim ulang!
    </div>
</div>

<script src="<?= JWB . "init_plugin_view.js" ?>"></script>

<script>
    $(document).ready(function() {
        let countdown = 30;
        let timerInterval;

        // Fungsi untuk memulai countdown
        function startCountdown() {
            $('#resendBtn').prop('disabled', true);
            countdown = 30;

            timerInterval = setInterval(function() {
                countdown--;
                $('#timerText').text('Anda dapat mengirim ulang email dalam ' + countdown + ' detik');

                if (countdown <= 0) {
                    clearInterval(timerInterval);
                    $('#resendBtn').prop('disabled', false);
                    $('#timerText').text('');
                }
            }, 1000);
        }

        // Mulai countdown saat halaman dimuat
        // startCountdown();

        // Event handler untuk tombol kirim ulang
        $('#resendBtn').on('click', function() {
            // Tampilkan alert sukses
            $('#successAlert').fadeIn();

            // Sembunyikan alert setelah 3 detik
            setTimeout(function() {
                $('#successAlert').fadeOut();
            }, 3000);

            // Mulai countdown lagi
            startCountdown();

            // Di sini Anda bisa menambahkan AJAX request untuk mengirim ulang email
            $.ajax({
                url: '',
                method: 'POST',
                data: {
                    token: '<?= encrypt($memberId) ?>'
                },
                success: function(response) {
                    console.log('Email terkirim');
                }
            });
        });
    });
</script>