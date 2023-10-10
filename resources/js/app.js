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

import {
  Sidenav,
  initTE,
} from "tw-elements";

initTE({ Sidenav });
document
  .getElementById("slim-toggler")
  .addEventListener("click", (e) => {
    const message = $('#slim-content span');
    if (message.hasClass('show')) {
      message.removeClass('show');
      message.addClass('hide');
      message.html('<svg xmlns="http://www.w3.org/2000/svg"  width="24" height="24" viewBox="0 0 24 24" stroke-width="1.0" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><path d="M11 9l3 3l-3 3"></path><path d="M3 12a9 9 0 1 0 18 0a9 9 0 0 0 -18 0z"></path></svg>')
    }else{
      message.removeClass('hide');
      message.addClass('show');
      message.html('<svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-circle-chevron-left" width="24" height="24" viewBox="0 0 24 24" stroke-width="1.0" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">\
      <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>\
      <path d="M13 15l-3 -3l3 -3"></path>\
      <path d="M21 12a9 9 0 1 0 -18 0a9 9 0 0 0 18 0z"></path>\
   </svg>')
    }
    const instance = Sidenav.getInstance(
      document.getElementById("sidenav-main")
    );
    instance.toggleSlim();
  });
// Alpine.start();