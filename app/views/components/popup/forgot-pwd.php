<style>
    @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap');

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
        font-family: 'Poppins', sans-serif;
        font-size: 1vw;
    }

    .pwd-text {
        font-size: 1.5vw;
        font-family: 'Poppins', sans-serif;
        font-weight: 500;
        color: #17376e;
        padding: 20px;
        align-items: center;
        text-align: center;

    }
</style>

<body>
    <div class="results-delete-popup" id="result-sheet-delete-popup">
        <div class="close-btn" id="close-forgot-popup-rs">
            &times;
        </div>

        <div class="delete-text">
            <!-- <h2>Are you sure?</h2> -->
            <div class="pwd-text">Pleace contact system administrator for reset your Password</div>
        </div>
    </div>
</body>
<script>
    document.querySelector("#close-forgot-popup-rs").addEventListener("click", function () {
        document.querySelector("#forgot-pwd").classList.remove("active");
        document.querySelector("#body").classList.remove("active");
    });
</script>