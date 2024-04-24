<?php $this->view('components/navside-bar/header', $data) ?>
<?php $this->view('components/navside-bar/sidebar', $data) ?>
<?php $this->view('components/navside-bar/footer', $data) ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>temp3 Dashboard</title>

</head>
<style>
    @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap');

    * {
        font-family: 'Poppins', sans-serif;
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

    :root {
        --body-color: #E2E2E2;
        --sidebar-color: #17376E;
        --primary-color: #9AD6FF;
        --text-color: #ffffff;
        --tran-02: all 0.2s ease;
        --tran-03: all 0.3s ease;
        --tran-04: all 0.4s ease;
        --tran-05: all 0.5s ease;
    }

    .temp3-home {
        height: auto;
        left: 250px;
        position: relative;
        width: calc(100% - 250px);
        transition: var(--tran-05);
        background: var(--body-color);
    }

    .temp3-title {
        font-size: 1.8vw;
        font-weight: 500;
        color: black;
        padding: 10px 0px 10px 50px;
        background-color: var(--text-color);
        border-radius: 6px;
        margin: 7px 4px 7px 4px;
    }

    .sidebar.close~.temp3-home {
        left: 88px;
        width: calc(100% - 88px);
    }




    .temp3-subsection-1 {
        background-color: var(--text-color);
        padding: 10px 10px 30px 50px;
        border-radius: 6px;
        margin: 7px 4px 7px 4px;
        min-height: 74vh;
    }

    .temp3-sub-title {

        color: #17376E;
        font-family: Poppins;
        font-size: 1.5vw;
        font-style: normal;
        font-weight: 600;
        padding-top: 1vw;
        padding-bottom: 1vw;
   
    }

    .flex {
        display: flex;
        flex-direction: row;
        padding-top: 1vw;
        padding-right: 11vw;

    }

    .name {


        flex-direction: column;
        align-items: baseline;
        row-gap: 10px;
        padding-left: 5vw;
        padding-bottom: 2vw;


    }

    .name img {
        padding-left: 2vw;
        width: 15vw;
        height: 12vw;

    }

    .student-name {
        /* padding-right: 30vw; */
        flex: 60%;
padding-left: 1.5vw;
        font-size: 1.2vw;
        font-weight: 500;
        color: #17376e;
    }

    .admission-button {

        background-color: #ffffff;
        border: 1px solid #17376E;
        color: #17376E;
        text-decoration: none;
        padding-top: 0.2vw;
        text-align: center;

        border-radius: 5px;
        cursor: pointer;

        font-size: 0.8vw;
        margin-right: 2vw;
        width: 12vw;
        

    }

    .admission-button2 {

        background-color: #17376E;
        color: #fff;
        text-decoration: none;
        padding-top: 0.3vw;
        padding-bottom: 0.3vw;
        text-align: center;

        border: none;
        border-radius: 5px;
        cursor: pointer;

        font-size: 0.8vw;
        width: 12vw;
       
    }

    .admission-button2:hover {
        color: #17376e;
        background-color: white;
        border: 1px solid var(--colour-secondary-1, #17376e);


    }

    input[type=text],
    select {
        width: 100%;
        padding: 12px 20px;
        margin: 4px 0;
        display: inline-block;
        border: 1px solid #ccc;
        border-radius: 4px;
        box-sizing: border-box;
        height: 2vw;
        font-size: 0.8vw;

    }

    .user-data {
        display: flex;
        gap: 30px;
        flex-direction: row;
        margin-right: 9vw;
    }

    .column-01 {
        display: flex;
        flex-direction: column;
        width: 50vw;
    }

    .column-02 {
        display: flex;
        flex-direction: column;
        width: 50vw;
    }

  

    .form-element3 {
        margin-right: 9vw;
    }

    .form-element4 {
        margin-right: 9vw;
    }

    .temp2-footer {
        margin-top: auto;
    }

    .label-name {
        color: #17376E;
        font-weight: 500;
        font-size: 0.9vw;
    }

    .error {
        color: red;
        font-size: 0.7vw;
    }

    .error-message {
        font-size: 0.8vw;
        color: red;
    }
</style>

<body>
    <div class="temp3-home">
        <div class="temp3-title">Settings</div>
        <div class="temp3-subsection-1">
            <div class="temp3-sub-title">
                Account Settings

            </div>

            <form action="" method="POST">


                <div class=name>
                    <img src="<?= ROOT ?>assets/dr/imgano.png">
                 
                    <div class="flex">
                        <div class="student-name">
                            <p>
                            USER : <?= $user->fname ?> <?= $user->lname ?>
                            </p>
                        </div>
                        <a href="" class="admission-button">Cancel</a>
                        <div class="form-element">
                            <button type="submit" name="update_user_data" class="admission-button2">Save Data</button>
                        </div>
                    </div>

                </div>

                <div class="user-data">

                    <div class="column-01">

                        <div class="form-element">
                            <label for="fname">
                                <div class="label-name">First Name</div>
                            </label>
                            <input type="text" placeholder="<?= $user->fname ?>" id="fname" name="fname" class="form-control" value="<?= $user->fname ?>">
                            <?php if (isset($_POST['update_user_data']) && empty($_POST['fname'])) : ?>
                                <span class="error">*First name is required.</span>
                            <?php endif; ?>
                        </div>
                    </div>
                    <div class="column-02">
                        <div class="form-element">
                            <label for="lname">
                                <div class="label-name">Last Name</div>
                            </label>
                            <input type="text" placeholder="<?= $user->lname ?>" id="lname" name="lname" class="form-control" value="<?= $user->lname ?>">

                            <?php if (isset($_POST['update_user_data']) && empty($_POST['lname'])) : ?>
                                <span class="error">*Last name is required.</span>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>

                <div class="form-element3">
                    <label for="email">
                        <div class="label-name">Email</div>
                    </label>
                    <input type="text" placeholder="<?= $user->email ?>" id="email" name="email" class="form-control" value="<?= $user->email ?>">
                    <?php if (isset($_POST['update_user_data']) && empty($_POST['email'])) : ?>
                        <span class="error">*Email is required.</span>
                    <?php endif; ?>
                </div>
                <div class="form-element4">
                    <label for="role">
                        <div class="label-name">Phone Number</div>
                    </label>
                    <input type="text" placeholder="<?= $user->phoneNo ?>" id="phoneNo" name="phoneNo" class="form-control" value="<?= $user->phoneNo ?>">
                    <?php if (isset($_POST['update_user_data']) && empty($_POST['phoneNo'])) : ?>
                        <span class="error">*Phone Number is required.</span>
                    <?php endif; ?>

                    <?php if (isset($data['error'])) : ?>
                        <div class="error-message">
                            <?php echo $data['error']; ?>
                        </div>
                    <?php endif; ?>

                </div>

            </form>

        </div>

    </div>

    <div class="temp3-footer">
        <?php $this->view('components/footer/index', $data) ?>
    </div>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            var firstNameInput = document.getElementById('fname');
            var lastNameInput = document.getElementById('lname');
            var emailInput = document.getElementById('email');
            var phoneNoInput = document.getElementById('phoneNo');
            var submitButton = document.getElementById('submitBtn');
            var errorMessage = document.getElementById('fname-error');
            var errorMessage = document.getElementById('lname-error');
            var errorMessage = document.getElementById('email-error');
            var errorMessage = document.getElementById('phoneNo-error');


            function checkFirstName() {
                if (firstNameInput.value.trim() === '') {
                    submitButton.disabled = true;
                    errorMessage.style.display = 'block';
                } else {
                    submitButton.disabled = false;
                    errorMessage.style.display = 'none';
                }
            }

            function checkLastName() {
                if (firstNameInput.value.trim() === '') {
                    submitButton.disabled = true;
                    errorMessage.style.display = 'block';
                } else {
                    submitButton.disabled = false;
                    errorMessage.style.display = 'none';
                }
            }

            function checkEmail() {
                if (firstNameInput.value.trim() === '') {
                    submitButton.disabled = true;
                    errorMessage.style.display = 'block';
                } else {
                    submitButton.disabled = false;
                    errorMessage.style.display = 'none';
                }
            }

            function checkPhoneNo() {
                var phoneNo = phoneNoInput.value.trim();
                var phoneNoPattern = /^\d{10}$/; // Regex pattern to match exactly 10 digits

                if (!phoneNoPattern.test(phoneNo)) {
                    submitButton.disabled = true;
                    errorMessage.textContent = "Phone number is not valid. It should contain exactly 10 digits.";
                    errorMessage.style.display = 'block';
                } else {
                    submitButton.disabled = false;
                    errorMessage.textContent = ""; // Clear error message
                    errorMessage.style.display = 'none';
                }
            }


            checkFirstName();
            checkLastName();
            checkEmail();
            checkPhoneNo();

            firstNameInput.addEventListener('input', checkFirstName);
            lastNameInput.addEventListener('input', checkLastName);
            emailInput.addEventListener('input', checkEmail);
            phoneNoInput.addEventListener('input', checkPhoneNo);
        });
    </script>
</body>

</html>