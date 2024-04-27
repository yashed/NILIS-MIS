<?php
$role = "Clerk";
$data['role'] = $role;

?>
<?php $this->view('components/navside-bar/degreeprogramsidebar', $data) ?>
<?php $this->view('components/navside-bar/footer', $data) ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Participants</title>
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


        .table__header .dr-degree-programs-button {
            height: 100%;
            margin: 13px 29px 20px;
            margin-left: 10vw;
            padding: 8px 7px 8px 7px;
            border-radius: 7px;
            float: right;
            background-color: var(--sidebar-color);
            color: var(--text-color);
            width: 12vw;
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
            text-align: center;
        }

        thead th {
            position: sticky;
            top: 0;
            left: 0;
            background-color: #ffffff;
            cursor: pointer;
            text-transform: capitalize;
            font-size: 0.9vw;
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
    </style>
</head>

<body>

    <div class="dr-degree-programs-home">
        <div class="dr-degree-programs-title">
            <div class="dr-degree-programs-title1">Diploma Name : <?= $degreedata[0]->DegreeName ?></div>
            <div class="dr-degree-programs-title1-core">Attendance</div>
        </div>
        <div class="dr-degree-programs-home-1">
            <div class="table">
                <section class="table__header">
                    <p>Attendance</p>
                    <div class="input-main-group">
                        <div class="input-group">
                            <i class='bx bx-search icon'></i>
                            <input type="search" placeholder="Search Data...">
                        </div>
                        <button class="dr-degree-programs-button">Search</button>
                    </div>

                </section>
                <section class="table__body">
                    <table id="table_p">
                        <thead>
                            <tr>
                                <th> Student Index </th>
                                <th> Student Attendance </th>

                            </tr>
                        </thead>

                        <tbody>
                            <?php if (!empty($attendances)) : ?>
                                <?php foreach ($attendances as $attendance) : ?>

                                    <tr>
                                        <td><?= $attendance->index_no ?></td>
                                        <td><?= $attendance->attendance ?></td>
                                    </tr>

                                <?php endforeach; ?>
                            <?php else : ?>
                                <tr>
                                    <td colspan="2">No Attendance Records Found</td>
                                </tr>
                            <?php endif; ?>
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
</script>

</html>