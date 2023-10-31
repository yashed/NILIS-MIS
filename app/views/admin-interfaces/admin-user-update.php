<div class="popup" id="update-popup">
        <div class="close-btn" id="close-update-popup">
            &times;
        </div>
        <form method="post">
            <div class="popup-card">
                <div class="form">
                    <h2>Update User Details</h2>
                    <div class="user-data">

                        <div class="coloum-01">
                            <div class="form-element">
                                <label for="fname">First Name</label>
                                <input type="text" placeholder="Enter" id="fname" name="fname">
                            </div>
                            <div class="form-element">
                                <label for="email">Email</label>
                                <input type="text" placeholder="Enter" id="email" name="email">
                            </div>
                            <div class="form-element">
                                <label for="newpassword">New Password</label>
                                <input type="password" placeholder="Enter" id="newpassword" name="newpassword">
                            </div>
                        </div>

                        <div class="coloum-02">
                            <div class="form-element">
                                <label for="lname">Last Name</label>
                                <input type="text" placeholder="Enter" id="fname" name="fname">
                            </div>
                            <div class="form-element">
                                <label for="phoneNo">Phone Number</label>
                                <input type="text" placeholder="Enter" id="phoneNo" name="phoneNo">
                            </div>
                            <div class="form-element">
                                <label for="cpassword">Confirm Password</label>
                                <input type="password" placeholder="Enter" id="cpassword" name="cpassword"
                                    style="border: <?= !empty($errors['cpassword']) ? '1px solid red' : '1px solid #ccc' ?>;">
                                <?php if(!empty($errors['cpassword'])):?>
                                <div class="user-error" for="cpassword"><?=$errors['cpassword']?></div>
                                <?php endif;?>
                            </div>
                        </div>

                    </div>
                    <div class="form-element">
                        <button type="submit" >Update</button>
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