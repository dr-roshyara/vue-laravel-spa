require('./bootstrap');
// require('./routes');
//1. import
import Vue from 'vue'
import VueRouter from 'vue-router'
import router from "./routes";
//2.
Vue.use(VueRouter);
//3.
const app = new Vue({
    el: '#app',
  router: router,
});
