const sidebar = document.getElementById('sidebar');

document.addEventListener('DOMContentLoaded', () => {

    const toggleBtn = document.getElementById('toggleSidebar');

    if (!toggleBtn) return;

    toggleBtn.addEventListener('click', () => {
        sidebar.classList.toggle('collapsed');
    });

});
