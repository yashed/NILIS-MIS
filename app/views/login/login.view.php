<!DOCTYPE html>
<html>
  <head>
    <link
      href="https://fonts.googleapis.com/css?family=Montserrat&display=swap"
      rel="stylesheet"
    />
    <style>
      /* Apply styles to the body and HTML to ensure full height */

      @import url("https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,200;0,300;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,700;1,800;1,900&display=swap");
      @import url("https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Poppins:ital,wght@0,200;0,300;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,700;1,800;1,900&display=swap");
      body {
        height: 100%;
        margin: 0;
        padding: 0; /* Remove any padding */
        background-color: #17376e;
      }

      .flex-container {
        display: flex;
        min-height: 100%; /* Use min-height to ensure it takes up at least the full viewport height */
        align-items: center;
        background-color: #17376e;
      }

      .body_02 {
        display: flex;
        align-items: center;
        justify-content: center;
        background-color: white;
        font-style: normal;
        border-radius: 50px 0 0 50px;
        width: 100%; /* Adjusted to full width */
        max-width: 698px; /* Set a maximum width */
        text-align: center;
        height: 100vh;
        /* line-height: 100%; */
        font-size: 28px;
        margin-left: auto;
        padding: 20px;
        background-color: white;
      }

      .body_02_1 {
        display: flex;
        justify-content: center;
        flex-direction: column;
        align-items: center;
        gap: 35px;
        width: 80%;
      }

      .body_01 {
        display: flex;
        flex-direction: column;
        align-items: center;
        gap: 30px;
        font-family: "Montserrat", sans-serif;
        font-weight: 900;
        font-size: 25px;
        color: white;
        justify-content: center;
        min-height: 100%; /* Use min-height to ensure it takes up at least the full viewport height */
        width: 100%;
        padding: 20px;
      }
      .title {
        width: auto;
        font-family: "Montserrat", sans-serif;
        font-weight: 700;
        line-height: 1.2;
      }

      .img1 {
        width: 100%;
        max-width: 350px;
        height: auto;
      }

      .img2 {
        width: 100%;
        max-width: 360px;
        height: auto;
      }
      .login {
        font-family: "Poppins", sans-serif;
        font-size: 30px;
        font-size: larger;
        font-weight: 600;
        color: #17376e;
      }
      .input {
        width: 80%;
        height: 50px;
        font-family: "Poppins";
        font-size: 16px;
        font-weight: 350;
        padding-left: 20px;
        border-radius: 15px;
        border: 1px;
        border-color: rgba(255, 255, 255, 0.2);
        background-color: #f5f5f5;
      }
      a {
        text-decoration: none;
      }
      .forgot {
        font-family: "Poppins";
        font-size: 12px;
        color: #6193b5;
        font-weight: 400;
      }
      .examination {
        color: #9ad6ff;
      }

      root {
        ----colour-secondar-1: #17376e;
      }
      button {
        color: #fff;
        width: 85%;
        height: 6vh;
        padding: 8px 22px;
        border-radius: 12px;
        background: #17376e;
        box-shadow: 0px 3px 6px 0px rgba(0, 0, 0, 0.2);
        border: 0px;
      }
      .bt-name {
        font-size: 16px;
        font-weight: 500px;
      }
      button:hover {
        color: #17376e;
        background-color: white;
        border: 1px solid var(--colour-secondary-1, #17376e);
      }

      @media (max-width: 768px) {
        .body_01 {
          font-size: 20px;
        }

        .img1 {
          max-width: 250px;
        }

        .img2 {
          max-width: 260px;
        }
      }
    </style>
  </head>
  <body>
    <div class="flex-container">
      <div class="body_01">
        <img
          class="img1"
          src="../../../public/assets/NILISLogo.png"
          alt="Logo"
        />
        <h1 class="title">
          <div class="examination">Examination</div>
          Management<br />Information<br />System
        </h1>
        <img
          class="img2"
          src="../../../public/assets/Loginpng.png"
          alt="Logo"
        />
      </div>
      <div class="body_02">
        <div class="body_02_1">
          <h1 class="login">
            Sign in to <br />
            your account
          </h1>
          <input class="input" type="text" placeholder="Username" />
          <input class="input" type="password" placeholder="Password" />
          <button>
            <div class="bt-name">Button</div>
          </button>
          <a href="#"> <label class="forgot">Forgot Password</label></a>
        </div>
      </div>
    </div>
  </body>
</html>
