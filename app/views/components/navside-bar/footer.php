<script>
    document.addEventListener("DOMContentLoaded", function () {
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

        var currentUrl = window.location.href;    // Get the current URL
        currentUrl = currentUrl.split('?')[0];    // Remove any query strings from the URL
        var navLinks = document.querySelectorAll('.menu-links .nav-link a'); // Get all navigation links
        navLinks.forEach(function (link) {    // Loop through each navigation link
            if (link.getAttribute('href') === currentUrl) {    // Compare the href attribute of the link with the current URL
                // Add the 'selected' class to the parent list item
                link.parentNode.classList.add('selected');
                // Change the color of the image within the selected navigation item
                var icon = link.querySelector('.icon');
                var text = link.querySelector('.text');
                if (icon && text) {
                    icon.style.color = 'var(--sidebar-color)';
                    text.style.color = 'var(--sidebar-color)';
                }
            }
            else if (currentUrl == '<?= ROOT ?>dr/userprofile') {
                link1 = document.querySelector('.menu-links .nav-link a[href="<?= ROOT ?>dr/participants"]');
                link1.parentNode.classList.add('selected');
                var icon = link1.querySelector('.icon');
                var text = link1.querySelector('.text');
                if (icon && text) {
                    icon.style.color = 'var(--sidebar-color)';
                    text.style.color = 'var(--sidebar-color)';
                }
            }
            else if (currentUrl == '<?= ROOT ?>dr/newdegree') {
                link1 = document.querySelector('.menu-links .nav-link a[href="<?= ROOT ?>dr/degreeprofile"]');
                link1.parentNode.classList.add('selected');
                var icon = link1.querySelector('.icon');
                var text = link1.querySelector('.text');
                if (icon && text) {
                    icon.style.color = 'var(--sidebar-color)';
                    text.style.color = 'var(--sidebar-color)';
                }
            }
            else if (currentUrl == '<?= ROOT ?>dr/examination/participants' || currentUrl == '<?= ROOT ?>dr/examination/results') {
                link1 = document.querySelector('.menu-links .nav-link a[href="<?= ROOT ?>dr/examination"]');
                link1.parentNode.classList.add('selected');
                var icon = link1.querySelector('.icon');
                var text = link1.querySelector('.text');
                if (icon && text) {
                    icon.style.color = 'var(--sidebar-color)';
                    text.style.color = 'var(--sidebar-color)';
                }
            }
            else if (currentUrl == '<?= ROOT ?>clerk/userprofile') {
                link1 = document.querySelector('.menu-links .nav-link a[href="<?= ROOT ?>clerk/participants"]');
                link1.parentNode.classList.add('selected');
                var icon = link1.querySelector('.icon');
                var text = link1.querySelector('.text');
                if (icon && text) {
                    icon.style.color = 'var(--sidebar-color)';
                    text.style.color = 'var(--sidebar-color)';
                }
            }
            else if (currentUrl == '<?= ROOT ?>sar/examination/participants' || currentUrl == '<?= ROOT ?>sar/examination/results' || currentUrl == '<?= ROOT ?>sar/examination/resultsupload') {
                link1 = document.querySelector('.menu-links .nav-link a[href="<?= ROOT ?>sar/examination"]');
                link1.parentNode.classList.add('selected');
                var icon = link1.querySelector('.icon');
                var text = link1.querySelector('.text');
                if (icon && text) {
                    icon.style.color = 'var(--sidebar-color)';
                    text.style.color = 'var(--sidebar-color)';
                }
            }
        });
    });
</script>


</body>

</html>