<template>
    <div class="test">
        <h1> {{title}} </h1>
        <ul> 
            <li>Name: {{name}},   </li>
            <li> price: {{price}}      </li>
            </ul>
       
    </div>
</template>  
<script>
export default {
    props:{
        title:String,
        name:String,
        price:Number, 
    },
    

}
</script>
<style scoped>
   .test{
       background-color: rgb(196, 189, 189);
       font-size: 2rem;
       margin-left:2rem;
       padding:2rem; 
       margin-right:2rem;
       margin-bottom:2rem; 
       align-items: center;
       justify-content: center;
       max-width: 500px;
   }
</style> 