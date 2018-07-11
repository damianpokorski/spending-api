// The Vue build version to load with the `import` command
// (runtime-only or standalone) has been set in webpack.base.conf with an alias.
import Vue from 'vue';
import App from './App';
import router from './router';

import 'bootstrap/dist/css/bootstrap.css';
import '../build/css/mdb.css';

Vue.config.productionTip = false;

// Global references
window.vuehandler = {};
window.vuehandler.router = router;

// Firebase 
import './firebase-handler';

/* eslint-disable no-new */
window.vuehandler.app = new Vue({
    el: '#app',
    router,
    template: '<App/>',
    components: { App }
});