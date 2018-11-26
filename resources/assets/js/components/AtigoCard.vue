<template>
   <div class="row">
        <div class="col-sm-6 col-md-4">
            <div class="thumbnail">
            <img src="#" alt="...">
                <div class="caption">
                    <h3>{{title}}</h3>
                    <p>{{body}}</p> 
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
       props:['title', 'body', 'img']
    }
</script>