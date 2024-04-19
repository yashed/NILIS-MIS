<?php
$role = "director";
$data['role'] = $role;
?>
<?php $this->view('components/navside-bar/degreeprogramsidebar', $data) ?>
<?php $this->view('components/navside-bar/footer', $data) ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" type="text/css" href="<?= ROOT ?>css/student/style.css">
</head>

<body>
    <div class="dr-userprofile">
        <div class="white-container1-1">
            <div class="white-container1"><?= $degree[0]->DegreeName ?></div>
            <div class="white-container1-core"><b>Participants</b></div>
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
                        <div class="country"> <?= $student[0]->country ?></div>
                    </div><br>
                    <div class="data4"><b>Index number:</b><br>
                        <div class="indexNum"> <?= $student[0]->indexNo ?></div>
                    </div>
                </div>
            </div><br>
          
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
                            <div class="Fax"><?= $student[0]->whatsappNo ?></div>
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
                
            </div>
        </div>
 
        <div class="dr-footer">
            <?php $this->view('components/footer/index', $data) ?>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    
</body>

</html>