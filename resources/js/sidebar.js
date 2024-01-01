window.toggleSidebar =
    function toggleSidebar() {
        const sidebar = document.getElementById('sidebar');
        const hdr2 = document.querySelector('.hdr2');
        const content = document.querySelector('.content');


        if (sidebar.style.right === '-130px') {
            sidebar.style.right = '0';
            hdr2.style.marginRight = '180px';
            content.style.marginRight = '180px';

        } else {
            sidebar.style.right = '-130px';
            hdr2.style.marginRight = '50px';
            content.style.marginRight = '50px';
        }


        sidebar.classList.toggle('collapsed');

        if (sidebar.classList.contains('collapsed')) {
            content.style.marginRight = '50px';
        } else {
            content.style.marginRight = '180px';
        }
    }