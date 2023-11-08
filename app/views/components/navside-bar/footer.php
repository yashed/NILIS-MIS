
<script>
    const body = document.querySelector("body");
    const sidebar = body.querySelector(".sidebar");
    const toggle = body.querySelector(".toggle");

    toggle.addEventListener("click", () => {
        sidebar.classList.toggle("close");
    });

    const userPic = body.querySelector(".user-pic");
    const subMenuWrap = document.querySelector(".sub-menu-wrap");

    userPic.addEventListener("click", () => {
        subMenuWrap.style.display = subMenuWrap.style.display === "block" ? "none" : "block";
    });

    subMenuWrap.addEventListener("click", (event) => {
        if (event.target === subMenuWrap) {
            subMenuWrap.style.display = "none";
        }
    });
</script>


    </body>
</html>