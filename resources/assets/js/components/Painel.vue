<template>
    <div v-bind:class="defineColor">
        <div class="panel-heading">{{ title }}</div>

        <div class="panel-body">
            <slot></slot>
        </div>
    </div>
</template>

<script>
    export default {
       props: ['title', 'color'],
       computed:{
           defineColor: function(){
               return "panel " + (this.color || "panel-default");
           }
       }
    }
</script>

<style>
.blue {
    border-color: #6d9cf1;
}
.blue > .panel-heading {
    color: #ffffff;
    background-color:#1B87CD;
    border-color: #d6e9c6;
}
.red {
    border-color: #e25d5d;
}
.red > .panel-heading {
    color: #ffffff;
    background-color:#e21818;
    border-color: #d6e9c6;
}
.yellow {
    border-color: #eee457;
}
.yellow > .panel-heading {
    color: #ffffff;
    background-color:#c0b410;
    border-color: #d6e9c6;
}
.green {
    border-color: #63c945;
}
.green > .panel-heading {
    color: #ffffff;
    background-color:#318a1a;
    border-color: #d6e9c6;
}
.orange {
    border-color: #ec9939;
}
.orange > .panel-heading {
    color: #ffffff;
    background-color:#f07008;
    border-color: #d6e9c6;
}
</style>
