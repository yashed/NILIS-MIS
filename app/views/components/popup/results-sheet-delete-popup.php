<style>
    .result-sheet-delete-popup {
        position: fixed;
        top: -150%;
        left: 50%;
        transform: translate(-50%, -50%) scale(1.25);
        opacity: 0;
        background: #fff;
        width: 60%;
        /* height: 60vh; */
        padding: 40px;
        box-shadow: 17px 10px 400px rgba(0, 0, 0, 1.15);
        border-radius: 10px;
        transition: top 0ms ease-in-out 200ms, opacity 200ms ease-in-out 0ms, transform 200ms ease-in-out 0ms;
        z-index: 100;
    }

    .result-sheet-delete-popup.active {

        top: 50%;
        opacity: 1;
        transform: translate(-50%, -50%) scale(1);
        transition: top 0ms ease-in-out 200ms, opacity 200ms ease-in-out 0ms, transform 200ms ease-in-out 0ms;
    }

    .result-sheet-delete-popup .close-btn {
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

    .result-sheet-delete-popup .form h2 {
        text-align: center;
        color: #17376e;
        margin: 10px 0px 20px;
        font-size: 25px;
        font-weight: 600;
    }

    .result-sheet-delete-popup .form .form-element {
        display: flex;
        margin: 15px 0px;
        align-content: flex-end;
        justify-content: center;
        align-items: flex-start;
        flex-direction: column;
        flex-wrap: wrap;
    }

    .result-sheet-delete-popup .form .form-element label {
        font-size: 14px;
        color: #222;
    }

    .result-sheet-delete-popup .form .form-element input[type="text"],
    .result-sheet-delete-popup .form .form-element input[type="password"] {
        margin-top: 5px;
        display: block;
        width: 100%;
        padding: 12px;
        outline: none;
        border: 1px solid #aaa;
        border-radius: 5px;
    }

    .delete-card-rs {
        display: flex;
        flex-direction: column;
        gap: 20px;
        align-items: center
    }

    .delete-card-rs button {
        width: 50%;
        padding: 0.5em 1em 0.5em 1em;
        border-radius: 8px;
        background: #17376e;
        box-shadow: 0px 3px 6px 0px rgba(0, 0, 0, 0.2);
        border: 0px;
        cursor: pointer;
    }

    .rs-button-fx {
        display: flex;
        width: 50%;
        flex-wrap: wrap;
        justify-content: center;
        align-items: center;
    }

    .rs-delete-bt {
        width: 50%;
        height: 5vh;
        border-radius: 12px;
        background: #17376e;
    }

    .rs-delete-bt:hover {
        color: #17376e;
        background-color: white;
        border: 1px solid var(--colour-secondary-1, #17376e);
    }
</style>

<div class="result-sheet-delete-popup" id="result-sheet-delete-popup" style="width:30%;">
    <div class="close-btn" id="close-delete-popup-rs">
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
            <p>Do you really want to delete this user? This process cannot be undone.</p>
        </div>

        <form class="rs-button-fx" method="post">
            <input type="text" name="id" hidden>
            <button name='submit' value='delete' type="submit" class="delete-bt">Delete</button>
        </form>


    </div>
</div>

<script>
    document.querySelector("#close-delete-popup-rs").addEventListener("click", function () {
        document.querySelector("#result-sheet-delete-popup").classList.remove("active");
        document.querySelector("#body").classList.remove("active");
    });
</script>