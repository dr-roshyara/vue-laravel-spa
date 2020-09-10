## Laravel Commands and Steps 

# Installiation 
    #first install laravel 
    laravel new laravel/vue-laravel-spa
    #install the laravel ui 
    composer require laravel/ui --save-dev 
    npm install 
    npm run dev 
#    #install laravel vue js authnication 
    php artisan ui vue --auth
#    #install vue-router 
    npm install vue-router 
    npm install 
    npm run dev 

# First Stetup 
    #make new welcome.blade.php 
    #make a back up of welcome.blade.php 
     mv resources/views/welcome.blade.php    resources/views/backup_welcome.blade.php
     touch resources/views/welcome.blade.php    
#   #Create a new html page 
    #Add html and add app.js 
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Laravel Vue Spa</title>
        <script src="{{ asset('js/app.js')}}" defer></script> 
        </head>
    <body>
        <div id="app">

        </div>
        
    </body>
    </html>
#   #Edit js/app.js file 
     cp resources/js/app.js resources/js/backup_app.js
     #cleanup the resources/js/app.js file and write it as below 
    
     require('./bootstrap');

        window.Vue = require('vue');

        Vue.component('example-component', 
            require('./components/ExampleComponent.vue').default
            );

        const app = new Vue({
            el: '#app',
        });
#   #Create resources/js/routes.js 
     touch resoruces/js/routes.js
     #write the following things here 
     //1 import part 
    import VueRouter from "vue-router";
    //example component 
        import ExampleComponent from "./components/ExampleComponent";
 
        //2. Define the routes 
        const routes = [
        {
            path: "/",
            component: ExampleComponent,
            name: "home",
        },

        ];
        //3. create the istance of vue router . 
        const router = new VueRouter({
        routes: routes,
        mode: 'history'
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
#   #Create app.js : 
    require('./bootstrap');
  
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
#   #welcome.blade.php 
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Laravel Vue Spa</title>
    <script src="{{ asset('js/app.js') }}" defer></script> 
    </head>
    <body>
        <div id="app"> 
            <router-view class="view one"></router-view>
        </div>
        
    </body>
    </html>
#   #Thats it 