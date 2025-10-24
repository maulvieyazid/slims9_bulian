<?php

use SLiMS\Mail\TemplateContract;

class MemberActivationMail extends TemplateContract
{
    private $memberId;

    public function __construct($memberId)
    {
        $this->memberId = $memberId;
    }

    public function render()
    {
        $logo = \Slims\Url::getSlimsBaseUri('images/default/logo.png');

        $token = encrypt($this->memberId);

        $activationLink = \Slims\Url::getSlimsBaseUri("?p=api/activate/member/$token");

        $formattedTemplate = <<<HTML
            <!DOCTYPE html>
            <html lang="id">

            <head>
                <meta charset="UTF-8">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <title>Aktivasi Akun Member</title>
            </head>

            <body
                style="margin: 0; padding: 0; font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; background-color: #f4f4f4;">
                <table role="presentation" style="width: 100%; border-collapse: collapse; background-color: #f4f4f4;">
                    <tr>
                        <td style="padding: 40px 20px;">
                            <table role="presentation"
                                style="max-width: 600px; margin: 0 auto; background-color: #ffffff; border-radius: 8px; box-shadow: 0 2px 8px rgba(0,0,0,0.1); border-collapse: collapse;">
                                <!-- Header -->
                                <tr>
                                    <td
                                        style="background: #ffffff; padding: 45px 30px 35px 30px; text-align: center; border-radius: 8px 8px 0 0; border-bottom: 3px solid #D4AF37;">
                                        <img src="$logo" alt="Logo IKN Nusantara"
                                            style="width: 140px; height: auto; margin-bottom: 20px; display: block; margin-left: auto; margin-right: auto;">
                                        <h1
                                            style="margin: 0; color: #1a1a2e; font-size: 30px; font-weight: 700; letter-spacing: 0.5px;">
                                            Pustaka Nusantara</h1>
                                        <p
                                            style="margin: 12px 0 0 0; color: #D4AF37; font-size: 15px; font-weight: 600; letter-spacing: 0.5px;">
                                            Selamat Bergabung!</p>
                                    </td>
                                </tr>

                                <!-- Content -->
                                <tr>
                                    <td style="padding: 40px 30px;">
                                        <h2 style="margin: 0 0 20px 0; color: #333333; font-size: 22px; font-weight: 600;">Akun Anda
                                            Telah Dibuat</h2>
                                        <p style="margin: 0 0 25px 0; color: #666666; font-size: 15px; line-height: 1.6;">
                                            Terima kasih telah mendaftar sebagai member Pustaka Nusantara. Berikut adalah Member ID
                                            Anda yang dapat digunakan untuk login:
                                        </p>

                                        <!-- Member Info Box -->
                                        <table role="presentation"
                                            style="width: 100%; border-collapse: collapse; background: linear-gradient(135deg, #FFF9E6 0%, #FFF5D6 100%); border-radius: 6px; margin-bottom: 25px; border: 2px solid #D4AF37;">
                                            <tr>
                                                <td style="padding: 30px; text-align: center;">
                                                    <p
                                                        style="margin: 0 0 8px 0; color: #B8945F; font-size: 13px; font-weight: 600; text-transform: uppercase; letter-spacing: 1px;">
                                                        Member ID Anda
                                                    </p>
                                                    <p
                                                        style="margin: 0; color: #8B6914; font-size: 26px; font-weight: 700; font-family: 'Courier New', monospace; letter-spacing: 2px;">
                                                        {$this->memberId}
                                                    </p>
                                                    <p
                                                        style="margin: 15px 0 0 0; color: #999999; font-size: 13px; line-height: 1.5;">
                                                        Gunakan Member ID ini bersama password yang Anda buat untuk login
                                                    </p>
                                                </td>
                                            </tr>
                                        </table>

                                        <p style="margin: 0 0 20px 0; color: #666666; font-size: 15px; line-height: 1.6;">
                                            Untuk mengaktifkan akun Anda, silakan klik tombol di bawah ini:
                                        </p>

                                        <!-- CTA Button -->
                                        <table role="presentation" style="margin: 0 0 25px 0;">
                                            <tr>
                                                <td style="text-align: center;">
                                                    <a href="$activationLink"
                                                        style="display: inline-block; background: linear-gradient(135deg, #D4AF37 0%, #C9A961 100%); color: #ffffff; text-decoration: none; padding: 15px 45px; border-radius: 6px; font-size: 16px; font-weight: 600; box-shadow: 0 4px 8px rgba(212, 175, 55, 0.4); text-shadow: 0 1px 2px rgba(0,0,0,0.2);">
                                                        Aktivasi Akun Sekarang
                                                    </a>
                                                </td>
                                            </tr>
                                        </table>

                                        <!-- Alternative Link -->
                                        <p style="margin: 0 0 10px 0; color: #999999; font-size: 13px; line-height: 1.6;">
                                            Atau salin link berikut ke browser Anda:
                                        </p>
                                        <p
                                            style="margin: 0 0 25px 0; background-color: #f8f9fa; padding: 12px; border-radius: 4px; word-break: break-all; border-left: 3px solid #D4AF37;">
                                            <a href="$activationLink"
                                                style="color: #B8945F; text-decoration: none; font-size: 13px;">$activationLink</a>
                                        </p>

                                        <p style="margin: 0; color: #999999; font-size: 13px; line-height: 1.6;">
                                            Link aktivasi ini berlaku selama 24 jam. Jika Anda tidak melakukan pendaftaran ini,
                                            abaikan email ini.
                                        </p>
                                    </td>
                                </tr>

                                <!-- Footer -->
                                <tr>
                                    <td
                                        style="background-color: #f8f9fa; padding: 30px; text-align: center; border-radius: 0 0 8px 8px; border-top: 1px solid #e0e0e0;">
                                        <p style="margin: 0 0 15px 0; color: #333333; font-size: 16px; font-weight: 600;">
                                            Terima Kasih,
                                        </p>
                                        <p style="margin: 0 0 20px 0; color: #D4AF37; font-size: 18px; font-weight: 700;">
                                            Tim Pustaka Nusantara
                                        </p>
                                        <div style="border-top: 1px solid #e0e0e0; padding-top: 20px; margin-top: 20px;">
                                            <p style="margin: 0 0 10px 0; color: #999999; font-size: 12px;">
                                                Email ini dikirim secara otomatis, mohon tidak membalas email ini.
                                            </p>
                                            <p style="margin: 0; color: #999999; font-size: 12px;">
                                                © 2025 Pustaka Nusantara. All rights reserved.
                                            </p>
                                        </div>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                </table>
            </body>

            </html>
        HTML;

        $this->contents = $formattedTemplate;

        return $this;
    }
}
