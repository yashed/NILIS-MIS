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
            margin-top: 35px;
            display: flex;
            flex-direction: row;
            float: right;
            margin-right: 20%;
        }

        .yesorno {
            margin-left: 100px;
            display: flex;
            flex-direction: row;
            column-gap: 20px;
        }

        .pop-up {
            display: none;
            position: fixed;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            background-color: #fff;
            padding: 20px;
            z-index: 2;
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
                <!-- <form method="post">
                    <h1>Change Degree Program</h1><br>
                    <div class="cur-deg">
                        <input type="hidden" name="id" value="<?= $student[0]->id ?>">
                        <label for="degree">
                            <h3>Current Diploma Program : </h3><?= $student[0]->degreeID ?>
                        </label>
                    </div></br>
                    <div class="change-deg">
                        <label for="Degrees">Change Diploma Program</label>
                        <select id="Degree" name="Degree">
                            <option value="Degree1">DLIM Diploma</option>
                            <option value="Degree2">DSL Diploma</option>
                            <option value="Degree3">HDLM Diploma</option>
                        </select><br>
                    </div>
                    <input type="submit" id="update-deg" value="Submit">
                    <button class="close-button">Close</button>
                </form> -->
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
                        <h3 style="font-size: 14px; font-weight: 200">Note -  After submit all the information of this student may transfer to new degree program and student data will suspend from the current degree program</h3>
                    </div>
                    <div class="btn-box">
                        <div class="button-btn">

                            <button type="button" class="bt-name-white" id="Cancel1">Cancel</button>
                            <button type="button" class="bt-name" style="text-decoration: none; margin-right: -53px;" id="Next1">Submit</button>
                        </div>
                    </div>
                </form>
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
                </h2><br>
                <div class="yesorno">
                    <a href="<?= ROOT ?>Student/<?= $student[0]->indexNo ?>/delete/<?= $student[0]->id ?>"><button class="close-button-2">Yes,I'm Sure</button></a>
                    <button class="close-button-3">No,Cancel</button>
                </div>
            </div>
            <div id="overlay"></div>
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
                        </div><br>
                        <div class="data2"><b>N.I.C. No:</b><br>
                            <div class="nic"> <?= $student[0]->nicNo ?></div>
                        </div><br>
                        <div class="data2"><b>Phone Number:</b><br>
                            <div class="phoneNum"> <?= $student[0]->phoneNo ?></div>
                        </div>
                    </div>
                    <div class="column2-2">
                        <div class="data1"><b>WhatsApp Number:</b><br>
                            <div class="Fax"><?= $student[0]->whatsapp_number ?></div>
                        </div><br>
                        <div class="data2"><b>Address:</b><br>
                            <div class="adr"> <?= $student[0]->address ?></div>
                        </div>
                    </div>
                </div>
                <div class="buttonx">
                    <input type="button" id="updateButton" class="button" value="Update" onclick="updateData1()">
                    <script>
                        function updateData1() {
                            // Show the overlay and pop-up
                            $('#overlay').css('display', 'block');
                            $('.pop-up').css('display', 'block');

                            $('.close-button').click(function(e) {
                                // Hide the pop-up and overlay when the close button is clicked
                                $('.pop-up').css('display', 'none');
                                $('#overlay').css('display', 'none');
                                e.stopPropagation();
                            });
                        }
                    </script>
                </div>
            </div>
        </div>
        <div class="pop-up">
            <div class="popupForm2">
                <form method="post">
                    <h2>Change Student Details</h2>
                    <input type="hidden" id="id" name="id" value="<?= $student[0]->id ?>">
                    <label for="fname">Name</label>
                    <input type="text" id="fname" placeholder="Full Name" name="name">
                    <label for="mail">Email</label>
                    <input type="text" id="mail" placeholder="Email Address" name="Email">
                    <label for="country">Country</label>
                    <input type="text" id="country" placeholder="Currently living country" name="country">
                    <label for="nicno">N.I.C</label>
                    <input type="text" id="nicno" placeholder="N.I.C Number" name="nicNo">
                    <label for="bday">Birthdate</label>
                    <input type="text" id="bday" placeholder="Birthdate" name="birthdate">
                    <label for="whatsapp_number">WhatsApp Number</label>
                    <input type="text" id="whatsapp_number" placeholder="whatsapp_number" name="whatsapp_number">
                    <label for="addr">Address</label>
                    <input type="text" id="addr" placeholder="Adress" name="address">
                    <label for="phoneno">Phone Number</label>
                    <input type="text" id="phoneno" placeholder="Fax" name="phoneNo">

                    <input type="submit" id="submitbutton" value="Submit">
                    <button class="close-button">Close</button>
                </form>
            </div>
        </div>
        <div id="overlay"></div>
        <div class="dr-footer">
            <?php $this->view('components/footer/index', $data) ?>
        </div>
    </div>
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
            const studentId = urlParams.get('studentId');

            // Now you can use the `studentId` to fetch and display the corresponding student's data.
        });
    </script>
</body>

</html>