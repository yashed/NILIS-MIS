<body>
    <div class="dashboard-body" id="dash-body">
        <?php $this->view('components/navside-bar/header', $data) ?>
        <?php $this->view('components/navside-bar/sidebar', $data) ?>
        <?php $this->view('components/navside-bar/footer', $data) ?>

        <div class="temp2-home">

            <div class="temp2-title">Examination</div>
            <div class="temp2-subsection-1">
                <div class="temp2-sub-title1">
                    Overview
                </div>

                <div class="row">



                    <div class="column1">
                        <div class="data1">Course Name<br>
                            <!-- <div class="email"><?= $student->Email ?></div> -->
                            <div class="course" id="course">Diploma in School Librarianship</div>
                        </div>
                        <br>
                        <div class="data2">Examination:<br>
                            <!-- <div class="regNum"> <?= $student->regNo ?></div> -->
                            <div class="exam" id="exam">2nd Semester Examination</div>
                        </div>
                    </div>

                    <div class="column2">
                        <div class="data3">Participation:<br>
                            <div class="count" id="count"> 216</div>
                        </div>
                        <br>
                        <div class="data4">Academic Year:<br>
                            <div class="year" id="year"> 2023/2024</div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="temp2-subsection-2">
                <div class="temp2-subsection-21">

                    <div class="participants-form-header">
                        <div class="temp2-sub-title2">Participants</div>
                        <div class="participant-form-btns">
                            <button class="admission-button1" id="openModal" onClick='showAttendancePopup()'>Exam
                                Attendance Submit</button>
                            <form method="post">

                                <!-- <button class="admission-button0">Download Attendance Sheet</button> -->
                                <button class="admission-button2" type="submit" name="admission" value="clicked"
                                    onClick="showMailPopup(event)">Send Admission Card</button>

                            </form>
                        </div>
                    </div>
                    <div class="display-message">
                        <?php
                        if (message()) {
                            echo '<div class="profile-message">';
                            if ($_SESSION['message_type'] == 'success') {
                                echo "<div class='error-message-profile' >" . message('', '', true) . "</div>";
                            } else {
                                echo "<div class='error-message-profile' style='color:red;'>" . message('', '', true) . "</div>";
                            }
                            echo '</div>';
                        }
                        ?>
                    </div>
                    <section class="table__body">
                        <table id="table_p">
                            <thead>
                                <tr>
                                    <th> Name </th>
                                    <th> Attempt </th>
                                    <th> Index Number </th>
                                    <th> Registration Number </th>
                                    <th> Student Type </th>
                                    <th> Admission Card </th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($currentRecords as $students): ?>
                                    <?php foreach ($students as $student): ?>
                                        <?php $json = json_encode($student); ?>
                                        <tr>
                                            <td class="table__body-td-name"><img src="<?= ROOT ?>assets/student.png" alt="">
                                                Bimsara Anjana</td>
                                            <td>
                                                <?= $student->attempt ?>
                                            </td>
                                            <td>
                                                <?= $student->indexNo ?>
                                            </td>
                                            <td> DLIM/01/01</td>
                                            <td>
                                                <?= $student->studentType ?>
                                            </td>
                                            <td> <a href="http://localhost/NILIS-MIS/public/admission/login?degreeID=10&examID=43&indexNo=<?= $student->indexNo ?>"
                                                    target="_blank">tap
                                                    to see Admission card </a></td>
                                        </tr>
                                    <?php endforeach; ?>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </section>


                    <br>
                    <div class="pagination">
                        <?php if ($page > 1): ?>
                            <a href="?page=<?= $page - 1 ?>">Previous</a>
                        <?php endif; ?>
                        <?php for ($i = 1; $i <= $totalPages; $i++): ?>
                            <a href="?page=<?= $i ?>" <?= $page === $i ? 'class="active"' : '' ?>>
                                <?= $i ?>
                            </a>
                        <?php endfor; ?>
                        <?php if ($page < $totalPages): ?>
                            <a href="?page=<?= $page + 1 ?>">Next</a>
                        <?php endif; ?>
                    </div>


                </div>


            </div>


            <div class="user-create-footer">
                <?php $this->view('components/footer/index', $data) ?>
            </div>
        </div>

    </div>

    <div class="mail-popup" id="mail-popup">
        <?php $this->view('components/popup/sendMails', $data) ?>
    </div>
    <div id="exam-attendance" class="exam-popup">
        <?php $this->view('sar-interfaces/sar-exam-attendance-submit', $data) ?>
    </div>
</body>