<template>
  <div class="post">
    <p>{{ post.user_id }}</p>
    <img src="img/heart.png" alt="いいね">
    <div @click="emitDeletePost"><img src="img/cross.png" alt="削除"></div>
    <img src="img/detail.png" alt="詳細" @click="getDetail">
    <p>{{ post.content }}</p>
  </div>
</template>

<script>
export default {
  props: {
    post: Object,
  },
  methods: {
    emitDeletePost() {
      this.$emit("deletePost", this.post);
    },
    getDetail() {
      this.$router.push(`/posts/${this.post.id}`);
    },
  }

}
</script>
<style scoped>
* {
  background-color: midnightblue;
  color: aliceblue;
}

img {
  height: 30px;
}

.post-header {
  display: flex;
}
</style>