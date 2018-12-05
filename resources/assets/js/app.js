/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');
require('chart.js');
/*
 * ue toaster component
 */

import CxltToastr from 'cxlt-vue2-toastr';

const toastrConfigs = {
    position: 'top left',
    showDuration: 1000,
    timeOut: 5000
};
Vue.use(CxltToastr, toastrConfigs);

import 'cxlt-vue2-toastr/dist/css/cxlt-vue2-toastr.css';

import VueSweetalert2 from 'vue-sweetalert2';
Vue.use(VueSweetalert2);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

Vue.component('exampleComponent', require('./components/ExampleComponent.vue'));
Vue.component('profile', require('./components/ProfileComponent.vue'));
Vue.component('workers', require('./components/WorkersComponent.vue'));
Vue.component('users', require('./components/UsersComponent.vue'));
Vue.component('jobs', require('./components/JobsComponent.vue'));
Vue.component('tasks', require('./components/TasksComponent.vue'));
Vue.component('categories', require('./components/CategoriesComponent.vue'));
Vue.component('flash', require('./components/FlashComponent.vue'));

const app = new Vue({
    el: '#app',
    computed:{
        currentYear(){
            return new Date().getFullYear()
        }
    }
});
