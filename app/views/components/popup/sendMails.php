<style>
    .loader-mail {
        width: 50px;
        height: 28px;
        --_g: no-repeat radial-gradient(farthest-side, #17376E 94%, #0000);
        background:
            var(--_g) 50% 0,
            var(--_g) 100% 0;
        background-size: 12px 12px;
        position: relative;
        animation: l23-0 1.5s linear infinite;
    }

    .loader-mail:before {
        content: "";
        position: absolute;
        height: 12px;
        aspect-ratio: 1;
        border-radius: 50%;
        background: #9AD6FF;
        left: 0;
        top: 0;
        animation:
            l23-1 1.5s linear infinite,
            l23-2 0.5s cubic-bezier(0, 200, .8, 200) infinite;
    }

    @keyframes l23-0 {

        0%,
        31% {
            background-position: 50% 0, 100% 0
        }

        33% {
            background-position: 50% 100%, 100% 0
        }

        43%,
        64% {
            background-position: 50% 0, 100% 0
        }

        66% {
            background-position: 50% 0, 100% 100%
        }

        79% {
            background-position: 50% 0, 100% 0
        }

        100% {
            transform: translateX(calc(-100%/3))
        }
    }

    @keyframes l23-1 {
        100% {
            left: calc(100% + 7px)
        }
    }

    @keyframes l23-2 {
        100% {
            top: -0.1px
        }
    }

    .mail-popup-content {
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
    }

    .mail-popup-text {
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

        <div class="mail-popup-text">
            Sending Admission Cards
        </div>
        <div class="loader-mail">
        </div>



    </div>
</div>

<script>
    document.querySelector("#close-send-mail-popup").addEventListener("click", function () {
        document.querySelector("#send-mail-popup").classList.remove("active");
        document.querySelector("#body").classList.remove("active");
    });
</script>