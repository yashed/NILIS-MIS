<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Examination Report</title>
<script src="https://rawgit.com/eKoopmans/html2pdf/master/dist/html2pdf.bundle.js"></script>
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
        margin: 10px auto;
        margin-bottom: 1cm;

    }

    page[size="A4"] {
        width: 21cm;
        /* height: 29.7cm; */
        height: 100%;
        box-sizing: border-box;
    }


    .admission-content {
        margin: 10px;
    }

    .admission-title {
        display: flex;
        flex-direction: row;
        justify-content: center;
        gap: 100px;
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
        align-items: center;
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
        width: 100%;

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
        display: flex;
        flex-direction: column;
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
        width: 90%;
    }

    .year-name {
        font-family: poppins;
        font-size: 20px;
        font-weight: 500;
    }

    /* 
    @page {
        size: A4;
        margin: 2cm;

    }


    page[size="A4"] {
        width: 100%;
        height: 100%;
        padding: 1cm;

    } */

    @media print {

        #print {
            display: none;
        }

        title {
            display: none;
        }

        body,
        /* page {
            background: white;
            margin: 0;
            box-shadow: 0;
        } */

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

    .semester-details {
        font-size: 20px;
        font-weight: 500;
    }

    .down-data {
        display: flex;
        flex-direction: row;
        justify-content: space-between;
        gap: 20px;
        padding: 0 40px 0 40px;
    }

    .gradings {
        margin-top: 40px;
        display: flex;
        flex-direction: column;

    }

    .grading-tb tr td {
        border: none;

    }

    .grading-tb td {
        text-align: left;
    }

    .grading-title {
        margin-bottom: 15px;
    }

    .html2pdf__page .row-span-multiple-pages {
        margin-bottom: 20px;
        /* Adjust margin size as needed */
    }

    .exam-msg {
        font-size: 20px;
        font-weight: 500;
        color: red;
        text-align: center;

    }
</style>


<head>
    <title>Admission Card</title>
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
                    <div class="admission-nilis"> National Institute of Library and Information Sciences </br>University
                        of
                        Colombo</div>
                </div>
                <div class="admission-header">
                    <?php if (!empty($degreeDetails)): ?>
                        <div class="admission-course-name">Final Examination Results Report -
                            <?= $degreeDetails[0]->DegreeName ?>
                        </div>
                    <?php endif; ?>
                    <?php if (!empty($semester)): ?>
                        <dive class='semester-details'> Semester 0<?= $semester ?>
                    </div>
                <?php endif ?>

            </div>
            <?php if (!empty($examtype)): ?>
                <?php if ($examtype[0]->status == 'completed'): ?>
                    <div class="admission-data-tb">
                        <div class="roe-table">
                            <table class="admission-table">

                                <thead>
                                    <tr class='table-row'>
                                        <th>Reg No</th>
                                        <th>IndexN0</th>
                                        <?php if (!empty($subjects)): ?>
                                            <?php foreach ($subjects as $subject): ?>
                                                <th><?= $subject->SubjectCode ?> - <?= $subject->NoCredits ?></th>
                                            <?php endforeach; ?>
                                        <?php endif; ?>
                                    </tr>

                                </thead>
                                <tbody>
                                    <?php if (!empty($students)): ?>
                                        <?php foreach ($students as $student): ?>

                                            <tr>
                                                <td><?= $student->regNo; ?></td>
                                                <td><?= $student->indexNo; ?></td>
                                                <?php if (!empty($subjects)): ?>
                                                    <?php foreach ($subjects as $subject): ?>
                                                        <?php if (!empty($studentRes[$student->indexNo][$subject->SubjectCode])): ?>
                                                            <?php if ($studentRes[$student->indexNo][$subject->SubjectCode][0]->grade == 'F'): ?>
                                                                <td style="background-color: red;">
                                                                    <?= $studentRes[$student->indexNo][$subject->SubjectCode][0]->grade ?>
                                                                </td>
                                                            <?php else: ?>
                                                                <td><?= $studentRes[$student->indexNo][$subject->SubjectCode][0]->grade ?></td>
                                                            <?php endif; ?>
                                                        <?php else: ?>
                                                            <td>ab </td>
                                                        <?php endif; ?>
                                                    <?php endforeach; ?>
                                                <?php endif; ?>

                                            </tr>

                                        <?php endforeach; ?>
                                    <?php endif; ?>

                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class='down-data'>
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
                        <div class='gradings'>
                            <?php if (!empty($grades)): ?>
                                <div class='grading-title'>Key to gradings</div>
                                <table class='grading-tb'>
                                    <tbody>
                                        <?php foreach ($grades as $grade): ?>
                                            <tr>
                                                <td><?= $grade->Grade ?> </td>
                                                <td><?= $grade->MaxMarks ?> - <?= $grade->MinMarks ?></td>

                                            </tr>
                                        <?php endforeach ?>
                                        <tr>
                                            <td>ab</td>
                                            <td>absent</td>
                                        </tr>
                                    </tbody>
                                </table>

                            <?php endif; ?>
                        </div>
                    </div>
                <?php else: ?>
                    <div class='exam-msg'>Examination was not completed. Submit all marks and mark examination as completed to
                        generate the report.</div>
                <?php endif ?>
            <?php endif; ?>

    </div>
    </div>

    </page>
    </div>

</body>

<script>
    const rowsPerPage = 24;
    const rows = document.querySelectorAll('.table-row');
    rows.forEach((row, index) => {

        const pageNumber = Math.floor(index / rowsPerPage) + 1;


        if (pageNumber > 1) {
            row.classList.add('row-span-multiple-pages');
        }
    });

    function generatePDF() {
        const element = document.querySelector('.admisssion-card');
        html2pdf(element, {
            margin: 0,
            filename: 'record_of_examination.pdf',
            html2canvas: { scale: 3 },
            jsPDF: { unit: 'mm', format: 'a4', orientation: 'portrait' },
            beforeGenerate: function () {
                const pages = document.querySelectorAll('.html2pdf__page');
                pages.forEach(page => {
                    const marginDiv = document.createElement('div');
                    marginDiv.style.width = '100%';
                    marginDiv.style.height = '1cm'; // Adjust margin height as needed
                    marginDiv.style.pageBreakAfter = 'always';
                    page.appendChild(marginDiv);
                });
            }
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