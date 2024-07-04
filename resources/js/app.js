
require('./bootstrap');

window.Vue = require('vue').default;

import Vue from 'vue'
import VueRouter from 'vue-router'
Vue.use(VueRouter)


// Importation de la route
import {routes} from './routes';

// Importation de la class User
import User from './Helpers/User';
window.User = User;

// Importation de la class Notification
import Notification from './Helpers/Notification';
window.Notification = Notification;

// Importation de SweetAlert2
import Swal from 'sweetalert2';
window.Swal = Swal;

const Toast = Swal.mixin({
  toast: true,
  position: 'top-end',
  showConfirmButton: false,
  timer: 3000,
  timerProgressBar: true,
  onOpen: (toast) => {
    toast.addEventListener('mouseenter', Swal.stopTimer)
    toast.addEventListener('mouseleave', Swal.resumeTimer)
  }
});

window.Toast = Toast;


// Configuration de vueRouter
const router = new VueRouter({
    routes,
    mode: 'history'
  })


const app = new Vue({
    el: '#app',
    router
});
