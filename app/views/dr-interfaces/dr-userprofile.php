<?php
$role = "DR";
$data['role'] = $role;
?>
<?php $this->view('components/navside-bar/degreeprogramsidebar', $data) ?>
<?php $this->view('components/navside-bar/footer', $data) ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" type="text/css" href="<?= ROOT ?>css/dr/dr-styles.css">
    <style>
        @media (min-width: 40em) {
            :root {
                --fs--500: 0.2rem;
            }
        }

        td {
            font-size: 16px;
            width: 300px;
            padding: 5px;
            border: 1px solid #ffffff;
            text-align: center;
        }

        th {
            background-color: #ffffff;
            font-size: 18px;
            font-weight: bold;
            padding: 10px;
        }

        .dr-userprofile-overlay {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.5);
            /* Semi-transparent background */
            backdrop-filter: blur(5px);
            /* Add blur effect */
            z-index: 998;
            /* Layer it above other content */
            display: none;
            /* Initially hidden */
        }
    </style>
</head>

<body>
    <div class="dr-userprofile">
        <div class="dr-userprofile-overlay" id="dr-userprofile-overlay"></div>
        <div class="dr-userprofile-white-container1-1">
            <div class="dr-userprofile-white-container1"><?= $degrees[0]->DegreeName ?></div>
            <div class="dr-userprofile-white-container1-core">Participants</div>
        </div>
        <div class="dr-userprofile-white-container2-1">
            <p class="dr-userprofile-left-top-text2">User Details</p>
            <div class="dr-userprofile-row">
                <div class="dr-userprofile-column1">
                    <div class=dr-userprofile-name>
                        <?php if ($student[0]->status == "continue"): ?>
                            <div>
                                <img src="<?= ROOT ?>assets/dr/imgano.png" alt="Your Image">
                            </div>
                        <?php endif; ?>
                        <?php if ($student[0]->status == "suspended"): ?>
                            <div style="border: 2px solid red; display: inline-block; border-radius: 100%;">
                                <img src="<?= ROOT ?>assets/dr/imgano.png" alt="Your Image">
                            </div>
                            <p style="color: red;"><?= $student[0]->name ?></p>
                            <p style="color: red;">Suspended and Degree Changed.</p>
                        <?php endif; ?>
                    </div>
                </div>
                <div class="dr-userprofile-column2">
                    <div class="dr-userprofile-data1"><b>Email:</b><br>
                        <div class="dr-userprofile-email"><?= $student[0]->Email ?></div>
                    </div><br>
                    <div class="dr-userprofile-data2"><b>Registration number:</b><br>
                        <div class="dr-userprofile-regNum"> <?= $student[0]->regNo ?></div>
                    </div>
                </div>
                <div class="dr-userprofile-column3">
                    <div class="dr-userprofile-data3"><b>Country:</b><br>
                        <div class="dr-userprofile-country"> <?= $student[0]->country ?></div>
                    </div><br>
                    <div class="dr-userprofile-data4"><b>Index number:</b><br>
                        <div class="dr-userprofile-indexNum"> <?= $student[0]->indexNo ?></div>
                    </div>
                </div>
            </div><br>
            <div class="dr-userprofile-button-container">
                <div class="dr-userprofile-buttony">
                    <?php if ((time() - strtotime($degrees[0]->createdDate)) < (3 * 30 * 24 * 60 * 60) && $student[0]->status == "continue" && $degrees[0]->Status == "ongoing"): ?>
                        <input type="button" id="dr-userprofile-changedegreebutton" class="dr-userprofile-button"
                            value="Change Diploma Program" onclick="updateData()">
                    <?php endif; ?>
                </div>
                <div class="dr-userprofile-buttony">
                    <input type="button" id="dr-userprofile-deletebutton" class="dr-userprofile-button" value="Delete"
                        onclick="updateData2()">
                </div>
            </div>
        </div>

        <div class="dr-userprofile-pop-up1">
            <div class="dr-userprofile-popupForm1">
                <form id="dr-userprofile-Form1" method="post" action="<?= ROOT ?>dr/userprofile/add">
                    <h1 style="font-size: 18px;">Change Diploma Program</h1><br>
                    <div class="dr-userprofile-input-fields" style="margin: 20px 0px 10px 0px;">
                        <label for="degree type" class="dr-userprofile-drop-down">Current Diploma Program</label><br>
                        <input name="degree type" id="dr-userprofile-degree_type"
                            style="width: 430px; height: 34px; border-radius: 5px; margin: 9px; padding-left: 10px"
                            placeholder="<?= $degrees[0]->DegreeName ?>" disabled><br><br><br>
                        <label for="select degree id" class="dr-userprofile-drop-down">Select Degree
                            Program:</label><br>
                        <select name="select_degree_id" id="dr-userprofile-select_degree_type"
                            style="width: 430px; height: 34px; border-radius: 5px; margin: 9px;">
                            <option value="" default hidden>Select</option>
                            <?php if (!empty($Degree)): ?>
                                <?php foreach ($Degree as $Degrees): ?>
                                    <?php if ($Degrees->Status != "completed" && (time() - strtotime($Degrees->createdDate)) < (5 * 30 * 24 * 60 * 60) && $Degrees->DegreeID != $degrees[0]->DegreeID): ?>
                                        <option value="<?= $Degrees->DegreeID ?>"
                                            <?= (set_value('select_degree_id') === $Degrees->DegreeID) ? 'selected' : '' ?>>
                                            <?= $Degrees->DegreeName ?></option>
                                    <?php endif; ?>
                                <?php endforeach; ?>
                            <?php endif; ?>
                        </select><br><br>
                        <h3 style="font-size: 14px; font-weight: 200">Note - After submit all the information of this
                            student may transfer to new diploma program and student data will suspend from the current
                            diploma program</h3>
                    </div>
                    <div class="dr-userprofile-btn-box">
                        <div class="dr-userprofile-button-btn">
                            <button type="button" class="dr-userprofile-bt-name-white close-button"
                                id="dr-userprofile-close-button">Cancel</button>
                            <button type="submit" class="dr-userprofile-bt-name"
                                style="text-decoration: none; margin-right: -53px;" id="dr-userprofile-Next1"
                                onclick="myFunction()">Submit</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="dr-userprofile-pop-up1-1">
            <div class="dr-userprofile-popupForm1-1">
                <svg onclick="crossForDiplomaChange()" id="dr-userprofile-crossForDiplomaChange"
                    xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" fill="none">
                    <path
                        d="M3.05288 17.1929C2.09778 16.2704 1.33596 15.167 0.811868 13.9469C0.287778 12.7269 0.0119157 11.4147 0.000377568 10.0869C-0.0111606 8.7591 0.241856 7.44231 0.744665 6.21334C1.24747 4.98438 1.99001 3.86786 2.92893 2.92893C3.86786 1.99001 4.98438 1.24747 6.21334 0.744665C7.44231 0.241856 8.7591 -0.0111606 10.0869 0.000377568C11.4147 0.0119157 12.7269 0.287778 13.9469 0.811868C15.167 1.33596 16.2704 2.09778 17.1929 3.05288C19.0145 4.9389 20.0224 7.46493 19.9996 10.0869C19.9768 12.7089 18.9251 15.217 17.0711 17.0711C15.217 18.9251 12.7089 19.9768 10.0869 19.9996C7.46493 20.0224 4.9389 19.0145 3.05288 17.1929ZM11.5229 10.1229L14.3529 7.29288L12.9429 5.88288L10.1229 8.71288L7.29288 5.88288L5.88288 7.29288L8.71288 10.1229L5.88288 12.9529L7.29288 14.3629L10.1229 11.5329L12.9529 14.3629L14.3629 12.9529L11.5329 10.1229H11.5229Z"
                        fill="#17376E" />
                </svg>
                <h2>Diploma Program Changed.</h2>
                <p>
                    <center>Student Reg. No. - <?= $student[0]->regNo ?></center>
                </p>
            </div>
        </div>
        <form class="dr-userprofile-pop-up2" id="dr-userprofile-deleteForm" method="post"
            action="<?= ROOT ?>dr/userprofile/delete">
            <div class="dr-userprofile-popupForm">
                <center><svg id="dr-userprofile-userDeletePopupImg" xmlns="http://www.w3.org/2000/svg" width="67"
                        height="66" viewBox="0 0 67 66" fill="none">
                        <path
                            d="M33.5 63C50.0685 63 63.5 49.5685 63.5 33C63.5 16.4315 50.0685 3 33.5 3C16.9315 3 3.5 16.4315 3.5 33C3.5 49.5685 16.9315 63 33.5 63Z"
                            stroke="#E02424" stroke-width="6" stroke-linecap="round" stroke-linejoin="round" />
                        <path d="M33.5 21V33" stroke="#E02424" stroke-width="6" stroke-linecap="round"
                            stroke-linejoin="round" />
                        <path d="M33.5 45H33.53" stroke="#E02424" stroke-width="6" stroke-linecap="round"
                            stroke-linejoin="round" />
                    </svg></center>
                <h2 id="dr-userprofile-userDeletePopupH2">
                    <center>Are you sure want to delete this student data?</center>
                </h2>
                <div class="dr-userprofile-yesorno">
                    <button class="dr-userprofile-close-button-2" type="submit" value="delete">Yes,I'm Sure</button>
                    <button class="dr-userprofile-close-button-3" type="button">No,Cancel</button>
                </div>
            </div>
        </form>
        <div class="dr-userprofile-flex-container">
            <div class="dr-userprofile-white-container3-1">
                <p class="dr-userprofile-left-top-text2">Examination Results</p>
                <?php if (!empty($exams)): ?>
                    <?php foreach ($exams as $exam): ?>
                        <?php if ($exam->status == "completed"): ?>
                            <p class="dr-userprofile-left-top-text3">Semester <?= $exam->semester ?></p>
                            <table>
                                <?php if (!empty($finalMarks)): ?>
                                    <tr>
                                        <th>Subject</th>
                                        <th>Result</th>
                                    </tr>
                                    <?php foreach ($finalMarks as $individualFinalMark): ?>
                                        <?php if ($individualFinalMark->examID == $exam->examID): ?>
                                            <tr>
                                                <td><?= $individualFinalMark->subjectCode ?></td>
                                                <td><?= $individualFinalMark->grade ?></td>
                                            </tr>
                                        <?php endif; ?>
                                    <?php endforeach; ?>
                                <?php else: ?>
                                    <p class="dr-userprofile-left-top-text4">No Examination Results for this semester</p>
                                <?php endif; ?>
                            </table>
                        <?php endif; ?>
                    <?php endforeach; ?>
                <?php else: ?>
                    <p class="dr-userprofile-left-top-text4">No Examination Results</p>
                <?php endif; ?>
            </div>
            <div class="dr-userprofile-white-container4-1">
                <p class="dr-userprofile-left-top-text2">Other Information</p>
                <div class="dr-userprofile-row2">
                    <div class="dr-userprofile-column2-1">
                        <div class="dr-userprofile-data1"><b>Date Of Birth:</b><br>
                            <div class="dr-userprofile-bday"><?= $student[0]->birthdate ?></div>
                        </div>
                        <div class="dr-userprofile-data2"><b>N.I.C. No:</b><br>
                            <div class="dr-userprofile-nic"> <?= $student[0]->nicNo ?></div>
                        </div>
                        <div class="dr-userprofile-data2"><b>WhatsApp Number:</b><br>
                            <div class="dr-userprofile-Fax"><?= $student[0]->whatsappNo ?></div>
                        </div>
                    </div>
                    <div class="dr-userprofile-column2-2">
                        <div class="dr-userprofile-data3"><b>Address:</b><br>
                            <div class="dr-userprofile-adr"> <?= $student[0]->address ?></div>
                        </div>
                        <div class="dr-userprofile-data4"><b>Phone Number:</b><br>
                            <div class="dr-userprofile-phoneNum"> <?= $student[0]->phoneNo ?></div>
                        </div><br>
                    </div>
                </div>
                <div class="dr-userprofile-buttonx">
                    <?php if ($student[0]->status == "continue" && $degrees[0]->Status == "ongoing"): ?>
                        <input type="button" id="dr-userprofile-updateButton" class="dr-userprofile-button" value="Update"
                            onclick="updateData1()">
                    <?php endif; ?>
                </div>
            </div>
        </div>
        <div class="dr-userprofile-popup" id="dr-userprofile-update-popup">
            <form method="post" action="<?= ROOT ?>dr/userprofile/update">
                <div class="dr-userprofile-popup-card">
                    <div class="dr-userprofile-form">
                        <h2>Update User Details</h2>
                        <div class="dr-userprofile-form-input-fields">
                            <div class="dr-userprofile-user-data">
                                <input type="text" name="id" hidden>
                                <div class="dr-userprofile-column-01">
                                    <div class="dr-userprofile-form-element">
                                        <label for="fname">Name</label>
                                        <input type="text" placeholder="Enter" id="dr-userprofile-up-name" name="name"
                                            value="<?= $student[0]->name ?>">
                                    </div>
                                    <div class="dr-userprofile-form-element">
                                        <label for="email">Email</label>
                                        <input type="text" placeholder="Enter" id="dr-userprofile-up-email" name="Email"
                                            value="<?= $student[0]->Email ?>">
                                    </div>
                                    <div class="dr-userprofile-form-element">
                                        <label for="nicNo">NIC</label>
                                        <input type="text" placeholder="Enter" id="dr-userprofile-up-nicNo" name="nicNo"
                                            value="<?= $student[0]->nicNo ?>">
                                    </div>
                                    <div class="dr-userprofile-form-element">
                                        <label for="whatsappNo">Whatsapp Number</label>
                                        <input type="text" placeholder="Enter" id="dr-userprofile-up-whatsappNo"
                                            name="whatsappNo" value="<?= $student[0]->whatsappNo ?>">
                                    </div>
                                </div>
                                <div class="dr-userprofile-column-02">
                                    <div class="dr-userprofile-form-element">
                                        <label for="indexNo">Index Number</label>
                                        <input type="text" placeholder="Enter" id="dr-userprofile-up-country"
                                            name="country" value="<?= $student[0]->country ?>">
                                    </div>
                                    <div class="dr-userprofile-form-element">
                                        <label for="phoneNo">Phone Number</label>
                                        <input type="text" placeholder="Enter" id="dr-userprofile-up-phoneNo"
                                            name="phoneNo" value="<?= $student[0]->phoneNo ?>">
                                    </div>
                                    <div class="dr-userprofile-form-element">
                                        <label for="address">Address</label>
                                        <input type="text" placeholder="Enter" id="dr-userprofile-up-address"
                                            name="address" value="<?= $student[0]->address ?>">
                                    </div>
                                    <div class="dr-userprofile-form-element">
                                        <label for="birthdate">Birthdate</label>
                                        <input type="text" placeholder="Enter" id="dr-userprofile-up-birthdate"
                                            name="birthdate" value="<?= $student[0]->birthdate ?>">
                                    </div>
                                </div>

                            </div>
                            <div class="dr-userprofile-student-create-update">
                                <button class="dr-userprofile-close-button" type="button">Close</button>
                                <button name='submit' value='update' id="dr-userprofile-submitbutton"
                                    type="submit">Update</button>
                            </div>
                        </div>

                    </div>
                </div>
            </form>
        </div>
        <div class="dr-footer">
            <?php $this->view('components/footer/index', $data) ?>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script>
        //Change Degree and Delete button
        function updateData() {
            // Show the overlay and pop-up
            $('#dr-userprofile-overlay').css('display', 'block');
            $('.dr-userprofile-pop-up1').css('display', 'block');
            document.body.classList.add('no-scroll');
            $('#dr-userprofile-close-button').click(function (e) {
                // Hide the pop-up and overlay when the close button is clicked
                $('.dr-userprofile-pop-up1').css('display', 'none');
                $('#dr-userprofile-overlay').css('display', 'none');
                document.body.classList.remove('no-scroll');
                e.stopPropagation();
            });
        }

        function updateData1() {
            // Show the overlay and pop-up
            $('#dr-userprofile-overlay').css('display', 'block');
            $('.dr-userprofile-popup').css('display', 'block');
            document.body.classList.add('no-scroll');
            $('.dr-userprofile-close-button').click(function (e) {
                // Hide the pop-up and overlay when the close button is clicked
                $('.dr-userprofile-popup').css('display', 'none');
                $('#dr-userprofile-overlay').css('display', 'none');
                document.body.classList.remove('no-scroll');
                e.stopPropagation();
            });
        }

        function updateData2() {
            // Show the overlay and pop-up
            $('#dr-userprofile-overlay').css('display', 'block');
            $('.dr-userprofile-pop-up2').css('display', 'block');
            document.body.classList.add('no-scroll');
            $('.dr-userprofile-close-button-3').click(function (e) {
                // Hide the pop-up and overlay when the close button is clicked
                $('.dr-userprofile-pop-up2').css('display', 'none');
                $('#dr-userprofile-overlay').css('display', 'none');
                document.body.classList.remove('no-scroll');
                e.stopPropagation();
            });
        }

        function myFunction() {
            $('.dr-userprofile-pop-up1').css('display', 'none');
            $('#dr-userprofile-overlay').css('display', 'block');
            $('.dr-userprofile-pop-up1-1').css('display', 'block');
            document.body.classList.add('no-scroll');
            $('#dr-userprofile-overlay').click(function (e) {
                $('.dr-userprofile-pop-up1-1').css('display', 'none');
                $('#dr-userprofile-overlay').css('display', 'none');
                document.body.classList.remove('no-scroll');
                e.stopPropagation();
            });
        }

        function crossForDiplomaChange() {
            $('.dr-userprofile-pop-up1-1').css('display', 'none');
            $('#dr-userprofile-overlay').css('display', 'none');
        }
    </script>
</body>

</html>