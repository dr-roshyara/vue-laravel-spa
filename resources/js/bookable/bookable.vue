<template>
    <div class="test1" v-if="Bookables.length">
        <div  v-for="(Bookable,index ) in Bookables" v-bind:key="index"> 
        <bookable-list-item :title="Bookable.title" :name="Bookable.name" 
        v-bind:price=Bookable.price></bookable-list-item>
    </div>    
         
    </div>
</template> 
<script>
    import BookableListItem from "./BookableListItem";
    export default {
        components: { 
        BookableListItem: BookableListItem,
    },
    data(){
        return {
            Bookables:[
                {
                 title : 'Product1',
                 name: 'product-Name1',
                 price: 230.40    
             },
               {
                 title : 'Product2',
                 name: 'product-Name2',
                 price: 180.40
               },
               {
                 title : 'Product3',
                 name: 'product-Name3',
                 price: 300.40
               }
            ]
        };
    }
} 
</script>
<style scoped>
   .test{
      border-radius:2rem;
      display: flex;
      flex-wrap:wrap;
  }
</style>