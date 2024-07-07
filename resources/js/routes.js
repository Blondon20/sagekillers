let login = require('./components/auth/login.vue').default;
let register = require('./components/auth/register.vue').default;
let forgot = require('./components/auth/forgot.vue').default;
let logout = require('./components/auth/logout.vue').default;

// Page d'accueil
let home = require('./components/home.vue').default;

// Gerer les employees
let creeremployee = require('./components/employee/create.vue').default;
let listeemployee = require('./components/employee/liste.vue').default;
let editemployee = require('./components/employee/edit.vue').default;



export const routes = [
  { path: '/', component: login, name: '/'},
  { path: '/register', component: register, name: 'register'},
  { path: '/forgot', component: forgot, name: 'forgot'},
  { path: '/logout', component: logout, name: 'logout'},
  
  { path: '/home', component: home, name: 'home'},

  // Route employee
  { path: '/creer-employee', component: creeremployee, name: 'creer-employee'},
  { path: '/liste-employee', component: listeemployee, name: 'liste-employee'},
  { path: '/edit-employee/:id', component: editemployee, name: 'edit-employee'}
]