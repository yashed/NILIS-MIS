<?php
    $role = "DR";
    $data['role'] = $role;
?>

<?php $this->view('components/navside-bar/header',$data) ?>
<?php $this->view('components/navside-bar/sidebar',$data) ?>
<?php $this->view('components/navside-bar/footer',$data) ?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Settings</title>
    </head>
    <style>
        *{
            font-family: 'Poppins', sans-serif;
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        :root{
            --body-color: #E2E2E2;
            --sidebar-color: #17376E;
            --primary-color: #9AD6FF;
            --text-color: #ffffff;

            --tran-02: all 0.2s ease;
            --tran-03: all 0.3s ease; 
            --tran-04: all 0.4s ease;
            --tran-05: all 0.5s ease;
        }
        .dr-home{
            height: 100vh;
            left: 250px;
            position: relative;
            width: calc(100% - 250px);
            transition: var(--tran-05);
            background: var(--body-color);
        }
        .dr-title{
            font-size: 30px;
            font-weight: 500;
            color: black;
            padding: 4px 0px 4px 35px;
            background-color: var(--text-color);
            border-radius: 6px;
            margin: 7px 4px 7px 4px;
        }
        .sidebar.close ~ .dr-home{
            left: 88px;
            width: calc(100% - 88px);
        }
        body {
    background-color: #E2E2E2;
    margin: 0; 
    padding: 0; 
}

.white-container1 {
    background-color: white;
    padding: 20px;
    margin-top: 10px;
    margin-left: 250px;
    color: #000000;
    font-size: 36px;
    font-family:"Poppins",sans-serif;
    margin-bottom: 10px;
    border-radius: 10px;
    transition: all 0.5s ease;
}

.white-container1.close{
    margin-left: 88px;
}

.white-container2 {
    margin-left: 250px;
    background-color: white;
    padding: 40px;
    height: 700px;
    font-family:"Poppins",sans-serif;
    font-size: 24px;
    align-items: center;
    justify-content: center;
    border-radius: 10px;
    transition: all 0.5s ease;
}

.white-container2.close{
    margin-left: 88px;
    padding-left: 2%;
    padding-right: 10% ;
}

.left-top-text {
    text-align: left;
    margin: 0; 
    padding: 0; 
}

.white-container2-1{
    margin-left: 40px;
    background-color: var(--text-color);
    padding-top: 150px;
    height: 300px;
    font-family:"Poppins",sans-serif;
    font-size: 24px;
    align-items: center;
    justify-content: center;
    border-radius: 10px;
    border-color: #000000;
    border-style: groove;
    border-width: 2px;
    transition: all 0.5s ease;
    padding-left: 5%;
}

.white-container2-1.close{
    margin-left: 88px;
    padding-left: 5%;
    padding-right: 10% ;
}

.abc{
    display: flex;
    flex-direction: row;
}

.button {
    display: inline-block;
    padding: 10px 20px;
    background-color: #3498db;
    color: #fff;
    text-decoration: none;
    border: none;
    border-radius: 5px;
    font-size: 16px;
    margin: 10px;
    cursor: pointer;
  }

  .button:hover {
    background-color: #2980b9;
  }

  .form-container {
    width: 300px;
    margin: 0 auto;
  }

  .form-row {
    display: flex;
    margin-bottom: 10px;
  }

  .form-group {
    flex: 1;
    margin-right: 10px;
  }

  .form-group:last-child {
    margin-right: 0;
  }

  .form-group label {
    display: block;
    font-weight: bold;
  }

  .form-group input {
    width: 100%;
    padding: 8px;
    border: 1px solid #ccc;
    border-radius: 5px;}
    </style>
    <body>
    <div class="white-container1 close">
        Settings
    </div>

    <div class="white-container2 close">
        <p class="left-top-text">Account Settings</p>
        <br>
        <div class="white-container2-1 close">
            <div class="abc">
                <div textname="n"><h3>senudi muthugala</h3></div>
                <button class="button">Cancel</button>
                <button class="button">Save</button>
            </div>
        </div>
        <body>
  <div class="form-container">
    <form>
      <div class="form-row">
        <div class="form-group">
          <label for="first-name">First Name:</label>
          <input type="text" id="first-name" name="first-name">
        </div>
        <div class="form-group">
          <label for="last-name">Last Name:</label>
          <input type="text" id="last-name" name="last-name">
        </div>
      </div>
      <div class="form-row">
        <div class="form-group">
          <label for="email">Email:</label>
          <input type="email" id="email" name="email">
        </div>
      </div>
      <div class="form-row">
        <div class="form-group">
          <label for="role">Role:</label>
          <input type="text" id="role" name="role">
        </div>
      </div>
    </form>
  </div>

    
    </div>
</body>
<script>
        const body = document.querySelector("body"),
            sidebar = body.querySelector(".sidebar"),
            toggle = body.querySelector(".toggle");
            whitecontainer1 = body.querySelector(".white-container1");
            whitecontainer2 = body.querySelector(".white-container2");
            whitecontainer21 = body.querySelector(".white-container2-1");

        toggle.addEventListener("click", () => {
            sidebar.classList.toggle("close");
            whitecontainer1.classList.toggle("close");
            whitecontainer2.classList.toggle("close");
            whitecontainer21.classList.toggle("close");
        });

        let subMenu = document.getElementById("subMenu");

        function toggleMenu() {
            subMenu.classList.toggle("open-menu");
    }
    </script>
</html>