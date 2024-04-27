<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        body {
            font-family: "Arial", sans-serif;
            color: #000;
        }

        .container {
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
            background-color: #fff;
        }

        .header {
            background-color: #17376E;
            color: #fff;
            text-align: center;
            padding: 10px;
        }

        .content {
            margin-top: 20px;
        }

        .link-button {
            color: #fff;
            padding: 10px 8px 10px 8px;
            border-radius: 6px;
            background: #17376e;
            box-shadow: 0px 3px 6px 0px rgba(0, 0, 0, 0.2);
            border: 0px;
            margin-bottom: 10px;
            text-decoration: none;

        }

        .link-button:hover {
            color: #17376e;
            background-color: white;
            border: 1px solid;
        }
    </style>
</head>

<body>
    <?php
    $link = ROOT . 'admission/login?token=' . $token;
    ?>
    <div class="container">
        <div class="header">
            <h1>Student Admission Card</h1>
        </div>
        <div class="content">
            <?php if (!empty($send)): ?>
                <p>Dear <?= $send; ?>,</p>
            <?php endif; ?>
            <p>Your admission card for the upcoming examination is ready. Please click the link below to view and
                download your admission card:</p>
            <a href="<?= $link ?>" class="link-button">View Admission Card</a>
            <p>If you have any questions or concerns, please contact us at nilisexamination@gmail.com.</p>
            <p>Best regards,</p>
            <p>National Institute of Library and Information Sciences</p>
        </div>
    </div>
</body>

</html>