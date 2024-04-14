<?php
$role = "Clerk";
$data['role'] = $role;
?>
<?php $this->view('components/navside-bar/degreeprogramsidebar', $data) ?>
<?php $this->view('components/navside-bar/footer', $data) ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>DR Student Participants</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Poppins', sans-serif;
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

        .dr-degree-programs-home {
            left: 250px;
            position: relative;
            width: calc(100% - 250px);
            min-width: 70%;
            transition: var(--tran-05);
            background: var(--body-color);
        }

        .dr-degree-programs-title {
            font-size: 30px;
            font-weight: 600;
            color: black;
            padding: 10px 0px 10px 32px;
            background-color: var(--text-color);
            border-radius: 6px;
            margin: 5px 4px 5px 4px;
        }

        .dr-degree-programs-title1-core {
            color: #17376e;
            font-size: 22px;
            margin: 10px 0px 5px 0px;
            font-weight: 300;
        }

        .dr-degree-programs-home-1 {
            background-color: white;
            align-items: center;
            justify-content: center;
            border-radius: 10px;
            margin: 7px 4px 2px 4px;
            padding: 10px 32px 10px 32px;
        }

        .sidebar.close~.dr-degree-programs-home {
            left: 88px;
            width: calc(100% - 88px);
        }

        body {
            min-height: auto;
        }

        .table {
            width: auto;
            height: auto;
            background-color: var(--text-color);
            box-shadow: 0 .4rem .8rem #0005;
            border-radius: 6px;
            overflow: hidden;
            margin: 10px 8px 10px 8px;
        }

        .table__header p {
            width: 100%;
            height: 10%;
            color: var(--sidebar-color);
            background-color: var(--text-color);
            padding: 10px 5px 10px 35px;
            justify-content: space-between;
            align-items: center;
            border-radius: 8px;
            font-size: 30px;
            font-weight: 500;
        }

        .table__header .input-main-group {
            display: flex;
        }

        .table__header .input-group {
            width: 55%;
            height: 100%;
            background-color: var(--body-color);
            margin: 10px 15px 10px 35px;
            padding: 5px;
            border-radius: 7px;
            display: flex;
            transition: .2s;
        }

        .table__header .input-group-filter {
            width: 15%;
            height: 100%;
            background-color: var(--text-color);
            margin: 10px 15px 10px 10px;
            padding: 8px 7px 8px 7px;
            border-style: groove;
            border-radius: 7px;
            border-color: var(--body-color);
            border-width: 2px;
            display: flex;
            justify-content: center;
        }

        .table__header .dr-degree-programs-button {
            height: 100%;
            margin: 13px 5px 10px 10px;
            padding: 8px 7px 8px 7px;
            border-radius: 7px;
            float: right;
            background-color: var(--sidebar-color);
            color: var(--text-color);
        }

        .table__header .dr-degree-programs-button:hover {
            background-color: var(--text-color);
            color: var(--sidebar-color);
        }

        /* .table__header .input-group:hover {
            width: 45%;
            background-color: #afabab;
            box-shadow: 0 .1rem .4rem #0002;
            font-weight: 500;
        } */
        .table__header .input-group .icon {
            font-size: 25px;
            padding: 5px 4px 0px 4px;
        }

        .table__header .input-group input {
            width: 100%;
            padding: 7px 7px 7px 20px;
            background-color: transparent;
            border: none;
            outline: none;
        }

        .table__body {
            width: 95%;
            max-height: calc(89% - 1.6rem);
            margin: 5px 20px 50px 20px;
            border-radius: .6rem;
            overflow: auto;
            overflow: overlay;
            outline-style: groove;
            outline-width: 2px;
            /* outline-color: #17376E; */
        }

        .table__body::-webkit-scrollbar {
            width: 0.5rem;
            height: 0.5rem;
        }

        .table__body::-webkit-scrollbar-thumb {
            border-radius: .5rem;
            background-color: var(--body-color);
            visibility: hidden;
        }

        .table__body:hover::-webkit-scrollbar-thumb {
            visibility: visible;
        }

        table {
            width: 100%;
            margin: 5px 5px 5px 20px;
        }

        .table__body-td-name {
            display: flex;
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

        .status {
            padding: .4rem 0;
            border-radius: 2rem;
            text-align: center;
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

        .export__file {
            margin: 0px 35px 2px 5px;
            float: right;
        }

        .export__file .export__file-btn {
            display: inline-block;
            width: 2rem;
            height: 2rem;
            border-radius: 50%;
            transition: .2s ease-in-out;
            background: #fff6 url("<?= ROOT ?>assets/dr-participant-table/export.png") center / 100% no-repeat;
        }

        .export__file .export__file-btn:hover {
            background-color: #fff;
            transform: scale(1.15);
            cursor: pointer;
        }

        .export__file input {
            display: none;
        }

        .export__file .export__file-options {
            position: absolute;
            right: 80px;
            width: 12rem;
            border-radius: .5rem;
            overflow: hidden;
            text-align: center;
            opacity: 0;
            transform: scale(.8);
            transform-origin: top right;
            box-shadow: 0 .2rem .5rem var(--sidebar-color);
            transition: .2s;
            background-color: #fff;
        }

        .export__file input:checked+.export__file-options {
            opacity: 1;
            transform: scale(1);
            z-index: 100;
        }

        .export__file .export__file-options label {
            display: block;
            width: 100%;
            padding: .6rem 0;
            display: flex;
            justify-content: space-around;
            align-items: center;
            transition: .2s ease-in-out;
        }

        .export__file .export__file-options label:first-of-type {
            padding: 1rem 0;
            background-color: var(--sidebar-color) !important;
            color: var(--text-color);
        }

        .export__file .export__file-options label:hover {
            transform: scale(1.05);
            background-color: #fff;
            cursor: pointer;
            font-size: 18px;
        }

        .export__file .export__file-options img {
            width: 2rem;
            height: auto;
        }

        .clickable-row {
            cursor: pointer;
            background-color: transparent;
        }

        .clickable-row:hover {
            background-color: #0000000b;
        }
    </style>
</head>

<body>
    <div class="dr-degree-programs-home">
        <div class="dr-degree-programs-title">
            <div class="dr-degree-programs-title1">Diploma in Library and Information Management</div>
            <div class="dr-degree-programs-title1-core">Participants</div>
        </div>
        <div class="dr-degree-programs-home-1">
            <div class="table">
                <section class="table__header">
                    <p>Participants</p>
                    <div class="input-main-group">
                        <div class="input-group">
                            <i class='bx bx-search icon'></i>
                            <input type="search" placeholder="Search Data...">
                        </div>
                        <div class="input-group-filter">Filters</div>
                        <button class="dr-degree-programs-button">Search</button>
                    </div>
                    <div class="export__file">
                        <label for="export-file" class="export__file-btn" title="Export File"></label><br><br>
                        <input type="checkbox" id="export-file">
                        <div class="export__file-options">
                            <label>Export As</label>
                            <label for="export-file" id="toPDF">PDF <img src="<?= ROOT ?>assets/dr-participant-table/pdf.png" alt=""></label>
                            <label for="export-file" id="toJSON">JSON <img src="<?= ROOT ?>assets/dr-participant-table/json.png" alt=""></label>
                            <label for="export-file" id="toCSV">CSV <img src="<?= ROOT ?>assets/dr-participant-table/csv.png" alt=""></label>
                            <label for="export-file" id="toEXCEL">EXCEL <img src="<?= ROOT ?>assets/dr-participant-table/excel.png" alt=""></label>
                        </div>
                    </div>
                </section>
                <section class="table__body">
                    <table id="table_p">
                        <thead>
                            <tr>
                                <th> Name </th>
                                <th> Index Number </th>
                                <th> Registration Number </th>
                                <th> Mail </th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($students as $student) : ?>
                                <tr data-id="<?= $student->id ?>" class="clickable-row">
                                    <td class="table__body-td-name"><?= $student->name ?> </td>
                                    <td> <?= $student->indexNo ?> </td>
                                    <td> <?= $student->regNo ?> </td>
                                    <td> <?= $student->Email ?> </td>
                                </tr>
                            <?php endforeach; ?>

                        </tbody>
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
    const search = document.querySelector('.input-group input'),
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

    // table_headings.forEach((head, i) => {
    //     let sort_asc = true;
    //     head.onclick = () => {
    //         table_headings.forEach(head => head.classList.remove('active'));
    //         head.classList.add('active');

    //         document.querySelectorAll('td').forEach(td => td.classList.remove('active'));
    //         table_rows.forEach(row => {
    //             row.querySelectorAll('td')[i].classList.add('active');
    //         })

    //         head.classList.toggle('asc', sort_asc);
    //         sort_asc = head.classList.contains('asc') ? false : true;

    //         sortTable(i, sort_asc);
    //     }
    // })
    // function sortTable(column, sort_asc) {
    //     [...table_rows].sort((a, b) => {
    //             let first_row = a.querySelectorAll('td')[column].textContent.toLowerCase(),
    //                 second_row = b.querySelectorAll('td')[column].textContent.toLowerCase();

    //             return sort_asc ? (first_row < second_row ? 1 : -1) : (first_row < second_row ? -1 : 1);
    //         })
    //         .map(sorted_row => document.querySelector('tbody').appendChild(sorted_row));
    // }

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

    const pdf_btn = document.querySelector('#toPDF');
    const customers_table = document.querySelector('#customers_table');

    const toPDF = function(customers_table) {
        const html_code = `
        <link rel="stylesheet" href="style.css">
        <main class="table" >${customers_table.innerHTML}</main>
        `;

        const new_window = window.open();
        new_window.document.write(html_code);

        setTimeout(() => {
            new_window.print();
            new_window.close();
        }, 400);
    }

    pdf_btn.onclick = () => {
        toPDF(customers_table);
    }

    // 4. Converting HTML table to JSON

    const json_btn = document.querySelector('#toJSON');

    const toJSON = function(table) {
        let table_data = [],
            t_head = [],

            t_headings = table.querySelectorAll('th'),
            t_rows = table.querySelectorAll('tbody tr');

        for (let t_heading of t_headings) {
            let actual_head = t_heading.textContent.trim().split(' ');

            t_head.push(actual_head.splice(0, actual_head.length - 1).join(' ').toLowerCase());
        }

        t_rows.forEach(row => {
            const row_object = {},
                t_cells = row.querySelectorAll('td');

            t_cells.forEach((t_cell, cell_index) => {
                const img = t_cell.querySelector('img');
                if (img) {
                    row_object['customer image'] = decodeURIComponent(img.src);
                }
                row_object[t_head[cell_index]] = t_cell.textContent.trim();
            })
            table_data.push(row_object);
        })

        return JSON.stringify(table_data, null, 4);
    }

    json_btn.onclick = () => {
        const json = toJSON(customers_table);
        downloadFile(json, 'json')
    }

    // 5. Converting HTML table to CSV File

    const csv_btn = document.querySelector('#toCSV');

    const toCSV = function(table) {
        // Code For SIMPLE TABLE
        // const t_rows = table.querySelectorAll('tr');
        // return [...t_rows].map(row => {
        //     const cells = row.querySelectorAll('th, td');
        //     return [...cells].map(cell => cell.textContent.trim()).join(',');
        // }).join('\n');

        const t_heads = table.querySelectorAll('th'),
            tbody_rows = table.querySelectorAll('tbody tr');

        const headings = [...t_heads].map(head => {
            let actual_head = head.textContent.trim().split(' ');
            return actual_head.splice(0, actual_head.length - 1).join(' ').toLowerCase();
        }).join(',') + ',' + 'image name';

        const table_data = [...tbody_rows].map(row => {
            const cells = row.querySelectorAll('td'),
                img = decodeURIComponent(row.querySelector('img').src),
                data_without_img = [...cells].map(cell => cell.textContent.replace(/,/g, ".").trim()).join(',');

            return data_without_img + ',' + img;
        }).join('\n');

        return headings + '\n' + table_data;
    }

    csv_btn.onclick = () => {
        const csv = toCSV(customers_table);
        downloadFile(csv, 'csv', 'customer orders');
    }

    // 6. Converting HTML table to EXCEL File

    const excel_btn = document.querySelector('#toEXCEL');

    const toExcel = function(table) {
        // Code For SIMPLE TABLE
        // const t_rows = table.querySelectorAll('tr');
        // return [...t_rows].map(row => {
        //     const cells = row.querySelectorAll('th, td');
        //     return [...cells].map(cell => cell.textContent.trim()).join('\t');
        // }).join('\n');

        const t_heads = table.querySelectorAll('th'),
            tbody_rows = table.querySelectorAll('tbody tr');

        const headings = [...t_heads].map(head => {
            let actual_head = head.textContent.trim().split(' ');
            return actual_head.splice(0, actual_head.length - 1).join(' ').toLowerCase();
        }).join('\t') + '\t' + 'image name';

        const table_data = [...tbody_rows].map(row => {
            const cells = row.querySelectorAll('td'),
                img = decodeURIComponent(row.querySelector('img').src),
                data_without_img = [...cells].map(cell => cell.textContent.trim()).join('\t');

            return data_without_img + '\t' + img;
        }).join('\n');

        return headings + '\n' + table_data;
    }

    excel_btn.onclick = () => {
        const excel = toExcel(customers_table);
        downloadFile(excel, 'excel');
    }

    const downloadFile = function(data, fileType, fileName = '') {
        const a = document.createElement('a');
        a.download = fileName;
        const mime_types = {
            'json': 'application/json',
            'csv': 'text/csv',
            'excel': 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet',
        }
        a.href = `
            data:${mime_types[fileType]};charset=utf-8,${encodeURIComponent(data)}
        `;
        document.body.appendChild(a);
        a.click();
        a.remove();
    }

    function getValueFromSelectedRow(table, rowIndex, columnIndex) {
        var rows = table.rows;

        if (rowIndex >= 0 && rowIndex < rows.length) {
            var selectedRow = rows[rowIndex];
            var cellValue = selectedRow.cells[columnIndex].textContent;
            return cellValue;
        } else {
            return "Invalid row index";
        }
    }

    // Get the table
    // var myTable = document.getElementById('table_p');

    // // Example: Get the name (second column, index 1) from the first row (index 0)
    // var rowIndex = 1; // Change this index to select a different row
    // var columnIndex = 2; // Change this index to select a different column
    // document.getElementById('tr1').onclick = function() {
    //     var value = getValueFromSelectedRow(myTable, rowIndex, columnIndex);
    //     console.log("Value from selected row:", value);


    // }
    //
    //
    // for pass the data
    document.addEventListener('DOMContentLoaded', function() {
        const table = document.getElementById('table_p');
        const rows = table.querySelectorAll('tbody tr');

        rows.forEach((row) => {
            row.addEventListener('click', function() {
                // Get the unique identifier from the data-id attribute
                const studentId = row.getAttribute('data-id');

                // Navigate to the target page with the data as a query parameter
                window.location.href = '<?= ROOT ?>dr/userprofile' + studentId;
            });
        });
    });


    // for make row clickable
    document.addEventListener('DOMContentLoaded', function () {
        const table = document.getElementById('table_p');
        const rows = table.querySelectorAll('tbody tr');

        rows.forEach((row) => {
            row.addEventListener('click', function () {
                // Get the unique identifier from the data-id attribute
                const studentId = row.getAttribute('data-id');

                // Navigate to the target page with the data as a query parameter
                window.location.href = '<?= ROOT ?>dr/userprofile?studentId=' + studentId;
            });
        });
    });
</script>

</html>