<template>
    <div>
        <div class="form-inline">

            <a v-if="create && !modal" class="btn btn-primary" v-bind:href="create">Create</a>
            <modalink v-if="create && modal" title="Create" type="link" namodal="create" css=""></modalink>

            <div class="form-group pull-right">
                <input type="search" class="form-control" placeholder="Search" v-model="search">
            </div>
        </div>

        <table class="table table-striped table-hover">
            <thead>
                <tr>
                    <th style="cursor:pointer;" v-on:click="columnOrder(index)" v-for="(title, index) in titles" :key="title">{{ title }}</th>
                    <th v-if="edit || del || details">Actions</th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="(iten, index) in list">
                    <td v-for="i in iten" :key="i">{{ i }}</td>
                    
                    <td v-if="edit || del || details">

                        <form v-bind:id="index" v-if="del && token" v-bind:action="del" method="post">
                            <input type="hidden" name="_method" value="DELETE">
                            <input type="hidden" name="_token" v-bind:value="token">

                            <a v-if="edit && !modal" v-bind:href="edit">Edit |</a> 
                            <modalink v-if="edit && modal" title="Edit |" type="link" namodal="edit" css=""></modalink>
                            <a v-if="details && !modal" v-bind:href="details">Details |</a> 
                            <modalink v-if="details && modal" title="Details |" type="link" namodal="detail" css=""></modalink>
                            <a href="#" v-on:click="executeForm(index)">Delete</a>
                        </form>

                        <span v-if="!token">
                            <a v-if="edit && !modal" v-bind:href="edit">Edit |</a>
                            <modalink v-if="edit && modal" title="Edit |" type="link" namodal="edit" css=""></modalink>
                            <a v-if="details && !modal" v-bind:href="details">Details |</a>
                            <modalink v-if="details && modal" title="Details |" type="link" namodal="detail" css=""></modalink>
                            <a v-if="del && !modal" v-bind:href="del">Delete</a>
                        </span>

                        <span v-if="token && !del">
                            <a v-if="edit && !modal" v-bind:href="edit">Edit |</a>
                            <modalink v-if="edit && modal" title="Edit |" type="link" namodal="edit" css=""></modalink>
                            <a v-if="details && !modal" v-bind:href="details">Details</a>
                            <modalink v-if="details && modal" title="Details |" type="link" namodal="detail" css=""></modalink>

                        </span>
                       
                    </td>
                </tr>
            </tbody>
        </table>
    </div>


</template>

<script>
    export default {
       props:['titles', 'itens', 'create', 'details', 'edit', 'del', 'token', 'order', 'ordercol', 'modal'],
       data: function(){
           return{
               search: ''
           }
       },
       methods:{
           executeForm: function(index){
               document.getElementById(index).submit();
           },
           columnOrder: function(column){
               this.orderCol = column;
               if(this.order.toLowerCase() == "asc"){
                   this.order = 'desc';
               }else{
                   this.order = 'asc';
               }
           }
       },
       computed:{
           list:function(){
               
               let order = this.order || "asc";
               let orderCol = this.orderCol || 0;

               order = order.toLowerCase();
               orderCol = parseInt(orderCol);

               if(order == "asc"){
                   this.itens.sort(function(a, b){
                       if(Object.values(a)[orderCol] > Object.values(b)[orderCol]){ return 1; }
                       if(Object.values(a)[orderCol] < Object.values(b)[orderCol]){ return -1; }
                       return 0;
                   });
               }else{
                   this.itens.sort(function(a, b){
                       if(Object.values(a)[orderCol] > Object.values(b)[orderCol]){ return 1; }
                       if(Object.values(a)[orderCol] < Object.values(b)[orderCol]){ return -1; }
                       return 0;
                   });
               }

                

               return this.itens;
           }
       } 
    }
</script>
