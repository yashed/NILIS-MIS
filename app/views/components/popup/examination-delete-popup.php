<style>
    .delete-bt-rs {
        min-width: 10vw;
        color: #fff;
        height: 5vh;
        padding: 5px 5px 5px 5px;
        border-radius: 8px;
        background: #E02424;
        box-shadow: 0px 6px 9px 0px rgba(0, 0, 0, 0.2);
        border: 0px;
        margin-bottom: 10px;

    }

    .bt-name {
        font-size: 16px;
        font-weight: 500px;
    }

    .delete-bt-rs:hover {
        color: #E02424;
        background-color: white;
        border: 1px solid
    }

    .results-delete-popup .close-btn {
        position: absolute;
        right: 10px;
        top: 10px;
        width: 15px;
        height: 15px;
        background: #17376e;
        color: #ffffff;
        text-align: center;
        line-height: 15px;
        border-radius: 15px;
        cursor: pointer;
    }

    .results-delete-popup {
        width: 100%;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .delete-card-rs {
        display: flex;
        flex-direction: column;
        gap: 20px;
        align-items: center;
    }

    h2 {
        font-size: 2vw;
        margin: 20px 0;
        text-align: center;
    }

    p {
        font-size: 1vw;
    }
</style>

<body>

    <div class="results-delete-popup" id="result-sheet-delete-popup">
        <div class="close-btn" id="close-delete-popup-e">
            &times;
        </div>
        <div class="delete-card-rs">
            <div class="delete-img">
                <svg xmlns="http://www.w3.org/2000/svg" width="67" height="66" viewBox="0 0 67 66" fill="none">
                    <path
                        d="M33.5 63C50.0685 63 63.5 49.5685 63.5 33C63.5 16.4315 50.0685 3 33.5 3C16.9315 3 3.5 16.4315 3.5 33C3.5 49.5685 16.9315 63 33.5 63Z"
                        stroke="#E02424" stroke-width="6" stroke-linecap="round" stroke-linejoin="round" />
                    <path d="M33.5 21V33" stroke="#E02424" stroke-width="6" stroke-linecap="round"
                        stroke-linejoin="round" />
                    <path d="M33.5 45H33.53" stroke="#E02424" stroke-width="6" stroke-linecap="round"
                        stroke-linejoin="round" />
                </svg>
            </div>
            <div class="delete-text">
                <h2>Are you sure?</h2>
                <p>It will delete all the details about this examination?</p>
            </div>

            <form class="rs-form" method="post" id='delete-rs-form'>
                <button name='delete-exam' value='delete' type="submit" class="delete-bt-rs">Delete</button>
            </form>


        </div>
    </div>


    <body>

        <script>
            document.querySelector("#close-delete-popup-e").addEventListener("click", function () {
                document.querySelector("#delete-exam").classList.remove("active");
                document.querySelector("#body").classList.remove("active");
            });
        </script>