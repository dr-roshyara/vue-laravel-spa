<template>
    <div>
       <h6>Review Page</h6> 
         <success v-if="success">
             You have left a review ! Thakn you so much! 
         </success>
        <!-- <div v-if="error"> 
            <fatal-error> </fatal-error>
        </div> -->
        <div  v-if ="error&& !success" class="row">
            <!-- <div :class="[{'col-md-4' : twoColumns}, {'d-none' : oneColumn}]">  -->
            <div :class="[{'col-md-4' : twoColumns} ]"> 
                
                    <div class="card">
                       <div class="card-body"> 
                            <div v-if="loading"> Loading ...</div>
                            <div v-if="hasBooking"> 
                             <!--  <p> Stayed at  <router-link :to="name: 'bookable' params:{ id:booking.bookable.bookable_id}"> {{Booking.Bookable.title}}</router-link> </p>
                                -->
                                <p> Stayed at  <span style="font-weight:bold; padding:2px;"> 
                                    <router-link to="{name: bookable, 
                                    params:{id:booking.bookable.bookable_id"> 
                                        {{ booking.bookable.title }}
                                    </router-link>
                                    
                                </span > </p>
                                <p> from {{ booking.from }} to {{ booking.to }}</p>
                                 
                            </div>
                       </div>
                    </div>
            </div>
            <!-- -->
             <div :class="[{'col-md-8': twoColumns}, { 'col-md-8': oneColumn}]">
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
                        <button class="btn btn-lg btn-primary btn-block"
                         @click.prevent="submit"
                            :disabled="sending">
                            Submit 
                        </button> 
                </div>
             </div>   
            <!-- -->  
        </div>

    </div>
</template>
<script>
import "./../shared/response";
export default {
    data(){
        return{
            review:{
                id:null, 
                rating:5,
                content:null
            },
            existingReview: null, 
            booking: null,
            loading:false, 
            error:false,
            sending:false,
            success:false
        }
    },
    methods:{
        onRatingChanged(rating){

        },
        is404 : function (err) {
            return this.isErrorWithResponseAndStatus(err) && 404 === err.response.status;
        },

         is422 :function (err) {
            return this.isErrorWithResponseAndStatus(err) && 422 === err.response.status;
        },

       isErrorWithResponseAndStatus: function (err) {
            return err.response && err.response.status;
        },
        submit(){
            this.sending = true;
            this.success =false;

            axios.post(`/api/reviews`,this.review)
            .then(response=>{
              this.success =201===response.status;
            })
            .catch(err=>{
                this.error=true;
            })
            .then (()=>{
                this.sending=false;
            });
        }
    },
      async created(){
          this.review.id = this.$route.params.id;
        this.loading=true;
        axios.get(`/api/reviews/${this.review.id}`)
        .then (response=>{
                this.existingReview =response.data.data; 
                // this.booking        =response.data.data.booking;
            })
        .catch(err=>{
            console.log("There is error cataching review");
            //fetch a booking by Review key 
            if(this.is404(err)){
                return axios.get(`/api/booking-by-review/${this.review.id}`)
                .then (response=>{
                    this.booking =response.data.data;
                }).catch(err=>{
                     this.error = !this.is404(err);
                });    
            }
        }).then(()=>{
            this.loading=false;
            // console.log(response);
            // console.log(this.booking);
        }) 
        this.error=true;
    },
    computed:{
        alreadyReviewed(){
            return this.hasReview || !this.hasBooking;
        },
        hasReview(){
            return this.existingReview!=null;
        },
        hasBooking(){
            return this.booking!=null;
        },
        oneColumn(){
            return  !this.loading && this.alreadyReviewed;
        },
        twoColumns(){
            return  this.loading || !this.alreadyReviewed;
        }
    }
}

</script>
<style scoped>

</style>