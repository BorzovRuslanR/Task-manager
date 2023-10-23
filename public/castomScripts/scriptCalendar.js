import { Datepicker } from 'datepicker.js';

document.addEventListener('DOMContentLoaded', function () {
    const birthdateInput = document.getElementById('birthdate');
    const datepicker = new Datepicker(birthdateInput, {
        format: 'yyyy-mm-dd',
        autohide: true
    });
});
