<template>
    <div id="map">
        <h1>地図アプリなのだ。</h1>
        <vmap ref="cmap"></vmap>
        <vcontroller v-on:move-event="move"></vcontroller>
    </div>
</template>

<script>
import vmap from "./vmap.vue";
import vcontroller from "./vcontroller.vue";
export default {
    components: {
        vmap,
        vcontroller
    },
    methods: {
        move(direction){
            this.$refs.cmap.move(direction);
        }
    }
}
</script>
<style scoped>
#map{
    margin-top: 80px;
    width: 640px;
}
h1 {
    text-align: center;
}
</style>