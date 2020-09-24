<template>
     
    <div >
       <div v-if="loading">
            <p>Data Loading ...</p>
       </div>
        <div class="row" v-else>
              <div class="col-sm-7 pb-4">
           <div style="border:0.1rem solid #9df78b;" class="card">
               <div  class="card-body">
                   <h5 style="font-weight:bold; ">{{ Bookable.title }}</h5>
                   <ul > 
                        <li>id: {{ Bookable.id}}</li> 
                         <li> {{ Bookable.description}},   </li>
                         <li> price: {{Bookable.price}}      </li>
                    </ul>
               </div>
           </div>
      </div>
    <div class="col-sm-5 pb-4">
        <availability></availability>
    </div>
        </div>
    </div>
</template>
<script>
import Availability from "./Availability";
export default {
    components:{
        Availability
    },
    data(){
        return {
            loading:true,
            Bookable:null,
        } 
    },
    created(){
        //  console.log(this.$route.params.id);
         axios.get(`/api/bookables/${this.$route.params.id}`)
         .then (response=>(this.Bookable=response.data.data))  // only for the json 
         .then (()=>{this.loading=false;});
    }
}
</script>