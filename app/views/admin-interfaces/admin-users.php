<?php
    $role = "Admin";

    include_once '../../components/navside-bar/header.php';
    include_once '../../components/navside-bar/sidebar.php';
    include_once '../../components/navside-bar/footer.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <link rel="stylesheet" href="./admin-dashboard.css"> -->
    <title>Admin Dashboard</title>
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

.profile-message {
    color: #10344D;
    font-family: Poppins;
    font-size: 22px;
    font-style: normal;
    font-weight: 600;
    margin: 40px;
    display: flex;
    flex-direction: row;
    justify-content: center;
    align-items: center;
    flex-wrap: wrap;
    background-color: #f8d7da;
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


    max-width: 1200px;
    margin-left: auto;
    margin-right: auto;
    padding-left: 10px;
    padding-right: 10px;

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
    Show 4 more colors check Icon · 14 x 14
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
    padding: 10px 10px 20% 35px;
    border-radius: 6px;
    margin: 7px 4px 7px 4px;
}

.admin-sub-title {
    /* display: flex;
    flex-direction: column;
    justify-content: center; */
    color: #17376E;
    font-family: Poppins;
    font-size: 22px;
    font-style: normal;
    font-weight: 600;
    margin: 40px;

}

.user-create-bt {
    display: flex;
    margin-left: auto;
    align-items: flex-end;
    flex-direction: column;
    margin-bottom: 100px;
    width: 20%;

}
</style>
<style>
* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

.body {
    height: 100vh;
}

.center {
    /* position: absolute; */
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
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
    width: 500px;
    padding: 20px 30px;
    box-shadow: 2px 2px 5px rgba(0, 0, 0, 0.15);
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
    padding: 10px;
    outline: none;
    border: 1px solid #aaa;
    border-radius: 5px;
}

.popup .form .form-element input[type="checkbox"] {
    margin-right: 5px;
}

.popup .form .form-element button {
    padding: 10px;
    height: 5vh;
    width: 30%;
    border: none;
    outline: none;
    background: #17376e;
    color: #fff;
    font-size: 16px;
    cursor: pointer;
    border-radius: 10px;
}

.popup .form .form-element a {
    display: block;
    text-align: right;
    font-size: 15px;
    color: #1a79ca;
    text-decoration: none;
    font-weight: 600;
}

.user-data {
    display: flex;
    gap: 30px;
    flex-direction: row;
    width: 100%;
    justify-content: center
}

.column-01 {
    display: flex;
    flex-direction: column;
}

.column-01 {
    display: flex;
    flex-direction: column;
}

#form-element-dropdown-create,
#form-element-dropdown-update {
    width: 100%;
    padding: 10px;
    outline: none;
    border: 1px solid #aaa;
    border-radius: 5px;
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
    height: 5vh;
    border-radius: 12px;
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
    margin-top: 5px;
    margin-left: 5px;
}
</style>

<!-- button CSS -->
<style>
root {
    ----colour-secondar-1: #17376E;
}

button {
    color: #fff;
    width: 80%;
    height: 5vh;
    border-radius: 12px;
    background: #17376e;
    box-shadow: 0px 3px 6px 0px rgba(0, 0, 0, 0.2);
    border: 0px;
    cursor: pointer;
}

.bt-name {
    font-size: 16px;
    font-weight: 500px;
    padding: 10px 10px 10px 10px;
}

button:hover {
    color: #17376e;
    background-color: white;
    border: 1px solid var(--colour-secondary-1, #17376e);
}
</style>

<body>
    <div class="admin-home">
        <div class="admin-title">Users</div>
        <div class="admin-subsection-1">
            <div class="admin-sub-title">
                <div class="user-create-bt">
                    <button class="center">
                        <div class="bt-name" id="show-login">Add User</div>
                    </button>
                </div>
                <div class="profile-message">

                    <?php if(message()):?>
                    <div class="error"><?=message('',true)?></div>
                    <?php endif;?>
                </div>
                <div class="container">
                    <ul class="responsive-table">
                        <li class="table-header">
                            <div class="col col-1">User</div>
                            <div class="col col-2">Role</div>
                            <div class="col col-3">Username</div>
                            <div class="col col-4">Password</div>
                            <div class="col col-5">Email</div>
                            <div class="col col-6"></div>
                        </li>
                        <li class="table-row">
                            <div class="col col-1" data-label="User">S.D. Saman Perera</div>
                            <div class="col col-2" data-label="Role">DR</div>
                            <div class="col col-3" data-label="User Name">DR001</div>
                            <div class="col col-4" data-label="Pasword">********</div>
                            <div class="col col-5" data-label="Email">saman12@gamil.com</div>
                            <div class="col col-6">
                                <div class="user-delete" id="delete-user">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="20" viewBox="0 0 18 20"
                                        fill="none">
                                        <path
                                            d="M1.5 4.99984H3.16667M3.16667 4.99984H16.5M3.16667 4.99984V16.6665C3.16667 17.1085 3.34226 17.5325 3.65482 17.845C3.96738 18.1576 4.39131 18.3332 4.83333 18.3332H13.1667C13.6087 18.3332 14.0326 18.1576 14.3452 17.845C14.6577 17.5325 14.8333 17.1085 14.8333 16.6665V4.99984H3.16667ZM5.66667 4.99984V3.33317C5.66667 2.89114 5.84226 2.46722 6.15482 2.15466C6.46738 1.8421 6.89131 1.6665 7.33333 1.6665H10.6667C11.1087 1.6665 11.5326 1.8421 11.8452 2.15466C12.1577 2.46722 12.3333 2.89114 12.3333 3.33317V4.99984M7.33333 9.1665V14.1665M10.6667 9.1665V14.1665"
                                            stroke="#667085" stroke-width="1.66667" stroke-linecap="round"
                                            stroke-linejoin="round" />
                                    </svg>
                                </div>
                                <div class="user-update" id="show-update">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20"
                                        fill="none">
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
                        <li class="table-row">
                            <div class="col col-1" data-label="User">S.D. Saman Perera</div>
                            <div class="col col-2" data-label="Role">DR</div>
                            <div class="col col-3" data-label="User Name">DR001</div>
                            <div class="col col-4" data-label="Pasword">********</div>
                            <div class="col col-5" data-label="Email">saman12@gamil.com</div>
                            <div class="col col-6">
                                <div class="user-delete" id="delete-user">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="20" viewBox="0 0 18 20"
                                        fill="none">
                                        <path
                                            d="M1.5 4.99984H3.16667M3.16667 4.99984H16.5M3.16667 4.99984V16.6665C3.16667 17.1085 3.34226 17.5325 3.65482 17.845C3.96738 18.1576 4.39131 18.3332 4.83333 18.3332H13.1667C13.6087 18.3332 14.0326 18.1576 14.3452 17.845C14.6577 17.5325 14.8333 17.1085 14.8333 16.6665V4.99984H3.16667ZM5.66667 4.99984V3.33317C5.66667 2.89114 5.84226 2.46722 6.15482 2.15466C6.46738 1.8421 6.89131 1.6665 7.33333 1.6665H10.6667C11.1087 1.6665 11.5326 1.8421 11.8452 2.15466C12.1577 2.46722 12.3333 2.89114 12.3333 3.33317V4.99984M7.33333 9.1665V14.1665M10.6667 9.1665V14.1665"
                                            stroke="#667085" stroke-width="1.66667" stroke-linecap="round"
                                            stroke-linejoin="round" />
                                    </svg>
                                </div>
                                <div class="user-update" id="show-update">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20"
                                        fill="none">
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

                        <li class="table-row">
                            <div class="col col-1" data-label="User">S.D. Saman Perera</div>
                            <div class="col col-2" data-label="Role">DR</div>
                            <div class="col col-3" data-label="User Name">DR001</div>
                            <div class="col col-4" data-label="Pasword">********</div>
                            <div class="col col-5" data-label="Email">saman12@gamil.com</div>
                            <div class="col col-6">
                                <div class="user-delete" id="delete-user">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="20" viewBox="0 0 18 20"
                                        fill="none">
                                        <path
                                            d="M1.5 4.99984H3.16667M3.16667 4.99984H16.5M3.16667 4.99984V16.6665C3.16667 17.1085 3.34226 17.5325 3.65482 17.845C3.96738 18.1576 4.39131 18.3332 4.83333 18.3332H13.1667C13.6087 18.3332 14.0326 18.1576 14.3452 17.845C14.6577 17.5325 14.8333 17.1085 14.8333 16.6665V4.99984H3.16667ZM5.66667 4.99984V3.33317C5.66667 2.89114 5.84226 2.46722 6.15482 2.15466C6.46738 1.8421 6.89131 1.6665 7.33333 1.6665H10.6667C11.1087 1.6665 11.5326 1.8421 11.8452 2.15466C12.1577 2.46722 12.3333 2.89114 12.3333 3.33317V4.99984M7.33333 9.1665V14.1665M10.6667 9.1665V14.1665"
                                            stroke="#667085" stroke-width="1.66667" stroke-linecap="round"
                                            stroke-linejoin="round" />
                                    </svg>
                                </div>
                                <div class="user-update" id="show-update">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20"
                                        fill="none">
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
                    </ul>
                </div>
            </div>
        </div>
        <!-- <div class="center">
            <button id="show-login">Login</button>
        </div> -->

        <!--Add new User-->

        <div class="popup" id="create-popup">
            <div class="close-btn" id="close-create-popup">
                &times;
            </div>
            <form method="post">
                <div class="popup-card">
                    <div class="form">
                        <h2>Create New User</h2>
                        <div class="user-data">
                            <div class="coloum-01">
                                <div class="form-element">
                                    <label for="fname">First Name</label>
                                    <input value="<?=set_value('fname')?>" name="fname" type="text" placeholder="Enter"
                                        id="fname"
                                        style="border: <?= !empty($errors['fname']) ? '1px solid red' : '1px solid #ccc' ?>;">
                                    <?php if(!empty($errors['fname'])):?>
                                    <div class="user-error" for="fname"><?=$errors['fname']?></div>
                                    <?php endif;?>
                                </div>
                                <div class="form-element">
                                    <label for="email">Email</label>
                                    <input value="<?=set_value('email')?>" name="email" type="text" placeholder="Enter"
                                        id="email"
                                        style="border: <?= !empty($errors['email']) ? '1px solid red' : '1px solid #ccc' ?>;">
                                    <?php if(!empty($errors['email'])):?>
                                    <div class="user-error" for="email"><?=$errors['email']?></div>
                                    <?php endif;?>
                                </div>
                                <div class="form-element">
                                    <label for="role">Role</label>
                                    <!-- <input type="password" placeholder="Enter" id="role"> -->
                                    <select name="role" id="form-element-dropdown-create">
                                        <option value="admin" class="form-element-dropdown-op"
                                            <?= (set_value('role') === 'admin') ? 'selected' : '' ?>>Admin</option>
                                        <option value="clark" <?= (set_value('role') === 'clark') ? 'selected' : '' ?>>
                                            Clark</option>
                                        <option value="director"
                                            <?= (set_value('role') === 'director') ? 'selected' : '' ?>>Director
                                        </option>
                                        <option value="dr" <?= (set_value('role') === 'dr') ? 'selected' : '' ?>>Deputy
                                            Registrar</option>
                                        <option value="sar" <?= (set_value('role') === 'sar') ? 'selected' : '' ?>>SAR
                                        </option>
                                        <option value="asar" <?= (set_value('role') === 'asar') ? 'selected' : '' ?>>
                                            Asst SAR</option>
                                    </select>

                                </div>
                            </div>
                            <div class="coloum-02">
                                <div class="form-element">
                                    <label for="lname">Last Name</label>
                                    <input value="<?=set_value('lname')?>" name="lname" type="text" placeholder="Enter"
                                        id="lname"
                                        style="border: <?= !empty($errors['lname']) ? '1px solid red' : '1px solid #ccc' ?>;">
                                    <?php if(!empty($errors['lname'])):?>
                                    <div class="user-error" for="lname"><?=$errors['lname']?></div>
                                    <?php endif;?>
                                </div>
                                <div class="form-element">
                                    <label for="phoneNo">Phone Number</label>
                                    <input value="<?=set_value('phoneNo')?>" name="phoneNo" type="text"
                                        placeholder="Enter" id="phoneNo"
                                        style="border: <?= !empty($errors['phoneNo']) ? '1px solid red' : '1px solid #ccc' ?>;">
                                    <?php if(!empty($errors['phoneNo'])):?>
                                    <div class="user-error" for="phoneNo"><?=$errors['phoneNo']?></div>
                                    <?php endif;?>

                                </div>
                                <div class="form-element">
                                    <label for="username">Username</label>
                                    <input value="<?=set_value('username')?>" name="username" type="text"
                                        placeholder="Enter" id="username"
                                        style="border: <?= !empty($errors['username']) ? '1px solid red' : '1px solid #ccc' ?>;">
                                    <?php if(!empty($errors['username'])):?>
                                    <div class="user-error" for="username"><?=$errors['username']?></div>
                                    <?php endif;?>
                                </div>
                            </div>
                        </div>

                        <div class="form-element">
                            <button type="submit">Add User</button>
                        </div>

                    </div>
                </div>
            </form>
        </div>
        <script>
        document.querySelector("#show-login").addEventListener("click", function() {
            document.querySelector("#create-popup").classList.add("active");
        });
        document.querySelector(".close-btn").addEventListener("click", function() {
            document.querySelector(".popup").classList.remove("active");
            console.log("clicked");
        });
        </script>

    </div>

    <!--Update User-->
    <div class="popup" id="update-popup">
        <div class="close-btn" id="close-update-popup">
            &times;
        </div>
        <form>
            <div class="popup-card">
                <div class="form">
                    <h2>Update User Details</h2>
                    <div class="user-data">

                        <div class="coloum-01">
                            <div class="form-element">
                                <label for="fname">First Name</label>
                                <input type="text" placeholder="Enter" id="fname">
                            </div>
                            <div class="form-element">
                                <label for="email">Email</label>
                                <input type="text" placeholder="Enter" id="email">
                            </div>
                            <div class="form-element">
                                <label for="newpassword">New Password</label>
                                <input type="password" placeholder="Enter" id="newpassword">
                            </div>
                        </div>

                        <div class="coloum-02">
                            <div class="form-element">
                                <label for="lname">Last Name</label>
                                <input type="text" placeholder="Enter" id="fname">
                            </div>
                            <div class="form-element">
                                <label for="phoneNo">Phone Number</label>
                                <input type="text" placeholder="Enter" id="phoneNo">
                            </div>
                            <div class="form-element">
                                <label for="password">Confirm Password</label>
                                <input type="password" placeholder="Enter" id="role">
                            </div>
                        </div>

                    </div>
                    <div class="form-element">
                        <button>Update</button>
                    </div>


                </div>
            </div>
        </form>
    </div>
    <script>
    document.querySelector("#show-update").addEventListener("click", function() {
        document.querySelector("#update-popup").classList.add("active");
    });
    document.querySelector("#close-update-popup").addEventListener("click", function() {
        document.querySelector("#update-popup").classList.remove("active");
    });
    </script>

    </div>

    <!--Delete User-->

    <div class="popup" id="delete-popup">
        <div class="close-btn" id="close-delete-popup">
            &times;
        </div>
        <div class="delete-card">
            <div class="delete-img">
                <svg xmlns="http://www.w3.org/2000/svg" width="67" height="66" viewBox="0 0 67 66" fill="none">
                    <path
                        d="M33.5 63C50.0685 63 63.5 49.5685 63.5 33C63.5 16.4315 50.0685 3 33.5 3C16.9315 3 3.5 16.4315 3.5 33C3.5 49.5685 16.9315 63 33.5 63Z"
                        stroke="#E02424" stroke-width="6" stroke-linecap="round" stroke-linejoin="round" />
                    <path d="M33.5 21V33" stroke="#E02424" stroke-width="6" stroke-linecap="round"
                        stroke-linejoin="round" />
                    <path d="M33.5 45H33.53" stroke="#E02424" stroke-width="6" stroke-linecap="round"
                        stroke-linejoin="round" />
                </svg>
            </div>
            <div class="delete-text">
                <h2>Are you sure?</h2>
                <p>Do you really want to delete this user? This process cannot be undone.</p>
            </div>


            <div class="form-element">
                <button>Delete</button>
            </div>

        </div>
    </div>
    <script>
    
    document.querySelector("#delete-user").addEventListener("click", function() {
        document.querySelector("#delete-popup").classList.add("active");
    });

    document.querySelector("#close-delete-popup").addEventListener("click", function() {
        document.querySelector("#delete-popup").classList.remove("active");
    });
    </script>
    <div class="admin-footer">
        <?php
                include $ROOT.'components/footer/index.php';

               
        ?>
    </div>
    </div>
</body>

</html>