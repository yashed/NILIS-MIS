<style>
    /* HTML: <div class="loader"></div> */
    .loader {
        width: 40px;
        height: 40px;
        aspect-ratio: 1;
        position: relative;
    }

    .loader:before,
    .loader:after {
        content: "";
        position: absolute;
        top: 0;
        left: 0;
        margin: -8px 0 0 -8px;
        width: 16px;
        aspect-ratio: 1;
        background: #17376e;
        animation:
            l2-1 2s infinite,
            l2-2 1s infinite;
    }

    .loader:after {
        background: #9ad6ff;
        animation-delay: -1s, 0s;
    }

    @keyframes l2-1 {
        0% {
            top: 0;
            left: 0
        }

        25% {
            top: 100%;
            left: 0
        }

        50% {
            top: 100%;
            left: 100%
        }

        75% {
            top: 0;
            left: 100%
        }

        100% {
            top: 0;
            left: 0
        }
    }

    @keyframes l2-2 {

        40%,
        50% {
            transform: rotate(0.25turn) scale(0.5)
        }

        100% {
            transform: rotate(0.5turn) scale(1)
        }
    }
</style>

<body>
    <div class="loader"></div>
</body>