
window.Vue = require('vue');

import Vue from 'vue';
import VueRouter from 'vue-router';
Vue.use(VueRouter);
import VueAxios from 'vue-axios';
import axios from 'axios';
Vue.use(VueAxios, axios);

import VueSweetAlert from 'vue-sweetalert';
Vue.use(VueSweetAlert);


Vue.component('section-home', require('./components/sections/Home.vue'));
Vue.component('section-faqs', require('./components/sections/Faqs.vue'));
Vue.component('section-token', require('./components/sections/Token.vue'));
Vue.component('section-contact', require('./components/sections/Contact.vue'));


import MultiLanguage from 'vue-multilanguage';

Vue.use(MultiLanguage, {
    default: LOCAL
});
console.info("Language", LOCAL);

const app = new Vue({
    el: '#app',
    data() {
        return {

        }
    },
    mounted:function () {

    },
    methods:{
        followUser (idTarget){
            console.log( idTarget );
        }
    }
});