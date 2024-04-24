<?php
$role = "Clerk";
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
    </style>
</head>
<body>
    <div class="dr-userprofile">
        <div class="dr-userprofile-white-container1-1">
            <div class="dr-userprofile-white-container1"><?= $degrees[0]->DegreeName ?></div>
            <div class="dr-userprofile-white-container1-core">Participants</div>
        </div>
        <div class="dr-userprofile-white-container2-1">
            <p class="dr-userprofile-left-top-text2">User Details</p>
            <div class="dr-userprofile-row">
                <div class="dr-userprofile-column1">
                    <div class=dr-userprofile-name>
                        <?php if ($student[0]->status == "continue") : ?>
                            <div>
                                <img src="<?= ROOT ?>assets/dr/imgano.png" alt="Your Image">
                            </div>
                        <?php endif; ?>
                        <?php if ($student[0]->status == "suspended") : ?>
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
                
              
            </div>
        </div>

        <div class="dr-userprofile-flex-container">
            <div class="dr-userprofile-white-container3-1">
                <p class="dr-userprofile-left-top-text2">Examination Results</p>
                <?php if (!empty($exams)) : ?>
                    <?php foreach ($exams as $exam) : ?>
                        <?php if ($exam->status == "completed") : ?>
                            <p class="dr-userprofile-left-top-text3">Semester <?= $exam->semester ?></p>
                            <table>
                                <?php if (!empty($finalMarks)) : ?>
                                    <tr>
                                        <th>Subject</th>
                                        <th>Result</th>
                                    </tr>
                                    <?php foreach ($finalMarks as $individualFinalMark) : ?>
                                        <?php if ($individualFinalMark->examID == $exam->examID) : ?>
                                            <tr>
                                                <td><?= $individualFinalMark->subjectCode ?></td>
                                                <td><?= $individualFinalMark->grade ?></td>
                                            </tr>
                                        <?php endif; ?>
                                    <?php endforeach; ?>
                                <?php else : ?>
                                    <p class="dr-userprofile-left-top-text4">No Examination Results for this semester</p>
                                <?php endif; ?>
                            </table>
                        <?php endif; ?>
                    <?php endforeach; ?>
                <?php else : ?>
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
               
            </div>
        </div>
      
        <div class="dr-footer">
            <?php $this->view('components/footer/index', $data) ?>
        </div>
    </div>
    
</body>

</html>