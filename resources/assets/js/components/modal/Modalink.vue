<template>
   <span>
        <button v-if="!type || (type != 'button' && type != 'link')" type="button" v-bind:class="css || 'btn btn-primary'" data-toggle="modal" v-bind:data-target="'#' + namodal">{{ title }}</button>

        <button v-if="type == 'button'" type="button" v-bind:class="css || 'btn btn-primary'" data-toggle="modal" v-bind:data-target="'#' + namodal">{{ title }}</button>

        <a v-if="type == 'link'" href="#" v-bind:class="css || ''" data-toggle="modal" v-bind:data-target="'#' + namodal">{{ title }}</a>
   </span>
</template>

<script>
    export default {
       props:['type', 'namodal', 'title', 'css']
    }
</script>