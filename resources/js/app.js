import './bootstrap';

import $ from 'jquery';
window.$ = $;

// import Alpine from 'alpinejs';

// window.Alpine = Alpine;

import Swal from 'sweetalert2';
window.Swal = Swal;

const Toast = Swal.mixin({
  toast: true,
  position: 'top-end',
  showConfirmButton: false,
  timer: 3000
});

window.Toast = Toast;

// Alpine.start();