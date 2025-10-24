<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="/pustara/lib/minigalnano/createthumb.php?filename=images/default/webicon.png&width=130" type="image/x-icon">

    <title>Aktivasi Berhasil</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(135deg, #C9A661 0%, #8B6914 100%);
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 20px;
            position: relative;
            overflow: hidden;
        }

        body::before {
            content: "";
            position: absolute;
            top: -50%;
            right: -50%;
            width: 100%;
            height: 100%;
            background: radial-gradient(circle, rgba(255, 255, 255, 0.1) 0%, transparent 70%);
            animation: float 20s ease-in-out infinite;
        }

        body::after {
            content: "";
            position: absolute;
            bottom: -50%;
            left: -50%;
            width: 100%;
            height: 100%;
            background: radial-gradient(circle, rgba(218, 165, 32, 0.15) 0%, transparent 70%);
            animation: float 25s ease-in-out infinite reverse;
        }

        @keyframes float {

            0%,
            100% {
                transform: translate(0, 0);
            }

            50% {
                transform: translate(-50px, 50px);
            }
        }

        .container {
            background: linear-gradient(to bottom, #ffffff 0%, #fefaf5 100%);
            border-radius: 20px;
            box-shadow: 0 20px 60px rgba(139, 105, 20, 0.3);
            max-width: 500px;
            width: 100%;
            padding: 50px 40px;
            text-align: center;
            animation: slideIn 0.6s ease-out;
            position: relative;
            z-index: 1;
            border-top: 5px solid #DAA520;
        }

        @keyframes slideIn {
            from {
                opacity: 0;
                transform: translateY(-30px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .icon-container {
            margin-bottom: 30px;
            animation: scaleIn 0.6s ease-out 0.2s both;
        }

        @keyframes scaleIn {
            from {
                opacity: 0;
                transform: scale(0.5);
            }

            to {
                opacity: 1;
                transform: scale(1);
            }
        }

        .checkmark {
            width: 80px;
            height: 80px;
            border-radius: 50%;
            background: linear-gradient(135deg, #DAA520 0%, #B8860B 100%);
            display: inline-flex;
            align-items: center;
            justify-content: center;
            position: relative;
            box-shadow: 0 8px 20px rgba(218, 165, 32, 0.4);
        }

        .checkmark::before {
            content: "✓";
            color: white;
            font-size: 50px;
            font-weight: bold;
            text-shadow: 0 2px 4px rgba(0, 0, 0, 0.2);
        }

        .checkmark::after {
            content: "";
            position: absolute;
            width: 100%;
            height: 100%;
            border-radius: 50%;
            border: 3px solid #DAA520;
            animation: ripple 1.5s ease-out infinite;
        }

        @keyframes ripple {
            0% {
                transform: scale(1);
                opacity: 0.6;
            }

            100% {
                transform: scale(1.5);
                opacity: 0;
            }
        }

        h1 {
            color: #8B6914;
            font-size: 32px;
            margin-bottom: 15px;
            animation: fadeIn 0.6s ease-out 0.3s both;
            font-weight: 700;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
            }

            to {
                opacity: 1;
            }
        }

        p {
            color: #5c4d2e;
            font-size: 16px;
            line-height: 1.6;
            margin-bottom: 30px;
            animation: fadeIn 0.6s ease-out 0.4s both;
        }

        .btn {
            display: inline-block;
            background: linear-gradient(135deg, #DAA520 0%, #B8860B 100%);
            color: white;
            padding: 15px 40px;
            border-radius: 30px;
            text-decoration: none;
            font-size: 16px;
            font-weight: 600;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            animation: fadeIn 0.6s ease-out 0.5s both;
            box-shadow: 0 4px 15px rgba(218, 165, 32, 0.4);
            border: 2px solid transparent;
            position: relative;
            overflow: hidden;
        }

        .btn::before {
            content: "";
            position: absolute;
            top: 50%;
            left: 50%;
            width: 0;
            height: 0;
            border-radius: 50%;
            background: rgba(255, 255, 255, 0.2);
            transform: translate(-50%, -50%);
            transition: width 0.6s, height 0.6s;
        }

        .btn:hover::before {
            width: 300px;
            height: 300px;
        }

        .btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 25px rgba(218, 165, 32, 0.6);
            border-color: rgba(255, 255, 255, 0.3);
        }

        .btn:active {
            transform: translateY(0);
        }

        .btn span {
            position: relative;
            z-index: 1;
        }

        .divider {
            margin: 30px 0;
            height: 1px;
            background: linear-gradient(to right, transparent, #DAA520, transparent);
            animation: fadeIn 0.6s ease-out 0.6s both;
        }

        .info {
            color: #8B7355;
            font-size: 14px;
            animation: fadeIn 0.6s ease-out 0.7s both;
        }

        .info a {
            color: #B8860B;
            text-decoration: none;
            font-weight: 600;
            transition: color 0.3s ease;
        }

        .info a:hover {
            color: #DAA520;
            text-decoration: underline;
        }

        .accent {
            color: #DAA520;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="icon-container">
            <div class="checkmark"></div>
        </div>

        <h1>Akun Berhasil Diaktifkan! <span class="accent">🎉</span></h1>

        <p>
            Selamat! Akun Member Anda telah berhasil diaktifkan.
            Silahkan gunakan Member ID dan kata sandi yang telah Anda buat untuk masuk ke akun Anda.
        </p>

        <a href="<?= \SLiMS\Url::getSlimsBaseUri('?p=member') ?>" class="btn"><span>Masuk ke Akun Saya</span></a>

        <div class="divider"></div>

        <div class="info">

        </div>
    </div>
</body>

</html>
<?php exit; ?>