<script>
    document.addEventListener("DOMContentLoaded", function() {
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
            body.classList.toggle("submenu-open", subMenuWrap.style.display === "block");
            if (subMenuWrap.style.display === "block") {
                sidebar.style.pointerEvents = "none";
            } else {
                sidebar.style.pointerEvents = "auto";
            }
        });

        subMenuWrap.addEventListener("click", (event) => {
            if (event.target === subMenuWrap) {
                subMenuWrap.style.display = "none";
                sidebar.style.pointerEvents = "auto";
                body.classList.remove("submenu-open");
            }
        });
    });
</script>


</body>

</html>