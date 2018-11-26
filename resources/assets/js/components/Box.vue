<template>
          <!-- small box -->
          <div class="small-box" v-bind:style="defineColor">
            <div class="inner">
              <h3>{{ quantity }}</h3>

              <p>{{ title }}</p>
            </div>
            <div class="icon">
              <i v-bind:class="icon"></i>
            </div>
            <a v-bind:href="url" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
</template>

<script>
    export default {
        props: ['quantity', 'title', 'url', 'color', 'icon'],
        computed:{
            defineColor: function(){
            return "background-color: "+ this.color +" !important;";
            }
        }
    }

</script>
<style>
.col-xs-6 {
    width: 50%;
}
.col-xs-6{
    position: relative;
    min-height: 1px;
    padding-right: 15px;
    padding-left: 15px;
}
.bg-aqua {
    background-color: #00c0ef !important;
    color: #fff;
}
.small-box {
    border-radius: 2px;
    position: relative;
    display: block;
    margin-bottom: 20px;
    box-shadow: 0 1px 1px rgba(0,0,0,0.1);
    color: #fff;
}
.small-box>.inner {
    padding: 10px;
}
.small-box h3, .small-box p {
    z-index: 5;
}
.small-box h3 {
    font-size: 38px;
    font-weight: bold;
    margin: 0 0 10px 0;
    white-space: nowrap;
    padding: 0;
}
h3 {
    display: block;
    font-size: 1.17em;
    -webkit-margin-before: 1em;
    -webkit-margin-after: 1em;
    -webkit-margin-start: 0px;
    -webkit-margin-end: 0px;
    font-weight: bold;
    font-family: inherit;
    font-weight: 500;
    line-height: 1.1;
    color: inherit;
}
.small-box p {
    font-size: 15px;
}
p {
    margin: 0 0 10px;
}
.small-box .icon {
    -webkit-transition: all .3s linear;
    -o-transition: all .3s linear;
    transition: all .3s linear;
    position: absolute;
    top: -10px;
    right: 10px;
    z-index: 0;
    font-size: 90px;
    color: rgba(0,0,0,0.15);
}
.small-box>.small-box-footer {
    position: relative;
    text-align: center;
    padding: 3px 0;
    color: #fff;
    color: rgba(255,255,255,0.8);
    display: block;
    z-index: 10;
    background: rgba(0,0,0,0.1);
    text-decoration: none;
}

/* HOVER SECTION */

box:hover {
    text-decoration: none;
}
.small-box:hover .icon {
    font-size: 95px;
}
.small-box>.small-box-footer:hover {
    color: #fff;
    background: rgba(0,0,0,0.15);
}
a:hover, a:active, a:focus {
    outline: none;
}

</style>
