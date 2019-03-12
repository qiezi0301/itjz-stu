
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

import VueRouter from 'vue-router';
import router from './routes';
import jwtToken from './helpers/jwt';
import store from './store/index';
import App from './components/App';
import Video from 'video.js/dist/video.min';
import 'video.js/dist/video-js.min.css';

import zh_CN from './locale/zh_CN';
import VeeValidate, { Validator } from 'vee-validate';
//每次请求表头设置
axios.interceptors.request.use(function (config){
    if (jwtToken.getToken()) {
        //注意Bearer后面要留一个空格，坑，不然获取不了登录后的用户信息
        config.headers['Authorization'] = 'Bearer ' + jwtToken.getToken();
    }
    return config;
}, function (error) {
    return Promise.reject(error);
});
//
Vue.prototype.$video = Video;

Vue.use(VueRouter);
Vue.use(VeeValidate);
Validator.localize('zh_CN', zh_CN);
Vue.component('app', App);
/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

// Vue.component('example-component', require('./components/ExampleComponent.vue').default);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#application',
    router,
    store
});
