<?php
$role = "SAR";
$data['role'] = $role;
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <title>Student Profile</title>
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
    </style>
</head>

<?php $this->view('components/navside-bar/degreeprogramsidebar', $data) ?>
<?php $this->view('components/navside-bar/footer', $data) ?>

<body>
    <div class="dr-userprofile">
        <div class="dr-userprofile-white-container1-1">
            <div class="dr-userprofile-white-container1"><?= $_SESSION['degreeData'][0]->DegreeName ?></div>
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
                            <p style="color: red;">Suspended and Diploma Changed.</p>
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
                </div>

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
        <div id="dr-userprofile-overlay"></div>

        <div class="dr-userprofile-flex-container">
            <div class="dr-userprofile-white-container3-1">
                <p class="dr-userprofile-left-top-text2">Examination Results</p>
                <?php if (!empty($studentResults)): ?>

                    <p class="dr-userprofile-left-top-text3">Semester 1</p>
                    <table>
                        <?php if (!empty($studentResults[1])): ?>
                            <tr>
                                <th>Subject</th>
                                <th>Result</th>
                            </tr>
                            <?php foreach ($studentResults[1] as $results): ?>
                                <tr>
                                    <td><?= $results->subjectCode ?></td>
                                    <td><?= $results->grade ?></td>
                                </tr>

                            <?php endforeach; ?>
                        <?php else: ?>
                            <p class="dr-userprofile-left-top-text4">No Examination Results Submitted for this semester</p>
                        <?php endif; ?>
                    </table>

                    <p class="dr-userprofile-left-top-text3">Semester 2</p>
                    <table>
                        <?php if (!empty($studentResults[2])): ?>
                            <tr>
                                <th>Subject</th>
                                <th>Result</th>
                            </tr>
                            <?php foreach ($studentResults[2] as $results): ?>
                                <tr>
                                    <td><?= $results->subjectCode ?></td>
                                    <td><?= $results->grade ?></td>
                                </tr>

                            <?php endforeach; ?>
                        <?php else: ?>
                            <p class="dr-userprofile-left-top-text4">No Examination Results Submitted for this semester</p>
                        <?php endif; ?>
                    </table>

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

            $('#dr-userprofile-close-button').click(function (e) {
                // Hide the pop-up and overlay when the close button is clicked
                $('.dr-userprofile-pop-up1').css('display', 'none');
                $('#dr-userprofile-overlay').css('display', 'none');
                e.stopPropagation();
            });
        }

        function updateData1() {
            // Show the overlay and pop-up
            $('#dr-userprofile-overlay').css('display', 'block');
            $('.dr-userprofile-popup').css('display', 'block');

            $('.dr-userprofile-close-button').click(function (e) {
                // Hide the pop-up and overlay when the close button is clicked
                $('.dr-userprofile-popup').css('display', 'none');
                $('#dr-userprofile-overlay').css('display', 'none');
                e.stopPropagation();
            });
        }

        function updateData2() {
            // Show the overlay and pop-up
            $('#dr-userprofile-overlay').css('display', 'block');
            $('.dr-userprofile-pop-up2').css('display', 'block');

            $('.dr-userprofile-close-button-3').click(function (e) {
                // Hide the pop-up and overlay when the close button is clicked
                $('.dr-userprofile-pop-up2').css('display', 'none');
                $('#dr-userprofile-overlay').css('display', 'none');
                e.stopPropagation();
            });
        }

        function myFunction() {
            $('.dr-userprofile-pop-up1').css('display', 'none');
            $('#dr-userprofile-overlay').css('display', 'block');
            $('.dr-userprofile-pop-up1-1').css('display', 'block');

            $('#dr-userprofile-overlay').click(function (e) {
                $('.dr-userprofile-pop-up1-1').css('display', 'none');
                $('#dr-userprofile-overlay').css('display', 'none');
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