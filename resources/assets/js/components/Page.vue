<template>
    <div class="container">
        <div class="row">
            <div v-bind:class="defineWidth">
                <slot></slot>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        props: ['width'],
        computed:{
            defineWidth: function(){
               
                if(this.width <= 6){
                    return "col-md-6 col-md-offset-3";
                }else if(this.width >= 12){
                    return "col-md-12";
                }

if((this.width) % 2 == 0){
    return "col-md-"+this.width+" col-md-offset-"+((12-this.width)/2);
}else if((this.width) % 2 != 0){
    return "col-md-"+(parseInt(this.width) + 1)+" col-md-offset-"+((12 - (parseInt(this.width) + 1)) / 2);
}
                
            }
        }
    }
</script>
