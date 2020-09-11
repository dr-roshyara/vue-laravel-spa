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
#   #Define the route 
    Route::get('/{any?}', function () {
    return view('welcome');
    })->where('any','^(?!api\/)[\/\w\*-]*');
    //This means all the routes fall back to welcome.blade.php except api 
    Auth::routes();
#   #Register the second Component 
    #If you want to register the second example component then do the following steps: 
    1. Go to routes.js page 
    2. Import the second component like following ways 
    #1 import the component 
    //1 import part 
        import VueRouter from "vue-router";
        //example component 
        import ExampleComponent from "./components/ExampleComponent";
        import ExampleComponent2 from "./components/ExampleComponent2";
        //2. Define the routes 
        const routes = [
        {
            path: "/",
            component: ExampleComponent,
            name: "home",
        },
        {
            path: "/second",
            component: ExampleComponent2,
            name: "home2",
        },
         #Then go to the following url 
        http://127.0.0.1:8000/second
        - You can also write the second example component inside the first one by writing 
            <example-compoment2> </example-component2>
         Then you don't need the second route :"/second"   
#    #There are two types of registration of vue components . 
    1. global registration 
    2. Local registration 
    - If you want to register globally , then you should write in the app.js file as following 
     code : 
        Vue.component("example-component2", require("./components/ExampleComponent2.vue").default); 
    -You can also register it locally .To register it locally, you should just write it as 
     import exampleComponent2 from "./components/Examplecomponent2.vue"

#    #Make an index file 
    1. For this create a new js file index.js 
     touch resources/js/Index.vue
    2. import it in app.js file as following 
        require('./bootstrap');
        // require('./routes');
        //1. import
        import Vue from 'vue'
        import VueRouter from 'vue-router'
        import router from "./routes";
        import Index from "./Index";
        // Vue.component("example-component2", require("./components/ExampleComponent2.vue").default);
      //2.
        Vue.use(VueRouter);
        //3.
        const app = new Vue({
            el: '#app',
        router: router,
        components: {
            "index": Index,

        }
        });
    # Index.vue is registered as the component of app. 
     3. write the following script in Index.vue file 
     <template>
        <div>
         
          <router-link to="/">Home page  </router-link>    
           <router-link to="/second">Second</router-link>
         <router-view ></router-view>
        </div>
    </template>    
    #one can also use the vbind property to the  to property of router-link 
    #Look at the following two coes 
          <router-link v-bind:to="{name: 'home'}">Home page  </router-link>    
           <router-link v-bind:to="{name: 'second'}">Second</router-link>  
 #  #Bootrap css setup
    In order to setup the css file add the follwoing line of code in welcome.blade.php 
    which is also our start page. 
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    #You should understand from different sources that it is compiled version of webpack.mix.js . 
    #Read about how to get app.css file from compiling bootrap and sass files via laravel webpack.mix.js  
    #In order to use the Bootstrap now . just use some css classes in index.vue like below . 
            <template> <div>
            <nav class="navbar navbar-light border-bottom">
                   <router-link  class ="navbar-brand mr-auto" v-bind:to="{name: 'home' }">Home  </router-link>    
                <router-link class="btn nav-btn" v-bind:to="{name: 'home2' }" >Second</router-link>   
                 </nav> 
                    <div class="container mt-4 mb-4 pr-4 pl-4">
                     <router-view ></router-view>

                 </div> 
                 </div></template>
#   #First real Vue component 
    #After setting up the vue.js and bootstrap css, Now our goal is to create further vue component and apply them one by one. The besic of applying vue components is already mentioned by the example vue components. However we explain it again. A vue component consts of the follwoing parts 
    1. template 
    2. Js script 
    4. css styling 
    #A Js script further may contain the following parts: 
         1. props 
        2. methods 
        3. compute properties 
        4. components 
    #create a folder Bookable in js folder 
    mkdir js/Bookable 
    create a file named Bookable 
    touch js/Bookable/Bookable.vue 
    create another vue component 
    touch js/Bookable/BookableListItem.vue
    #Add the follwoing code in BookableListItem.vue
            <template>
            <div class="">
                <h1>Bookable items  Title</h1>
                <p>Content bookable list item </p>            
            </div>
            </template>  
     #Add the follwoing code in Bookable.Vue file 
        <template>
            <div class="test">
                <bookable-list-item></bookable-list-item>
            </div>
        </template>
        
        <script>
            import BookableListItem from "./BookableListItem";
            export default {
                components: { 
                BookableListItem: BookableListItem,
            }
        } 
        </script>
        
        <style scoped>
        .test{
            background-color: aqua;
            font-size: 2rem;
            margin-left:2rem;
            padding:2rem;
            margin-right:2rem;
            align-items: center;
            justify-content: center;
        }
        </style>       
         Here BookableListItem.vue is imported in Bookable and rendered as item list . 
         if you want to add more than one times you can add 
         <bookable-list-item> </bookabble-list-item>
         more than one time
         #Finally remove the ExampleComponentvue from routes.js and add the bookable as following 
            //1 import part 
            import VueRouter from "vue-router";
            import Bookable from "./Bookable/Bookable";
            import ExampleComponent2 from "./components/ExampleComponent2";
            //2. Define the routes 
            const routes = [
            {
                path: '/',
                component: Bookable,
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
          
            //4. Export default  router to app.js 
            export default router; 
        
        #Run the follwoing commands to compile and see in browser 
         npm run watch
         php artisan serve 
         and then you see the homepage  
          
