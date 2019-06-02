/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

require('./parts/nav');


window.Vue = require('vue');
import Router from "vue-router";


// const files = require.context('./', true, /\.vue$/i);
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default));

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding vue-components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */
Vue.use(Router)
Vue.mixin(require('./vue-mixins/base'));

const app = new Vue({
    router: new Router({
        mode: "history",
        base: process.env.BASE_URL,
        routes: [
            {
                path: "/login",
                name: "login",
                component: require('./vue-components/Auth/LoginFormComponent.vue').default
                // Dynamic import cn not be used until webpack 5 release https://laravel-mix.com/docs/4.0/upgrade
                //component: () => import(/* webpackChunkName: "login-form" */ './vue-components/Auth/LoginFormComponent.vue')
            },
            {
                path: "/register",
                name: "register",
                component: require('./vue-components/Auth/RegisterFormComponent.vue').default
                // Dynamic import cn not be used until webpack 5 release https://laravel-mix.com/docs/4.0/upgrade
                //component: () => import(/* webpackChunkName: "login-form" */ './vue-components/Auth/RegisterFormComponent.vue')
            },
        ]
    }),
}).$mount("#app");

