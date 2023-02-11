<template>
  <div>
    <SideBar />
    <main>
      <Nuxt />
    </main>
  </div>
</template>
<script>
import SideBar from "~/components/SideBar.vue";
export default {
  components: {
    SideBar
}
};
</script>