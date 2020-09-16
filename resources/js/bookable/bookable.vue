<template>
     
    <div >
       <div v-if="loading">
            <p>Data Loading ...</p>
       </div>
        <div class="row" v-else>
              <div class="col-sm-8">
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
    <div class="col-sm-4">
xxx
    </div>
        </div>
    </div>
</template>
<script>
export default {
    data(){
        return {
            loading:true,
            Bookable:null,
        }
    },
    created(){
        //  console.log(this.$route.params.id);
         axios.get(`/api/bookables/${this.$route.params.id}`)
         .then (response=>(this.Bookable=response.data))
         .then (()=>{this.loading=false;});
    }
}
</script>