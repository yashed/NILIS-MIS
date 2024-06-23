<head>
    <title>Transcript Letter</title>
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
        flex-direction: row;
        justify-content: center;
        gap: 90px;
        align-items: center;
    }

    .admission-title img {
        width: 4em;
        height: 81.11px;
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
        font-weight: 600;

    }

    .admission-course-name {
        color: var(--black, #000);
        text-align: center;
        font-family: poppins;
        font-size: 18px;
        font-style: normal;
        font-weight: 500;
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
    }

    .admission-header {
        display: flex;
        flex-direction: column;
        justify-content: center;
        gap: 30px;

    }

    .admission-name-index {
        color: var(--black, #000);
        font-family: poppins;
        font-size: 16px;
        font-style: normal;
        /* font-weight: 500; */
        line-height: normal;
        display: flex;
        flex-direction: column;
        justify-content: space-around;


    }

    .admission-content {
        display: flex;
        flex-direction: column;
        justify-content: center;
        gap: 30px;
        min-height: 400px;
    }

    .admission-table {
        margin: 20px 0px 20px 0px;
        font-family: poppins;
        border-collapse: collapse;
        width: 90%;
        align-self: center;
    }

    .admission-table tr {
        border: 1px solid #ddd;
        text-align: center;

    }

    .admission-table td {

        font-family: poppins;
        text-align: center;
        border: 1px solid #ddd;
        padding: 4px;

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
        margin-top: 40px;
        font-size: 14px;
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        align-items: flex-start;

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
        display: flex;
        flex-direction: column;
        margin-top: 40px;
    }

    .results-abr {
        font-family: poppins;
        font-size: 11px;
    }

    .roe-table {
        display: flex;
        flex-direction: column;
        gap: 10px;
        width: 100%;
    }

    .year-name {
        font-family: poppins;
        font-size: 20px;
        font-weight: 500;
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

    .admission-name,
    .admission-index {


        font-weight: 400;

    }

    .transcript-letter {
        max-width: 90%;
        margin: 0 auto;
        padding: 20px;

        background-color: #fff;
        display: flex;
        flex-direction: column;

    }

    .header {
        margin-top: 50px;
        margin-bottom: 20px;
    }

    .header h1 {
        color: #333;
        font-size: 24px;
        margin: 0;
    }

    .content {
        margin-bottom: 20px;
    }

    .student-info {
        margin-bottom: 10px;
    }

    .student-info p {
        margin: 5px 0;
    }

    .footer {
        text-align: center;
    }

    .print-btn {
        text-align: center;
        margin-top: 20px;
    }

    .student-name {
        font-weight: 600;

    }

    .student-index {
        font-weight: 600;
    }

    .diploma-name {
        font-weight: 600;

    }

    .student-info p {
        font-size: 14px;
    }

    .results-sum {
        font-size: 14px;
        font-weight: 600;
        margin-top: 20px;
        margin-bottom: 20px;
    }

    .student-regno {
        font-weight: 600;
    }

    .transcript-title {
        text-align: left;
        text-decoration: underline;
    }

    .admission-details-signature {
        text-align: left;
    }

    .admission-address {
        font-size: 14px;
        font-weight: 500;
        margin-top: 20px;
        text-align: center;
    }
</style>


<head>
    <title>Record Of Examination</title>
</head>



<body>
    <div class="admisssion-card">
        <div class="print-btn">
            <!-- <button class="print-btn-primary" type="submit" onclick="window.print()">Print</button> -->
            <button class="print-btn-primary" type="submit" onclick="generatePDF()"
                id="downloadButton">Download</button>
        </div>
        <page size="A4">
            <div class="admission-content">
                <div class="admission-title">
                    <img src="<?= ROOT ?>assets/NILIS-logo-2.png" alt="NILIS-logo">
                    <div class='title-header'>
                        <div class="admission-nilis"> National Institute of Library and Information Sciences
                            </br>University
                            of
                            Colombo</div>
                        <div class="admission-address">Colombo 03 ,
                            00300 ,
                            Sri Lanka
                            Telephone +94 11 250 71 50
                        </div>
                    </div>
                </div>
                <div class="admission-header">

                    <div class="admission-name-index">
                        <?php if (!empty($studentData)): ?>
                            <div class="transcript-letter">
                                <div class="header">
                                    <span class='transcript-title'>WITH WHOM IT MAY CONCERN</span>
                                </div>
                                <div class="content">
                                    <div class="student-info">
                                        <p>This is to certify that <?php if ($studentData[0]->gender == 'M'):
                                            echo 'Mr.';
                                        else:
                                            echo 'Ms.';
                                        endif; ?>
                                            <span class="student-name"><?= $studentData[0]->name ?></span> with
                                            bearing registration no. <span
                                                class="student-regno"><?= $studentData[0]->regNo ?></span> and index no.
                                            <span class="student-index"><?= $studentData[0]->indexNo ?></span>
                                            is a registered internal student of the National
                                            Institute of Library and Information Sciences. He is currently studying
                                            <span class="diploma-name"><?= $degreeDetails[0]->DegreeName ?></span> .
                                            The duration of the programme is <span
                                                class="diploma-name"><?= $degreeDetails[0]->Duration ?></span> years. The
                                            medium of instruction and evaluation of the degree programme is in English.

                                            The academic year of the student is from <span
                                                class="diploma-name"><?= $degreeDetails[0]->AcademicYear ?></span> to <span
                                                class="diploma-name"><?php $result = $degreeDetails[0]->AcademicYear + $degreeDetails[0]->Duration;
                                                echo $result; ?></span>.
                                        </p>
                                    </div>
                                    <div class="admission-data-tb">
                                        <div class='admission-detail'>
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
                                </div>
                            </div>
                        <?php endif; ?>
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
            filename: 'record_of_examination.pdf',
            html2canvas: { scale: 3 },
            jsPDF: { unit: 'mm', format: 'a4', orientation: 'portrait' }
        });

        // Hide the download button 
        const downloadButton = document.getElementById('downloadButton');
        downloadButton.style.display = 'none';

        // Show the download button after a delay
        setTimeout(function () {
            downloadButton.style.display = 'block';
        }, 3000);
    }
</script>

</html>