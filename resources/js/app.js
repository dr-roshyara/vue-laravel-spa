require('./bootstrap');
// require('./routes');
//1. import

import Vue from 'vue';
import Vuex from 'vuex'
import VueRouter from 'vue-router' 
import router from "./routes";
import Index from "./Index";
import StarRating from "./shared/components/StarRating";
import FatalError from "./shared/components/FatalError";
import Success from "./shared/components/Success";
import StoreDefinition from "./store";
//register the vue components 
Vue.component("star-rating", StarRating);  
Vue.component("fatal-error", FatalError); 
Vue.component("success", Success); 
// Vue.component("example-component2", require("./components/ExampleComponent2.vue").default);

//2.
Vue.use(vuex);
Vue.use(VueRouter);
//3.
const store = new Vuex.Store(StoreDefinition);
const app = new Vue({
    el: '#app',
    store:store,
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




