<style>
    .pw-popup-wrapper {
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
        width: 100vw;
        background-color: rgba(255, 255, 255, 0.5);
        position: fixed;
        top: 0;
        left: 0;
        z-index: 100;
    }
</style>

<body>
    <div class="pw-popup-wrapper">
        <?php $this->view('components/popup/password-change-popup', $data) ?>
    </div>
</body>