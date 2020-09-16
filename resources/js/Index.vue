<template>
    <div>

           <!-- this is the first way to describe the routers   -->
           <!-- <router-link to="/second">Second</router-link> -->
          <!-- <router-link to="/">Home page  </router-link>     -->
           <!-- The following is the second way to describe the router links  */ -->
            <!-- <router-link v-bind:to="{name: 'home' }">Home page  </router-link>     -->
            <!-- <router-link  v-bind:to="{name: 'home2' }" >Second</router-link>    -->
         <!-- Here starts the navbar  -->
            <nav class="navbar navbar-light border-bottom">
                   <router-link  class ="navbar-brand mr-auto" v-bind:to="{name: 'home' }">Home  </router-link>    
                <router-link class="btn nav-btn" v-bind:to="{name: 'Bookable' }" >Second</router-link>   
                 </nav> 
        <div class="container mt-4 mb-4 pr-4 pl-4">
                     <router-view ></router-view>

        </div>
    </div>

</template>