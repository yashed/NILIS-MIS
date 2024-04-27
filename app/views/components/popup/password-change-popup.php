<style>
    @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap');

    .password-change-popup {
        position: absolute;
        width: 70%;
        height: 50%;
        background-color: #fff;
        display: flex;
        justify-content: flex-start;
        align-items: center;
        z-index: 100;
        flex-direction: column;
        border-radius: 8px;

        box-shadow: 28px 30px 34px -1px rgba(0, 0, 0, 0.1);
    }

    .pw-popup-header {
        width: 100%;
        height: 8vw;
        background-color: #17376e;
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        border-radius: 8px 8px 0px 0px;
        font-family: "Poppins";

    }

    .pw-popup-title {
        display: flex;
        justify-content: ;
        font-size: 1.8vw;
        color: white;
        font-weight: 600;

    }

    .input-passwords {
        width: 30vw;
        height: 3.5vw;
        margin-top: 20px;
        font-family: "Poppins";
        font-size: 1vw;
        font-weight: 350;
        padding-left: 20px;
        border-radius: 10px;
        border: 1px;
        border-color: rgba(255, 255, 255, 0.2);
        background-color: #f5f5f5;
    }

    button {
        color: #fff;
        width: 30vw;
        height: 3.5vw;
        padding: 8px 22px;
        border-radius: 10px;
        /* height: 6vh; */

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

    .password-error {
        font-family: "Poppins";
        font-size: 12px;
        color: #FF0000;
        font-weight: 300;
        text-align: left;
        margin-left: 10px;

    }

    .pw-change-form {
        display: flex;
        flex-direction: column;
        gap: 30px;
    }

    .pw-form-inputs {
        display: flex;
        flex-direction: column;

    }

    .pw-popup-body {
        height: 100%;
    }

    .pw-form-input-fields {
        display: flex;
        flex-direction: column;
        gap: 1.5vw;
    }

    form {
        display: flex;
        height: 100%;
        align-items: center;
        justify-content: center;
    }

    .pw-description {
        font-family: "Poppins";
        font-size: 0.9vw;
        color: #fff;
        font-weight: 400;
        text-align: center;

    }

    .show-passwords {
        margin-top: 10px;
        display: flex;
        font-family: "Poppins";
        flex-direction: row;
        font-size: 1vw;
    }

    .show-passwords input {
        border-radius: 10px;
    }
</style>


<div class="password-change-popup">
    <div class="pw-popup-header">
        <div class="pw-popup-title">
            Set New Password
        </div>
        <div class='pw-description'>
            For security purposes, please set a new password for your account.
        </div>
    </div>
    <div class="pw-popup-body">

        <form method="post">
            <div class="pw-change-form">
                <div class="pw-form-inputs">
                    <div class="pw-form-input-fields">
                        <input value="" class="input-passwords" type="password" placeholder="New Password" id="pass"
                            name="newPassword" required />

                        <input value="" class="input-passwords" type="password" placeholder="Confirm Password"
                            id="cpass" name="Cpassword" required />
                        <input type='text' name='id' value='<?= $_SESSION['USER_DATA']->id ?>' hidden />
                    </div>
                    <div class="password-error">
                        <?php if (!empty($errors['newPassword'])): ?>
                            <div>
                                <?= $errors['newPassword'] ?>
                            </div>
                        <?php endif; ?>
                        <?php if (!empty($errors['cpassword'])): ?>
                            <div>
                                <?= $errors['cpassword'] ?>
                            </div>
                        <?php endif; ?>
                    </div>
                    <div class="show-passwords">
                        <input type="checkbox" onclick="showResetPasswords()">
                        <div classs='pass-text'>Show Password</div>
                    </div>
                </div>
                <button type="submit">
                    <div class="bt-name">Change Password</div>
                </button>
            </div>
        </form>
    </div>
</div>
<script>
    function showResetPasswords() {
        console.log('show password');
        var x = document.getElementById("pass");
        var y = document.getElementById("cpass");
        if (x.type === "password" && y.type === "password") {
            x.type = "text";
            y.type = "text";
        } else {
            x.type = "password";
            y.type = "password";
        }
    }
</script>