<template>
<div class="review">
     <h6 class="text-uppercase text-secondary font-weight-bolder pt-4  ">Review List</h6>
     <div class="border-bottm d-none d-md-block" v-for="number in 3" :key="number">
         <div class="row pt-4 pb-2">
             <div class="col-md-6">
                 Nab Roshyara
             </div>
             <div class="col-md-6 d-flex justify-content-end"> 
                 STAR RATING 
             </div>
         </div>
         <div class="row pb-2">
             <div class="col-md-12">
                 Added  5 minutes ago 
             </div>
         </div>
         <div class="row pb-2">
             <div class="col-md-12">
                 Content of the review 
             </div>
         </div>
     </div>
</div>
</template>
<style scoped>
     .review{
         padding-left: 1.5rem;
     }    
</style>