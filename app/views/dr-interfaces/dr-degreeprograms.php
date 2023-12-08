<?php
    $role = "DR";
    $data['role'] = $role;
?>

<?php $this->view('components/navside-bar/header',$data) ?>
<?php $this->view('components/navside-bar/sidebar',$data) ?>
<?php $this->view('components/navside-bar/footer',$data) ?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="<?=ROOT?>css/create-degree.css">
        <title>DR Dashboard</title>
    </head>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap');
* {
    font-family: 'Poppins', sans-serif;
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}
:root {
    --body-color: #E2E2E2;
    --sidebar-color: #17376E;
    --primary-color: #9AD6FF;
    --text-color: #ffffff;
    --tran-02: all 0.2s ease;
    --tran-03: all 0.3s ease;
    --tran-04: all 0.4s ease;
    --tran-05: all 0.5s ease;
}
.dr-home {
    height: 100vh;
    left: 250px;
    position: relative;
    width: calc(100% - 250px);
    transition: var(--tran-05);
    background: var(--body-color);
}
.dr-title {
    font-size: 30px;
    font-weight: 600;
    color: black;
    padding: 10px 0px 10px 32px;
    background-color: var(--text-color);
    border-radius: 6px;
    margin: 7px 4px 7px 4px;
}
.sidebar.close~.dr-home {
    left: 88px;
    width: calc(100% - 88px);
}
.dr-subsection-1 {
    background-color: var(--text-color);
    padding: 10px 10px 30px 35px;
    border-radius: 6px;
    margin: 7px 4px 7px 4px;
}
.dr-sub-title {
    color: #17376E;
    font-family: Poppins;
    font-size: 22px;
    font-style: normal;
    font-weight: 600;
    margin : 40px;
}
.dr-degree-bar {
    display: flex;
    flex-direction: row;
    justify-content: space-around;
    flex-wrap: wrap;
    margin-bottom: 20px;
}
.dr-card1 {
    margin-bottom: 4px;
}
.dr-exam-bar {
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
    flex-wrap: nowrap;
    gap:30px;
}
.dr-exam-card1{
    margin-bottom: 5px;
}
.model-box{
    display: none;
    position: fixed;
    top:10%;
    left: 35%;
}
.danger{
    border-color: red;
    border-width: 5px;
    border-style: groove;
    border-radius: 5px;
}
.bt-name{
    color: #fff;
    padding: 8px 22px;
    border-radius: 6px;
    background: #17376E;
    box-shadow: 0px 3px 6px 0px rgba(0, 0, 0, 0.20);
    border: 0px;
    font-size: 14px;
    font-weight: 600;
}
.bt-name:hover{
    background: #fff;
    color: #17376E;
}
.bt-name-white{
    background: #fff;
    padding: 8px 22px;
    border-radius: 6px;
    color: #17376E;
    box-shadow: 0px 3px 6px 0px rgba(0, 0, 0, 0.20);
    border: 0px;
    font-size: 14px;
    font-weight: 600;
}
.bt-name-white:hover{
    color: #fff;
    background: #17376E;
}
    </style>
    <body>
    <div class="dr-home">
        <div class="dr-title">Degree Program</div>
        <div class="dr-subsection-1">
            
            <div class="button-btn">
                <button onclick="myFunction()" type="button" class="bt-name" style="float: right; margin-right: 40px;">Create Degree Program</button>
            </div>

            <div class="dr-sub-title">Ongoing Degree Programs</div>
            <div class="dr-degree-bar">
                <?php $count = 0; ?>
                <?php foreach($degrees as $degree): ?>
                    <div class="dr-card1">
                        <a href="<?=ROOT?>dr/degreeprofile" style="text-decoration: none;">
                            <?php $this->view('components/degree-card/degree-card', ["degree" => $degree]) ?>
                        </a>
                    </div>
                    <?php $count++; ?>
                <?php endforeach; ?>
            </div>
        </div>
        <div class="dr-subsection-1">
            <div class="dr-sub-title">Completed Degree Programs</div>
                    <p>Completed Degree Programs are not yet.</p>
        </div>
        <div class="dr-footer">
        <?php $this->view('components/footer/index',$data) ?>
        </div>

        <div class="model-box">
        
        <div class="container">          
            <h3>Create New Degree Program</h3>
            <form id="Form1" method="post">
                <div class="input-fields" style="margin: 20px 0px 10px 0px;">

                    <label for="Degree" class="drop-down" >Degree Type:</label><br>
                    <select name="degree type" id="degree type" style="width: 360px;" >
                        <option value="" default hidden>Select</option>
                        <option value="">1 Year Degree</option>
                        <option value="">2 Year Degree</option>
                    </select><br><br><br>

                    <label for="Degree"  class="drop-down" >Select Degree Program:</label><br>
                    <select name="select degree type" id="select degree type" style="width: 360px;">
                        <option value="" default hidden>Select</option>
                        <option value="">DLMS</option>
                        <option value="">ENCM</option>
                    </select><br><br><br>
                </div>

                <div class="btn-box">
                    <div class="button-btn">

                        <button onclick="myFunction2()" type="button" class="bt-name-white" id="Cancel1">Cancel</button>
                        <button  type="button" class="bt-name" style="text-decoration: none; margin-right: -53px;" id="Next1">Continue</button>
                    </div>
                </div>
            </form>

            <form id="Form2" method="post">
                <p>Define Subjects and Credits</p>
                
                <div class="box_3">
                    <div class="box_3_1"><p>Subject</p></div>
                    <div class="box_3_2"><table class="Subject_table">
                        <tr>
                            <th>Semester 1</th>
                            <th>Credits</th>
                        </tr>
                        <tr>
                            <td width="80%"><input type="text" name="subject_1" class="subject" placeholder="Subject 1">
                                    <?php if(!empty($errors['SubjectName'])):?>
                                        <small class="danger"><?=$errors['SubjectName']?></small>
                                    <?php endif;?>
                            </td>
                            <td><input type="text" name="cedits_1" class="credits" placeholder="2">
                                    <?php if(!empty($errors['NoCredit'])):?>
                                        <small class="danger"><?=$errors['NoCredit']?></small>
                                    <?php endif;?>
                            </td>
                        </tr>
                        <tr>
                            <td><input type="text" name="subject_2" class="subject" placeholder="Subject 2"></td>
                            <td><input type="text" name="cedits_2" class="credits" placeholder="2"></td>
                        </tr> <tr>
                            <td><input type="text" name="subject_3" class="subject" placeholder="Subject 3"></td>
                            <td><input type="text" name="cedits_3" class="credits" placeholder="2"></td>
                        </tr> <tr>
                            <td><input type="text" name="subject_4" class="subject" placeholder="Subject 4"></td>
                            <td><input type="text" name="cedits_4" class="credits" placeholder="2"></td>
                        </tr>
                        <tr>
                            <th>Semester 2</th>
                            <th>Credits</th>
                        </tr><tr>
                            <td><input type="text" name="subject_5" class="subject" placeholder="Subject 5"></td>
                            <td><input type="text" name="cedits_5" class="credits" placeholder="2"></td>
                        </tr>
                    </table>
                    </div>
                </div>
                <div class="btn-box">
                    <div class="button-btn">
                        <button  type="button" class="bt-name-white" id="Back1">Back</button>
                        <button  type="button" class="bt-name" style="text-decoration: none; margin-right: -53px;" id="Next2">Continue</button>
                    </div>
                </div>
            </form>

            <form id="Form3" method="post">
                <h5>Define Scheme of Assignment</h5> 
                <div class="box_3">
                    <div class="box_3_1"><p>Subject</p></div>
                    <div class="box_3_2"><table class="Subject_table">
                        <tr>
                            <th>Grade</th>
                            <th>Max Mark</th>
                            <th>Min Mark</th>
                            <th>GPV</th>
                        </tr>
                        <tr>
                            <td width="20%"><input type="text" name="subject_1" class="subject" placeholder="A+"></td>
                            <td width="40%"><input type="text" name="cedits_1" class="credits" placeholder="100"></td>
                            <td width="40%"><input type="text" name="cedits_1" class="credits" placeholder="90"></td>
                            <td width="60%"><input type="text" name="cedits_1" class="credits" placeholder="4.00"></td>
                        </tr>
                        <tr>
                            <td width="40%"><input type="text" name="subject_1" class="subject" placeholder="A"></td>
                            <td width="40%"><input type="text" name="cedits_1" class="credits" placeholder="89"></td>
                            <td width="40%"><input type="text" name="cedits_1" class="credits" placeholder="80"></td>
                            <td width="60%"><input type="text" name="cedits_1" class="credits" placeholder="4.00"></td>
                        </tr>
                        <tr>
                            <td width="40%"><input type="text" name="subject_1" class="subject" placeholder="A-"></td>
                            <td><input type="text" name="cedits_1" class="credits" placeholder="79"></td>
                            <td><input type="text" name="cedits_1" class="credits" placeholder="75"></td>
                            <td width="60%"><input type="text" name="cedits_1" class="credits" placeholder="3.70"></td>
                        </tr>
                        <tr>
                            <td width="40%"><input type="text" name="subject_1" class="subject" placeholder="B+"></td>
                            <td><input type="text" name="cedits_1" class="credits" placeholder="74"></td>
                            <td><input type="text" name="cedits_1" class="credits" placeholder="70"></td>
                            <td width="60%"><input type="text" name="cedits_1" class="credits" placeholder="3.40"></td>
                        </tr>
                        <tr>
                            <td width="40%"><input type="text" name="subject_1" class="subject" placeholder="B"></td>
                            <td><input type="text" name="cedits_1" class="credits" placeholder="69"></td>
                            <td><input type="text" name="cedits_1" class="credits" placeholder="65"></td>
                            <td width="60%"><input type="text" name="cedits_1" class="credits" placeholder="3.00"></td>
                        </tr>
                        <tr>
                            <td width="40%"><input type="text" name="subject_1" class="subject" placeholder="B-"></td>
                            <td><input type="text" name="cedits_1" class="credits" placeholder="64"></td>
                            <td><input type="text" name="cedits_1" class="credits" placeholder="60"></td>
                            <td width="60%"><input type="text" name="cedits_1" class="credits" placeholder="2.70"></td>
                        </tr>
                    </table>
                    </div>
                </div>

                <div class="btn-box">
                    <div class="button-btn">
                        <button type="button" class="bt-name-white" id="Back2">Back</button>
                        <button type="Submit" class="bt-name" style="text-decoration: none; margin-right: -53px;" href="<?=ROOT?>dr/newDegree" >Create</button>

                    </div>
                </div>
            </form>
            <div class="step-row">
                <div id="progress"></div>
            </div>
        </div>
    </div>
    </body>
    <script>

        function myFunction(){
            const lb = document.querySelector(".model-box");
            lb.style.display ="block";
        }

        function myFunction2(){
            const lb = document.querySelector(".model-box");
            lb.style.display ="none";
        }

        //original
        var Form1 = document.getElementById("Form1");
        var Form2 = document.getElementById("Form2");
        var Form3 = document.getElementById("Form3");

        var Next1 = document.getElementById("Next1");
        var Next2 = document.getElementById("Next2");
        var Back1 = document.getElementById("Back1");
        var Back2 = document.getElementById("Back2");

        var progress = document.getElementById("progress");

        Next1.onclick = function(){
            Form1.style.left = "-450px";
            Form2.style.left = "40px";
            progress.style.width = "120px";
        }
        Back1.onclick = function(){
            Form1.style.left = "40px";
            Form2.style.left = "450px";
            progress.style.width = "10px";
        }
        Next2.onclick = function(){
            Form2.style.left = "-450px";
            Form3.style.left = "40px";
            progress.style.width = "240px";
        }
        Back2.onclick = function(){
            Form2.style.left = "40px";
            Form3.style.left = "450px";
            progress.style.width = "120px";
        }
    </script>
</html>