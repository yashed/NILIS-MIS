<?php
$role = "Admin";
$data['role'] = $role;
if (!empty($errors)) {
    $data['errors'] = $errors;
}
// include_once '../../components/navside-bar/header.php';
// include_once '../../components/navside-bar/sidebar.php';
// include_once '../../components/navside-bar/footer.php';
?>






<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <link rel="stylesheet" href="http://localhost/NILIS-MIS/public/css/admin-users.css"> -->
    <title>Admin Users</title>
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
        ----colour-secondar-1: #17376E;
        --sidebar-color: #17376E;
        --primary-color: #9AD6FF;
        --text-color: #ffffff;
        --tran-02: all 0.2s ease;
        --tran-03: all 0.3s ease;
        --tran-04: all 0.4s ease;
        --tran-05: all 0.5s ease;
    }

    .profile-message {
        color: #10344D;
        font-family: Poppins;
        font-size: 22px;
        border-radius: 10px;
        font-style: normal;
        font-weight: 600;
        margin: 40px;
        display: flex;
        flex-direction: row;
        justify-content: center;
        align-items: center;
        flex-wrap: wrap;
        background-color: #f8d7da;
        height: 5vh;
    }

    .error-message-profile {
        padding: 0px 70px 0px 70px;
        width: 100%;
    }

    .admin-home {
        height: 100vh;
        left: 250px;
        position: relative;
        width: calc(100% - 250px);
        transition: var(--tran-05);
        background: var(--body-color);
    }

    .container {
        /* max-width: 1200px;
    margin-left: auto;
    margin-right: auto;
    padding-left: 10px;
    padding-right: 10px; */
        width: 100%;
    }

    h2 {
        font-size: 26px;
        margin: 20px 0;
        text-align: center;
    }

    .responsive-table li {
        padding: 25px 30px;
        display: flex;
        justify-content: space-between;
        margin-bottom: 5px;
        font-size: 16px;
        font-weight: 400;
    }

    .table-header {
        background-color: #F9FAFB;
        font-size: 14px;
        text-transform: uppercase;
        color: var(--8A92A6-Text-Color-2, #8A92A6);
        letter-spacing: 0.03em;
        border-radius: 8px;
        border: 1px solid #EAECF0;
        background: #F9FAFB;
        border-radius: var(--border-radius-md, 8px) var(--border-radius-md, 8px) 0px 0px;
        border: 1px solid #EAECF0;
        background: #F9FAFB;
    }

    .table-row {
        background-color: #ffffff;
        box-shadow: 0px 0px 9px 0px rgba(0, 0, 0, 0.1);
    }

    .col-1 {
        flex-basis: 50%;
    }

    .col-2 {
        flex-basis: 20%;
    }

    .col-3 {
        flex-basis: 30%;
    }

    .col-4 {
        flex-basis: 30%;
    }

    .col-5 {
        flex-basis: 50%;
    }

    .col-6 {
        flex-basis: 20%;
        display: flex;
        flex-direction: row;
        gap: 20px;
    }

    @media all and (max-width: 767px) {
        .table-header {
            display: none;
        }

        .table-row {}

        li {
            display: block;
        }

        .col {
            flex-basis: 200%;
        }

        .col {
            display: flex;
            padding: 10px 0;
        }
    }

    .admin-title {
        font-size: 30px;
        font-weight: 600;
        color: black;
        padding: 10px 0px 10px 32px;
        background-color: var(--text-color);
        border-radius: 6px;
        margin: 7px 4px 7px 4px;
    }

    .sidebar.close~.admin-home {
        left: 88px;
        width: calc(100% - 88px);
    }

    .admin-subsection-1 {
        background-color: var(--text-color);
        padding: 10px 10px 10% 35px;
        border-radius: 6px;
        margin: 7px 4px 7px 4px;
    }

    .admin-sub-title {
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        color: #17376E;
        font-family: Poppins;
        font-size: 22px;
        font-style: normal;
        font-weight: 600;
        margin: 20px 60px 20px 60px;
    }

    .user-create-bt {
        display: flex;
        margin-left: auto;
        align-items: flex-end;
        flex-direction: column;
        /* margin-bottom: 100px; */
        width: 100%;
    }

    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

    .body {
        height: 100vh;
    }

    .center {

        width: 20%
    }

    .center button {
        padding: 10px 20px;
        align-items: left;
        font-size: 20px;
        background: #000;
        color: #fff;
        cursor: pointer;
        border-radius: 5px;
    }

    .popup {
        position: fixed;
        top: -150%;
        left: 50%;
        transform: translate(-50%, -50%) scale(1.25);
        opacity: 0;
        background: #fff;
        width: 60%;
        /* height: 60vh; */
        padding: 40px;
        box-shadow: 17px 10px 400px rgba(0, 0, 0, 1.15);
        border-radius: 10px;
        transition: top 0ms ease-in-out 200ms, opacity 200ms ease-in-out 0ms, transform 200ms ease-in-out 0ms;
        z-index: 100;
    }

    .popup.active {

        top: 50%;
        opacity: 1;
        transform: translate(-50%, -50%) scale(1);
        transition: top 0ms ease-in-out 200ms, opacity 200ms ease-in-out 0ms, transform 200ms ease-in-out 0ms;
    }

    .popup .close-btn {
        position: absolute;
        right: 10px;
        top: 10px;
        width: 15px;
        height: 15px;
        background: #17376e;
        color: #ffffff;
        text-align: center;
        line-height: 15px;
        border-radius: 15px;
        cursor: pointer;
    }

    .popup .form h2 {
        text-align: center;
        color: #17376e;
        margin: 10px 0px 20px;
        font-size: 25px;
        font-weight: 600;
    }

    .popup .form .form-element {
        display: flex;
        margin: 15px 0px;
        align-content: flex-end;
        justify-content: center;
        align-items: flex-start;
        flex-direction: column;
        flex-wrap: wrap;
    }

    .popup .form .form-element label {
        font-size: 14px;
        color: #222;
    }

    .popup .form .form-element input[type="text"],
    .popup .form .form-element input[type="password"] {
        margin-top: 5px;
        display: block;
        width: 100%;
        padding: 12px;
        outline: none;
        border: 1px solid #aaa;
        border-radius: 5px;
    }

    #form-element-dropdown-create,
    #form-element-dropdown-update {
        margin-top: 5px;
        display: block;
        width: 100%;
        padding: 12px;
        outline: none;
        border: 1px solid #aaa;
        border-radius: 5px;
    }


    .popup .form .form-element a {
        display: block;
        text-align: right;
        font-size: 15px;
        color: #1a79ca;
        text-decoration: none;
        font-weight: 600;
    }

    .form-input-fields {
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        gap: 10px;
    }

    .user-create-submit {
        width: 40%;
    }

    .user-create-update {
        width: 40%;


    }

    .user-data {
        display: flex;
        gap: 30px;
        flex-direction: row;
        width: 100%;
        justify-content: center;
        align-items: center;
    }


    .data-input-fields {
        display: flex;
        flex-direction: row;
    }

    .coloum-01 {
        width: 50%;
    }


    .coloum-02 {
        width: 50%;

    }

    .form {
        width: 100%;
        display: flex;
        flex-direction: column;
        justify-content: center;
        gap: 10px;
    }



    .user-update {
        cursor: pointer;
    }

    .user-delete {
        cursor: pointer;
    }

    .delete-card {
        display: flex;
        flex-direction: column;
        gap: 20px;
        align-items: center
    }

    .delete-card button {
        width: 50%;
        padding: 0.5em 1em 0.5em 1em;
        border-radius: 8px;
        background: #17376e;
        box-shadow: 0px 3px 6px 0px rgba(0, 0, 0, 0.2);
        border: 0px;
        cursor: pointer;
    }

    .popup-card {
        display: flex;
        flex-direction: column;
        gap: 20px;
        align-items: center;
        flex-wrap: wrap;
    }

    .user-error {
        color: red;
        font-size: 10px;
        font-weight: 400;
        margin-left: 5px;
    }

    .admin-footer {
        display: flex;
        justify-content: flex-end;
        margin-top: 20px;
    }

    button {
        color: #fff;
        width: 100%;
        border-radius: 8px;
        background: #17376e;
        box-shadow: 0px 3px 6px 0px rgba(0, 0, 0, 0.2);
        border: 0px;
        cursor: pointer;
        padding: 0.5em 1em 0.5em 1em;
    }

    .bt-name {
        font-size: 16px;
        font-weight: 500px;

    }

    .delete-bt {
        width: 50%;
        height: 5vh;
        border-radius: 12px;
        background: #17376e;
    }

    button:hover {
        color: #17376e;
        background-color: white;
        border: 1px solid var(--colour-secondary-1, #17376e);
    }

    .button-fx {
        display: flex;
        width: 50%;
        flex-wrap: wrap;
        justify-content: center;
        align-items: center;
    }

    .main-body.active {
        filter: blur(5px);
        pointer-events: none;
        user-select: none;
        overflow: hidden;

    }

    .update-title-btn {
        display: flex;
        justify-content: center;
        align-items: center;
        justify-content: space-between
    }

    #rest-pw {
        width: 25%;
        padding: 0.5em 1em 0.5em 1em;
        border-radius: 8px;
        background: #fff;
        border: 1px solid #E02424;
        color: #E02424;
    }

    #rest-pw:hover {
        color: #fff;
        background-color: #E91401;
    }
</style>
<!--Add new User-->

<div class="popup" id="create-popup">
    <div class="close-btn" id="close-create-popup">
        &times;
    </div>
    <form method="post" id="user-creation-form">
        <div class="popup-card">
            <div class="form">
                <h2>Create New User</h2>
                <div class="form-input-fields">
                    <div class="user-data">
                        <div class="coloum-01">
                            <div class="form-element">
                                <label for="fname">First Name</label>
                                <input value="<?= set_value('fname') ?>" name="fname" type="text" placeholder="Enter"
                                    id="fname"
                                    style="border: <?= !empty($errors['fname']) ? '1px solid red' : '1px solid #ccc' ?>;">
                                <?php if (!empty($errors['fname'])): ?>
                                    <div class="user-error" for="fname">
                                        <?= $errors['fname'] ?>
                                    </div>
                                <?php endif; ?>
                            </div>
                            <div class="form-element">
                                <label for="email">Email</label>
                                <input value="<?= set_value('email') ?>" name="email" type="text" placeholder="Enter"
                                    id="email"
                                    style="border: <?= !empty($errors['email']) ? '1px solid red' : '1px solid #ccc' ?>;">
                                <?php if (!empty($errors['email'])): ?>
                                    <div class="user-error" for="email">
                                        <?= $errors['email'] ?>
                                    </div>
                                <?php endif; ?>
                            </div>
                            <div class="form-element">
                                <label for="role">Role</label>
                                <!-- <input type="password" placeholder="Enter" id="role"> -->
                                <select name="role" id="form-element-dropdown-create">
                                    <option value="admin" class="form-element-dropdown-op"
                                        <?= (set_value('role') === 'admin') ? 'selected' : '' ?>>Admin</option>
                                    <option value="clerk" <?= (set_value('role') === 'clark') ? 'selected' : '' ?>>
                                        Clerk</option>
                                    <option value="director" <?= (set_value('role') === 'director') ? 'selected' : '' ?>>
                                        Director
                                    </option>
                                    <option value="dr" <?= (set_value('role') === 'dr') ? 'selected' : '' ?>>
                                        DR</option>
                                    <option value="sar" <?= (set_value('role') === 'sar') ? 'selected' : '' ?>>
                                        SAR
                                    </option>
                                    <!-- <option value="asar" <?= (set_value('role') === 'asar') ? 'selected' : '' ?>>
                                        Asst SAR</option> -->
                                </select>

                            </div>
                        </div>
                        <div class="coloum-02">
                            <div class="form-element">
                                <label for="lname">Last Name</label>
                                <input value="<?= set_value('lname') ?>" name="lname" type="text" placeholder="Enter"
                                    id="lname"
                                    style="border: <?= !empty($errors['lname']) ? '1px solid red' : '1px solid #ccc' ?>;">
                                <?php if (!empty($errors['lname'])): ?>
                                    <div class="user-error" for="lname">
                                        <?= $errors['lname'] ?>
                                    </div>
                                <?php endif; ?>
                            </div>
                            <div class="form-element">
                                <label for="phoneNo">Phone Number</label>
                                <input value="<?= set_value('phoneNo') ?>" name="phoneNo" type="text"
                                    placeholder="Enter" id="phoneNo"
                                    style="border: <?= !empty($errors['phoneNo']) ? '1px solid red' : '1px solid #ccc' ?>;">
                                <?php if (!empty($errors['phoneNo'])): ?>
                                    <div class="user-error" for="phoneNo">
                                        <?= $errors['phoneNo'] ?>
                                    </div>
                                <?php endif; ?>

                            </div>
                            <div class="form-element">
                                <label for="username">Username</label>
                                <input value="<?= set_value('username') ?>" name="username" type="text"
                                    placeholder="Enter" id="username"
                                    style="border: <?= !empty($errors['username']) ? '1px solid red' : '1px solid #ccc' ?>;">
                                <?php if (!empty($errors['username'])): ?>
                                    <div class="user-error" for="username">
                                        <?= $errors['username'] ?>
                                    </div>
                                <?php endif; ?>
                            </div>
                            <input type=text name="cpassword" value="" hidden>
                            <input type=text name="newpassword" value="" hidden>
                        </div>
                    </div>
                    <div class="user-create-submit">
                        <button name="submit" value="add" type="submit">Add User</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>

<body>

    <div class="main-body" id="body">
        <?php $this->view('components/navside-bar/header', $data) ?>
        <?php $this->view('components/navside-bar/sidebar', $data) ?>
        <?php $this->view('components/navside-bar/footer', $data) ?>


        <div class="admin-home">
            <div class="admin-title">Users</div>
            <div class="admin-subsection-1">
                <div class="admin-sub-title">
                    <div class="user-create-bt">
                        <button class="center" id="show-login" onClick="onCreateUserClick()">
                            <div class="bt-name">Add User</div>
                        </button>
                    </div>
                    <div class="profile-message">
                        <?php
                        if (message()) {
                            if ($_SESSION['message_type'] == 'success') {
                                echo "<div class='error-message-profile' >" . message('', '', true) . "</div>";
                            } else {
                                echo "<div class='error-message-profile' style='color:red;'>" . message('', '', true) . "</div>";
                            }
                        }
                        ?>
                    </div>
                    <div class="container">
                        <ul class="responsive-table">
                            <li class="table-header">
                                <div class="col col-1">User</div>
                                <div class="col col-2">Role</div>
                                <div class="col col-3">Username</div>
                                <div class="col col-4">Phone No</div>
                                <div class="col col-5">Email</div>
                                <div class="col col-6"></div>
                            </li>
                            <?php foreach ($users as $user): ?>
                                <?php $json = json_encode($user); ?>
                                <li class="table-row">
                                    <div class="col col-1" data-label="User">
                                        <?= $user->fname ?>
                                        <?= $user->lname ?>
                                    </div>
                                    <div class="col col-2" data-label="Role">
                                        <?= $user->role ?>
                                    </div>
                                    <div class="col col-3" data-label="User Name">
                                        <?= $user->username ?>
                                    </div>
                                    <div class="col col-4" data-label="phoneNo">
                                        <?= $user->phoneNo ?>
                                    </div>
                                    <div class="col col-5" data-label="Email">
                                        <?= $user->email ?>
                                    </div>
                                    <div class="col col-6">
                                        <div onclick="onDeleteUserClick('<?= $user->id ?>')" class="user-delete"
                                            id="delete-user">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="20"
                                                viewBox="0 0 18 20" fill="none">
                                                <path
                                                    d="M1.5 4.99984H3.16667M3.16667 4.99984H16.5M3.16667 4.99984V16.6665C3.16667 17.1085 3.34226 17.5325 3.65482 17.845C3.96738 18.1576 4.39131 18.3332 4.83333 18.3332H13.1667C13.6087 18.3332 14.0326 18.1576 14.3452 17.845C14.6577 17.5325 14.8333 17.1085 14.8333 16.6665V4.99984H3.16667ZM5.66667 4.99984V3.33317C5.66667 2.89114 5.84226 2.46722 6.15482 2.15466C6.46738 1.8421 6.89131 1.6665 7.33333 1.6665H10.6667C11.1087 1.6665 11.5326 1.8421 11.8452 2.15466C12.1577 2.46722 12.3333 2.89114 12.3333 3.33317V4.99984M7.33333 9.1665V14.1665M10.6667 9.1665V14.1665"
                                                    stroke="#667085" stroke-width="1.66667" stroke-linecap="round"
                                                    stroke-linejoin="round" />
                                            </svg>
                                        </div>
                                        <div onclick="onUpdateUserClick('<?= $user->id ?>', '<?= $user->fname ?>', '<?= $user->lname ?>', '<?= $user->email ?>', '<?= $user->phoneNo ?>', '<?= $user->role ?>')"
                                            class="user-update" id="show-update">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                                viewBox="0 0 20 20" fill="none">
                                                <g clip-path="url(#clip0_1448_1971)">
                                                    <path
                                                        d="M14.168 2.49993C14.3868 2.28106 14.6467 2.10744 14.9326 1.98899C15.2186 1.87054 15.5251 1.80957 15.8346 1.80957C16.1442 1.80957 16.4507 1.87054 16.7366 1.98899C17.0226 2.10744 17.2824 2.28106 17.5013 2.49993C17.7202 2.7188 17.8938 2.97863 18.0122 3.2646C18.1307 3.55057 18.1917 3.85706 18.1917 4.16659C18.1917 4.47612 18.1307 4.78262 18.0122 5.06859C17.8938 5.35455 17.7202 5.61439 17.5013 5.83326L6.2513 17.0833L1.66797 18.3333L2.91797 13.7499L14.168 2.49993Z"
                                                        stroke="#667085" stroke-width="1.66667" stroke-linecap="round"
                                                        stroke-linejoin="round" />
                                                </g>
                                                <defs>
                                                    <clipPath id="clip0_1448_1971">
                                                        <rect width="20" height="20" fill="white" />
                                                    </clipPath>
                                                </defs>
                                            </svg>
                                        </div>
                                    </div>
                                </li>
                            <?php endforeach; ?>


                        </ul>
                    </div>
                </div>
            </div>

            <script>
                function onUpdateUserClick(userId, fname, lname, email, phoneNo, role) {
                    // Your existing code for onUpdateUserClick
                    onDataPopup('update-popup', {
                        id: userId,
                        fname: fname,
                        lname: lname,
                        email: email,
                        phoneNo: phoneNo,
                        role: role
                    });

                    // Add the following line to change the CSS class
                    document.querySelector("#body").classList.add("active");
                }

                //function for user delete popup
                function onDeleteUserClick(userId) {
                    onDataPopup('delete-popup', {
                        id: userId
                    });

                    document.querySelector("#body").classList.add("active");
                }
                //function for user create popup
                function onCreateUserClick() {
                    document.querySelector("#create-popup").classList.add("active");
                    document.querySelector("#body").classList.add("active");
                }

                document.addEventListener("DOMContentLoaded", function () {
                    const hasErrors = <?= json_encode(!empty($errors)) ?>;
                    console.log("Has Errors ", hasErrors);

                    const userForm = document.querySelector("#user-creation-form");
                    //user update popup
                    const openUpdatePopup = (id) => {
                        document.querySelector("#body").classList.add("active");
                        const popup = document.querySelector(`#update-popup`);
                        popup.classList.add("active");
                        const input = popup.querySelector(`[name="id"]`)
                        if (input) {
                            input.value = id;
                        }
                    }

                    //close popup
                    document.querySelector(".close-btn").addEventListener("click", function () {
                        document.querySelector(".popup").classList.remove("active");
                        document.querySelector("#body").classList.remove("active");
                        console.log("clicked");
                    });
                });
            </script>

            <div class="user-create-footer">
                <?php $this->view('components/footer/index', $data) ?>
            </div>

        </div>
    </div>

    <!--Update User-->
    <?php $this->view('admin-interfaces/admin-user-update', $data) ?>


    <!--Delete User-->

    <?php $this->view('admin-interfaces/admin-user-delete') ?>
    </div>
    <script src="<?= ROOT ?>js/form.js"></script>
    <script>

        // Echoing PHP variable into JavaScript
        var popupStatusCreate = <?php echo $popupCreate ? 'true' : 'false'; ?>;
        var popupStatusUpdate = <?php echo $popupUpdate ? 'true' : 'false'; ?>;
        console.log("Popup Status Create: ", popupStatusCreate);
        console.log("Popup Status Update: ", popupStatusUpdate);

        if (popupStatusCreate) {
            // Adding 'active' class to the popup and body elements
            document.querySelector("#create-popup").classList.add("active");
            document.querySelector("#body").classList.add("active");
        }

        if (popupStatusUpdate) {
            // Adding 'active' class to the popup and body elements
            document.querySelector("#update-popup").classList.add("active");
            document.querySelector("#body").classList.add("active");
        }

    </script>
</body>