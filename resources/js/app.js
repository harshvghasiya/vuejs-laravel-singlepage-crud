require('./bootstrap');

import { createApp } from 'vue'
// import router from './router'

import UserComponent from './components/UserComponent'
import NavbarComponent from './components/NavbarComponent'

// import "../node_modules/bootstrap/dist/css/bootstrap.css";
// import "../node_modules/bootstrap/dist/js/bootstrap.bundle";
const app=createApp({});
const user=createApp({});


app.component('navbar-component',NavbarComponent).mount('#navbar')
user.component('user-component',UserComponent).mount('#user')
