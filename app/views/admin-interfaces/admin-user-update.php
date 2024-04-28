<div class="popup" id="update-popup">
    <div class="close-btn" id="close-update-popup">
        &times;
    </div>
    <form method="post">
        <div class="popup-card">
            <div class="form">
                <div class="update-title-btn">
                    <h2>Update User Profile</h2>
                    <button calss='pw-rest-btn' type="submit" id="rest-pw" name="reset-pw" value="reset-pw">Reset
                        Password</button>
                </div>
                <div class="form-input-fields">
                    <div class="user-data">
                        <input type="text" name="id" hidden>
                        <input type="text" name="role" value="<?= set_value('role') ?>" hidden>
                        <div class="coloum-01">
                            <div class="form-element">
                                <label for="fname">First Name</label>
                                <input type="text" placeholder="Enter" id="up-fname" name="fname"
                                    value="<?= set_value('fname') ?>"
                                    style="border: <?= !empty($errors['u-fname']) ? '1px solid red' : '1px solid #ccc' ?>;">
                                <?php if (!empty($errors['u-fname'])): ?>
                                    <div class="user-error" for="fname">
                                        <?= $errors['u-fname'] ?>
                                    </div>
                                <?php endif; ?>
                            </div>
                            <div class="form-element">
                                <label for="email">Email</label>
                                <input type="text" placeholder="Enter" id="up-email" name="email"
                                    value="<?= set_value('email') ?>"
                                    style="border: <?= !empty($errors['u-email']) ? '1px solid red' : '1px solid #ccc' ?>;">
                                <?php if (!empty($errors['u-email'])): ?>
                                    <div class="user-error" for="email">
                                        <?= $errors['u-email'] ?>
                                    </div>
                                <?php endif; ?>
                            </div>
                        </div>

                        <div class="coloum-02">
                            <div class="form-element">
                                <label for="lname">Last Name</label>
                                <input type="text" placeholder="Enter" id="up-lname" name="lname"
                                    value="<?= set_value('lname') ?>"
                                    style="border: <?= !empty($errors['u-lname']) ? '1px solid red' : '1px solid #ccc' ?>;">
                                <?php if (!empty($errors['u-lname'])): ?>
                                    <div class="user-error" for="lname">
                                        <?= $errors['u-lname'] ?>
                                    </div>
                                <?php endif; ?>
                            </div>
                            <div class="form-element">
                                <label for="phoneNo">Phone Number</label>
                                <input type="text" placeholder="Enter" id="up-phoneNo" name="phoneNo"
                                    value="<?= set_value('phoneNo') ?>"
                                    style="border: <?= !empty($errors['u-phoneNo']) ? '1px solid red' : '1px solid #ccc' ?>;">
                                <?php if (!empty($errors['u-phoneNo'])): ?>
                                    <div class="user-error" for="phoneNo">
                                        <?= $errors['u-phoneNo'] ?>
                                    </div>
                                <?php endif; ?>
                            </div>
                        </div>

                    </div>
                    <div class="user-create-update">
                        <button name='submit' value='update' type="submit">Update</button>
                    </div>
                </div>

            </div>
        </div>
    </form>
</div>
<script>
    document.querySelector("#close-update-popup").addEventListener("click", function () {
        document.querySelector("#update-popup").classList.remove("active");
        document.querySelector("#body").classList.remove("active");
    });
</script>

</div>