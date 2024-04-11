<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>temp3 Dashboard</title>
   
</head>
<style>
    @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap');

    .temp3-subsection-1 {
        background-color: var(--text-color);
        padding: 10px 10px 30px 35px;
        border-radius: 6px;
        margin: 7px 4px 7px 4px;
        height: auto;
    }

    .temp3-sub-title {

        color: #17376E;
        font-family: Poppins;
        font-size: 1.5vw;
        font-style: normal;
        font-weight: 600;
        padding-top: 1vw;
        padding-bottom: 1vw;
        padding-left: 5vw;
    }

    .flex {
        display: flex;
        flex-direction: row;
        padding-top: 0.4vw;
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

        font-size: 1.2vw;
        font-weight: 600;
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
        /* width: 12vw; */
        flex: 10%;

    }

    .admission-button2 {
        padding: 0.5% 0.5% 0.5% 1%;
        background-color: #17376E;
        color: #fff;
        text-decoration: none;
        padding-top: 0.2vw;
        text-align: center;

        border: none;
        border-radius: 5px;
        cursor: pointer;

        font-size: 0.8vw;
        width: 12vw;
        flex: 10%;
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
        padding-right: 11vw;



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

    .form-element1 {
        width: 100%;
    }

    .form-element2 {
        width: 100%;
    }

    .form-element3 {

        padding-right: 11vw;
        padding-left: 5vw;
    }

    .form-element4 {

        padding-right: 11vw;
        padding-left: 5vw;
    }

    .temp2-footer {
        margin-top: auto;
    }

    .label-name {
        color: #17376E;
        font-weight: 500;
        font-size: 0.9vw;
    }
</style>

<body>
 <form action="" method="POST">


                <div class=name>
                    <img src="<?= ROOT ?>assets/dr/imgano.png">
                    <!-- <p><h2><?= $student->name ?></h2></p> -->
                    <div class="flex">
                        <div class="student-name">
                            <p>
                                Senudi Disakya Muthugala
                            </p>
                        </div>
                        <a href="" class="admission-button" download>Cancel</a>
                        <div class="form-element">
                            <button type="submit"  name="update_user_data" class="admission-button2">Save Data</button>
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
                                <span class="error">First name is required.</span>
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
                                <span class="error">Last name is required.</span>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>

                <div class="form-element">
                    <label for="email">
                        <div class="label-name">Email</div>
                    </label>
                    <input type="text" placeholder="<?= $user->email ?>" id="email" name="email" class="form-control" value="<?= $user->email ?>">
                    <?php if (isset($_POST['update_user_data']) && empty($_POST['email'])) : ?>
                        <span class="error">Email is required.</span>
                    <?php endif; ?>
                </div>
                <div class="form-element">
                    <label for="role">
                        <div class="label-name">Phone Number</div>
                    </label>
                    <input type="text" placeholder="<?= $user->phoneNo ?>" id="phoneNo" name="phoneNo" class="form-control" value="<?= $user->phoneNo ?>">
                    <?php if (isset($_POST['update_user_data']) && empty($_POST['phoneNo'])) : ?>
                        <span class="error">Phone Number is required.</span>
                    <?php endif; ?>

                </div>

            </form>

        </div>

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