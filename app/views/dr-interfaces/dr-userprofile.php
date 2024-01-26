<?php
$role = "DR";
$data['role'] = $role;
?>
<?php $this->view('components/navside-bar/degreeprogramsidebar', $data) ?>
<?php $this->view('components/navside-bar/footer', $data) ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" type="text/css" href="<?= ROOT ?>css/student/style.css">
    <style>
        #overlay {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.7);
            z-index: 1;
            transition: background-color 0.5s;
        }

        .button-container {
            margin-top: 45px;
            display: flex;
            flex-direction: row;
            float: right;
            margin-right: 20%;
        }

        .yesorno {
            margin: 5% 25%;
            display: flex;
            flex-direction: row;
            column-gap: 20px;
        }

        .pop-up1 {
            display: none;
            position: fixed;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            background-color: #fff;
            padding: 20px;
            z-index: 2;
            border-radius: 15px;
        }

        .pop-up2 {
            display: none;
            position: fixed;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            background-color: #fff;
            padding: 20px;
            z-index: 2;
            border-radius: 15px;
        }
    </style>
</head>

<body>
    <div class="dr-userprofile">
        <div class="white-container1-1">
            <div class="white-container1">Diploma in Library and Information Management</div>
            <div class="white-container1-core">Participants</div>
        </div>
        <div class="white-container2-1">
            <p class="left-top-text2">User Details</p>
            <div class="row">
                <div class="column1">
                    <div class=name>
                        <img src="<?= ROOT ?>assets/dr/imgano.png">
                        <p><?= $student[0]->name ?></p>
                    </div>
                </div>
                <div class="column2">
                    <div class="data1"><b>Email:</b><br>
                        <div class="email"><?= $student[0]->Email ?></div>
                    </div><br>
                    <div class="data2"><b>Registration number:</b><br>
                        <div class="regNum"> <?= $student[0]->regNo ?></div>
                    </div>
                </div>
                <div class="column3">
                    <div class="data3"><b>Country:</b><br>
                        <div class="country"> Sri Lanka</div>
                    </div><br>
                    <div class="data4"><b>Index number:</b><br>
                        <div class="indexNum"> <?= $student[0]->indexNo ?></div>
                    </div>
                </div>
            </div><br>
            <div class="button-container">
                <div class="buttony">
                    <input type="button" id="changedegreebutton" class="button" value="Change Degree Program" onclick="updateData()">
                </div>
                <div class="buttony">
                    <input type="button" id="deletebutton" class="button" value="Delete" onclick="updateData2()">
                </div>
            </div>
        </div>

        <div class="pop-up1">
            <div class="popupForm1">
                <form id="Form1" method="post" action="">
                    <h1 style="font-size: 18px;">Change Degree Program</h1><br>
                    <div class="input-fields" style="margin: 20px 0px 10px 0px;">
                        <label for="degree type" class="drop-down">Current Diploma Program</label><br>
                        <input name="degree type" id="degree_type" style="width: 430px; height: 34px; border-radius: 5px; margin: 9px; padding-left: 10px" placeholder="<?= $student[0]->degreeID ?>" disabled><br><br><br>
                        <label for="select degree type" class="drop-down">Select Degree Program:</label><br>
                        <select name="select degree type" id="select_degree_type" style="width: 430px; height: 34px; border-radius: 5px; margin: 9px;">
                            <option value="" default hidden>Select</option>
                            <option value="DLMS" <?= (set_value('select_degree_type') === 'DLMS') ? 'selected' : '' ?>>DLMS</option>
                            <option value="ENCM" <?= (set_value('select_degree_type') === 'ENCM') ? 'selected' : '' ?>>ENCM</option>
                            <option value="DSL" <?= (set_value('select_degree_type') === 'DSL') ? 'selected' : '' ?>>DSL</option>
                        </select><br><br>
                        <h3 style="font-size: 14px; font-weight: 200">Note - After submit all the information of this student may transfer to new degree program and student data will suspend from the current degree program</h3>
                    </div>
                    <div class="btn-box">
                        <div class="button-btn">

                            <button type="button" class="bt-name-white close-button" id="Cancel1">Cancel</button>
                            <button type="button" class="bt-name" style="text-decoration: none; margin-right: -53px;" id="Next1" onclick="myFunction()">Submit</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <!-- <div id="overlay1"></div> -->
        <div class="pop-up1-1">
            <div class="popupForm1-1">
                <svg onclick="crossForDiplomaChange()" id="crossForDiplomaChange" xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" fill="none">
                    <path d="M3.05288 17.1929C2.09778 16.2704 1.33596 15.167 0.811868 13.9469C0.287778 12.7269 0.0119157 11.4147 0.000377568 10.0869C-0.0111606 8.7591 0.241856 7.44231 0.744665 6.21334C1.24747 4.98438 1.99001 3.86786 2.92893 2.92893C3.86786 1.99001 4.98438 1.24747 6.21334 0.744665C7.44231 0.241856 8.7591 -0.0111606 10.0869 0.000377568C11.4147 0.0119157 12.7269 0.287778 13.9469 0.811868C15.167 1.33596 16.2704 2.09778 17.1929 3.05288C19.0145 4.9389 20.0224 7.46493 19.9996 10.0869C19.9768 12.7089 18.9251 15.217 17.0711 17.0711C15.217 18.9251 12.7089 19.9768 10.0869 19.9996C7.46493 20.0224 4.9389 19.0145 3.05288 17.1929ZM11.5229 10.1229L14.3529 7.29288L12.9429 5.88288L10.1229 8.71288L7.29288 5.88288L5.88288 7.29288L8.71288 10.1229L5.88288 12.9529L7.29288 14.3629L10.1229 11.5329L12.9529 14.3629L14.3629 12.9529L11.5329 10.1229H11.5229Z" fill="#17376E" />
                </svg>
                <h2>Diploma Program Changed.</h2>
                <p>
                    <center>Student Reg. No. - <?= $student[0]->regNo ?></center>
                </p>
            </div>
        </div>
        <div id="overlay"></div>
        <div class="pop-up2">
            <div class="popupForm">
                <center><svg id="userDeletePopupImg" xmlns="http://www.w3.org/2000/svg" width="67" height="66" viewBox="0 0 67 66" fill="none">
                        <path d="M33.5 63C50.0685 63 63.5 49.5685 63.5 33C63.5 16.4315 50.0685 3 33.5 3C16.9315 3 3.5 16.4315 3.5 33C3.5 49.5685 16.9315 63 33.5 63Z" stroke="#E02424" stroke-width="6" stroke-linecap="round" stroke-linejoin="round" />
                        <path d="M33.5 21V33" stroke="#E02424" stroke-width="6" stroke-linecap="round" stroke-linejoin="round" />
                        <path d="M33.5 45H33.53" stroke="#E02424" stroke-width="6" stroke-linecap="round" stroke-linejoin="round" />
                    </svg></center>
                <h2 id="userDeletePopupH2">
                    <center>Are you sure want to delete this student data?</center>
                </h2>
                <div class="yesorno">
                    <a href="<?= ROOT ?>Student/<?= $student[0]->indexNo ?>/delete/<?= $student[0]->id ?>"><button class="close-button-2">Yes,I'm Sure</button></a>
                    <button class="close-button-3">No,Cancel</button>
                </div>
            </div>
            <!-- <div id="overlay2"></div> -->
        </div>
        <div class="flex-container">
            <div class="white-container3-1">
                <p class="left-top-text2">Examination Results</p>
                <p class="left-top-text3">Semester 1</p>
                <table>
                    <tr>
                        <th>Subject</th>
                        <th>Result</th>
                    </tr>
                    <tr>
                        <td>Subject1</td>
                        <td>A</td>
                    </tr>
                    <tr>
                        <td>Subject2</td>
                        <td>A</td>
                    </tr>
                    <tr>
                        <td>Subject3</td>
                        <td>A</td>
                    </tr>
                    <tr>
                        <td>Subject4</td>
                        <td>A</td>
                    </tr>
                </table><br>
                <p class="left-top-text3">Semester 2</p>
                <table>
                    <tr>
                        <th>Subject</th>
                        <th>Result</th>
                    </tr>
                    <tr>
                        <td>Subject1</td>
                        <td>A</td>
                    </tr>
                    <tr>
                        <td>Subject2</td>
                        <td>A</td>
                    </tr>
                    <tr>
                        <td>Subject3</td>
                        <td>A</td>
                    </tr>
                    <tr>
                        <td>Subject4</td>
                        <td>A</td>
                    </tr>
                </table>
            </div>
            <div class="white-container4-1">
                <p class="left-top-text2">Other Information</p>
                <div class="row2">
                    <div class="column2-1">
                        <div class="data1"><b>Date Of Birth:</b><br>
                            <div class="bday"><?= $student[0]->birthdate ?></div>
                        </div>
                        <div class="data2"><b>N.I.C. No:</b><br>
                            <div class="nic"> <?= $student[0]->nicNo ?></div>
                        </div>
                        <div class="data2"><b>WhatsApp Number:</b><br>
                            <div class="Fax"><?= $student[0]->whatsapp_number ?></div>
                        </div>
                    </div>
                    <div class="column2-2">
                        <div class="data3"><b>Address:</b><br>
                            <div class="adr"> <?= $student[0]->address ?></div>
                        </div>
                        <div class="data4"><b>Phone Number:</b><br>
                            <div class="phoneNum"> <?= $student[0]->phoneNo ?></div>
                        </div><br>
                    </div>
                </div>
                <div class="buttonx">
                    <input type="button" id="updateButton" class="button" value="Update" onclick="updateData1()">
                </div>
            </div>
        </div>
        <div class="popup" id="update-popup">
            <form method="post">
                <div class="popup-card">
                    <div class="form">
                        <h2>Update User Details</h2>
                        <div class="form-input-fields">
                            <div class="user-data">
                                <input type="text" name="id" hidden>
                                <div class="column-01">
                                    <div class="form-element">
                                        <label for="fname">First Name</label>
                                        <input type="text" placeholder="Enter" id="up-fname" name="fname" value="<?= set_value('fname') ?>">
                                    </div>
                                    <div class="form-element">
                                        <label for="email">Email</label>
                                        <input type="text" placeholder="Enter" id="up-email" name="email" value="<?= set_value('email') ?>">
                                    </div>
                                    <div class="form-element">
                                        <label for="nicNo">NIC</label>
                                        <input type="text" placeholder="Enter" id="up-nicNo" name="nicNo" value="<?= set_value('nicNo') ?>">
                                    </div>
                                    <div class="form-element">
                                        <label for="whatsapp_number">Whatsapp Number</label>
                                        <input type="text" placeholder="Enter" id="up-whatsapp_number" name="whatsapp_number" value="<?= set_value('whatsapp_number') ?>">
                                    </div>
                                </div>
                                <div class="column-02">
                                    <div class="form-element">
                                        <label for="lname">Last Name</label>
                                        <input type="text" placeholder="Enter" id="up-lname" name="lname" value="<?= set_value('lname') ?>">
                                    </div>
                                    <div class="form-element">
                                        <label for="phoneNo">Phone Number</label>
                                        <input type="text" placeholder="Enter" id="up-phoneNo" name="phoneNo" value="<?= set_value('phoneNo') ?>">
                                    </div>
                                    <div class="form-element">
                                        <label for="address">Address</label>
                                        <input type="text" placeholder="Enter" id="up-address" name="address" value="<?= set_value('address') ?>">
                                    </div>
                                    <div class="form-element">
                                        <label for="birthdate">Birthdate</label>
                                        <input type="text" placeholder="Enter" id="up-birthdate" name="birthdate" value="<?= set_value('birthdate') ?>">
                                    </div>
                                </div>

                            </div>
                            <div class="student-create-update">
                                <button class="close-button">Close</button>
                                <button name='submit' value='update' id="submitbutton" type="submit">Update</button>
                            </div>
                        </div>

                    </div>
                </div>
            </form>
        </div>
        <!-- <div id="overlay3"></div> -->
        <div class="dr-footer">
            <?php $this->view('components/footer/index', $data) ?>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script>
        //Change Degree and Delete button
        function updateData() {
            // Show the overlay and pop-up
            $('#overlay').css('display', 'block');
            $('.pop-up1').css('display', 'block');

            $('.close-button').click(function(e) {
                // Hide the pop-up and overlay when the close button is clicked
                $('.pop-up1').css('display', 'none');
                $('#overlay').css('display', 'none');
                e.stopPropagation();
            });
        }
        // function updateData1() {
        //     // Show the overlay and pop-up
        //     console.log("updateData1 function called");
        //     $('#overlay').css('display', 'block');
        //     $('.popup').css('display', 'block');
        // }

        // // Bind the click event for the close button outside the function
        // $('.close-button').click(function(e) {
        //     // Hide the pop-up and overlay when the close button is clicked
        //     console.log("Close button clicked");
        //     $('.popup').css('display', 'none');
        //     $('#overlay').css('display', 'none');
        //     e.stopPropagation();
        // });
        function updateData1() {
            // Show the overlay and pop-up
            $('#overlay').show();
            $('.popup').show();
            console.log($('#overlay').css('display'));
            console.log($('.popup').css('display'));
            console.log("updateData1 function called");
        }

        // Bind the click event for the close button outside the function
        $('.close-button').click(function(e) {
            // Hide the pop-up and overlay when the close button is clicked
            $('.popup').hide();
            $('#overlay').hide();
            console.log("Close button clicked");
            e.stopPropagation();
        });

        function updateData2() {
            // Show the overlay and pop-up
            $('#overlay').css('display', 'block');
            $('.pop-up2').css('display', 'block');

            $('.close-button-3').click(function(e) {
                // Hide the pop-up and overlay when the close button is clicked
                $('.pop-up2').css('display', 'none');
                $('#overlay').css('display', 'none');
                e.stopPropagation();
            });
        }

        function myFunction() {
            $('.pop-up1').css('display', 'none');
            $('#overlay').css('display', 'block');
            $('.pop-up1-1').css('display', 'block');

            $('#overlay').click(function(e) {
                $('.pop-up1-1').css('display', 'none');
                $('#overlay').css('display', 'none');
                e.stopPropagation();
            });
        }

        function crossForDiplomaChange() {
            $('.pop-up1-1').css('display', 'none');
            $('#overlay').css('display', 'none');
        }
        (() => {
            const body = document.querySelector("body"),
                sidebar = body.querySelector(".sidebar"),
                toggle = body.querySelector(".toggle")
            whitecontainer11 = body.querySelector(".white-container1-1");
            whitecontainer21 = body.querySelector(".white-container2-1");
            whitecontainer31 = body.querySelector(".white-container3-1");

            toggle.addEventListener("click", () => {
                //sidebar.classList.toggle("close");
                whitecontainer11.classList.toggle("close");
                whitecontainer21.classList.toggle("close");
                whitecontainer31.classList.toggle("close");

            });
        })()

        function toggleMenu() {
            document.getElementById("subMenu").classList.toggle("open-menu");
        }
        // Add this code to target_page.php
        document.addEventListener('DOMContentLoaded', function() {
            const urlParams = new URLSearchParams(window.location.search);
            const studentId = urlParams.get('studentId'); // Now you can use the `studentId` to fetch and display the corresponding student's data.
        });
    </script>
</body>

</html>
<!-- <div class="popupForm2">
                <form method="post">
                    <div class="popup-card">
                        <div class="form">
                            <h2>Change Student Details</h2>
                            <div class="form-input-fields">
                                <div class="user-data">
                                    <input type="text" name="id" hidden>
                                    <div class="coloum-01">
                                        <div class="form-element">
                                            <label for="fname">First Name</label>
                                            <input type="text" placeholder="Enter" id="up-fname" name="fname" value="<?= set_value('fname') ?>">
                                        </div>
                                        <div class="form-element">
                                            <label for="email">Email</label>
                                            <input type="text" placeholder="Enter" id="up-email" name="email" value="<?= set_value('email') ?>">
                                        </div>
                                        <div class="form-element">
                                            <label for="nicNo">N.I.C</label>
                                            <input type="text" placeholder="Enter" id="up-nicNo" name="nicNo" value="<?= set_value('nicNo') ?>">
                                        </div>
                                        <div class="form-element">
                                            <label for="whatsapp_number">WhatsApp Number</label>
                                            <input type="text" placeholder="Enter" id="whatsapp_number" name="whatsapp_number" value="<?= set_value('whatsapp_number') ?>">
                                        </div>
                                    </div>
                                    <div class="coloum-02">
                                        <div class="form-element">
                                            <label for="lname">Last Name</label>
                                            <input type="text" placeholder="Enter" id="up-lname" name="lname" value="<?= set_value('lname') ?>">
                                        </div>
                                        <div class="form-element">
                                            <label for="phoneNo">Phone Number</label>
                                            <input type="text" placeholder="Enter" id="up-phoneNo" name="phoneNo" value="<?= set_value('phoneNo') ?>">
                                        </div>
                                        <div class="form-element">
                                            <label for="cpassword">Birthdate</label>
                                            <input type="date" placeholder="Enter" id="up-birthdate" name="Birthdate">
                                        </div>
                                        <div class="form-element">
                                            <label for="address">Address</label>
                                            <input type="text" placeholder="Enter" id="up-Address" name="address" value="<?= set_value('address') ?>">
                                        </div>
                                    </div>

                                </div>
                                <div class="user-create-update">
                                    <button class="close-button">Close</button>
                                    <button name='submit' value='update' id="submitbutton" type="submit">Update</button>
                                </div>
                            </div>

                        </div>
                    </div>
                </form>
            </div>
        </div> -->