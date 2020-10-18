<template>
    <div>
       <h6>Review Page</h6> 
        <div class="row">
            <div :class="[{'col-md-4':loading ||!alreadyReviewed},{'d-none': !loading &&alreadyReviewed}]"> 
                    <div class="card">
                       <div class="card-body">
                            <div v-if="loading"> Loading ...</div>
                            <div v-else> 
                             <!--  <p> Stayed at  <router-link :to="name: 'bookable' params:{ id:booking.bookable.bookable_id}"> {{Booking.Bookable.title}}</router-link> </p>
                                -->
                                <p> Stayed at  <span style="font-weight:bold; padding:2px;"> 
                                    <router-link to="{name:bookable, params:{booking.bookable.bookable_id">
                                        {{ booking.bookable.title }}
                                    </router-link>
                                    
                                </span > </p>
                                <p> from {{ booking.from }} to {{ booking.to }}</p>
                                 
                            </div>
                       </div>
                    </div>
            </div>
            <!-- -->
             <div :class="[{'col-md-8': loading|| !alreadyReviewed},{ 'col-md-12': !loading && alreadyReviewed}]">
                        <!-- Rating form --> 
                <div v-if="alreadyReviewed">
                <h3>You have already reviewd this object</h3>
                </div>
                <div v-else>
                    <div class="form-group">
                        <label for="rating" class="text-muted">
                            Select the star rating (1 is worst and 5 is the best );
                        </label>
                        <star-rating 
                            class="fa-3x" 
                            v-model="review.rating"
                        >
                        </star-rating>
                    </div>
                    <!-- second form to write review comment -->
                    <div class="form-group"> 
                        <label for="content" class="text-muted">
                            Describe your experience with 
                        </label>
                        <textarea name="content" id="content" cols="30" rows="10" class="form-control" v-model="review.content">

                        </textarea>
                    </div> 
                        <!-- here is the button --> 
                        <button class="btn btn-lg btn-primary btn-block">
                            Submit 
                        </button> 
                </div>
             </div>   
            <!-- -->  
        </div>

    </div>
</template>
<script>
export default {
    data(){
        return{
            review:{
                rating:5,
                content:null
            },
            existingReview: null, 
            booking:null,
            loading:false, 
        }
    },
    methods:{
        onRatingChanged(rating){

        }
    },
    created(){
        this.loading=true;
        axios
        .get(`/api/reviews/${this.$route.params.id}`)
        .then (response=>{
                this.existingReview =response.data.data;
                // this.booking=response.data.data.booking;
            })
        .catch(err=>{
            // console.log("There is error cataching review");
            //fetch a booking by Review key 
            if(err.response&& 
            err.response.status && 
            404===err.response.status){
                return axios.get(`/api/booking-by-review/${this.$route.params.id}`)
                .then (response=>{
                    this.booking =response.data.data;
                });    
            }
        }).then(()=>{
            this.loading=false;
        }) 
    },
    computed:{
        alreadyReviewed(){
            return this.hasReview ||  !this.hasBooking
        },
        hasReview(){
            return this.existingReview!=null;
        },
        hasBooking(){
            return this.booking!=null;
        }
    }
}

</script>
<style scoped>

</style>