window.toggleSidebar =
    function toggleSidebar() {
        const sidebar = document.getElementById('sidebar');
        const hdr2 = document.querySelector('.hdr2');
        const hdr3 = document.querySelector('.sidebar');
        const content = document.querySelector('.content');


        if (hdr3.style.width == '180px') {
            hdr3.style.width == '43px'
            document.querySelectorAll(".sidebar").forEach(function(element) {
                element.style.width = '43px';
            });
            // sidebar.style.right = '0';
            hdr2.style.marginRight = '180px';
            content.style.marginRight = '180px';

        } else {
            hdr3.style.width == '180px'
            document.querySelectorAll(".sidebar").forEach(function(element) {
                element.style.width = '180px';
            });
            // sidebar.style.right = '-130px';
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