document.addEventListener("DOMContentLoaded", function () {

    const toggleBtn = document.getElementById("toggleSidebar");
    const body = document.body;

    if (!toggleBtn) return;

    toggleBtn.addEventListener("click", function () {

        body.classList.toggle("sidebar-collapsed");

    });

});
