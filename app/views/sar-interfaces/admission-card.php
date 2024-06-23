<head>
    <title>Admission Card</title>
    <script src="https://rawgit.com/eKoopmans/html2pdf/master/dist/html2pdf.bundle.js"></script>
</head>


<style>
    @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap');
    @import url('https://fonts.cdnfonts.com/css/times-new-roman');

    * {

        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

    :root {
        --body-color: #E2E2E2;
        --sidebar-color: #17376E;
        --primary-color: #9AD6FF;
        --text-color: #ffffff;

        --fs-xl: 5rem;
        --fs-600: 1.5rem;
        --fs-500: 1.25rem;
        --fs-400: 1rem;


        body {

            line-height: 1.5;
            width: 100%;
            color: #393232;
        }

        .exam-create-footer {
            position: absolute;
            bottom: 0;
            width: 100%;

            background: #17376e;
            color: #fff;
            text-align: center;
            padding: 10px 0;
        }
    }

    page {
        background: white;
        display: block;
        margin: 0 auto;
        margin-bottom: 0.5cm;
        /* box-shadow: 0 0 0.5cm rgba(0, 0, 0, 0.1); */
    }

    page[size="A4"] {
        width: 21cm;
        height: 29.7cm;
    }


    .admission-content {
        margin: 10px;
    }

    .admission-title {
        display: flex;
        flex-direction: column;
        justify-content: center;
        gap: 40px;
        align-items: center;
    }

    .admission-title img {
        width: 5em;
        height: 111.11px;
        margin-top: 20px;

    }

    .admission-nilis {
        text-align: center;
        height: 68px;
        color: var(--black, #000);
        text-align: center;
        font-family: Times New Roman;
        font-size: 26px;
        font-style: normal;
        font-weight: 400;

    }

    .admission-course-name {
        color: var(--black, #000);
        text-align: center;
        font-family: Times New Roman;
        font-size: 20px;
        font-style: normal;
        font-weight: 700;
        line-height: normal;
    }

    .admission-exam {
        color: var(--black, #000);
        text-align: center;
        font-family: Times New Roman;
        font-size: 20px;
        font-style: italic;
        font-weight: 400;
        line-height: normal;
    }

    .admission-card {
        color: var(--black, #000);
        text-align: center;
        font-family: Poppins;
        font-size: var(--fs-500);
        font-style: normal;
        font-weight: 700;
        line-height: normal;
        margin-top: 20px;
        margin-down: 20px;
    }

    .admission-header {
        display: flex;
        flex-direction: column;
        justify-content: center;
        gap: 30px
    }

    .admission-name-index {
        color: var(--black, #000);
        font-family: Times New Roman;
        font-size: 16px;
        font-style: normal;
        font-weight: 400;
        line-height: normal;
        display: flex;
        flex-direction: row;
        justify-content: space-around;
        gap: 30px;
        margin-top: 40px;
    }

    .admission-content {
        display: flex;
        flex-direction: column;
        justify-content: center;
        gap: 30px;
        min-height: 400px;
    }

    .admission-table {
        margin: 50px 0px 20px 0px;
        font-family: Inter;
        border-collapse: collapse;
        width: 90%;
        /* min-height: px; */
    }

    .admission-table tr {
        border: 1px solid #ddd;


    }

    .admission-table td {

        font-family: Inter;
        border: 1px solid #ddd;
        padding: 4px;
        text-align: left;
        font-size: 14px;
        padding: 10px 5px 10px 5px;
    }



    .admission-table th {
        padding-top: 12px;
        border: 1px solid #ddd;
        padding-bottom: 12px;
        text-align: center;
        font-size: 14px;
        font-style: normal;
        font-weight: 600;
    }

    .admission-data-tb {
        display: flex;
        justify-content: center;
        align-items: center;

    }

    .print-btn {
        display: flex;
        margin-top: 20px;
        margin-right: 20px;
        justify-content: flex-end;
    }

    .print-btn-primary {
        width: 10%;
        color: #F00;
        background-color: white;
        border: 1px solid #F00;
        /* height: 4vh; */
        padding: 1em 0.5em 1em 0.5em;
        /* padding: 5px 5px 5px 5px; */
        border-radius: 12px;
        /* background: #C60000; */
        box-shadow: 0px 3px 6px 0px rgba(0, 0, 0, 0.2);
        /* border: 0px; */
        margin-bottom: 10px;
        /* margin-top: 25px; */
    }

    .print-bt-name {
        font-size: 16px;
        font-weight: 500px;
    }

    .print-btn-primary:hover {
        color: #F00;
        background-color: #D8C3C3;
        border: 1px solid #F00;
    }

    .admission-detail {
        margin-top: 40px;
    }

    @media print {

        #print {
            display: none;
        }

        title {
            display: none;
        }

        body,
        page {
            background: white;
            margin: 0;
            box-shadow: 0;
        }

        .print-btn {
            display: none;
        }

        .admission-content {
            margin: 10px;
        }


    }
</style>


<head>
    <title>Admission Card</title>
</head>



<body>
    <div class="admisssion-card">
        <div class="print-btn">
            <!-- <button class="print-btn-primary" type="submit" onclick="window.print()">Print Admission</button> -->
            <button class="print-btn-primary" type="submit" onclick="generatePDF()" id="downloadAdmisiionButton">Print
                Admission</button>
        </div>
        <page size="A4">
            <div class="admission-content">
                <div class="admission-title">
                    <img src="<?= ROOT ?>assets/NILIS-logo-2.png" alt="NILIS-logo">
                    <div class="admission-nilis"> National Institute of Library and Information Sciences </br>University
                        of
                        Colombo</div>
                </div>
                <div class="admission-header">
                    <?php if (!empty($degreeData)): ?>
                        <div class="admission-course-name"><?= $degreeData[0]->DegreeName ?> -
                            <?= $degreeData[0]->DegreeShortName ?>     <?= $degreeData[0]->AcademicYear ?>
                            <?php if (!empty($examDetails)): ?>
                                <div class="admission-exam"><?= $examDetails[0]->semester ?> Semester Examination -
                                    <?= $degreeData[0]->AcademicYear ?>
                                </div>
                            <?php endif ?>
                        <?php endif; ?>
                        <div class="admission-card">Admission Card</div>
                        <div class="admission-name-index">
                            <div class="admission-name">Name of the Candidate: <b>

                                    <?php if (!empty($studentData)): ?>
                                        <?= $studentData[0]->name ?>
                                    <?php endif; ?>
                                </b></div>
                            <div class="admission-index">Index Number: <b>
                                    <?php if (!empty($studentData)): ?>
                                        <?= $studentData[0]->indexNo;
                                        ?>
                                    <?php endif; ?>
                                </b></div>
                        </div>

                    </div>
                    <div class="admission-data-tb">
                        <table class="admission-table">
                            <thead>
                                <tr>
                                    <th>Date</th>
                                    <th>Subject</th>
                                    <th>Signature of the </br>Candidate</th>
                                    <th>Signature of the </br>Invigilator</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if (!empty($timeTableData)): ?>
                                    <?php foreach ($timeTableData as $ttdata): ?>
                                        <?php $json = json_encode($ttdata);
                                        // show($ttdata); ?>
                                        <tr>

                                            <td>
                                                <?= $ttdata[0]->date ?>
                                                </br>
                                                <?php
                                                $time = new DateTime($ttdata[0]->time);
                                                $timeHHMM = $time->format('H:i');
                                                $newtime = $time->add(new DateInterval('PT2H'));
                                                $newtimeHHMM = $newtime->format('H:i');
                                                echo $timeHHMM . ' - ' . $newtimeHHMM;
                                                ?>
                                            </td>
                                            <td>
                                                <?= $ttdata[0]->subjectName ?>
                                            </td>
                                            <td></td>
                                            <td></td>
                                        </tr>


                                    <?php endforeach; ?>
                                <?php endif ?>
                            </tbody>
                        </table>

                    </div>
                    <div class='admission-detail'>
                        <div class="admission-details-signature">.........................................
                        </div>
                        <div class="admission-details-name">
                            Mr Janaka Wipularatna
                        </div>
                        <div class="admission-details-possision">
                            Senior Assistant Registrar
                        </div>
                        <div class="admission-details-date">
                            <?= date("Y-m-d") ?>
                        </div>

                    </div>
                </div>

        </page>
    </div>

</body>

<script>


    function generatePDF() {
        const element = document.querySelector('.admisssion-card');
        html2pdf(element, {
            margin: 0,
            filename: 'admission_card.pdf',
            html2canvas: { scale: 2 },
            jsPDF: { unit: 'mm', format: 'a4', orientation: 'portrait' }
        });

        // Hide the download button 
        const downloadButton = document.getElementById('downloadAdmisiionButton');
        downloadButton.style.display = 'none';

        // Show the download button after a delay
        setTimeout(function () {
            downloadButton.style.display = 'block';
        }, 3000);
    }
</script>

</html>