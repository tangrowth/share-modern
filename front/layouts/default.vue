<template>
  <div>
    <AuthHeader />
    <main>
      <Nuxt />
    </main>
  </div>
</template>
<script>
import AuthHeader from "@/components/AuthHeader.vue";
export default {
  components: {
    AuthHeader
}
};
</script>