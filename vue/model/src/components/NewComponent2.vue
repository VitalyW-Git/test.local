<template>
  <div>
    <span class="title-com-two">ВТОРОЙ КОМПОНЕНТ <br> {{ text }}</span>
  </div>
</template>

<script>
  export default {
    name: 'NewComponent2',
    props: {
      text: String
    },
  }
</script>

<style scoped>

.title-com-two {
  font-weight: initial;
  color: #1ff523;
}

</style>
