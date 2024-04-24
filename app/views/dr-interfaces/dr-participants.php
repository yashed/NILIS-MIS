<?php
$role = "DR";
$data['role'] = $role;
?>
<?php $this->view('components/navside-bar/degreeprogramsidebar', $data) ?>
<?php $this->view('components/navside-bar/footer', $data) ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" type="text/css" href="<?= ROOT ?>css/dr/dr-styles.css">
    <script src="https://unpkg.com/html2pdf.js@0.10.1/dist/html2pdf.bundle.min.js"></script>
    <title>DR Student Participants</title>
    <style>
        body {
            min-height: auto;
        }

        table {
            width: 100%;
            margin: 5px 5px 5px 20px;
        }

        td img {
            width: 36px;
            height: 36px;
            margin: .5rem;
            border-radius: 50%;
            vertical-align: middle;
        }

        table,
        th,
        td {
            border-collapse: collapse;
            padding: 1rem;
            text-align: left;
        }

        thead th {
            position: sticky;
            top: 0;
            left: 0;
            background-color: #ffffff;
            cursor: pointer;
            text-transform: capitalize;
        }

        tbody tr:nth-child(even) {
            background-color: #ffffff;
        }

        tbody tr:nth-child(odd) {
            background-color: #ffffff;
        }

        tbody tr {
            --delay: .1s;
            transition: .5s ease-in-out var(--delay), background-color 0s;
        }

        tbody tr.hide {
            opacity: 0;
            transform: translateX(100%);
        }

        tbody tr td,
        tbody tr td p,
        tbody tr td img {
            transition: .2s ease-in-out;
        }

        tbody tr.hide td,
        tbody tr.hide td p {
            padding: 0;
            font: 0 / 0 sans-serif;
            transition: .2s ease-in-out .5s;
        }

        tbody tr.hide td img {
            width: 0;
            height: 0;
            transition: .2s ease-in-out .5s;
        }

        @media (max-width: 1000px) {
            td:not(:first-of-type) {
                min-width: 12.1rem;
            }
        }

        thead th span.icon-arrow {
            display: inline-block;
            width: 1.3rem;
            height: 1.3rem;
            border-radius: 50%;
            border: 1.4px solid transparent;

            text-align: center;
            font-size: 1rem;

            margin-left: .5rem;
            transition: .2s ease-in-out;
        }

        thead th:hover span.icon-arrow {
            border: 1.4px solid #6c00bd;
        }

        thead th:hover {
            color: var(--sidebar-color);
        }

        thead th.active span.icon-arrow {
            background-color: var(--sidebar-color);
            color: #fff;
        }

        thead th.asc span.icon-arrow {
            transform: rotate(180deg);
        }

        thead th.active,
        tbody td.active {
            color: var(--sidebar-color);
        }
    </style>
</head>

<body>
    <div class="dr-participants-home">
        <div class="dr-participants-title">
            <div class="dr-participants-title1"><?= $degrees[0]->DegreeName ?></div>
            <div class="dr-participants-title1-core">Participants</div>
        </div>
        <div class="dr-participants-home-1">
            <div class="dr-participants-table">
                <section class="dr-participants-table__header">
                    <p>Participants</p>
                    <div class="dr-participants-input-main-group">
                        <div class="dr-participants-input-group">
                            <i class='bx bx-search dr-participants-icon'></i>
                            <input type="search" placeholder="Search Data...">
                        </div>
                        <button class="dr-participants-button">Search</button>
                    </div>
                    <div class="dr-participants-export__file">
                        <label for="dr-participants-export-file" class="dr-participants-export__file-btn"
                            title="Export File"></label><br><br>
                        <input type="checkbox" id="dr-participants-export-file">
                        <div class="dr-participants-export__file-options">
                            <label>Export As</label>
                            <label for="dr-participants-export-file" id="dr-participants-toPDF">PDF <img
                                    src="<?= ROOT ?>assets/dr-participant-table/pdf.png" alt=""></label>
                            <label for="dr-participants-export-file" id="dr-participants-toCSV">CSV <img
                                    src="<?= ROOT ?>assets/dr-participant-table/csv.png" alt=""></label>
                            <label for="dr-participants-export-file" id="dr-participants-toEXCEL">EXCEL <img
                                    src="<?= ROOT ?>assets/dr-participant-table/excel.png" alt=""></label>
                        </div>
                    </div>
                </section>
                <section class="dr-participants-table__body">
                    <table id="dr-participants-table_p">
                        <?php if (!empty($students)): ?>
                            <thead>
                                <tr>
                                    <th> Name </th>
                                    <th> Index Number </th>
                                    <th> Registration Number </th>
                                    <th> Mail </th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($students as $student): ?>
                                    <tr data-id="<?= $student->id ?>" class="dr-participants-clickable-row">
                                        <td class="dr-participants-table__body-td-name"><?= $student->name ?> </td>
                                        <td> <?= $student->indexNo ?> </td>
                                        <td> <?= $student->regNo ?> </td>
                                        <td> <?= $student->Email ?> </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        <?php else: ?>
                            <p style="margin: 20px 30%;">No students found for the diploma program.</p>
                        <?php endif; ?>
                    </table>
                </section>
            </div>
        </div>
        <div class="dr-footer">
            <?php $this->view('components/footer/index', $data) ?>
        </div>
    </div>
</body>
<script>
    const search = document.querySelector('.dr-participants-input-group input'),
        table_rows = document.querySelectorAll('tbody tr'),
        table_headings = document.querySelectorAll('thead th');

    // 1. Searching for specific data of HTML table
    search.addEventListener('input', searchTable);

    function searchTable() {
        table_rows.forEach((row, i) => {
            let table_data = row.textContent.toLowerCase(),
                search_data = search.value.toLowerCase();

            row.classList.toggle('hide', table_data.indexOf(search_data) < 0);
            row.style.setProperty('--delay', i / 25 + 's');
        })

        document.querySelectorAll('tbody tr:not(.hide)').forEach((visible_row, i) => {
            visible_row.style.backgroundColor = (i % 2 == 0) ? 'transparent' : '#0000000b';
        });
    }

    // 2. Sorting | Ordering data of HTML table

    table_headings.forEach((head, i) => {
        let sort_asc = true;
        head.onclick = () => {
            table_headings.forEach(head => head.classList.remove('active'));
            head.classList.add('active');

            document.querySelectorAll('td').forEach(td => td.classList.remove('active'));
            table_rows.forEach(row => {
                row.querySelectorAll('td')[i].classList.add('active');
            });

            sort_asc = !sort_asc; // Toggle sorting direction

            head.classList.toggle('asc', sort_asc);
            sortTable(i, sort_asc);
        };
    });

    function sortTable(column, sort_asc) {
        const sortedRows = [...table_rows].sort((a, b) => {
            const first_row = a.querySelectorAll('td')[column].textContent.toLowerCase();
            const second_row = b.querySelectorAll('td')[column].textContent.toLowerCase();

            return sort_asc ? first_row.localeCompare(second_row) : second_row.localeCompare(first_row);
        });
        // Remove existing rows
        table_rows.forEach(row => row.remove());
        // Append sorted rows
        sortedRows.forEach(sorted_row => document.querySelector('tbody').appendChild(sorted_row));
    }

    // 3. Converting HTML table to PDF

    const customers_table = document.querySelector('#dr-participants-table_p');
    const pdf_btn = document.querySelector('#dr-participants-toPDF');
    const toPDF = function (customers_table) {
        const html_code = `
        <link rel="stylesheet" type="text/css" href="<?= ROOT ?>css/dr/dr-styles.css">
        <div class="dr-participants-table_p">${customers_table.innerHTML}</div>
        `;

        const new_window = window.open();
        new_window.document.write(html_code);
        setTimeout(() => {
            new_window.print();
            new_window.close();
        }, 400);
    }
    pdf_btn.onclick = () => {
        const element = document.querySelector('#dr-participants-table_p');
        html2pdf(element, {
            margin: 1,
            filename: 'participants-table.pdf',
            html2canvas: { scale: 2 },
            jsPDF: { orientation: 'portrait', unit: 'in', format: 'letter', compressPDF: true }
        });
    }

    // 4. Converting HTML table to CSV File

    const csv_btn = document.querySelector('#dr-participants-toCSV');
    const toCSV = function (table) {
        const t_heads = table.querySelectorAll('th'),
            tbody_rows = table.querySelectorAll('tbody tr');
        // Extract headers
        const headings = [...t_heads].map(head => `"${head.textContent.trim()}"`).join(',');
        // Extract data
        const table_data = [...tbody_rows].map(row => {
            const cells = row.querySelectorAll('td');
            const data = [...cells].map(cell => {
                // Handle commas, quotes, and newlines in cell text
                let text = cell.textContent.trim().replace(/"/g, '""');
                return `"${text}"`; // Quote the text to handle commas
            }).join(',');
            // Optional: handle images if present
            let img = '';
            const imgTag = row.querySelector('img');
            if (imgTag) {
                img = imgTag.src; // Export the image URL
                img = img.replace(/"/g, '""'); // Escape quotes in URL
            }
            return data + (img ? `,"${img}"` : ',""'); // Append image URL if exists
        }).join('\n');

        return headings + '\n' + table_data;
    };
    csv_btn.onclick = () => {
        const table = document.querySelector('#dr-participants-table_p');
        const csvData = toCSV(table);
        downloadFile(csvData, 'csv', 'participants');
    };

    // 5. Converting HTML table to EXCEL File

    const excel_btn = document.querySelector('#dr-participants-toEXCEL');
    const toExcel = function (table) {
        const t_heads = table.querySelectorAll('th');
        const tbody_rows = table.querySelectorAll('tbody tr');
        // Extract and format headers
        const headings = [...t_heads].map(head => {
            return `"${head.textContent.trim().replace(/"/g, '""')}"`; // Enclose in quotes and escape existing quotes
        }).join(',');
        // Extract and format data
        const table_data = [...tbody_rows].map(row => {
            const cells = row.querySelectorAll('td');
            const formattedCells = [...cells].map(cell => {
                return `"${cell.textContent.trim().replace(/"/g, '""')}"`; // Enclose in quotes and escape existing quotes
            });
            // Optional: Add an image URL if needed
            const imgTag = row.querySelector('img');
            const img = imgTag ? `"${imgTag.src.replace(/"/g, '""')}"` : '""'; // Check if image exists and escape quotes
            return [...formattedCells, img].join(','); // Combine cell data with image URL
        }).join('\n');
        return headings + '\n' + table_data;
    };
    excel_btn.onclick = () => {
        const table = document.querySelector('#dr-participants-table_p'); // Ensure this selector is correct
        const excelData = toExcel(table);
        downloadFile(excelData, 'participants'); // Saving as .txt for Excel to read as TSV
    };

    //For CSV and EXCEL
    const downloadFile = function (data, fileType, fileName = 'download') {
        const blob = new Blob([data], { type: 'text/csv;charset=utf-8;' });
        const url = URL.createObjectURL(blob);
        const a = document.createElement('a');
        a.href = url;
        a.download = `${fileName}.${fileType}`;
        document.body.appendChild(a);
        a.click();
        document.body.removeChild(a);
        URL.revokeObjectURL(url);
    };

    // for pass the data, for make row clickable
    document.addEventListener('DOMContentLoaded', function () {
        const table = document.getElementById('dr-participants-table_p');
        const rows = table.querySelectorAll('tbody tr');
        rows.forEach((row) => {
            row.addEventListener('click', function () {
                // Get the unique identifier from the data-id attribute
                const studentId = row.getAttribute('data-id');
                console.log(studentId);
                window.location.href = '<?= ROOT ?>dr/userprofile?id=' + studentId;
            });
        });
    });
</script>

</html>