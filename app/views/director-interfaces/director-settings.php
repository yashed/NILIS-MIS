<?php
$role = "director";
$data['role'] = $role;

?>

<?php $this->view('components/navside-bar/header', $data) ?>
<?php $this->view('components/navside-bar/sidebar', $data) ?>
<?php $this->view('components/navside-bar/footer', $data) ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Settings</title>

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
        /* padding: 10px 10px 30px 60px; */
        padding-left: 9vw;
        padding-bottom: 4vw;
        padding-top: 3vw;
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
        padding-bottom: 2vw;
    }


    .flex {
        display: flex;
        flex-direction: row;
        padding-top: 1vw;
        padding-right: 11vw;
        gap: 5vw;
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
        width: 12vw;
        height: 10vw;

    }

    .student-name {
        /* padding-right: 30vw; */
        flex-direction: row;
        padding-left: 2vw;

        font-size: 1.2vw;
        font-weight: 500;
        color: #17376e;
    }

    .button-container {
        margin-left: 15vw;
        display: flex;
        gap: 10px;
    }

    .cancelBtn {

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

    .saveBtn {

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

    .saveBtn:hover {
        color: #17376e;
        background-color: white;
        border: 1px solid var(--colour-secondary-1, #17376e);
    }

    #editBtn {

        background-color: #17376E;
        color: #fff;
        text-decoration: none;
        padding-top: 0.3vw;
        padding-bottom: 0.3vw;
        text-align: center;
        margin-left: 30vw;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        font-size: 0.8vw;
        width: 12vw;

    }

    #editBtn:hover {
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

    /* #editButtons {
            display: none;
            display: flex;
            flex-direction: column; 
        }   */
</style>

<body>
    <div class="temp3-home">
        <div class="temp3-title">Account Settings</div>
        <div class="temp3-subsection-1">


            <form action="" method="POST" id="settingsForm">
                <!-- First Name -->
                <div class="name">
                    <img src="<?= ROOT ?>assets/dr/imgano.png">
                    <div class="flex">
                        <div class="student-name">
                            <p>
                                <?= $user->fname ?> <?= $user->lname ?>
                            </p>
                        </div>
                        <div id="editButtons" style="display: none;">
                            <div class="button-container">
                                <button class="cancelBtn" id="cancelBtn">Cancel</button>
                                <button type="submit" name="update_user_data" class="saveBtn" id="saveBtn">Save Data</button>
                            </div>
                        </div>
                        <div id="editButton">
                            <button id="editBtn">Edit</button>
                        </div>
                    </div>
                </div>

                <!-- First Name Input -->
                <div class="user-data">
                    <div class="column-01">
                        <div class="form-element">
                            <label for="fname">
                                <div class="label-name">First Name</div>
                            </label>
                            <input type="text" placeholder="<?= $user->fname ?>" id="fname" name="fname" class="form-control" value="<?= $user->fname ?>">
                            <span class="error" id="fname-error" style="display: none;"></span>
                        </div>
                    </div>

                    <!-- Last Name Input -->
                    <div class="column-02">
                        <div class="form-element">
                            <label for="lname">
                                <div class="label-name">Last Name</div>
                            </label>
                            <input type="text" placeholder="<?= $user->lname ?>" id="lname" name="lname" class="form-control" value="<?= $user->lname ?>">
                            <span class="error" id="lname-error" style="display: none;"></span>
                        </div>
                    </div>
                </div>

                <!-- Email Input -->
                <div class="form-element3">
                    <label for="email">
                        <div class="label-name">Email</div>
                    </label>
                    <input type="text" placeholder="<?= $user->email ?>" id="email" name="email" class="form-control" value="<?= $user->email ?>">
                    <!-- <span class="error" id="email-error" style="display: none;">*Email is required.</span> -->

                </div>

                <!-- Phone Number Input -->
                <div class="form-element4">
                    <label for="phoneNo">
                        <div class="label-name">Phone Number</div>
                    </label>
                    <input type="text" placeholder="<?= $user->phoneNo ?>" id="phoneNo" name="phoneNo" class="form-control" value="<?= $user->phoneNo ?>">
                    <span class="error" id="phoneNo-error" style="display: none;"></span>

                    <!-- <?php if (isset($data['error'])) : ?>
                        <div class="error-message">
                            <?php echo $data['error']; ?>
                        </div>
                    <?php endif; ?> -->
                    
                </div>
            </form>
        </div>
    </div>

    <div class="dr-footer">
        <?php $this->view('components/footer/index', $data) ?>
    </div>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            // Initially set the input fields to readonly mode
            var firstNameInput = document.getElementById('fname');
            var lastNameInput = document.getElementById('lname');
            var emailInput = document.getElementById('email');
            var phoneNoInput = document.getElementById('phoneNo');
            var submitButton = document.getElementById('saveBtn');

            // Function to toggle read-only mode
            function setReadOnlyMode(value) {
                firstNameInput.readOnly = value;
                lastNameInput.readOnly = value;
                emailInput.readOnly = value;
                phoneNoInput.readOnly = value;
            }
            setReadOnlyMode(true);

            // Function to check if the first name is empty
            function checkFirstName() {
                var firstNameError = document.getElementById('fname-error');
                if (firstNameInput.value.trim() === '') {
                    submitButton.disabled = true;
                    firstNameError.textContent = "*First name is required.";
                    firstNameError.style.display = 'block';
                    return false; // Return false if first name is empty
                } else {
                    submitButton.disabled = false;
                    firstNameError.style.display = 'none';
                    return true; // Return true if first name is not empty
                }
            }

            function checkLastName() {
                var lastNameError = document.getElementById('lname-error');

                if (lastNameInput.value.trim() === '') {
                    submitButton.disabled = true;
                    lastNameError.textContent = "*Last name is required.";
                    lastNameError.style.display = 'block';
                    return false;
                } else {
                    submitButton.disabled = false;
                    lastNameError.textContent = "";
                    lastNameError.style.display = 'none';
                    return true;
                }
            }


            // Function to check if the phone number is empty and valid
            function checkPhoneNo() {
                var phoneNoError = document.getElementById('phoneNo-error');
                var phoneNo = phoneNoInput.value.trim();
                var phoneNoPattern = /^\d{10}$/; // Regex pattern to match exactly 10 digits

                if (!phoneNoPattern.test(phoneNo)) {
                    submitButton.disabled = true;
                    phoneNoError.textContent = "Phone number is not valid. It should contain exactly 10 digits.";
                    phoneNoError.style.display = 'block';
                    return false;
                } else {
                    submitButton.disabled = false;
                    phoneNoError.textContent = "";
                    phoneNoError.style.display = 'none';
                    return true;
                }
            }

            // Function to check the entire form before submission
            function checkForm() {
                var isFirstNameValid = checkFirstName();
                var isLastNameValid = checkLastName();
                var isPhoneNoValid = checkPhoneNo();

                return isFirstNameValid && isLastNameValid && isPhoneNoValid;
            }

            // Add event listeners for input fields
            firstNameInput.addEventListener('input', checkFirstName);
            lastNameInput.addEventListener('input', checkLastName);
            phoneNoInput.addEventListener('input', checkPhoneNo);

            
            // Add event listener for form submission
            document.getElementById("settingsForm").addEventListener("submit", function(event) {
                if (!checkForm()) {
                    event.preventDefault(); // Prevent form submission if form is invalid
                }
            });

            // Add event listener for "Edit" button
            document.getElementById("editBtn").addEventListener("click", function(event) {
                event.preventDefault(); // Prevent default link behavior
                // Enable editing fields
                document.getElementById("editButton").style.display = "none";
                document.getElementById("editButtons").style.display = "block";

                function setReadOnlyMode2(value) {
                    firstNameInput.readOnly = value;
                    lastNameInput.readOnly = value;
                    emailInput.readOnly = true;
                    phoneNoInput.readOnly = value;
                }
                setReadOnlyMode2(false);
            });

            document.getElementById("cancelBtn").addEventListener("click", function() {
                window.location.reload();
            });

        });
    </script>
</body>

</html>