
<template>
  <div class="container-fluid">
    <Menu/>

    <RouterView />
  </div>
</template>

<script>
import Menu from './components/Menu.vue';
export default {
  components: {Menu,}
}
</script>

<style scoped>
</style>
