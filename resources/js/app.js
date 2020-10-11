require('./bootstrap');
// require('./routes');
//1. import

import Vue from 'vue';
import VueRouter from 'vue-router'
import router from "./routes";
import Index from "./Index";
import StarRating from "./shared/components/StarRating";
Vue.component("star-rating", StarRating);  
// Vue.component("example-component2", require("./components/ExampleComponent2.vue").default);

//2.
Vue.use(VueRouter);
//3.
const app = new Vue({
    el: '#app',
  router: router,
  components: {
    "index": Index, 
   
  },
  created(){
    // console.log("app created");
  },
  filters: {
 
},

}).$mount('#app');
