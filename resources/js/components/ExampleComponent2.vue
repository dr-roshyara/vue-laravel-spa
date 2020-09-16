<template>
    <div class="">
        <p>testing the second example</p>
    </div>
</template>
<script>
export default {

     beforeCreate(){
        console.log("Bofore Create method"); 
    },
    created(){
        console.log("created");
    },
    beforeMount(){
        console.log("before mount");
    },
    mounted(){
        console.log("mounted");
    },
}
</script>