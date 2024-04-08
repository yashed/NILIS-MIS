<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap');

        * {
            font-family: 'Poppins', sans-serif;
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }


        .banner {
            margin-left: 1%;
            display: flex;
            width: 80%;
            height: 200px;
            background: #FFFFFF;
            border: 1px solid rgba(0, 0, 0, 0.1);
            box-shadow: 0px 7px 4px rgba(0, 0, 0, 0.02), 0px 3px 3px rgba(0, 0, 0, 0.03), 0px 1px 2px rgba(0, 0, 0, 0.03), 0px 0px 0px rgba(0, 0, 0, 0.03);
            border-radius: 8px;
        }

        .color-strip {
            width: 5px;
            height: 100%;
            background: #17376E;
            margin-right: 1%;
        }


        .content-container {
            display: flex;
            flex-direction: column;
            gap: 6px;
            width: 100%;
            height: 95%;
            padding-left: 1%;
            font-family: 'Poppins', sans-serif;
        }

        .note {
            width: 100%;
            height: 10px;
            font-style: normal;
            font-weight: 600;
            font-size: 25px;
            line-height: 24px;
            color: #17376E;
            padding-top: 35px;
            flex: 99%;

        }

        .development-message {
            width: 90%;
            height: 36px;
            font-family: 'Poppins', sans-serif;
            font-style: normal;
            font-weight: 400;
            font-size: 0.8vw;
            line-height: 18px;
            color: #292929;
            margin-left: 45px;
            margin-bottom: 0.3%;
            margin-top: 1%;
        }

        .buttons-container {
            display: flex;
            align-items: center;
            width: 100%;

        }

        .button1 {
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 0.5vw 1vw 0.5vw 1vw;
            width: 15%;
            height: 2vw;
            min-height: 20px;
            background: #FFFFFF;
            border: 1px solid #DCDEE4;
            border-radius: 8px;
            color: #333;
            font-size: 0.8vw;
            margin-left: 45px;
        }

        .button2 {
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 8px 16px;
            gap: 12px;
            display: none;
            width: 113px;
            height: 40px;
            min-height: 40px;
            border-radius: 8px;
        }

        .flex {
            display: flex;
        }

        .image {
            margin-top: 30px;
            margin-right: 1%;
            flex: 1%;
        }

        .close-symbol{
            cursor: pointer;
            
        }

    </style>
</head>

<body>




    <div class="banner">
        <div class="color-strip"></div>
        <div class="closing"><span class="close-symbol" onclick="closeComponent()">✖</span> </div>
        <div class="content-container">

            <div class="flex">

                <div class="image">
                    <svg fill="#17376E" version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="30px" height="30px" viewBox="0 0 478.13 478.13" xml:space="preserve" stroke="#17376E" stroke-width="0.00478125">
                        <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                        <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                        <g id="SVGRepo_iconCarrier">
                            <g>
                                <g>
                                    <g>
                                        <circle cx="239.904" cy="314.721" r="35.878"></circle>
                                        <path d="M256.657,127.525h-31.9c-10.557,0-19.125,8.645-19.125,19.125v101.975c0,10.48,8.645,19.125,19.125,19.125h31.9 c10.48,0,19.125-8.645,19.125-19.125V146.65C275.782,136.17,267.138,127.525,256.657,127.525z"></path>
                                        <path d="M239.062,0C106.947,0,0,106.947,0,239.062s106.947,239.062,239.062,239.062c132.115,0,239.062-106.947,239.062-239.062 S371.178,0,239.062,0z M239.292,409.734c-94.171,0-170.595-76.348-170.595-170.596c0-94.248,76.347-170.595,170.595-170.595 s170.595,76.347,170.595,170.595C409.887,333.387,333.464,409.734,239.292,409.734z"></path>
                                    </g>
                                </g>
                            </g>
                        </g>
                    </svg>
                </div>


                <div class="note">
                    <?= $role ?>
                </div>
            </div>
            <div class="development-message">
                <?= $notification->description ?>
            </div>
            </br>
            <!-- <div class="buttons-container">
                <a href="<?= ROOT . $notification->button_link ?>" class="button1"><?= $notification->button_text ?></a>
                
            </div> -->

        </div>

    </div>
    



    
</body>

</html>