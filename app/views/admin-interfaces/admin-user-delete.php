<div class="popup" id="delete-popup" style="width:30%; height:40vh">
    <div class="close-btn" id="close-delete-popup">
        &times;
    </div>
    <div class="delete-card">
        <div class="delete-img">
            <svg xmlns="http://www.w3.org/2000/svg" width="67" height="66" viewBox="0 0 67 66" fill="none">
                <path
                    d="M33.5 63C50.0685 63 63.5 49.5685 63.5 33C63.5 16.4315 50.0685 3 33.5 3C16.9315 3 3.5 16.4315 3.5 33C3.5 49.5685 16.9315 63 33.5 63Z"
                    stroke="#E02424" stroke-width="6" stroke-linecap="round" stroke-linejoin="round" />
                <path d="M33.5 21V33" stroke="#E02424" stroke-width="6" stroke-linecap="round"
                    stroke-linejoin="round" />
                <path d="M33.5 45H33.53" stroke="#E02424" stroke-width="6" stroke-linecap="round"
                    stroke-linejoin="round" />
            </svg>
        </div>
        <div class="delete-text">
            <h2>Are you sure?</h2>
            <p>Do you really want to delete this user? This process cannot be undone.</p>
        </div>

        <form class="button-fx" method="post">
            <input type="text" name="id" hidden>
            <button name='submit' value='delete' type="submit" class="delete-bt">Delete</button>
        </form>


    </div>
</div>

<script>
document.querySelector("#delete-user").addEventListener("click", function() {
    document.querySelector("#delete-popup").classList.add("active");
});

document.querySelector("#close-delete-popup").addEventListener("click", function() {
    document.querySelector("#delete-popup").classList.remove("active");
});
</script>