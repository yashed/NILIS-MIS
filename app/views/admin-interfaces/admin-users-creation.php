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
                                <?php if (!empty($errors['fname'])) : ?>
                                <div class="user-error" for="fname"><?= $errors['fname'] ?></div>
                                <?php endif; ?>
                            </div>
                            <div class="form-element">
                                <label for="email">Email</label>
                                <input value="<?= set_value('email') ?>" name="email" type="text" placeholder="Enter"
                                    id="email"
                                    style="border: <?= !empty($errors['email']) ? '1px solid red' : '1px solid #ccc' ?>;">
                                <?php if (!empty($errors['email'])) : ?>
                                <div class="user-error" for="email"><?= $errors['email'] ?></div>
                                <?php endif; ?>
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
                                    <option value="dr" <?= (set_value('role') === 'dr') ? 'selected' : '' ?>>
                                        Deputy
                                        Registrar</option>
                                    <option value="sar" <?= (set_value('role') === 'sar') ? 'selected' : '' ?>>
                                        SAR
                                    </option>
                                    <option value="asar" <?= (set_value('role') === 'asar') ? 'selected' : '' ?>>
                                        Asst SAR</option>
                                </select>

                            </div>
                        </div>
                        <div class="coloum-02">
                            <div class="form-element">
                                <label for="lname">Last Name</label>
                                <input value="<?= set_value('lname') ?>" name="lname" type="text" placeholder="Enter"
                                    id="lname"
                                    style="border: <?= !empty($errors['lname']) ? '1px solid red' : '1px solid #ccc' ?>;">
                                <?php if (!empty($errors['lname'])) : ?>
                                <div class="user-error" for="lname"><?= $errors['lname'] ?></div>
                                <?php endif; ?>
                            </div>
                            <div class="form-element">
                                <label for="phoneNo">Phone Number</label>
                                <input value="<?= set_value('phoneNo') ?>" name="phoneNo" type="text"
                                    placeholder="Enter" id="phoneNo"
                                    style="border: <?= !empty($errors['phoneNo']) ? '1px solid red' : '1px solid #ccc' ?>;">
                                <?php if (!empty($errors['phoneNo'])) : ?>
                                <div class="user-error" for="phoneNo"><?= $errors['phoneNo'] ?></div>
                                <?php endif; ?>

                            </div>
                            <div class="form-element">
                                <label for="username">Username</label>
                                <input value="<?= set_value('username') ?>" name="username" type="text"
                                    placeholder="Enter" id="username"
                                    style="border: <?= !empty($errors['username']) ? '1px solid red' : '1px solid #ccc' ?>;">
                                <?php if (!empty($errors['username'])) : ?>
                                <div class="user-error" for="username"><?= $errors['username'] ?></div>
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

<script>
document.querySelector("#show-login").addEventListener("click", function() {
    document.querySelector("#create-popup").classList.add("active");
});

document.querySelector(".close-btn").addEventListener("click", function() {
    document.querySelector(".popup").classList.remove("active");
    console.log("clicked");
});
</script>