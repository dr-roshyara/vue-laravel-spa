<template>

    <div class="d-flex">
        <i class="fas fa-star" v-for="star in fullStar" :key="'full'+star" @click="$emit('input',star);"></i>
        <i class="fas fa-star-half-alt" v-if="halfStar"></i>
        <i class="far fa-star" v-for="star in emptyStar" :key="'empty'+star" @click="$emit('input', fullStar+star);"></i>
        
     </div>
</template>
<script>
export default {
    props:{
        value:Number 
    },
    computed: {
        halfStar(){
            //float is lower rounding ie.e. floor(1.3) =1 floor(1.95)=1
          var tempNum=  Math.round((this.value-Math.floor(this.value))*100);
          return tempNum>0 &tempNum<50;
        },
        fullStar(){
            //round makes 
            return  Math.round(this.value);
        },
        emptyStar(){
            //ceil is upper rounding i.e. ceil(1.2) =2 , ceil(1.9) =2
            return 5-Math.ceil(this.value);
        }

    },
    methods:{

    }

}
</script>
<style scoped>

</style>