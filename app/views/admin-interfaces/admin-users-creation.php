<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

    .body {
        height: 100vh;
    }

    .center {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
    }

    .center button {
        padding: 10px 20px;
        align-items: left;
        font-size: 20px;
        background: #000;
        color: #fff;
        cursor: pointer;
        border-radius: 5px;
    }

    .popup {
        position: absolute;
        top: -150%;
        left: 50%;
        opacity: 0;
        transform: translate(-50%, -50%) scale(1.25);
        width: 380px;
        padding: 20px 30px;
        background: #fff;
        box-shadow: 2px 2px 5px rgba(0, 0, 0, 0.15);
        border-radius: 10px;
        transition: top 0ms ease-in-out 200ms, opacity 200ms ease-in-out 0ms, transform 200ms ease-in-out 0ms;
    }

    .popup.active {
        top: 50%;
        opacity: 1;
        transform: translate(-50%, -50%) scale(1);
        transition: top 0ms ease-in-out 200ms, opacity 200ms ease-in-out 0ms, transform 200ms ease-in-out 0ms;
    }

    .popup .close-btn {
        position: absolute;
        right: 10px;
        top: 10px;
        width: 15px;
        height: 15px;
        background: #888;
        color: #eee;
        text-align: center;
        line-height: 15px;
        border-radius: 15px;
        cursor: pointer;
    }

    .popup .form h2 {
        text-align: center;
        color: #222;
        margin: 10px 0px 20px;
        font-size: 25px;
    }

    .popup .form .form-element {
        margin: 15px 0px;
    }

    .popup .form .form-element label {
        font-size: 14px;
        color: #222;
    }

    .popup .form .form-element input[type="text"],
    .popup .form .form-element input[type="password"] {
        margin-top: 5px;
        display: block;
        width: 100%;
        padding: 10px;
        outline: none;
        border: 1px solid #aaa;
        border-radius: 5px;
    }

    .popup .form .form-element input[type="checkbox"] {
        margin-right: 5px;
    }

    .popup .form .form-element button {
        margin-top: 10px;
        padding: 10px;
        width: 100%;
        border: none;
        outline: none;
        background: #000;
        color: #fff;
        font-size: 16px;
        cursor: pointer;
        border-radius: 5px;
    }

    .popup .form .form-element a {
        display: block;
        text-align: right;
        font-size: 15px;
        color: #1a79ca;
        text-decoration: none;
        font-weight: 600;
    }

    .user-data {
        display: flex;
        gap: 30px;
        flex-direction: row;
        width: 100%;
        justify-content: center
    }

    .column-01 {
        display: flex;
        flex-direction: column;
    }

    .column-01 {
        display: flex;
        flex-direction: column;
    }

    #form-element-dropdown {
        width: 100%;
        padding: 10px;
        outline: none;
        border: 1px solid #aaa;
        border-radius: 5px;
    }

    #form-element-dropdown option {
        padding: 10px;
        outline: none;
        border: 1px solid #aaa;
        border-radius: 10px;
    }
    </style>
</head>

<body>
    <div class="center">
        <button id="show-login">Login</button>
    </div>
    <div class="popup">
        <div class="close-btn">
            &times;
        </div>
        <div class="form">
            <h2>Login</h2>
            <div class="user-data">
                <div class="coloum-01">
                    <div class="form-element">
                        <label for="fname">First Name</label>
                        <input type="text" placeholder="Enter" id="fname">
                    </div>
                    <div class="form-element">
                        <label for="email">Email</label>
                        <input type="text" placeholder="Enter" id="email">
                    </div>
                    <div class="form-element">
                        <label for="role">Role</label>
                        <!-- <input type="password" placeholder="Enter" id="role"> -->
                        <select name="role" id="form-element-dropdown">
                            <option value="admin" class="form-element-dropdown-op">Admin</option>
                            <option value="Clark">Clark</option>
                            <option value="Clark">Director</option>
                            <option value="DR">Deputy Registar</option>
                            <option value="SAR">SAR</option>
                            <option value="ASAR">Asst SAR</option>
                        </select>
                    </div>
                </div>
                <div class="coloum-02">
                    <div class="form-element">
                        <label for="lname">Last Name</label>
                        <input type="text" placeholder="Enter" id="fname">
                    </div>
                    <div class="form-element">
                        <label for="uname">Username</label>
                        <input type="text" placeholder="Enter" id="email">
                    </div>
                    <div class="form-element">
                        <label for="role">Phone Number</label>
                        <input type="password" placeholder="Enter" id="role">
                    </div>
                </div>
            </div>

            <div class="form-element">
                <button>Login</button>
            </div>

        </div>
    </div>
    <script>
    document.querySelector("#show-login").addEventListener("click", function() {
        document.querySelector(".popup").classList.add("active");
    });
    document.querySelector(".close-btn").addEventListener("click", function() {
        document.querySelector(".popup").classList.remove("active");
    });
    </script>
</body>

</html>