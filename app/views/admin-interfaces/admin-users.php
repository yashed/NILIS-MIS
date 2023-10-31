<?php
    $role = "Admin";
    $data['role'] = $role;

    // include_once '../../components/navside-bar/header.php';
    // include_once '../../components/navside-bar/sidebar.php';
    // include_once '../../components/navside-bar/footer.php';
?>

<?php $this->view('components/navside-bar/header',$data) ?>
<?php $this->view('components/navside-bar/sidebar',$data) ?>
<?php $this->view('components/navside-bar/footer',$data) ?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="http://localhost/NILIS-MIS/public/css/admin-users.css">
    <title>Admin Dashboard</title>
</head>



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
                            <div class="col col-4">Phone No</div>
                            <div class="col col-5">Email</div>
                            <div class="col col-6"></div>
                        </li>
                        <?php foreach($users as $user):?>
                        <li class="table-row">
                            <div class="col col-1" data-label="User"> <?=$user->fname?> <?=$user->lname?></div>
                            <div class="col col-2" data-label="Role"><?=$user->role?></div>
                            <div class="col col-3" data-label="User Name"><?=$user->username?></div>
                            <div class="col col-4" data-label="phoneNo"><?=$user->phoneNo?></div>
                            <div class="col col-5" data-label="Email"><?=$user->email?></div>
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
                        <?php endforeach;?>

                       
                    </ul>
                </div>
            </div>
        </div>
      

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
    <?php $this->view('admin-interfaces/admin-user-update') ?>
    

    <!--Delete User-->

    
    
    <div class="admin-footer">

        <?php $this->view('components/footer/index',$data) ?>


    </div>
    </div>
</body>

</html>