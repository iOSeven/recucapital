import 'bootstrap';
import 'datatables.net-bs5';
import 'datatables.net-buttons-bs5';

import './sidebar';
import $ from 'jquery';

window.$ = window.jQuery = $;

$(document).ready(function () {

    $('#peopleTable').DataTable({

        pageLength: 10,

        responsive: true,

        ordering: true,

        searching: true,

        lengthChange: true,

        language: {
            url: "/vendor/datatables/es-MX.json"
        }

    });

});


document.addEventListener('DOMContentLoaded', () => {
    const form = document.querySelector('.sync-form');

    if (!form) return;

    form.addEventListener('submit', () => {
        const button = form.querySelector('.sync-button');

        if (!button) return;

        button.disabled = true;
        button.innerHTML = `
            <i class="bi bi-arrow-repeat"></i>
            Sincronizando...
        `;
    });
});
