<!DOCTYPE html>
<html>

<head>
    <link href="https://fonts.googleapis.com/css?family=Montserrat&display=swap" rel="stylesheet" />
    <style>
        /* Apply styles to the body and HTML to ensure full height */
        /* <meta name="viewport" content="width=device-width, initial-scale=1.0"> */
        @import url("https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,200;0,300;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,700;1,800;1,900&display=swap");
        @import url("https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Poppins:ital,wght@0,200;0,300;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,700;1,800;1,900&display=swap");

        body {
            width: 100%;
            background-color: #17376e;
        }

        .flex-container {
            display: flex;
            min-height: 100%;
            /* Use min-height to ensure it takes up at least the full viewport height */
            align-items: center;
            background-color: #17376e;
        }

        .body_02 {
            display: flex;
            align-items: center;
            justify-content: center;
            background-color: white;
            font-style: normal;
            border-radius: 50px 0 0 50px;
            width: 100%;
            /* Adjusted to full width */
            max-width: 698px;
            /* Set a maximum width */
            text-align: center;
            height: 100vh;
            /* line-height: 100%; */
            font-size: 28px;
            margin-left: auto;
            padding: 20px;
            background-color: white;
        }

        .body_02_1 {
            display: flex;
            justify-content: center;
            flex-direction: column;
            align-items: center;
            gap: 35px;
            width: 80%;
        }

        .body_01 {
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 30px;
            font-family: "Montserrat", sans-serif;
            font-weight: 900;
            font-size: 25px;
            color: white;
            justify-content: center;
            min-height: 100%;
            /* Use min-height to ensure it takes up at least the full viewport height */
            width: 100%;
            padding: 20px;
        }

        .title {
            width: auto;
            font-family: "Montserrat", sans-serif;
            font-weight: 700;
            line-height: 1.2;
        }

        .img1 {
            width: 100%;
            max-width: 350px;
            height: auto;
        }

        .img2 {
            width: 100%;
            max-width: 360px;
            height: auto;
        }

        .login {
            font-family: "Poppins", sans-serif;
            font-size: 30px;
            font-size: larger;
            font-weight: 600;
            color: #17376e;
        }

        .input {
            width: 105%;
            height: 50px;
            margin-top: 20px;
            font-family: "Poppins";
            font-size: 16px;
            font-weight: 350;
            padding-left: 20px;
            border-radius: 15px;
            border: 1px;
            border-color: rgba(255, 255, 255, 0.2);
            background-color: #f5f5f5;
        }

        a {
            text-decoration: none;
        }

        .forgot {
            font-family: "Poppins";
            font-size: 12px;
            color: #6193b5;
            font-weight: 400;
        }

        .examination {
            color: #9ad6ff;
        }

        .error_block {
            /* margin: 10px; */
            margin: 10px 0px 30px 10px;
        }

        .error {
            font-family: "Poppins";
            font-size: 12px;
            color: #FF0000;
            font-weight: 300;
            text-align: left;

            /* margin-top: 20px; */
            /* margin-bottom: 20px; */
        }

        root {
            ----colour-secondar-1: #17376e;
        }

        button {
            color: #fff;
            width: 105%;
            height: 6vh;
            padding: 8px 22px;
            border-radius: 12px;
            background: #17376e;
            box-shadow: 0px 3px 6px 0px rgba(0, 0, 0, 0.2);
            border: 0px;
        }

        .bt-name {
            font-size: 16px;
            font-weight: 500px;
        }

        button:hover {
            color: #17376e;
            background-color: white;
            border: 1px solid var(--colour-secondary-1, #17376e);
        }

        @media (max-width: 768px) {
            .body_01 {
                font-size: 20px;
            }

            .img1 {
                max-width: 250px;
            }

            .img2 {
                max-width: 260px;
            }
        }
    </style>
</head>

<body>
    <div class="flex-container">
        <div class="body_01">
            <img class="img1" src="<?= ROOT ?>/assets/login/NILISLogo.png" alt="Logo" />
            <h1 class="title">
                <div class="examination">Examination</div>
                Management<br />Information<br />System
            </h1>
            <img class="img2" src="<?= ROOT ?>/assets/login/Loginpng.png" alt="Logo" />
        </div>
        <div class="body_02">
            <div class="body_02_1">
                <h1 class="login">
                    Sign in to <br />
                    your account
                </h1>
                <form method="post">
                    <input value="<?= set_value('username') ?>" class="input" type="text" placeholder="Username"
                        name="username" required />

                    <input value="<?= set_value('password') ?>" class="input" type="password" placeholder="Password"
                        name="password" required />

                    <div class="error_block">
                        <?php if (!empty($errors['username'])): ?>
                            <div class="error">
                                <?= $errors['username'] ?>
                            </div>
                        <?php endif; ?>
                    </div>
                    <button type="submit">
                        <div class="bt-name">Login</div>
                    </button>
                </form>
                <!-- <a href="#"> <label class="forgot">Forgot Password</label></a> -->
            </div>
        </div>
    </div>
</body>

</html>