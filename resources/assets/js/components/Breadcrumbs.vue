<template>
    <ol class="col-10 breadcrumb">
        
        <li v-for="iten in list"><a v-if="iten.url" v-bind:class="defineClass" v-bind:href="iten.url">{{ iten.title }}</a><span v-if="!iten.url">{{ iten.title }}</span></li>

    </ol>
</template>

<script>
    export default {
       props:['list'],
       computed:{
           defineClass: function(){
               if(this.url){
                   return "active";
               }else{
                   return "";
               }
           }
       }
    }
</script>
