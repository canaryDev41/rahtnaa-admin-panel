/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');
require('chart.js');
window.Vue = require('vue');


/*Vue Modal component
 *
 */

import VModal from 'vue-js-modal'

import VueSweetalert2 from 'vue-sweetalert2';
Vue.use(VueSweetalert2);

Vue.use(VModal);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

Vue.component('exampleComponent', require('./components/ExampleComponent.vue'));
Vue.component('profile', require('./components/ProfileComponent.vue'));
Vue.component('workers', require('./components/WorkersComponent.vue'));
Vue.component('jobs', require('./components/JobsComponent.vue'));

const app = new Vue({
    el: '#app',
    computed:{
        currentYear(){
            return new Date().getFullYear()
        }
    }
});
