<template>
    <div class="test1">
        <bookable-list-item :title="Bookable1.title" :name="Bookable1.name" 
        v-bind:price=Bookable1.price></bookable-list-item>
        <bookable-list-item :title="Bookable2.title" :name="Bookable2.name" 
        v-bind:price="Bookable2.price">
        </bookable-list-item>
        
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
            Bookable1:{
                 title : 'Product1',
                 name: 'product-Name1',
                 price: 230.40    
            },
            Bookable2:{
                 title : 'Product2',
                 name: 'product-Name2',
                 price: 180.40
            }
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