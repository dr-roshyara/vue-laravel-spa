<template>
    <div class="test">
        <bookable-list-item></bookable-list-item>
    </div>
</template>
<script>
    import BookableListItem from "./BookableListItem";
    export default {
        components: { 
        BookableListItem: BookableListItem,
    }
} 
</script>
<style scoped>
   .test{
       background-color: aqua;
       font-size: 2rem;
       margin-left:2rem;
       padding:2rem;
       margin-right:2rem;
       align-items: center;
       justify-content: center;
   }
</style>