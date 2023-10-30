<?php
    $role = "DR";

    include_once '../../components/navside-bar/header.php';
    include_once '../../components/navside-bar/sidebar.php';
    include_once '../../components/navside-bar/footer.php';
?>
<DOCTYPE html!>
<html>
    <head>
        <title>Degree Profile</title>
    </head>
    <style>
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
        .large_box{
            /* width: 100%; */
            /* height: 100%;
            background-color:rgb(204, 194, 194); */
            
            height: 100vh;
            left: 250px;
            position: relative;
            width: calc(100% - 250px);
            transition: var(--tran-05);
            background: var(--body-color);

            display: grid;  
            grid-template-columns: 50% 50% ;
            grid-template-rows: 10% 40% 50% ;
        }
        .sidebar.close~.large_box{
            left: 88px;
            width: calc(100% - 88px);
        }
        .box_1{
            border-radius: 5px;
            margin: 5px;
            padding: 0 2px 2px 2px;
            background-color: var(--text-color);
            grid-column: 1 / 3 ;
            grid-row: 1 / 1 ;
        }

        .box_2{
            border-radius: 5px;
            margin:0 5px 5px 5px;
            background-color: var(--text-color);
            grid-column: 1 / 1 ;
            grid-row: 2 / 2 ;
        }

        .box_3{
            border-radius: 5px;
            margin:0 5px 5px 0;
            background-color: var(--text-color);
            grid-column: 2 / 2 ;
            grid-row: 2/ 2 ;
        }

        .box_4{
            border-radius: 5px;
            margin:0 5px 5px 5px;
            background-color: var(--text-color);
            grid-column: 1 / 3;
            grid-row: 3/ 3 ;
        }
        .Overview_table{
            margin: 3%;
            border-spacing: 10px;
        }

        .Overview_table input{
            width:80%;
            height: 20px;
            background: transparent;
            outline:none;
            border-radius: 5px;
            border: 1px solid gainsboro;
        }

        #delete_degree{
            color: red;
            border-radius: 7px;
            width: auto;
            height: 25px;
            border: 2px solid red;
        }
        .Subject_table{
            margin:5% ;
            border-spacing: 5px;
            text-align: left;
        }

        .Subject_table input{
            width:80%;
            height: 30px;
            background: transparent;
            outline:none;
            border-radius: 5px;
            border: 1px solid gainsboro;
        }

        .credits{
            text-align: center;
        }
        .box_3_2{
            overflow-y: auto;
            max-height: 70%;
        }
        .time_table{
            margin: 2% 5% 3% 5%;
            border-spacing: 5px;
        }

        .create_time_table_raw{
            margin: 1% 5% 3% 5%;
            border-spacing: 5px;
            align-items: center;
        }

        .box_4 input{
            width: 100%;
            height: 30px;
            background: transparent;
            outline:none;
            border-radius: 5px;
            border: 1px solid gainsboro;
        }

        .box_4 .event{
            width: 80%;
        }

        .time_table .duration{
            text-align: center;
        }
        .box_4_1{
            overflow-y: auto;
            max-height: 50%;
        }

        #add_new_event{
            width: 100%;
            height: 30px;
            background: transparent;
            outline:none;
            border-radius: 5px;
            border: 1px solid gainsboro;
            color: gray; 
        }

        #save,#update{
            background-color: rgb(184, 163, 163);
            border-radius: 7px;
            width: 100%;
            height: 25px;
            background: transparent;
        }
        .box_2 p,.box_3 p,.box_4 p{
            font-size: 20px;
            color: var(--sidebar-color);
            margin: 3% 0 0 5%;
            font-weight: 500;
        }
        .box_1 p{
            font-size: 30px;
            color: black;
            margin: 1% 1% 1% 3%;
        }
    </style>
    <body>
        <div class="large_box">
            <div class="box_1"><p>Degree Name</p></div>
            <div class="box_2">
                    <p>Overview</p>
                    <table class="Overview_table">
                        <tr>
                            <td>
                                <b>Type</b><br>
                                <input type="text" name="type" id="type">
                            </td>
                            <td>
                                <b>Acodemic Year</b>
                                <input type="text" name="year" id="year">
                            </td>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <b>Participants</b>
                                <input type="text" name="participants" id="participants_1">
                            </td>
                            </td>
                            <td>
                                <b>Participants</b>
                                <input type="text" name="participants" id="participants_2">
                            </td>
                        </tr>
                        <td colspan="2"><center><button class="pin" id="delete_degree">Delete Degree</button></center></td>
                    </table>
            </div>
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
            <div class="box_4">
                <p>Degree Time Table</p>
                <div class="box_4_1">
                <table class="Time_table">
                    <tr>
                        <th align="left">Event</th>
                        <th colspan="2">Duration</th>
                    </tr>
                    <tr>
                        <td width="76%"><input type="text" name="event_1" class="event" placeholder="Mid Semester Break"></td>
                        <td width="12%"><input type="date" name="start_1" class="duration" placeholder=""></td>
                        <td width="12%"><input type="date" name="end_1" class="duration" placeholder=""></td>
                    </tr>
                    <tr>
                        <td><input type="text" name="event_2" class="event" placeholder="Study Leave"></td>
                        <td><input type="date" name="start_2" class="duration" placeholder=""></td>
                        <td><input type="date" name="end_2" class="duration" placeholder=""></td>
                    </tr>
                    <tr>
                        <td><input type="text" name="event_3" class="event" placeholder="First Semester Examination"></td>
                        <td><input type="date" name="start_3" class="duration"  placeholder=""></td>
                        <td><input type="date" name="end_3" class="duration" placeholder=""></td>
                    </tr>
                    <tr>
                        <td><input type="text" name="event_4" class="event" placeholder="Second Semester Examination"></td>
                        <td><input type="date" name="start_4" class="duration" placeholder=""></td>
                        <td><input type="date" name="end_4" class="duration" placeholder=""></td>
                    </tr>
                </table>
                </div>
                <div class="box_4_2">
                <table class="create_time_table_raw">
                    <tr>
                        <th colspan="3"><button class="pin" id="add_new_event">&#128198 Add New Event</button></th>
                    </tr>
                    <tr>
                        <td width="76%" class="event"></td>
                        <td width="12%"><button class="pin" id="update">Update</button></td>
                        <td width="12%"><button class="pin" id="save">Save</button></td>
                        
                    </tr>
                </table>
                </div>
            </div>
        </div>
    </body>
    <script>
        let add = document.querySelector("#add_new_event");
        let table = document.querySelector(".Time_table");

        add.addEventListener("click", () => {
            let template = `
                <tr>
                    <td><input type="text" name="event_3" class="event" placeholder="New Event"></td>
                    <td><input type="date" name="start_3" class="duration"  placeholder=""></td>
                    <td><input type="date" name="end_3" class="duration" placeholder=""></td>
                </tr>
            `;
            let newRow = document.createElement("tr");
            newRow.innerHTML = template;

            table.appendChild(newRow);
        });
    </script>
</html>