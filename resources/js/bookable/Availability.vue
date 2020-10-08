<template>
    <div class="availability px-2 py-2">
        <h5 class="text-uppercase text-secondary font-weight-bolder">Availability
           <span v-if="hasAvailability" >   yes         </span>
            <span v-if="noAvailability" class="text-danger">        no    </span>
            </h5> 
       <div class="form-row">
            <!-- starts here -->
            <div class="form-group sm-6">
                <label for ="from"> From </label> 
                <input type="text" 
                name="from"
                class="form-control form-control-sm"
                placehodlder="Start date"
                v-model="from"
                v-on:keyup.enter="check"
                :class="[{'is-invalid' : this.errorFor('from')}]"
                />

            </div>
                        <!-- starts here -->
            <div class="form-group sm-6">
                <label for="to">  To </label>
                <input type="text" 
                name="to"
                class="form-control form-control-sm"
                placehodlder="End date"
                v-model="to" 
                  v-on:keyup.enter="check"
                   :class="[{'is-invalid' : this.errorFor('to')}]" 

                />

            </div>

        </div>

        <div>
            <button class="btn btn-secondary btn-block"
             v-on:click="check"
             v-bind:disabled="loading"
            > Check! </button>    
        </div>              

    </div>
</template>
<script>
export default {
    data(){
        return {
            from :null,
            to : null,
            loading:false,
            status :null,
            errors:null
        };
    },
    methods:{
        check(){
            this.loading=true;
            this.erros=null,
            axios.get(`/api/bookables/${this.$route.params.id}/availability?from=${this.from}&to=${this.to}`)
            .then(
                response=>{
                    this.status=response.status;
                })
            .catch(error=>{
                    if(422===error.response.status){
                        this.errors =error.response.data.errors;
                    }
                    this.status= error.response.status;
            })
            .then(()=>(this.loading=false));
        //    alert( "check the value");
        },
        errorFor(field){
            return this.hasErrors &&this.errors[field] ?this.errors[field] :null;
        }
    },
    computed:{
        hasErrors(){
            return 422===this.status &this.errors!=null;
        },
        hasAvailability(){
            return 200===this.status;
        },
        noAvailability(){
            return 404===this.status;
        }
    }

}
</script>
<style scoped>
    label{
        font-size:0.7rem;
    text-transform: uppercase;
    color:gray;
    font-weight:bolder;
    }
    is-invalid{
        border-color:brown;
    }
</style>