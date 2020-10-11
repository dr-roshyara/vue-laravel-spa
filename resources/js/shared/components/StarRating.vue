<template>
    <div class="d-flex">
        <i class="fas fa-star"></i>
        <i class="fas fa-star-half-alt"></i>
        <i class="far fa-star"></i>
        
     </div>
</template>
<script>
export default {
    props:{
        rating:Number 
    },
    computed: {
        halfStar(){
            return false;
        },
        fullStar(){
            return 4;
        },
        emptyStar(){
            return 1;
        }

    }

}
</script>
<style scoped>

</style>