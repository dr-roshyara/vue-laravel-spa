<template>
    <div class="test1" >
        <div v-if="loading">
             <p>Please wait, data is loading ... </p>
        </div>       
         <!-- <div class="bookable" v-else> -->
        <div class="bookable" v-else> 
             <!-- <div  
                style="padding-left: 2rem; padding-right:2rem;"
                 v-for="row in rows" 
                 :key="'row_'+row">
                    <div class="row">
                        <div class="col" 
                            v-for="(Bookable, column)  in 
                            Bookables.slice((row-1)* columns, row*columns)" 
                            :key="'row_'+row+'column_'+column">
                            row: {{row}},     col: {{column+1 }}
                          
                         <bookable-list-item 
                    :title="Bookable.title" 
                    :name="Bookable.name" 
                    v-bind:price=Bookable.price>
                    </bookable-list-item>
                 </div>

                      
                    </div> 
            </div> -->
             <!-- Bookable   -->
            <div  v-for="(Bookable,index ) in Bookables" v-bind:key="index"> 
            <bookable-list-item v-bind="Bookable"> 

            </bookable-list-item>
            </div>    
         
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
            columns:3,
            loading: false,
            Bookables: [],
        };
    },
    methdods:{
        BookablesInRow(row){
           return this.Bookables.slice((row-1)* this.columns, row*this.columns );
        },

    },
    created(){
        this.loading=true;
        const P = new Promise((resolve, reject)=>{
            console.log("resolve");
            console.log(resolve);
            console.log("Reject");
            console.log(reject);
            console.log("Settimeout");
            setTimeout(()=>{
              
                console.log("Reject Hello");
                  reject("hello hello");
            },4000);
             setTimeout(()=>{
                 console.log("Resolve hello");
                  resolve("hello hello");
            },3000);
        }).then((result)=>{console.log(`Success ${result}`)})
        .catch((result)=>{console.log(`Failed ${result}`)});
        console.log("p");
        console.log(P);
        /**
         * Use Axios
         */
        const request =axios.get("api/bookables")
        .then ((response)=>{
            this.Bookables=response.data;
            this.loading=false;
        });
    
        setTimeout(()=>{
            // console.log("test");
        
            this.Bookables =[
                {
                id:1,
                 title : 'Product1',
                 description: 'product-Name 1',
                 price: 230.40    
             },
               {
                 id:2,
                 title : 'Product 2',
                 description: 'product-Name 2',
                 price: 180.40
               },
               {
                 id:3,
                 title : 'Product 3',
                 description: 'product-Name 3',
                 price: 300.40
               },
                {
                 id:4,
                 title : 'Product 4',
                 description: 'product-Name3',
                 price: 300.40
               },
                {
                 id:5,
                 title : 'Product 5',
                 description: 'product-Name 5',
                 price: 300.40
               },
               {
                 id:6,
                 title : 'Product 6',
                 description: 'product-Name 6',
                 price: 300.40
               },
                {
                 id:7,
                 title : 'Product 7',
                description: 'product-Name 7',
                 price: 300.40
               }
            ];
            this.loading=false;

        
        }, 20000);
    },
    mounted(){
        setTimeout(
            ()=>{
                this.Bookables[0].title= "Article 1";
                this.Bookables[1].title= "Article 2";
            }
            ,22000);
    },
    computed:{
        rows(){
            return this.Bookables.length? Math.ceil(this.Bookables.length/this.columns):0;
        }
    }
} 
</script>
<style scoped>
   .test{
      border-radius:2rem;
      display: flex;
      flex-wrap:wrap;
  }
  .bookable{
      display:flex;
      flex-wrap: wrap;
      margin-bottom:1rem;
       padding: .5em;
  }
</style>