<template>
  <div>
    <span class="title"> {{ name }} Проверяем стили простой </span><span class="slash">/</span>
<!--    <lorem></lorem>-->
  </div>
</template>

<script>
  // import lorem from './components/admin/Lorem.vue'
  // import { defineAsyncComponent } from 'vue'
  //
  // let comp = defineAsyncComponent(() =>
  //     import(/* webpackChunkName: 'lorem' */'./components/Lorem.vue')
  // )

  export default {
    // components: {
    //   lorem
      // lorem: defineAsyncComponent(() => import(/* webpackChunkName: 'lorem' */'./components/Lorem.vue'))
      // lorem: comp
    // },
    data() {
      return {
        name: 'New',
      }
    }

  }
</script>

<style scoped>

.title {
  color: #ec1511;
  font-size: 20px;
  font-weight: bold;
  text-align: center;
}
.slash {
  color: #0a5688;
  font-size: 30px;
}

</style>


