<template>
  <div class="hello">
    <button @click="cons">Pause</button>
    <h4>My Vue Web Component</h4>
    <hr>
    <div>msg = {{ msg }}</div>
    <div>items = {{ items }}</div>
  </div>
</template>

<script>
  export default {
    name: 'TesComp',
    props: {
      msg: String,
      items: Array
    },
    methods: {
      cons() {
        console.log("Массив из первого component - ", this.items);
        this.$emit("pause", { name: this.name });
      }
    }
  }
</script>

<!-- scoped изолированные стили, только для данного компонента -->

<style scoped>



</style>