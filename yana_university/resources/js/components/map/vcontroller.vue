<template>
    <div id="mycontroller">
        <div id="mypad">
            <v-fa class="pad" v-on:click="move('left')" icon="long-arrow-alt-left" />
            <v-fa class="pad" v-on:click="move('up')" icon="long-arrow-alt-up" />
            <v-fa class="pad" v-on:click="move('right')" icon="long-arrow-alt-right" />
            <v-fa class="pad" v-on:click="move('down')" icon="long-arrow-alt-down" />
        </div>
    </div>
</template>
<script>
import { library } from '@fortawesome/fontawesome-svg-core';
import { fas } from '@fortawesome/free-solid-svg-icons';
import { far } from '@fortawesome/free-regular-svg-icons';
import { fab } from '@fortawesome/free-brands-svg-icons';
import { FontAwesomeIcon } from '@fortawesome/vue-fontawesome';
library.add(fas, far, fab);

export default{
  name: "vcontroller",
  components: {
    'v-fa': FontAwesomeIcon
  },
methods:{
    move(direction){
      // 親コンポーネントであるmain.vueのmoveメソッドを呼び出す      
      this.$emit("move-event", direction)
    }
  }
}
</script>

<style scoped>
#mycontroller{
  width: 480px;
  margin-top: 20px;
  margin-left: auto;
  margin-right: auto;
}
#mypad{
  display: flex;
  justify-content: space-around;
}
.pad{
  display: block;
  width: 30px;
  height: 30px;
  border: 1px solid black;
}
</style>
