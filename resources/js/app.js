/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */
// Import our custom CSS
import '../sass/app.scss'
import 'sweetalert2/dist/sweetalert2.min.css';
// Import all of Bootstrap's JS
import * as bootstrap from 'bootstrap'
import { createApp } from 'vue';
import App from './components/App.vue';
import VueAxios from 'vue-axios';
import {createRouter, createWebHistory} from 'vue-router';
import axios from 'axios';
import { routes } from './routes';
import VueSweetalert2 from 'vue-sweetalert2';

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const router = createRouter({
    history: createWebHistory(),
    routes: routes
});

createApp(App)
    .use(VueAxios, axios)
    .use(router)
    .use(VueSweetalert2)
    .mount('#app')
