<template>
  <div class="post">
    <h2 class="post-user">{{ post.user.name }}</h2>
    <img src="img/heart.png" alt="いいね">
    <img src="img/cross.png" alt="削除" >
    <img src="img/detail.png" alt="詳細" @click="$router.push(('/'))">
    <p>{{ post.content }}</p>
  </div>
</template>

<script>
export default {
  props: {
    post: Object,
  },

}
</script>