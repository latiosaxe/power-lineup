
import Vue from 'vue';
import VueRouter from 'vue-router';
Vue.use(VueRouter);
import VueAxios from 'vue-axios';
import axios from 'axios';
Vue.use(VueAxios, axios);

import VueSweetAlert from 'vue-sweetalert'
Vue.use(VueSweetAlert)

import App from './components/App.vue';
import Home from './components/sections/Home.vue';
import Token from './components/sections/Token.vue';
import Faqs from './components/sections/Faqs.vue';
const routes = [
    {
        name: 'Home',
        path: '/',
        component: Home
    },{
        name: 'Faqs',
        path: '/faqs',
        component: Faqs
    },{
        name: 'Token',
        path: '/get-tokens',
        component: Token
    },{
        name: 'Faqs',
        path: '/blog',
        component: Faqs
    },{
        name: 'Faqs',
        path: '/whitepaper',
        component: Faqs
    },{
        name: 'Faqs',
        path: '/etherscan',
        component: Faqs
    },{
        name: 'Faqs',
        path: '/contact',
        component: Faqs
    }
];
const router = new VueRouter({ mode: 'history', routes: routes});
new Vue(Vue.util.extend({ router }, App )).$mount('#app');