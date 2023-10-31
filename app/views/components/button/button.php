<?php
?>

<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" href="button.css" />
</head>
<style>
@import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap');

root {
    ----colour-secondar-1: #17376E;
}

button {
        color: #fff;
        width: 50%;
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
</style>

<body>
    <button>
        <div class="bt-name">Button</div>
    </button>
</body>

</html>