<template>
  <div>
    <Header />
    <main>
      <Nuxt />
    </main>
  </div>
</template>
<script>
import Header from "@/components/AuthHeader.vue";
export default {
  components: {
    Header,
  }
};
</script>