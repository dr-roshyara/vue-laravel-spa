//1 import part 
 import VueRouter from "vue-router";
//example component 
import ExampleComponent from "./components/ExampleComponent";
import ExampleComponent2 from "./components/ExampleComponent2";
//  import Index from "./Index";
//2. Define the routes 
const routes = [
   {
       path: '/',
       component: ExampleComponent,
       name: "home",
   },
  {
    path: '/second',
    component: ExampleComponent2,
    name: "home2",
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