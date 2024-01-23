<?php
    $role = "Director";
    $data['role']=$role;
?>
<?php $this->view('components/navside-bar/header', $data) ?>
<?php $this->view('components/navside-bar/sidebar', $data) ?>
<?php $this->view('components/navside-bar/footer', $data) ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" type="text/css" href="<?=ROOT?>css/student/style.css">
    <!-- <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> -->
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
            margin-top: 30px;
            display: flex;
            flex-direction: row;
        }
        .yesorno{
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

            body {
  background-color: #E2E2E2;
  margin: 0;
  padding: 0;
}

.white-container1-1 {
  background-color: white;

  height: 120px;
  padding:2%;

  color: #000000;
  font-size:100%;
  font-family: "Poppins", sans-serif;
  margin-bottom: 10px;
  border-radius: 10px;
  font-weight: bold;
  transition: all 0.5s ease;
}



.left-top-text {
  text-align: left;
  margin: 0;
  padding: 0;
  color: #c02626;
  margin-bottom: 30px;
  font-family: "Poppins", sans-serif;
}

.white-container2-1 {

  background-color: white;
   
  height: 500px;
  font-family: "Poppins", sans-serif;
  align-items: center;
  justify-content: center;
  border-radius: 10px;
  transition: all 0.5s ease;
}




.flex-container {
  display: flex;
  justify-content: space-between;
  gap: 10px;
}

.white-container3-1 {
  flex: 1;
  padding-left: 10%;
  margin-top: 10px;
  margin-bottom: 10px;
  background-color: white;
  height: 800px;
  width: 50%;
  /* font-family: "Poppins", sans-serif; */
  font-size: 24px;
  border-radius: 10px;

  transition: all 0.5s ease;
}





.white-container4-1 {
  flex: 1;
  padding-left: 5%;
  margin-top: 10px;
  margin-bottom: 10px;
  background-color: white;
  height: 800px;
  width: 50%;
  font-family: "Poppins", sans-serif;
  font-size: 24px;
  border-radius: 10px;
}

.row {
  display: flex;
  font-family: "Poppins", sans-serif;
  /* margin-left: 5%; */
}

.column1 {
  flex: 33.33%;
  background-color: #ffffff;
  height: 150px;
  /* margin-left: 5%; */
}

.column2 {
  flex: 33.33%;
  background-color: #ffffff;
  padding: 2%;
  height: 150px;
}

.column3 {
  flex: 33.33%;
  background-color:#ffffff;
  padding: 2%;
  height: 150px;
}

.data1 {
  font-family: "Poppins", sans-serif;
  font-size: 25px;
  padding-left: 10%;
  color: #17376E;
}

.data2 {
  font-family: "Poppins", sans-serif;
  font-size: 25px;
  padding-left: 10%;
  color: #17376E;
  padding-top: 20px;
}

.data3 {
  font-family: "Poppins", sans-serif;
  font-size: 25px;
  padding-left: 10%;
  color: #17376E;
}

.data4 {
  font-family: "Poppins", sans-serif;
  font-size: 25px;
  padding-left: 10%;
  color: #17376E;
  padding-top: 20px;
}



.email {
  padding-top: 5px;
  font-size: 18px;
  color: #000000;

}

.regNum {
  padding-top: 5px;
  font-size: 18px;
  color: #000000;
}

.country {
  padding-top: 5px;
  font-size: 18px;
  color: #000000;
}

.indexNum {
  padding-top: 5px;
  font-size: 18px;
  color: #000000;
}

.name {
  font-size: 20px;
  display: flex;
  flex-direction: column;
  align-items: center;
  row-gap: 10px;
}

.left-top-text1 {
  padding-left: 10%; 
  padding-top: 2%;
  text-align: left;
  margin: 0;
  
  color: #17376E;
  margin-bottom: 30px;
  font-family: "Poppins", sans-serif;
  font-size: 30px;
  font-weight: bold;
}


.left-top-text2 {
  /* padding-left: 10%; */
  padding-top: 2%;
  text-align: left;
  margin: 0;
  
  color: #17376E;
  margin-bottom: 30px;
  font-family: "Poppins", sans-serif;
  font-size: 30px;
  font-weight: bold;
}

.row2 {
  display: flex;
  font-family: "Poppins", sans-serif;
  margin-left: 10%;
}

.column2-2{
  padding-left: 15%;
}



.buttons {
  display: flex;
  /* Use flexbox to arrange the buttons horizontally */
  justify-content: space-between;
  /* Adjust horizontal spacing between buttons */
}

.left-top-text3 {
  text-align: left;
  margin: 0;
  padding-top: 10px;
  padding-left: 15px;
  color: #000000;
  margin-bottom: 5px;
  font-family: "Poppins", sans-serif;
}

.table {
  border-collapse: collapse;
  width: 300px;
}

td {
  font-size: 17px;
  /* Data font size */
  width: 300px;
  padding: 5px;
  /* Data cell padding */
  border: 1px solid #ffffff;
  /* Data cell border */
  text-align: center;

}

th {
  background-color: #ffffff;
  /* Header background color */
  font-size: 20px;
  /* Header font size */
  font-weight: bold;
  /* Header font weight */
  padding: 20px;
  /* Header cell padding */

}

.bday {
  padding-top: 5px;
  padding-bottom: 30px;
  font-size: 18px;
  color: #000000;

}

.nic {
  padding-top: 5px;
  padding-bottom: 30px;
  font-size: 18px;
  color: #000000;
}

.phoneNum {
  padding-top: 5px;
  padding-bottom: 30px;
  font-size: 18px;
  color: #000000;
}

.Fax {
  padding-top: 5px;
  padding-bottom: 30px;
  font-size: 18px;
  color: #000000;
}

.adr {
  padding-top: 5px;
  padding-bottom: 30px;
  font-size: 18px;
  color: #000000;
}

.button {
  background-color: #17376E;
  border: none;
  color: white;
  padding: 15px 32px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
  margin: 4px 2px;
  cursor: pointer;
}

#updateButton {
  margin-left: 52%;
  border-radius: 8px;
  width: 150px;
  height: 40px;
  padding-bottom: 30px;
}

#updateButton:hover {
  background-color: #ccc;
}



/* .input[type=submit] {
  width: 100%;
  background-color:#17376E;
  padding: 14px 20px;
  margin: 8px 0;
  border: none;
  border-radius: 4px;
  cursor: pointer;
  width:100px;
} */

#submitbutton {
  width: 100%;
  background-color: #17376E;
  color: #ffffff;
  padding: 10px;
  margin: 8px 0;
  border: none;
  border-radius: 4px;
  cursor: pointer;
  width: 100px;
}

#submitbutton:hover {
  background-color: #ccc;
}

.close-button {
  width: 100%;
  background-color: #ccc;
  color: #17376E;
  padding: 10px;
  margin: 8px 0;
  border: none;
  border-radius: 4px;
  cursor: pointer;
  width: 100px;
  border-color: #000000;
  border-width: 1px;
}

.close-button:hover {
  background-color: #E2E2E2;
}

/* input[type=submit]:hover {
  background-color: whitesmoke;
} */

.popupForm1 {
  border-radius: 5px;
  background-color: #f2f2f2;
  padding: 20px;
  width: 500px;
  height: 300px;
}

.popupForm2 {
  border-radius: 5px;
  background-color: #f2f2f2;
  padding: 20px;
  width: 500px;
  height: 800px;
}

/* class->.ad
id=# */

/* #changedegreebutton{
  margin: left 800px;;
  border-radius: 8px;
  width: 250px;
  height: 40px;
  padding-bottom: 30px;
} */

#changedegreebutton {
  border-radius: 8px;
  width: 250px;
  height: 40px;
  padding-bottom: 30px;
}


#changedegreebutton:hover {
  background-color: #ccc;
}

#deletebutton {
  display: inline-block;
  padding: 10px 20px;
  background-color: white;
  border: 2px solid red;
  color: red;
  text-align: center;
  text-decoration: none;
  font-size: 16px;
  cursor: pointer;
  border-radius: 8px;
  height: 40px;
  padding-bottom: 30px;
}

#deletebutton:hover {
  background-color: #E2E2E2;
}

.cur-deg {
  font-size: 20px;
}

.change-deg {
  font-size: 20px;
}

.change-deg select {
  padding: 20px;
  font-size: 18px;
}

#update-deg {
  width: 100%;
  background-color: #17376E;
  color: #ffffff;
  padding: 10px;
  margin: 8px 0;
  border: none;
  border-radius: 4px;
  cursor: pointer;
  width: 100px;
}

#update-deg:hover {
  background-color: #ccc;
}
        }
    </style>
</head>

<body>
<div class="dr-userprofile">
    <div class="white-container1-1">Diploma in Library and Information Management</div>
    <div class="white-container2-1">
        <p class="left-top-text2">User Details</p>
        <div class="row">
            <div class="column1">
                <div class=name>
                    <img src="<?=ROOT?>assets/dr/imgano.png">
                    <p><?= $student->name ?></p>
                </div>
            </div>


            <div class="column2">
                <div class="data1"><b>Email:</b><br>
                    <div class="email"><?= $student->Email ?></div>
                </div><br>
                <div class="data2"><b>Registration number:</b><br>
                    <div class="regNum"> <?= $student->regNo ?></div>
                </div>
            </div>
            <div class="column3">
                <div class="data3"><b>Country:</b><br>
                    <div class="country"> Sri Lanka</div>
                </div><br>
                <div class="data4"><b>Index number:</b><br>
                    <div class="indexNum"> <?= $student->indexNo ?></div>
                </div>
            </div>
        </div>
        
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
                        <div class="bday"><?= $student->birthdate ?></div>
                    </div><br>
                    <div class="data2"><b>N.I.C. No:</b><br>
                        <div class="nic"> <?= $student->nicNo ?></div>
                    </div><br>
                    <div class="data2"><b>Phone Number:</b><br>
                        <div class="phoneNum"> <?= $student->phoneNo ?></div>
                    </div>
                </div>
                <div class="column2-2">
                    <div class="data1"><b>Fax:</b><br>
                        <div class="Fax"><?= $student->fax ?></div>
                    </div><br>
                    <div class="data2"><b>Address:</b><br>
                        <div class="adr"> <?= $student->address ?></div>
                    </div>
                </div>
            </div>
           
        </div>
    </div>

    <div id="overlay"></div>
    <div class="dr-footer">
        <?php $this->view('components/footer/index',$data) ?>
    </div>
</div>                    

       
</body>
</html>