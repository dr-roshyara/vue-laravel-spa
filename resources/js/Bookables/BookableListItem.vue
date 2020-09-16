<template>
    <div class="list">
        <router-link :to="{ name:'Bookable', params:{id}}">
             <h5 class="title"> {{title}} </h5>
        </router-link>
       
        <ul > 
             <li>id: {{id}}</li> 
            <li> {{description}},   </li>
            <li> price: {{price}}      </li>
        </ul>
       
    </div>
</template>  
<script>
export default {
    props:{
        title:String,
        description:String,
        price:Number, 
        id:Number
    },
    mounted(){
        console.log("child mounted");
    },
    

}
</script>
<style scoped>
   .test{
       background-color: rgb(196, 189, 189);
       font-size: 2rem;
       border-style: solid;
       border-right-width: 1rem; 
        max-width: 450px;  
        margin-right: 1rem; 
   }
 .title{
     
      font-weight: bold;
      text-align: center;
     }
   .list{
       background-color: rgb(223, 215, 226);
        border-bottom-style:solid;
        border-bottom-color:#9df78b;
       border-radius: 1rem;
       padding:1rem;
       margin:0.25rem;
       max-width:350px;
       display:bock;
       height:100%; 
       align-items: stretch; 

     
       }
</style> 