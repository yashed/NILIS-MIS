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

// drop menu side

// let arrows = document.querySelectorAll(".arrow");
// for (var i = 0; i < arrows.length; i++) {
//     arrows[i].addEventListener("click", (e) => {
//         console.log("Arrow clicked");
//         let arrowParent = e.target.parentElement.parentElement;
//         arrowParent.classList.toggle("show");
//     });
// }
const arrows = document.querySelectorAll(".arrow");

for (let i = 0; i < arrows.length; i++) {
    arrows[i].addEventListener("click", (e) => {
        console.log("Arrow clicked");
        let arrowParent = e.target.parentElement.parentElement;
        arrowParent.classList.toggle("show");
    });
}

const coursesLink = document.querySelector(".nav-link");

coursesLink.addEventListener("click", (e) => {
    e.preventDefault();
    const submenu = coursesLink.querySelector(".sub-menu-drop");
    submenu.style.display = submenu.style.display === "block" ? "none" : "block";
});

document.addEventListener("click", (event) => {
    const coursesLink = document.querySelector(".nav-link");
    const submenu = coursesLink.querySelector(".sub-menu-drop");

    if (event.target !== coursesLink && event.target.parentNode !== coursesLink) {
        submenu.style.display = "none";
    }
});
</script>


</body>

</html>