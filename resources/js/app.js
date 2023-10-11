/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */
// require('./bootstrap');
// window.Vue = require('vue'); // if this is not work add this =>  window.Vue = require('vue');
// import axios from 'axios';
// import VueAxios from 'vue-axios';
// import createRouter from 'vue-router';
// import App from './app.vue';
// import { routes } from './routes';

// const router =  createRouter({
//     mode: 'history',
//     routes: routes
// });
// const app = new Vue({
//     el: '#app',
//     router: router,
//     render: h => h(App),
// });
// app.use(createRouter);
// app.use(VueAxios, axios);



// import { createApp } from 'vue'; // Import createApp from Vue 3
// import axios from 'axios';
// import VueAxios from 'vue-axios';
// import {createRouter,createWebHistory} from 'vue-router'; // Import createRouter and createWebHistory

// import App from './app.vue';
// import { routes } from './routes';

// // Create the Vue app instance
// const app = createApp(App);

// // Use Vue Router
// const router = createRouter({
//     history: createWebHistory(), // Use createWebHistory
//   routes: routes,
// });

// // Use Vue Axios
// app.use(VueAxios, axios);

// // Use the router
// app.use(router);

// // Mount the app to the element with id 'app'
// app.mount('#app');



// require('./bootstrap');

// import {createApp} from 'vue'

// import App from './App.vue'

// createApp(App).mount("#app")








/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue').default;

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

Vue.component('example-component', require('./components/ExampleComponent.vue').default);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app',
});