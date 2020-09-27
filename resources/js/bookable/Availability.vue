<template>
    <div class="availability px-2 py-2">
        <h5 class="text-uppercase text-secondary font-weight-bolder">Availability</h5> 
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
                />

            </div>

        </div>

        <div>
            <button class="btn btn-secondary btn-block"
             v-on:click="check"
            > Check! </button>    
        </div>              

    </div>
</template>
<script>
export default {
    data(){
        return {
            from :null,
            to : null
        };
    },
    methods:{
        check(){
           alert( "check the value");
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
</style>