<style>
    @import url('https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap');
    @import url("https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,200;0,300;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,700;1,800;1,900&display=swap");

    .svg-404 {
        display: flex;
        justify-content: center;
        align-items: center;

        width: 60%;
        position: absolute;
        top: 0;
        right: 0;
    }

    svg#freepik_stories-404-error-lost-in-space:not(.animated) .animable {
        opacity: 0;
    }

    svg#freepik_stories-404-error-lost-in-space.animated #freepik--Planets--inject-108 {
        animation: 6s Infinite linear floating;
        animation-delay: 0s;
    }

    svg#freepik_stories-404-error-lost-in-space.animated #freepik--Dog--inject-108 {
        animation: 3s Infinite linear floating;
        animation-delay: 0s;
    }

    svg#freepik_stories-404-error-lost-in-space.animated #freepik--Character--inject-108 {
        animation: 3s Infinite linear floating;
        animation-delay: 0s;
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

    .animator-hidden {
        display: none;
    }

    .content-box {
        display: flex;
        width: 100%;
        /* height: 100%; */
    }



    .container-404-error {
        display: flex;
        width: 100%;
    }

    .error-contnet-txt {
        text-align: center;
        display: flex;
        justify-content: center;
        align-items: center;
        flex-direction: column;
        width: 40%;
        font-family: "Poppins";
        font-size: 2vw;
        font-weight: 600;
        color: #17376e;
        margin-top: 20vw;
        gap: 2vw;
    }

    .svg-404-img {
        display: flex;
        justify-content: center;
        align-items: center;

        width: 60%;
        position: absolute;
        top: 0;
        right: 0;
    }

    .text-404-sorry {
        font-size: 6vw;
        color: #17376e;
        font-family: "Montserrat";
        font-weight: 700;
    }

    .test-404-rest {
        font-size: 1.5vw;
        color: #17376e;
        font-family: "montserrat";
        font-weight: 600;
        width: 90%;
    }
</style>
<div class="container-404-error">
    <div class="content-box">
        <div class="error-contnet-txt">
            <span class="text-404-sorry">Sorry,</span>

            <span class="test-404-rest">the page you are looking for could not be found.<span>
        </div>
        <div class="svg-404-img">
            <?php $this->view('common/svg/404-svg') ?>
        </div>
    </div>

</div>