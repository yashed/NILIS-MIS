<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../../../public/css/student/style.css">
</head>

<body>
    <?php
    $role = "Clerk";

    include_once '../../components/navside-bar/header.php';
    include_once '../../components/navside-bar/sidebar.php';
    // include_once '../../components/navside-bar/footer.php';
    ?>
    <header>
    </header>

    <div class="white-container1 close">
        Diploma in Library and Information Management<br>
        <h5>Participant</h5>
    </div>

    <div class="white-container2 close">
        <p class="left-top-text">User Details</p>
        <div class="row">
            <div class="column1">
                <div class=name>
                    <p>M.A.S.D.Muthugala</p>
                </div>
            </div>


            <div class="column2">
                <div class="data1"><b>Email:</b><br>
                    <div class="email">email1@gmail.com</div>
                </div>
                <br>
                <div class="data2"><b>Registration number:</b><br>
                    <div class="regNum"> DLIM/23/001</div>
                </div>
            </div>

            <div class="column3">
                <div class="data3"><b>Country:</b><br>
                    <div class="country"> Sri Lanka</div>
                </div>
                <br>
                <div class="data4"><b>Index number:</b><br>
                    <div class="indexNum"> DLIM/001</div>
                </div>
            </div>
        </div>
        <div class="buttons">
            <div class="button1">
                <?php include '../../components/button/button.php' ?>
            </div>
            <div class="button2">
                <?php include '../../components/button/button.php' ?>
            </div>
        </div>
    </div>

    <div class="flex-container">
        <div class="white-container3 close">
            <p class="left-top-text3">Examination Results</p>
            <p class="left-top-text4">Semester 1</p>
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
            <p class="left-top-text4">Semester 2</p>
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


        <div class="white-container4">
            <p class="left-top-text2">User Details</p>

            <div class="row2">
                <div class="column2-1">
                    <div class="data1"><b>Date Of Birth:</b><br>
                        <div class="email">2001/09/11</div>
                    </div>
                    <br>
                    <div class="data2"><b>N.I.C. No:</b><br>
                        <div class="regNum"> 20011424141</div>
                    </div><br>
                    <div class="data2"><b>Phone Number:</b><br>
                        <div class="regNum"> 0779181046</div>
                    </div>
                </div>

                <div class="column2-2">
                    <div class="data1"><b>Fax:</b><br>
                        <div class="country">21313131313224</div>
                    </div>
                    <br>
                    <div class="data2"><b>Address:</b><br>
                        <div class="indexNum"> Colombo 07</div>
                    </div>
                </div>
            </div>
            <div class="button3">
                <?php include '../../components/button/button.php' ?>
            </div>
        </div>
    </div>

    <script>
        const body = document.querySelector("body"),
            sidebar = body.querySelector(".sidebar"),
            toggle = body.querySelector(".toggle");
        whitecontainer1 = body.querySelector(".white-container1");
        whitecontainer2 = body.querySelector(".white-container2");
        whitecontainer3 = body.querySelector(".white-container3");

        toggle.addEventListener("click", () => {
            sidebar.classList.toggle("close");
            whitecontainer1.classList.toggle("close");
            whitecontainer2.classList.toggle("close");
            whitecontainer3.classList.toggle("close");
        });

        let subMenu = document.getElementById("subMenu");

        function toggleMenu() {
            subMenu.classList.toggle("open-menu");
        }
    </script>
</body>

</html>