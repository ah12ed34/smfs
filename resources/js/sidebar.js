import { formToJSON } from "axios";

window.toggleSidebar =
function toggleSidebar() {
    const sidebar = document.getElementById('sidebar');
    const hdr2 = document.querySelector('.hdr2');
    const content = document.querySelector('.content');


    if (sidebar.style.right === '-170px') {
        sidebar.style.right = '0';
        hdr2.style.marginRight = '200px';
        content.style.marginRight = '200px';
      
    } else {
        sidebar.style.right = '-170px';
       
        content.style.marginRight = '60px';
    }
}
