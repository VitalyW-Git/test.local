<template>
  <div>
    <span class="title"> {{ name }} текст просто </span><br>
    <span class="title"> {{ name }} текст просто </span><br>
    <span class="title"> {{ name }} текст просто </span><br>
    <span class="title"> {{ name }} текст просто </span><br>
    <span class="title"> {{ name }} текст просто </span><br>
    <span class="title"> {{ name }} текст просто </span><br>
    <span class="title"> {{ name }} текст просто </span><br>
    <span class="title"> {{ name }} текст просто </span><br>
    <lorem></lorem>
  </div>
</template>

<script>
  import lorem from './components/Lorem.vue'
  // import { defineAsyncComponent } from 'vue'
  //
  // let comp = defineAsyncComponent(() =>
  //     import(/* webpackChunkName: 'lorem' */'./components/Lorem.vue')
  // )

  export default {
    components: {
      lorem
      // lorem: defineAsyncComponent(() => import(/* webpackChunkName: 'lorem' */'./components/Lorem.vue'))
      // lorem: comp
    },
    data() {
      return {
        name: 'New',
      }
    }

  }
</script>


