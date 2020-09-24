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
    #bookable.vue 
    In this file we display the  bookable list items  whose template is described in another vue component called BookableListItem.vue 
     The template BookableListItem.vue can be written here as: 
     <bookable-list-item></bookable-list-item >
     or 
     you can also write : 
     <BookableListitem> </BookableListitem>
     #Look at the real code 
            <template>
            <div class="test1">
                <bookable-list-item 
                :title="Bookable1.title" 
                :name="Bookable1.name" 
                v-bind:price=Bookable1.price>
                </bookable-list-item>
                <!-- Second Item -->
                <bookable-list-item 
                :title="Bookable2.title" 
                :name="Bookable2.name" 
                v-bind:price="Bookable2.price">
                </bookable-list-item>
                
            </div>
        </template> 
        <script>
            import BookableListItem from "./BookableListItem";
            export default {
                components: { 
                BookableListItem: BookableListItem,
            },
            data(){
                return {
                    Bookable1:{
                        title : 'Product1',
                        name: 'product-Name1',
                        price: 230.40    
                    },
                    Bookable2:{
                        title : 'Product2',
                        name: 'product-Name2',
                        price: 180.40
                    }
                };
            }
        } 
        </script>
        <style scoped>
        .test{
            border-radius:2rem;
            display: flex;
            flex-wrap:wrap;
        }
        </style>

    #BookableListitem.vue 
    #This is the tempalte or component how Bookabble list items are displayed. 
    #Here is the code 
        <template>
            <div class="test">
                <h1> {{title}} </h1>
                <ul> 
                    <li>Name: {{name}},   </li>
                    <li> price: {{price}}      </li>
                    </ul>
            
            </div>
        </template>  
        <script>
        export default {
            props:{
                title:String,
                name:String,
                price:Number, 
            },
            

        }
        </script>
        <style scoped>
        .test{
            background-color: rgb(196, 189, 189);
            font-size: 2rem;
            margin-left:2rem;
            padding:2rem; 
            margin-right:2rem;
            margin-bottom:2rem; 
            align-items: center;
            justify-content: center;
            max-width: 500px;
        }
        </style> 
    
        #Import BookableListItem.vue 
        #Here BookableListItem.vue is imported in Bookable and rendered as item list . 
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
#       #Use of v-for and v-if 
        Look at the Bookable.vue and BookableListItem of this commit. 
        - Use laoding =true and false options to show the two steps: 
        1. Data loading 
        2. After data has been loaded, then show the data 
        For this purpose you should use the 
        created () or 
        mounted() method  and 
        setTimeout() Method 
       #We can also use some methods to  display the data in columns. For this purpose , you can use 
       - css flexbox option 
        - Bootstrap css row =col and row option
#       #Use of methods and computed properties. 
# Cerate Models 
        #set up the database 
         Go to the .env file and set up the database .
        # Create Bookable Model 
            php artisan make:model  Model\Bookable -m 
        this command will create a Schema in 
        database\migrations\2020_09_14_033807_create_bookables_table.php
        and it has the following function 
         public function up()
            {
                Schema::create('bookables', function (Blueprint $table) {
                    $table->id();
                    $table->string('title');
                    $table->text('description');
                    $table->float('price');
                    $table->timestamps();
                });
            }
        #After creating this schema, use migrate command 
            php artisan migrate 
        this command will create a migration in your database.  
        #make a factory to populate your  database with fake data. 
            php artisan mkae:factory BookableFactory --model Bookable 
        #Edit it as following 
            <?php

            namespace Database\Factories;

            use App\Models\Bookable;
            use Illuminate\Database\Eloquent\Factories\Factory;
            use Illuminate\Support\Str;

            class BookableFactory extends Factory
            {
                /**
                * The name of the factory's corresponding model.
                *
                * @var string
                */
                protected $model = Bookable::class;

                /**
                * Define the model's default state.
                *
                * @return array
                */
                public function definition()
                {
                    return [
                        //
                        'title' => $this->faker->sentence,
                        'description' =>$this->faker->text,
                        'price' =>$this->faker->numberBetween(200,500)

                    ];
                }
            }
        #Now you create the database seeder 
            php artisan make:seeder BookableTableSeede
        #add the following commands on it 
            <?php

            namespace Database\Seeders;
            use App\Models\Bookable;
            use Illuminate\Database\Seeder;

            class BookableTableSeeder extends Seeder
            {
                /**
                * Run the database seeds.
                *
                * @return void
                */
                public function run()
                {
                    //
                    Bookable::factory(500)->create();
                }
            }
         # Go to the mainseeder file : DatabaseSeeder.php file and add the following line on it . 
            class DatabaseSeeder extends Seeder
                {
                    /**
                    * Seed the application's database.
                    *
                    * @return void
                    */
                    public function run()
                    {
                        // User::factory(10)->create();
                        $this->call(BookableTableSeeder::class);
                    }
                }
        #Now run the db:seed command 
            php artisan db:seed
        #This command will populate the database with fake data. 
# Define route and use Axios function to get the data from database 
        #How to define route in laravel 
            go to the routes/api.php 
            define the routes as following 
                Route::get('bookables', function(Request $request){
                    return Bookable::all();
                });
                Route::get('bookables/{id}', function(Request $request, $id){
                    return Bookable::findOrFail($id);
                });
        #The main function to get the data is written in the created property of vue app 
        the axios function look like this . 
            const request =axios.get("api/bookables")
            .then ((response)=>{
                this.Bookables=response.data;
                this.loading=false;
            });
        #You should go one by one line of the file Bookables/Bookable.vue understand 
        #Also please understand to set up loading:true and loading:false. 
        #This loaidng property helps us to show ,,Data is loading '' message till the data has been loading. 
        #Define css properties in Bookable/bookableItem.vue file . 
        #Create links of each bookable item . for this you need to create another folder 
        Bookable
        and then add Bookable/Bookable.vue on it 
        import this file by adding a line  in js/routes.js 
        //example component 
        import Bookable from "./Bookable/Bookable";
        #create a route in js/routes.js 
        const routes = [
            {
                path: '/',
                component: Bookables,
                name: "home",
            }, 
            {
                path: '/bookale/:id',
                component: Bookable, 
                name: "Bookable",
            }, 

            ];
        #Edit the Bookables/bookableListItem.vue file as following 
        <template>
            <div class="list">
                <!-- look at the route -->
                <router-link :to="{ name:'Bookable', params:{id}}">
                    <h5 class="title"> {{title}} </h5>
                </router-link>
            
                <ul > 
                    <li>id: {{id}}</li> 
                    <li> {{description}},   </li>
                    <li> price: {{price}}      </li>
                </ul>
            
            </div>
        </template>  
        #this route-link create a link for the individual bookable which is defined in route.js 
#  Create resource Api Controller in Laravel to get the data properly. 
    Instead of writing individual routes, we can write the route as resourceful. That means 
    your write a route like following 
        Route::apiResource('bookables', BookableController::class)->only(['index', 'show']);
    #Here we have routed for index and show method only  with Bookable controller. 
    Now we can create BookableController::class 
        php artisan make:controller BookableController -m Bookable 
    #This commands creates the Bookable Controller class. We  edit this class as follwoing ! 
    #Actually Before we write codes in controller, we can create  Api resources 
    #this can be done as follwoing 
        php artisan make:resource BookableIndexResource
        php artisan make:resource BookableShowResource
    #A new folder resouces is created inside app folder and inside the resources, these two commands create Resource classes which return the JSON response. 
       //BookableIndexResource.php 
        <?php
        namespace App\Http\Resources;

        use Illuminate\Http\Resources\Json\JsonResource;

        class BookableIndexResource extends JsonResource
        {
            /**
            * Transform the resource into an array.
            *
            * @param  \Illuminate\Http\Request  $request
            * @return array
            */
            public function toArray($request)
            {
                //return parent::toArray($request);
                return [
                    'id'            =>$this->id,
                    'title'         =>$this->title,
                    'description'   =>$this->description
                ];
            }
        }
    #BookableSchowResource.php is similar to above file 
    Now lets add the following  codes to the BookableController 
       use App\Http\Resources\BookableIndexResource  as BIResource;
       use App\Http\Resources\BookableShowResource as BSResource;
        // the index method 
        public function index()
        {
            //
            //  return Bookable::all();
            return BIResource::collection(Bookable::all()); 
        }
        //the show method 
        public function show( $id)
        {
            //
            // return  Bookable::findorFail($id);
            return new BSResource(Bookable::findorFail($id));  
        }
        //
        Edit the code in Bookables/Bookable.vue 
        const request =axios.get("api/bookables") 
            .then ((response)=>{
                this.Bookables=response.data.data;
                this.loading=false;
            });
        // also edit it in the bookable/bookable.vue file    
        created(){
            //  console.log(this.$route.params.id);
            axios.get(`/api/bookables/${this.$route.params.id}`)
            .then (response=>(this.Bookable=response.data.data)) // only for the json 
            .then (()=>{this.loading=false;});
        }
        #The reason to write response.data.data is that response.data is from axios command and another .data is  just because json data is wrapped by data in laravel. You can also unwrap it . See the documentaion of laravel 




               