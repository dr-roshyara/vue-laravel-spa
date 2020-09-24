//1 import part 
 import VueRouter from "vue-router";
//example component 
import Bookables from "./Bookables/Bookable";
//example component 
import Bookable from "./Bookable/Bookable";
//  import Index from "./Index";
//2. Define the routes 
const routes = [
   {
       path: '/',
       component: Bookables,
       name: "home",
   }, 
  {
    path: '/bookable/:id',
    component: Bookable, 
    name: "Bookable",
  }, 

];
//3. create the istance of vue router . 
const router = new VueRouter({
  routes: routes,
  mode: 'history',
 
});
/** 
  *You can also do as folloing 
  *
 const router = new VueRouter({
   routes: [
     {
       path: '/',
       name: 'home',
       component: ExampleComponent
     }
   ],
   mode:'history'
 });
*/
//4. Export default  router to app.js 
export default router; 