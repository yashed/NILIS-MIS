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
            margin: 5% 25%;
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
              
            </div>
        </div>
        
        <div class="dr-footer">
            <?php $this->view('components/footer/index', $data) ?>
        </div>
    </div>
    <script>
       
        

      

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
            const studentId = urlParams.get('studentId');

            // Now you can use the `studentId` to fetch and display the corresponding student's data.
        });
    </script>
</body>

</html>
