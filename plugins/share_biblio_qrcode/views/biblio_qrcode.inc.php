<?php
// If required parameters are missing, show an error message and exit
if (
    !isset($_GET['id']) || !isset($_GET['image_src']) || !isset($_GET['title'])
) {
    echo <<<HTML
            <div class="alert alert-danger" role="alert">
                <h4 class="alert-heading font-weight-bold">Error</h4>
                <p>Missing Required Parameters!</p>
            </div>
        HTML;
    goto SKIP_CONTENT;
}
?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pustaka Nusantara IKN</title>
    <style>
        @media print {

            /* Terapkan ke semua elemen */
            * {
                -webkit-print-color-adjust: exact;
                /* Chrome/Edge/Safari */
                print-color-adjust: exact;
                /* Draft spec / fallback */
            }

            body {
                background: white !important
            }
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            background: linear-gradient(135deg, #1e3c72 0%, #2a5298 100%);
            font-family: 'Arial', sans-serif;
            padding: 20px;
        }

        .book-cover {
            width: 400px;
            height: 550px;
            background: linear-gradient(145deg, #ffffff 0%, #f0f0f0 100%);
            border: 12px solid #8B4513;
            border-radius: 8px;
            box-shadow: 0 20px 60px rgba(0, 0, 0, 0.4);
            position: relative;
            overflow: hidden;
        }

        .book-cover::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 8px;
            background: linear-gradient(90deg, #FFD700, #FFA500, #FFD700);
        }

        .header {
            text-align: center;
            padding: 25px 20px;
            background: linear-gradient(135deg, #2ECC71 0%, #27AE60 100%);
            color: white;
            position: relative;
        }

        .header::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            right: 0;
            height: 3px;
            background: #FFD700;
        }

        .logo {
            width: 100px;
            height: 130px;
            margin: 0 auto 15px;
            background: white;
            border-radius: 8px;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 0;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            overflow: hidden;
        }

        .logo img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .book-cover-placeholder {
            width: 100%;
            height: 100%;
            background: linear-gradient(135deg, #e0e0e0 0%, #f5f5f5 100%);
            display: flex;
            align-items: center;
            justify-content: center;
            color: #999;
            font-size: 12px;
            text-align: center;
            padding: 10px;
        }

        .title {
            font-size: 24px;
            font-weight: bold;
            letter-spacing: 1px;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.3);
            line-height: 1.3;
            padding: 0 15px;
        }

        .title.long {
            font-size: 18px;
            letter-spacing: 0.5px;
        }

        .title.very-long {
            font-size: 14px;
            letter-spacing: 0.3px;
            line-height: 1.2;
        }

        .qr-container {
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 20px 30px 30px 30px;
            position: relative;
        }

        .qr-frame {
            width: 220px;
            height: 220px;
            background: white;
            border: 3px solid #2ECC71;
            border-radius: 12px;
            display: flex;
            justify-content: center;
            align-items: center;
            position: relative;
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.15);
            z-index: 10;
        }

        .qr-placeholder {
            width: 205px;
            height: 205px;
            /* background: #f8f8f8; */
            /* border: 2px dashed #ccc; */
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            color: #999;
            font-size: 13px;
            border-radius: 8px;
        }

        .qr-placeholder img {
            width: 100%;
            height: 100%;
        }

        .corner {
            position: absolute;
            width: 40px;
            height: 40px;
            border: 3px solid #2ECC71;
        }

        .corner.top-left {
            top: -15px;
            left: -15px;
            border-right: none;
            border-bottom: none;
            border-radius: 8px 0 0 0;
        }

        .corner.top-right {
            top: -15px;
            right: -15px;
            border-left: none;
            border-bottom: none;
            border-radius: 0 8px 0 0;
        }

        .corner.bottom-left {
            bottom: -15px;
            left: -15px;
            border-right: none;
            border-top: none;
            border-radius: 0 0 0 8px;
        }

        .corner.bottom-right {
            bottom: -15px;
            right: -15px;
            border-left: none;
            border-top: none;
            border-radius: 0 0 8px 0;
        }

        .mascot {
            width: 100px;
            height: 100px;
            position: absolute;
            bottom: 140px;
            right: 30px;
            background: linear-gradient(135deg, #FFD700 0%, #FFA500 100%);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 50px;
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.2);
            animation: float 3s ease-in-out infinite;
        }

        @keyframes float {

            0%,
            100% {
                transform: translateY(0);
            }

            50% {
                transform: translateY(-10px);
            }
        }

        .footer {
            position: absolute;
            bottom: 0;
            left: 0;
            right: 0;
            padding: 25px;
            text-align: center;
            background: linear-gradient(135deg, #2ECC71 0%, #27AE60 100%);
        }

        .footer-title {
            font-size: 24px;
            font-weight: bold;
            color: white;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.3);
            letter-spacing: 2px;
        }

        .ikn-pattern {
            position: absolute;
            top: 90px;
            left: 0;
            right: 0;
            height: 50px;
            background: linear-gradient(90deg, transparent 0%, rgba(46, 204, 113, 0.1) 50%, transparent 100%);
        }

        .decoration {
            position: absolute;
            width: 30px;
            height: 30px;
            border-radius: 50%;
            background: #FFD700;
            opacity: 0.3;
        }

        .deco1 {
            top: 150px;
            left: 20px;
        }

        .deco2 {
            top: 200px;
            right: 20px;
            width: 20px;
            height: 20px;
        }

        .deco3 {
            bottom: 180px;
            left: 30px;
            width: 25px;
            height: 25px;
            background: #FFA500;
        }
    </style>

    <script src="<?= JWB . "qrcodejs/jquery.min.js" ?>"></script>
    <script src="<?= JWB . "qrcodejs/qrcode.min.js" ?>"></script>
</head>

<body>
    <div class="book-cover">
        <div class="header">
            <div class="logo">
                <div class="book-cover-placeholder">
                    <img src="<?= $_GET['image_src'] ?>" alt="Cover Buku" srcset="">
                </div>
            </div>
            <div class="title" id="bookTitle"><?= $_GET['title'] ?></div>
        </div>

        <div class="ikn-pattern"></div>
        <div class="decoration deco1"></div>
        <div class="decoration deco2"></div>
        <div class="decoration deco3"></div>

        <div class="qr-container">
            <div class="qr-frame">
                <div class="corner top-left"></div>
                <div class="corner top-right"></div>
                <div class="corner bottom-left"></div>
                <div class="corner bottom-right"></div>

                <div class="qr-placeholder">
                    <div id="qrcode"></div>
                </div>
            </div>
        </div>
    </div>

    <script>
        // Generate QR Code
        var qrcode = new QRCode(document.getElementById("qrcode"), {
            useSVG: true
        });

        qrcode.makeCode(`<?= \SLiMS\Url::getSlimsBaseUri('?p=show_detail&id=') . $_GET['id'] ?>`);
    </script>
    <script>
        // Auto-adjust title size based on length
        function adjustTitleSize() {
            const title = document.getElementById('bookTitle');
            const text = title.textContent;
            const length = text.length;

            title.classList.remove('long', 'very-long');

            if (length > 60) {
                title.classList.add('very-long');
            } else if (length > 35) {
                title.classList.add('long');
            }
        }

        // Run on load
        adjustTitleSize();

        // Optional: Watch for changes if you modify the title dynamically
        const observer = new MutationObserver(adjustTitleSize);
        observer.observe(document.getElementById('bookTitle'), {
            childList: true,
            characterData: true,
            subtree: true
        });
    </script>
</body>

</html>
<?php exit; ?>

<?php SKIP_CONTENT: ?>