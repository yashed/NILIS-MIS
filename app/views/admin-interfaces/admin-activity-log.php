<?php



$role = "Admin";
$data['role'] = $role;

?>

<?php $this->view('components/navside-bar/header', $data) ?>
<?php $this->view('components/navside-bar/sidebar', $data) ?>
<?php $this->view('components/navside-bar/footer', $data) ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Logs</title>
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

    .temp3-home {
        height: 100vh;
        left: 250px;
        position: relative;
        width: calc(100% - 250px);
        transition: var(--tran-05);
        background: var(--body-color);
    }

    .temp3-title {
        font-size: 30px;
        font-weight: 600;
        color: black;
        padding: 10px 0px 10px 32px;
        background-color: var(--text-color);
        border-radius: 6px;
        margin: 7px 4px 7px 4px;
    }

    .sidebar.close~.temp3-home {
        left: 88px;
        width: calc(100% - 88px);
    }

    .temp3-subsection-0 {
        display: flex;
        flex-direction: row;
        justify-content: space-around;
        align-items: center;
        /* background-color: var(--text-color); */
        padding: 15px 10px 15px 35px;
        border-radius: 6px;
        margin: 7px 4px 7px 4px;
        flex-wrap: wrap;

    }

    .temp3-subsection-01 {
        display: flex;
        padding: 15px 30px 14px 30px;
        justify-content: center;
        align-items: center;
        border-radius: 10px;
        border: 1px solid rgba(0, 0, 0, 0.12);
        background-color: var(--text-color);
        box-shadow: 0px 10px 25px 0px rgba(0, 0, 0, 0.12);
        width: 25%;
        height: 150px;
        flex-direction: row;
        gap: 60px;
    }

    .temp3-subcard-data {
        display: flex;
        align-items: center;
        justify-content: center;
        flex-direction: column;
    }

    .temp3-subcard-data-value {
        font-size: 38px;
        font-weight: 600;
        color: #17376E;
    }

    .temp3-subcard-data-title {
        font-size: 18px;
        font-weight: 600;
        color: #17376E;
    }

    .temp3-subsection-1 {
        background-color: var(--text-color);
        padding: 10px 10px 30px 35px;
        border-radius: 6px;
        margin: 7px 4px 7px 4px;
    }

    .temp3-sub-title {

        color: #17376E;
        font-family: Poppins;
        font-size: 22px;
        font-style: normal;
        font-weight: 600;
        margin: 40px;

    }

    .temp3-subsection-2 {
        display: flex;
        flex-direction: row;
        justify-content: space-between;

        /* padding: 10px 10px 30px 35px; */
        /* border-radius: 6px; */
        /* margin: 7px 4px 7px 4px; */
    }

    .temp3-subsection-21 {
        display: flex;
        flex-direction: column;
        background-color: var(--text-color);
        padding: 10px 10px 30px 35px;
        border-radius: 6px;
        margin: 3px 4px 7px 4px;
        width: 100%;
    }

    .temp3-subsection-22 {
        background-color: var(--text-color);
        padding: 10px 10px 31px 35px;
        border-radius: 6px;
        margin: 3px 4px 7px 4px;
        width: 50%;
    }

    .temp3-calender {
        display: flex;
        align-items: center;
        justify-content: center;

    }

    .temp3-degree-bar {
        display: flex;
        flex-direction: row;
        justify-content: space-around;
        flex-wrap: wrap;
        margin-bottom: 20px;
    }

    .temp3-card1 {
        display: flex;
        flex-direction: column;
    }

    .temp3-card2 {
        display: flex;
        flex-direction: column;
    }

    .temp3-exam-bar {
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        flex-wrap: nowrap;
        gap: 30px;
    }

    .temp3-exam-card1 {
        display: flex;
        flex-direction: column;
    }

    .temp3-exam-card2 {
        display: flex;
        flex-direction: column;
    }

    .result-table {
        margin-top: 20px;
        margin: 20px
    }

    table {
        width: 100%;
        border-collapse: collapse;
        margin-top: 20px;
        font-size: 0.8vw;

    }

    th {
        border: 1px solid #ddd;
        padding: 10px;
        text-align: center;

    }

    td {
        border: 1px solid #ddd;
        padding: 5px;
        text-align: center;

    }

    th {
        background-color: #f2f2f2;
    }

    /* General Styles */
    .wrapper {
        width: 400px;
        padding: 20px;
        margin: auto;
        background-color: #ffffff;
        box-shadow: 0 1px 2px 0 #c9ced1;
        border-radius: 4px;
    }

    /* Pagination Styles */
    .pager {
        display: flex;
        list-style: none;
        text-align: center;
        padding: 0;
        margin-top: 20px;
        align-items: center;
        justify-content: center;
    }

    .pager__item {
        display: inline-block;
        font-size: 1vw;
        margin: 0 5px;
    }

    .pager__item.active .pager__link,
    .pager__link:hover {
        background-color: #17376E;
        color: #fff;
        text-decoration: none;
    }

    .pager__link {
        display: block;
        text-align: center;
        padding: 8px 12px;
        color: #2f3640;
        text-decoration: none;
        border-radius: 4px;
        transition: background-color 0.3s, color 0.3s;
    }

    .pager__item--prev svg,
    .pager__item--next svg {
        fill: #2f3640;
    }

    .pager__item--prev svg :hover {
        fill: #fff;
        background-color: none;
    }

    .pager__item--next svg :hover {
        fill: #fff;
        background-color: none;
    }

    .pager__list {
        display: flex;
        list-style: none;
        text-align: center;
        padding: 0;
        margin-top: 20px;
        align-items: center;
        justify-content: center;
    }
</style>

<body>
    <div class="temp3-home">
        <div class="temp3-title"> User Activity Log</div>
        <div class="temp3-subsection-1">
            <div class="temp3-sub-title">
                Logs
            </div>
            <div class="result-table">
                <?php if (!empty($activities)): ?>
                    <table>
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>User Name</th>
                                <th>Discription</th>
                                <th>Date</th>
                                <th>Time</th>


                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($activities as $activity): ?>
                                <tr>
                                    <td>
                                        <?= $activity->id ?>
                                    </td>
                                    <td>
                                        <?= $activity->user ?>
                                    </td>
                                    <td>
                                        <?= $activity->discription ?>
                                    </td>
                                    <td>
                                        <?= $activity->date ?>
                                    </td>
                                    <td>
                                        <?= $activity->time ?>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                    <div id="pagination" class="pager">
                        <ul class="pager__list">
                            <!-- Previous Page Link -->
                            <?php if ($currentPage > 1): ?>
                                <li class="pager__item pager__item--prev">
                                    <a href="?page=<?= $currentPage - 1 ?>" class="pager__link">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" viewBox="0 0 20 20"
                                            fill="none">
                                            <path
                                                d="M13.3837 2.045C13.618 2.27941 13.7497 2.59729 13.7497 2.92875C13.7497 3.2602 13.618 3.57809 13.3837 3.8125L7.19619 10L13.3837 16.1875C13.6114 16.4233 13.7374 16.739 13.7345 17.0668C13.7317 17.3945 13.6002 17.708 13.3685 17.9398C13.1367 18.1715 12.8232 18.303 12.4954 18.3058C12.1677 18.3087 11.8519 18.1827 11.6162 17.955L4.54494 10.8837C4.3106 10.6493 4.17896 10.3315 4.17896 10C4.17896 9.66854 4.3106 9.35066 4.54494 9.11625L11.6162 2.045C11.8506 1.81066 12.1685 1.67902 12.4999 1.67902C12.8314 1.67902 13.1493 1.81066 13.3837 2.045Z"
                                                fill="" />
                                        </svg>
                                    </a>
                                </li>
                            <?php endif; ?>


                            <?php for ($i = 1; $i <= ceil($totalRows / $perPage); $i++): ?>
                                <li class="pager__item <?= ($currentPage == $i) ? 'active' : ''; ?>">
                                    <a href="?page=<?= $i ?>" class="pager__link">
                                        <?= $i ?>
                                    </a>
                                </li>
                            <?php endfor; ?>


                            <?php if ($currentPage < ceil($totalRows / $perPage)): ?>
                                <li class="pager__item pager__item--next">
                                    <a href="?page=<?= $currentPage + 1 ?>" class="pager__link">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" viewBox="0 0 20 20">
                                            <path
                                                d="M6.61631 17.955C6.38197 17.7206 6.25033 17.4027 6.25033 17.0713C6.25033 16.7398 6.38197 16.4219 6.61631 16.1875L12.8038 10L6.61631 3.8125C6.38861 3.57675 6.26262 3.26099 6.26547 2.93325C6.26832 2.6055 6.39978 2.29199 6.63154 2.06023C6.8633 1.82847 7.17681 1.69701 7.50456 1.69416C7.83231 1.69131 8.14806 1.8173 8.38381 2.045L15.4551 9.11625C15.6894 9.35066 15.821 9.66855 15.821 10C15.821 10.3315 15.6894 10.6493 15.4551 10.8838L8.38381 17.955C8.1494 18.1893 7.83152 18.321 7.50006 18.321C7.16861 18.321 6.85072 18.1893 6.61631 17.955Z" />
                                        </svg>
                                    </a>
                                </li>
                            <?php endif; ?>
                        </ul>
                    </div>

                <?php else: ?>
                    <div class="result-message">No Activity to Show</div>
                <?php endif; ?>
            </div>
        </div>
        <div class="temp3-footer">
            <?php $this->view('components/footer/index', $data) ?>
        </div>
    </div>

</body>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const paginationLinks = document.querySelectorAll('#pagination a');
        paginationLinks.forEach(function (link) {
            link.addEventListener('click', function (e) {
                e.preventDefault();
                const url = link.getAttribute('href');
                fetch(url)
                    .then(response => response.text())
                    .then(html => {
                        const parser = new DOMParser();
                        const doc = parser.parseFromString(html, 'text/html');
                        const newTable = doc.querySelector('.result-table');
                        document.querySelector('.result-table').innerHTML = newTable.innerHTML;
                    })
                    .catch(error => console.error('Error loading the page: ', error));
            });
        });
    });
</script>

</html>