<style>
    .loader {
        width: 16px;
        height: 16px;
        position: relative;
        left: -32px;
        border-radius: 50%;
        color: #9AD6FF;
        background: currentColor;
        box-shadow: 32px 0, -32px 0, 64px 0;
    }

    .loader::after {
        content: '';
        position: absolute;
        left: -32px;
        top: 0;
        width: 16px;
        height: 16px;
        border-radius: 10px;
        background: #17376E;
        animation: move 3s linear infinite alternate;
    }

    @keyframes move {

        0%,
        5% {
            left: -32px;
            width: 16px;
        }

        15%,
        20% {
            left: -32px;
            width: 48px;
        }

        30%,
        35% {
            left: 0px;
            width: 16px;
        }

        45%,
        50% {
            left: 0px;
            width: 48px;
        }

        60%,
        65% {
            left: 32px;
            width: 16px;
        }

        75%,
        80% {
            left: 32px;
            width: 48px;
        }

        95%,
        100% {
            left: 64px;
            width: 16px;
        }
    }


    .mail-popup-content {
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
    }

    .result-upload-test {
        margin-bottom: 30px;
        font-size: 1.8vw;
        font-weight: 600;
        color: #17376E;
    }

    .mail-popup-text2 {
        margin-top: 20px;
        font-size: 0.7vw;
        font-weight: 500;
        color: #000;

    }
</style>

<div class="popup-mail-component" id="send-mail-popup">
    <div class="mail-popup-content">

        <div class="result-upload-test">
            Uploading Result Sheet ...
        </div>
        <span class="loader"></span>

    </div>
</div>

<script>
    document.querySelector("#close-send-mail-popup").addEventListener("click", function () {
        document.querySelector("#send-mail-popup").classList.remove("active");
        document.querySelector("#rs-body").classList.remove("active");
    });
</script>