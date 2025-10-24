<?php
// be sure that this file not accessed directly
if (!defined('INDEX_AUTH') || INDEX_AUTH != 1) {
    die("can not access this file directly");
}
?>

<div id="app">
    <style>
        div.tagline {
            margin-top: 0.5rem;
            margin-bottom: 1.5rem;
            font-size: 2rem;
            font-weight: 500;
            line-height: 1.2;
            border-bottom: 1px solid rgba(0, 0, 0, .1);
            padding-bottom: 1.5rem;
        }
    </style>

    <div class="tagline">Daftar Member <?= $sysconf['library_name'] ?></div>
    <div class="loginInfo">
        <?php
        if (!flash()->isEmpty() && $key = flash()->includes('wrong_password', 'csrf_failed', 'empty_field', 'captchaInvalid')) {
            flash()->danger($key);
        }
        ?>
    </div>
    <div class="row">
        <div class="col-6">
            <form id="registrationForm" novalidate method="POST">
                <?= \Volnix\CSRF\CSRF::getHiddenInputString() ?>

                <p class="mb-3">
                    <span class="text-danger">*</span> Wajib diisi
                </p>

                <!-- Nama Lengkap -->
                <div class="form-group">
                    <label for="inputName">Nama Lengkap <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" name="member_name" id="inputName" placeholder="Masukkan nama lengkap" required>
                    <div class="valid-feedback">Terlihat bagus!</div>
                    <div class="invalid-feedback">Nama lengkap wajib diisi.</div>
                </div>
                <!-- Email -->
                <div class="form-group">
                    <label for="inputEmail">Email <span class="text-danger">*</span></label>
                    <input type="email" class="form-control" name="member_email" id="inputEmail" placeholder="Masukkan email" required>
                    <div class="valid-feedback">Email valid!</div>
                    <div class="invalid-feedback">Masukkan alamat email yang valid.</div>
                </div>
                <!-- Nomor Telepon -->
                <div class="form-group">
                    <label for="inputPhone">Nomor Telepon (Opsional)</label>
                    <input type="text" class="form-control" name="member_phone" id="inputPhone" placeholder="Contoh: 08123456789" maxlength="15">
                    <div class="valid-feedback">Nomor telepon valid!</div>
                    <div class="invalid-feedback">Hanya boleh memasukkan angka.</div>
                    <small class="form-text text-muted">Hanya angka yang diperbolehkan.</small>
                </div>
                <!-- Institusi / Unit Kerja -->
                <div class="form-group">
                    <label for="inputInstName">Nama Institusi / Unit Kerja (Opsional)</label>
                    <input type="text" class="form-control" name="inst_name" id="inputInstName" placeholder="Masukkan nama institusi atau unit kerja">
                    <div class="valid-feedback">Terlihat bagus!</div>
                    <div class="invalid-feedback"></div>
                </div>
                <!-- Jenis Kelamin -->
                <div class="form-group">
                    <label>Jenis Kelamin</label>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="gender" id="genderMale" value="1" checked>
                        <label class="form-check-label" for="genderMale">
                            Laki-laki
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="gender" id="genderFemale" value="0">
                        <label class="form-check-label" for="genderFemale">
                            Perempuan
                        </label>
                    </div>
                </div>
                <!-- Password -->
                <div class="form-group">
                    <label for="inputPassword">Password <span class="text-danger">*</span></label>
                    <input type="password" class="form-control" name="mpasswd" id="inputPassword" placeholder="Masukkan password" required>
                    <div class="valid-feedback">Terlihat bagus!</div>
                    <div class="invalid-feedback">Password wajib diisi.</div>
                </div>
                <!-- Konfirmasi Password -->
                <div class="form-group">
                    <label for="inputConfirmPassword">Konfirmasi Password <span class="text-danger">*</span></label>
                    <input type="password" class="form-control" id="inputConfirmPassword" placeholder="Masukkan ulang password" required>
                    <div class="valid-feedback">Password cocok!</div>
                    <div class="invalid-feedback">Password tidak cocok.</div>
                </div>
                <button type="submit" class="btn btn-primary btn-block" id="submitBtn">Daftar</button>
            </form>
        </div>
    </div>
</div>

<script src="<?= JWB . "init_plugin_view.js" ?>"></script>

<script>
    $(document).ready(() => {
        // Konfigurasi validasi untuk setiap field
        const validations = {
            inputName: {
                validate: (val) => val.trim().length > 0,
                message: 'Nama lengkap wajib diisi.'
            },
            inputEmail: {
                validate: (val) => /^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(val),
                message: 'Masukkan alamat email yang valid.'
            },
            inputPhone: {
                validate: (val) => val.length === 0 || val.length > 0,
                message: 'Nomor telepon opsional.',
                optional: true
            },
            inputInstName: {
                validate: (val) => val.trim().length === 0 || val.trim().length > 0,
                message: 'Nama institusi atau unit kerja opsional.',
                optional: true
            },
            inputPassword: {
                validate: (val) => val.length > 0,
                message: 'Password wajib diisi.'
            },
            inputConfirmPassword: {
                validate: (val) => val === $('#inputPassword').val() && val.length > 0,
                message: 'Password tidak cocok.'
            }
        };

        // Fungsi untuk melakukan validasi field
        const validateField = (fieldId, showFeedback = true) => {
            const $field = $(`#${fieldId}`);
            const value = $field.val();
            const config = validations[fieldId];

            if (!config) return true;

            const isValid = config.validate(value);

            if (showFeedback) {
                if (isValid) {
                    $field.removeClass('is-invalid').addClass('is-valid');
                } else {
                    $field.removeClass('is-valid').addClass('is-invalid');
                    $field.siblings('.invalid-feedback').text(config.message);
                }
            }

            return isValid;
        };


        // Validasi nomor telepon - hanya angka
        $('#inputPhone').on('input', function() {
            const numbersOnly = $(this).val().replace(/[^0-9]/g, '');
            $(this).val(numbersOnly);
            validateField('inputPhone');
        });

        // Validasi real-time untuk field lainnya
        $('#inputEmail, #inputName, #inputInstName').on('input', function() {
            validateField(this.id);
        });

        $('#inputPassword').on('input', function() {
            validateField('inputPassword');

            // Cek ulang konfirmasi password jika sudah diisi
            if ($('#inputConfirmPassword').val().length > 0) {
                validateField('inputConfirmPassword');
            }
        });

        $('#inputConfirmPassword').on('input', function() {
            validateField('inputConfirmPassword');
        });

        // Submit form
        $('#registrationForm').on('submit', function(e) {
            e.preventDefault();

            // Validasi semua field sekaligus
            const fieldsToValidate = ['inputName', 'inputEmail', 'inputPhone', 'inputInstName', 'inputPassword', 'inputConfirmPassword'];
            const validationResults = fieldsToValidate.map(fieldId => validateField(fieldId));
            const isValid = validationResults.every(result => result === true);

            // Jika ada yang tidak valid, hentikan proses submit
            if (!isValid) return;

            // Disable tombol submit biar user gak klik dua kali
            const submitBtn = $('#submitBtn');
            submitBtn.prop('disabled', true).text('Mohon Tunggu...');

            // Lepaskan event submit pada form dan lakukan submit yang sebenarnya
            $(this).off('submit').submit();
        });



    });
</script>