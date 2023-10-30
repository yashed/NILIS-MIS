<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="create-degree.css">
    <link rel="stylesheet" href="../../../public/css/button.css">
    <title>Document</title>
</head>
<body>
    <div class="container">
        <h3>Create New Degree Program</h3>
        <form id="Form1">
            <div class="input-fields">

                <label for="Degree" class="drop-down" >Degree Type:</label><br>
                <select name="degree type" id="degree type" style="width: 360px;">
                    <option value="volvo">One Year Degree</option>
                    <option value="saab">Two Year Degree</option>
                </select><br><br><br>

                <label for="Degree"  class="drop-down" >Select Degree Program:</label><br>
                <select name="select degree type" id="select degree type" style="width: 360px;">
                    <option value="volvo">DLMS</option>
                    <option value="saab">ENCM</option>
                </select><br><br><br>
            </div>

            <div class="btn-box">
                <div class="button-btn">
                    <a type="button" class="bt-name" style="text-decoration: none; margin-right: 25px; background-color: #fff; color: #222d76;" id="Cancel1">Cancel</a>

                    <a type="button" class="bt-name" style="text-decoration: none; margin-right: -53px;" id="Next1">Continue</a>
                </div>
            </div>
        </form>

        <form id="Form2">
            <p>Define Subjects and Credits</p>
            
            <div class="box_3">
                <div class="box_3_1"><p>Subject</p></div>
                <div class="box_3_2"><table class="Subject_table">
                    <tr>
                        <th>Semester 1</th>
                        <th>Credits</th>
                    </tr>
                    <tr>
                        <td width="80%"><input type="text" name="subject_1" class="subject" placeholder="Subject 1"></td>
                        <td><input type="text" name="cedits_1" class="credits" placeholder="2"></td>
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
                    <a type="button" class="bt-name" style="text-decoration: none; margin-right: 25px; background-color: #fff; color: #222d76;" id="Back1">Back</a>

                    <a type="button" class="bt-name" style="text-decoration: none; margin-right: -53px;" id="Next2">Continue</a>
                </div>
            </div>
        </form>

        <form id="Form3">
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
                    <a type="button" class="bt-name" style="text-decoration: none; margin-right: 25px; background-color: #fff; color: #222d76;" id="Back2">Back</a>

                    <a type="Submit" class="bt-name" style="text-decoration: none; margin-right: -53px;" >Create</a>
                </div>
            </div>
        </form>
            <div class="step-row">
                <div id="progress"></div>
            </div>

    </div>

    <script>
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
</body>
</html>