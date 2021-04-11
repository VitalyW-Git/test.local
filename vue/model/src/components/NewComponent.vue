<template>
  <div>
    <span class="title-com-one">ПЕРВЫЙ КОМПОНЕНТ!!! {{ text }}</span>
<!--    <TesComp msg="| Запись добавлена через PROPS!! |"/>-->
    <tes-comp :msg="info" :items="items" @pause="paused"></tes-comp>
  </div>
</template>

<script>
  import TesComp from './TesComp.vue'

  export default {
    name: 'NewComponent',
    props: {
      text: String
    },
    components: {
      TesComp
    },
    data() {
      return {
        info: "Hello",
        items: [
            { name: "Marcel", age: 51 },
            { name: "Deniz", age: 46 }
          ]
      }
    },
    methods: {
      paused() {
        this.info = "Paused";
      }
    }
  }
</script>

<style scoped>

.title-com-one {
  font-weight: bold;
  color: #eec23e;
}

</style>