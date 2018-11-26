<template>
    <div v-bind:id="namodal" class="modal fade" tabindex="-1" role="dialog" v-bind:aria-labelledby="namodal">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <slot></slot>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        props:['namodal']
    }
</script>