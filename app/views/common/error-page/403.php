<style>
    @import url('https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap');
    @import url("https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,200;0,300;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,700;1,800;1,900&display=swap");

    svg#freepik_stories-forgot-password:not(.animated) .animable {
        opacity: 0;
    }

    svg#freepik_stories-forgot-password.animated #freepik--background-simple--inject-109 {
        animation: 1s 1 forwards cubic-bezier(.36, -0.01, .5, 1.38) lightSpeedRight;
        animation-delay: 0s;
    }

    svg#freepik_stories-forgot-password.animated #freepik--Plants--inject-109 {
        animation: 1s 1 forwards cubic-bezier(.36, -0.01, .5, 1.38) slideDown;
        animation-delay: 0s;
    }

    svg#freepik_stories-forgot-password.animated #freepik--Bookshelf--inject-109 {
        animation: 1s 1 forwards cubic-bezier(.36, -0.01, .5, 1.38) slideDown;
        animation-delay: 0s;
    }

    svg#freepik_stories-forgot-password.animated #freepik--Character--inject-109 {
        animation: 1s 1 forwards cubic-bezier(.36, -0.01, .5, 1.38) slideUp;
        animation-delay: 0s;
    }

    svg#freepik_stories-forgot-password.animated #freepik--Mug--inject-109 {
        animation: 1s 1 forwards cubic-bezier(.36, -0.01, .5, 1.38) lightSpeedLeft, 6s Infinite linear shake;
        animation-delay: 0s, 1s;
    }

    svg#freepik_stories-forgot-password.animated #freepik--Device--inject-109 {
        animation: 1s 1 forwards cubic-bezier(.36, -0.01, .5, 1.38) slideLeft;
        animation-delay: 0s;
    }

    svg#freepik_stories-forgot-password.animated #freepik--Table--inject-109 {
        animation: 1s 1 forwards cubic-bezier(.36, -0.01, .5, 1.38) slideLeft;
        animation-delay: 0s;
    }

    svg#freepik_stories-forgot-password.animated #freepik--pop-up-window--inject-109 {
        animation: 1s 1 forwards cubic-bezier(.36, -0.01, .5, 1.38) lightSpeedRight, 3s Infinite linear floating;
        animation-delay: 0s, 1s;
    }

    @keyframes lightSpeedRight {
        from {
            transform: translate3d(50%, 0, 0) skewX(-20deg);
            opacity: 0;
        }

        60% {
            transform: skewX(10deg);
            opacity: 1;
        }

        80% {
            transform: skewX(-2deg);
        }

        to {
            opacity: 1;
            transform: translate3d(0, 0, 0);
        }
    }

    @keyframes slideDown {
        0% {
            opacity: 0;
            transform: translateY(-30px);
        }

        100% {
            opacity: 1;
            transform: translateY(0);
        }
    }

    @keyframes slideUp {
        0% {
            opacity: 0;
            transform: translateY(30px);
        }

        100% {
            opacity: 1;
            transform: inherit;
        }
    }

    @keyframes lightSpeedLeft {
        from {
            transform: translate3d(-50%, 0, 0) skewX(20deg);
            opacity: 0;
        }

        60% {
            transform: skewX(-10deg);
            opacity: 1;
        }

        80% {
            transform: skewX(2deg);
        }

        to {
            opacity: 1;
            transform: translate3d(0, 0, 0);
        }
    }

    @keyframes shake {

        10%,
        90% {
            transform: translate3d(-1px, 0, 0);
        }

        20%,
        80% {
            transform: translate3d(2px, 0, 0);
        }

        30%,
        50%,
        70% {
            transform: translate3d(-4px, 0, 0);
        }

        40%,
        60% {
            transform: translate3d(4px, 0, 0);
        }
    }

    @keyframes slideLeft {
        0% {
            opacity: 0;
            transform: translateX(-30px);
        }

        100% {
            opacity: 1;
            transform: translateX(0);
        }
    }

    @keyframes floating {
        0% {
            opacity: 1;
            transform: translateY(0px);
        }

        50% {
            transform: translateY(-10px);
        }

        100% {
            opacity: 1;
            transform: translateY(0px);
        }
    }

    .container-403-error {
        display: flex;
        justify-content: center;
        align-items: center;
        width: 60vw;
        background-color: rgba(255, 255, 255, 0.5);

        top: 0;
        left: 0;
        z-index: 100;

    }

    .wrapper-403-error {
        width: 100%;
        display: flex;
        padding: 10px;
    }

    .container-403-error {
        width: 60%;
        display: flex;
    }

    .error-403-text {
        display: flex;
        justify-content: center;
        align-items: center;
        flex-direction: column;
        width: 40%;
        font-weight: 600;
        color: #17376e;
        padding: 30px;
        gap: 2vw;
        font-family: 'montserrat'
    }

    .text-403-title {
        font-size: 3.5vw;
        font-weight: 700;
        color: #17376e;

    }

    .text-403-content {
        font-size: 1.5vw;
        font-weight: 600;
        color: #17376e;
        text-align: center;

    }

    .redirect-login-btn {
        color: #fff;
        margin-top: 5vw;
        width: 25vw;
        height: 3.5vw;
        padding: 8px 22px;
        border-radius: 10px;
        background: #17376e;
        box-shadow: 0px 3px 6px 0px rgba(0, 0, 0, 0.2);
        border: 0px;
    }

    .redirect-login-bt-name {
        font-size: 1.2vw;
        font-weight: 300;
        font-family: 'Poppins';

    }

    .redirect-login-btn:hover {
        color: #17376e;
        background-color: white;
        border: 1px solid var(--colour-secondary-1, #17376e);
    }

    body {
        overflow: hidden;
    }
</style>

<body>
    <div class='wrapper-403-error'>
        <div class="container-403-error">
            <?php $this->view('common/svg/403-svg', $data) ?>
        </div>
        <div class="error-403-text">
            <span class="text-403-title">Access Forbidden</span>
            <span class="text-403-content">You tried to access a page you did not have piror authoization far.</span>
            <button type="submit" class='redirect-login-btn' onclick="redirectToLoginPage()">
                <div class="redirect-login-bt-name">Go Back to Login</div>
            </button>
        </div>
    </div>
</body>
<script>
    function redirectToLoginPage() {
        window.location.href = '<?= ROOT ?>login';

    }
</script>